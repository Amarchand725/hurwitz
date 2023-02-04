<?php

use App\Http\Resources\CityResource;
use App\Http\Resources\CountryResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\RoleResource;
use App\Http\Resources\StateResource;
use App\Http\Resources\UserResource;
use App\Mail\BidRejectionEmail;
use App\Models\Auction;
use App\Models\Bidding;
use App\Models\BiddingStatus;
use App\Models\Book;
use App\Models\BookAudio;
use App\Models\BookUrl;
use App\Models\City;
use App\Models\ComplaintStatus;
use App\Models\Country;
use App\Models\OrderStatus;
use App\Models\OrderType;
use App\Models\PasswordResetCode;
use App\Models\Product;
use App\Models\Role;
use App\Models\Setting;
use App\Models\State;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

function getThemeSettings()
{
    $setting = Setting::orderBy('id', 'desc')->first();
    return $setting;
}
function roles()
{
    $roles = Role::all();
    $roles = RoleResource::collection($roles);
    return $roles;
}
function status()
{
    $status = [
        1 => 'Active',
        0 => 'In-Active',
    ];
    return $status;
}
function getTypeStatus($book_id, $type){
    $record = BookUrl::where('book_id', $book_id)->where('orderType',$type)->first();
    if(!empty($record) && isset($record)){
        return true;
    }
    return false;
}
function showStatus($status)
{
    if (empty($status)) {
        return "In-Active";
    } else {
        return "Active";
    }
}
function UpdateBookOrderType($book_id)
{
    $records = BookUrl::where('book_id',$book_id)->get();
        return $records;
}
function getOrderType($id)
{
    $order= OrderType::where('id', $id)->first();
    if(!empty($order->title) && $id > 0){
        
    return $order->title;
    } 
}
function getPagination()
{
    return 20;
}
function apiResponse($success, $message, $data, $code)
{
    if (!empty($data)) {

        return response()->json(['success' => $success, 'message' => $message, 'data' => $data], $code);
    }
    return response()->json(['success' => $success, 'message' => $message], $code);
}
function getCountries()
{
    $countries = Country::all();
    if ($countries->count() > 0) {
        $resource =  CountryResource::collection($countries);
        if (!empty($resource)) {
            return $resource;
        }
        return null;
    }
    return null;
}
function getStates($country_id)
{
    $states = State::where('country_id', $country_id)->get();

    if ($states->count() > 0) {
        $resource =  StateResource::collection($states);
        if (!empty($resource)) {
            return $resource;
        }
        return null;
    }
    return null;
}
function getCities($state_id)
{
    $cities = City::with('country', 'state')->where('state_id', $state_id)->get();
    if ($cities->count() > 0) {
        $resource =  CityResource::collection($cities);
        if (!empty($resource)) {
            return $resource;
        }
        return null;
    }
    return null;
}
function getCitiesCount($state_id)
{
    $cities = City::where('state_id', $state_id)->count();
    return $cities;
}
function getStatesCount($country_id)
{
    $state = State::where('country_id', $country_id)->count();
    return $state;
}
function checkIsset($value)
{
    $check = isset($value) && !empty($value) ? $value : null;
    return $check;
}
function getUserToken($token)
{
    $user = User::where('remember_token', $token)->first();
    if (!empty($user)) {
        $resource = new UserResource($user);
        return $resource;
    }
    return null;
}
function getSlug($title)
{
    $slug = Str::slug($title);
    return $slug;
}
function formatted_date($created_at)
{
    $created_at = date("d M Y h:i A ", strtotime($created_at));
    return $created_at;
}
function getComplaintStatus($status_id)
{
    $check = ComplaintStatus::where('id', $status_id)->first();
    if (!empty($check)) {
        return $check->name;
    }
    return null;
}
function getJsonCountries()
{
}
function updateAuthToken($user_id, $token)
{
    $user = User::where('id', $user_id)->first();
    $user->update(['remember_token' => $token]);
}
function generateOTP($user_id)
{
    $code  = Str::random(8) . '-' . $user_id;
    return $code;
}
function saveOTP($otp, $user_id)
{
    $save = PasswordResetCode::create([
        'code' => $otp,
        'user_id' => $user_id,
    ]);
    if ($save->id) {
        return true;
    }
    return false;
}
function get_book_audios($book_id)
{


    $check = checkIsset(BookAudio::where('book_id', $book_id));
    if ($check) {
        $audios = BookAudio::where('book_id', $book_id);
        return $audios;
    }
}
function verifyBook($book_id)
{
    $check = Book::where('id', $book_id)->first();
    if (!empty($check)) {
        return $check;
    }
    return false;
}
function verifyCountry($country_id)
{
    $check = Country::where('id', $country_id)->first();
    if (!empty($check)) {
        return $check;
    }
    return false;
}
function verifyState($state_id)
{
    $check = State::where('id', $state_id)->first();
    if (!empty($check)) {
        return $check;
    }
    return false;
}
function verifyCity($city_id)
{
    $check = City::where('id', $city_id)->first();
    if (!empty($check)) {
        return $check;
    }
    return false;
}
function verifyOrderStatus($status_id)
{
    $check = OrderStatus::where('id', $status_id)->first();
    if (!empty($check)) {
        return $check;
    }
    return false;
}
function getOrderStatus($order_status_id)
{
    $order_status = OrderStatus::where('id', $order_status_id)->first();
    return $order_status->name;
}
function getStatusColor($order_status_id)
{
    if ($order_status_id == 1) {
        return "warning";
    } elseif ($order_status_id == 2) {
        return "info";
    } elseif ($order_status_id == 3) {
        return "success";
    } else {
        return "danger";
    }
}
/* Convert hexdec color string to rgb(a) string */
function hex2rgba($color, $opacity = false)
{

    $default = 'rgb(0,0,0)';

    //Return default if no color provided
    if (empty($color))
        return $default;

    //Sanitize $color if "#" is provided
    if ($color[0] == '#') {
        $color = substr($color, 1);
    }

    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
        $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
    } elseif (strlen($color) == 3) {
        $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
    } else {
        return $default;
    }

    //Convert hexadec to rgb
    $rgb =  array_map('hexdec', $hex);

    //Check if opacity is set(rgba or rgb)
    if ($opacity) {

        $opacity = 1.0;
        $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
    } else {
        $output = 'rgb(' . implode(",", $rgb) . ')';
    }

    //Return rgb(a) color string
    return $output;
}
function verifyProductAuctionStatus($product_id)
{
    $product = Product::find($product_id);
    if ($product->open_for_auction != 1) {
        return false;
    }
    return $product;
}
function checkAuctionOfProduct($product)
{
    $auction = Auction::where('product_id', $product->id)->first();
    if (!empty($auction)) {
        if ($auction->status == 1) {
            return $auction;
        } else {
            $createAuction = Auction::create([
                'product_id' => $product->id,
                'status' => 1,
                'initial_price' => $product->initial_price,
                'final_price' => $product->final_price
            ]);
            return $createAuction;
        }
    }
    $createAuction = Auction::create([
        'product_id' => $product->id,
        'status' => 1,
        'initial_price' => $product->initial_price,
        'final_price' => $product->final_price
    ]);
    return $createAuction;
}
function checkOrCreateBidding($auction_id, $user_id, $price)
{
    // $check  = Bidding::where('auction_id', $auction_id)->where('user_id', $user_id)->first();
    // if (!empty($check)) {
    //     return apiResponse(false, "You have already applied bid on this product", null, 500);
    // }
    $applyBid = Bidding::create(['auction_id' => $auction_id, 'user_id' => $user_id, 'price' => $price, 'status' => 1]);
    if ($applyBid->id) {
        return apiResponse(true, "You have successfuly applied bid on this product", null, 200);
    }
    return  apiResponse(false, "Something went wrong while applying your bid", null, 500);
}
function getBiddingStatuses()
{
    $status = BiddingStatus::all();
    return $status;
}
function rejectBiddings($biddings)
{
    foreach ($biddings as $index => $value) {
        userBidRejecttionEmail($value);
        $value->update(['status' => 3]);
    }
    return true;
}
function  userBidRejecttionEmail($bid)
{
    $auction = Auction::where('id', $bid->auction_id)->with('product')->first();
    $product_title = $auction->product->title;
    $user =  User::find($bid->user_id);
    $details = [
        'username' => $user->name,
        'message' => "Your bidding request on   $product_title   has been rejected",
    ];
    Mail::to($user->email)->send(new BidRejectionEmail($details));
}
function getAuctionDataWithProduct($product)
{
    return [

        'product' => new ProductResource($product->product),
        'initial_price' => isset($product->initial_price) && !empty($product->initial_price) ? $product->initial_price : 0,
        'final_price' => isset($product->final_price) && !empty($product->final_price) ? $product->final_price : 0,
        'auction_status' => isset($product->getStatus->name) && !empty($product->getStatus->name) ? $product->getStatus->name : null,
    ];
}
function getAvailableOrderTypes($book_id)
{
    $book = Book::where('id', $book_id)->first();
    $array = [];
    $orderTypes = OrderType::all();
    if (isset($book->amazon_url) && !empty($book->amazon_url)) {
        $array['data'][] = [
            'id' => $orderTypes[0]->id,
            'name' => $orderTypes[0]->name,
        ];
    }
    if (isset($book->ebook) && !empty($book->ebook)) {
        $array['data'][] = [
            'id' => $orderTypes[1]->id,
            'name' => $orderTypes[1]->name,
        ];
    }
    if (isset($book->paper_back_url) && !empty($book->paper_back_url)) {
        $array['data'][] = [
            'id' => $orderTypes[2]->id,
            'name' => $orderTypes[2]->name,
        ];
    }
    $geteBooksaudios = BookAudio::where('book_id', $book_id)->get();
    if ($geteBooksaudios->count() > 0) {
        $array['data'][] = [
            'id' => $orderTypes[3]->id,
            'name' => $orderTypes[3]->name,
        ];
    }
    if (isset($book->google_book_link) && !empty($book->google_book_link)) {
        $array['data'][] = [
            'id' => $orderTypes[4]->id,
            'name' => $orderTypes[4]->name,
        ];
    }
    if (isset($book->kindle_url) && !empty($book->kindle_url)) {
        $array['data'][] = [
            'id' => $orderTypes[5]->id,
            'name' => $orderTypes[5]->name,
        ];
    }
    return $array;
}
