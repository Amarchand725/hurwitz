<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookaudioResource;
use App\Http\Resources\OrderResource;
use App\Http\Resources\OrderStatusResource;
use App\Http\Resources\OrderTypeByBook;
use App\Http\Resources\OrderTypeResource;
use App\Models\BookAudio;
use App\Models\BookUrl;
use App\Models\FundRaiser;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\OrderType;
use Illuminate\Cache\ApcStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Ui\Presets\React;
use League\CommonMark\Node\Query\OrExpr;
use Str;

class OrderController extends Controller
{
    public function orderTypes()
    {
        $types = OrderType::all();
        if ($types->count() > 0) {
            $resource = OrderTypeResource::collection($types);
            return apiResponse(true, "Order Types", $resource, 200);
        }
        return apiResponse(false, "Order Types not found", null, 500);
    }

    public function orderStatuses()
    {
        $types = OrderStatus::all();
        if ($types->count() > 0) {
            $resource = OrderStatusResource::collection($types);
            return apiResponse(true, "Order Statuses", $resource, 200);
        }
        return apiResponse(false, "Order Statuses not found", null, 500);
    }

    public function orderTypesByBook($book_id){
        $types = BookUrl::where('book_id', $book_id);
        if ($types->count() > 0) {
            $resource = OrderTypeByBook::collection($types);
            return apiResponse(true, "Order Types By Book", $resource, 200);
        }
        return apiResponse(false, "Order Types By Book not found", null, 500);
    }


    public function orderPlace(Request $request)
    {

        $rules = [

            'book_id' => 'required',
            'order_type_id' => 'required|integer',
            'payment_id' => 'required',
            'provider' => 'required',
            'sub_total' => 'required',
            'grand_total' => 'required',
        ];

        if (isset($request->order_type_id) && $request->order_type_id != 2 &&  $request->order_type_id != 4 ) {
            $rules = [
                'country_id' => 'required|integer',
                'state_id' => 'required|integer',
                'city_id' => 'required|integer',
                'zip_code' => 'required',
                'address' => 'required|string|max:255',
                // 'shipping_charges' => 'required',
            ];
        }


        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return apiResponse(false, $validator->errors()->all(), null, 500);
        }
        if (isset($request->order_type_id) && $request->order_type_id != 2 &&  $request->order_type_id != 4 ) {
            $country = verifyCountry($request->country_id);
            $state = verifyState($request->state_id);
            $city = verifyCity($request->city_id);
            if (empty($country)) {
                return apiResponse(false, "Country not found", null, 500);
            }
            if (empty($state)) {
                return apiResponse(false, "State not found", null, 500);
            }
            if (empty($city)) {
                return apiResponse(false, "City not found", null, 500);
            }
            if (isset($state) && $state->price != $request->shipping_charges) {
                return apiResponse(false, 'Invalid shipping charges', null, 500);
            }
        }
        $book = verifyBook($request->book_id);
        $user = getUserToken($request->bearerToken());


        $order_status = verifyOrderStatus($request->order_status_id);
        if (empty($book)) {
            return apiResponse(false, "Invalid book selected", null, 500);
        }
        if (empty($user)) {
            return apiResponse(false, "User not found", null, 500);
        }

       $order_id =Order::orderBy('id', 'desc')->first();
        if(empty($order_id->order_id)){
            $order_id_rnd = random_int(1000000, 9999999);
        }


        $order = Order::create([
            'order_id' => isset($order_id->order_id) && !empty($order_id->order_id) ? $order_id->order_id+1 : $order_id_rnd ,
            'user_id' => isset($user->id) && !empty($user->id) ? $user->id : null,
            'book_id' => isset($book->id) && !empty($book->id) ? $book->id : null,
            'country_id' => isset($country->id) && !empty($country->id) ? $country->id : null,
            'state_id' => isset($country->id) && !empty($country->id) ? $country->id : null,
            'city_id' => isset($state->id) && !empty($state->id) ? $state->id : null,
            'zip_code' => isset($request->zip_code) && !empty($request->zip_code) ? $request->zip_code : null,
            'address' => isset($request->address) && !empty($request->address) ? $request->address : null,
            'payment_id' => isset($request->payment_id) && !empty($request->payment_id) ? $request->payment_id : null,
            'provider' => isset($request->provider) && !empty($request->provider) ? $request->provider : null,
            'sub_total' => isset($request->sub_total) && !empty($request->sub_total) ? $request->sub_total : null,
            'grand_total' => isset($request->grand_total) && !empty($request->grand_total) ? $request->grand_total : null,
            'shipping_charges' => isset($request->shipping_charges) && !empty($request->shipping_charges) ? $request->shipping_charges : null,
            'order_type_id' => isset($request->order_type_id) && !empty($request->order_type_id) ? $request->order_type_id : null,
        ]);
        if ($order->id) {
            if ($request->order_type_id == 4) {
                $audios = $book->audios;
                $extra = BookaudioResource::collection($audios);
                $message = " Order has been placed, Click on the link to download audio files";

            } elseif ($request->order_type_id == 2) {
                $extra = asset(config('upload_path.books')) . '/' . $book->ebook;
                $order->update([
                    'order_status_id' => 3,
                ]);
                $message = " Order has been placed, Click on the link to download pdf files";
            } else {
                $extra = false;
                $message = "Order has been Placed, Book will be delivered to your address";
            }
            $order = Order::with('order_status', 'user', 'book', 'country', 'state', 'city')->where('id', $order->id)->first();
            $resource = new OrderResource($order);

            return response()->json(['success' => true, "message" => $message, "downloadable" => $extra, "data" => $resource], 200);
        }
        return apiResponse(false, "Something went wrong!", null, 500);
    }
    public function orderHistory(Request $request)
    {
        $user =  getUserToken($request->bearerToken());
        if (empty($user)) {
            return apiResponse(false, "User not logged Id", null, 500);
        }
        $orders = Order::with('order_status', 'user', 'book', 'country', 'state', 'city')->where('user_id', $user->id)->get();
          $resource = OrderResource::collection($orders);

        if (!empty($orders)) {
            return response()->json(['success' => true, "message" => "Order History", "data" => $resource], 200);
        }else{
             return response()->json(['success' => false, "message" => "No Orders Available."], 500);
        }
        // return apiResponse(false, "Order ID invalid", null, 500);
    }
    public function trackYourOrder(Request $request)
    {
        if (empty($request->order_id)) {
            return apiResponse(false, "Order Id Required", null, 500);
        }
        $order = Order::with('order_status', 'user', 'book', 'country', 'state', 'city')->where('order_id', $request->order_id)->first();
        if (!empty($order)) {
            $resource = new OrderResource($order);
            return response()->json(['success' => true, "message" => "Track Your Order", "data" => $resource], 200);
        }
        return apiResponse(false, "Order ID invalid", null, 500);
    }

    public function fundRaiser(Request $request)
    {
        $user = getUserToken($request->bearerToken());
        if (empty($user)) {
            return apiResponse(false, "User not found or may be logged out", null, 500);
        }
        $validator = Validator::make($request->all(), [
            'amount' => 'required',
            'provider' => 'required',
            'payment_id' => 'required',
        ]);
        if ($validator->fails()) {
            return apiResponse(false, $validator->errors()->all(), null, 500);
        }
        $payment = FundRaiser::create([
            'user_id' => $user->id,
            'amount' => $request->amount,
            'provider' => $request->provider,
            'payment_id' => $request->payment_id,
        ]);
        if ($payment->id) {
            return apiResponse(true, "Payment has been deducted", null, 200);
        }
        return apiResponse(false, "Payment not deducted", null, 500);
    }
}
