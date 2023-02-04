<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuctionResource;
use App\Http\Resources\BiddingResource;
use App\Models\Bidding;
use App\Models\Auction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class BiddingController extends Controller
{
    public function getBiddings(Request $request)
    {
        $user = getUserToken($request->bearerToken());
        if (!empty($user)) {
            $biddings = Bidding::where('user_id', $user->id)->get()->groupby('auction_id');
            $array = [];
            foreach ($biddings as $index => $value) {
                $array[] = $value[0];
            }

            $biddings = collect($array);

            // return $biddings;
            if ($biddings->count() > 0) {
                $resource = AuctionResource::collection($biddings);
                return apiResponse(true, "Biddings List", $resource, 200);
            }
            return apiResponse(false, "Biddings not found", null, 500);
        }
        return apiResponse(false, "User not found!", null, 500);
    }
    
    public function getProductBiddings(Request $request, $product_id)
    {
        $user = getUserToken($request->bearerToken());
        if (!empty($user)) {
            $auction = Auction::with('getStatus',  'biddings', 'biddings.user', 'biddings.biddingStatus')->where('product_id', $product_id)->first();
            
            $biddings = [];
            if(!empty($auction)){
                $array = [];
                
                foreach ($auction->biddings as $index => $value) {
                    $bid_status = 'Pending';
                    if($value->status==2){
                        $bid_status = 'Approved';
                    }elseif($value->status==3){
                        $bid_status = 'Rejected';
                    }elseif($value->status==4){
                        $bid_status = 'Closed';
                    }
                    $array[] = array(
                        'user' => $value->user->name,
                        'offer_price' => number_format($value->price,0),
                        'status' => $bid_status,
                        'created_at' => date('d-m-y h:i:s', strtotime($value->created_at))
                    );
                }
    
                $biddings = collect($array);
            }

            if (count($biddings) > 0) {
                return apiResponse(true, "Product Biddings List", $biddings, 200);
            }
            return apiResponse(false, "Biddings not found", null, 500);
        }
        return apiResponse(false, "User not found!", null, 500);
    }

    public function saveBid(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'product_id' => 'required|exists:products,id',
                'price' => 'required',
            ]);
            
            if ($validator->fails()) {
                return apiResponse(false, $validator->errors()->all(), null, 500);
            }
            $user = getUserToken($request->bearerToken());
            if (!empty($user)) {
                $verifyProduct = verifyProductAuctionStatus($request->product_id);

                if (!empty($verifyProduct)) {
                    if ($request->price < $verifyProduct->initial_price) {
                        return apiResponse(false, "Your bidding price must be greater than {$verifyProduct->initial_price}", null, 500);
                    }

                    if (isset($verifyProduct->final_price) && !empty($verifyProduct->final_price) &&  $request->price > $verifyProduct->final_price) {
                        return apiResponse(false, "Your bidding price must not be greater than {$verifyProduct->final_price}", null, 500);
                    }

                    $auction = checkAuctionOfProduct($verifyProduct);
                    $checkBid = checkOrCreateBidding($auction->id, $user->id, $request->price);
                    return $checkBid;
                }
                return apiResponse(false, "Product is not open for auction", null, 500);
            }
            return apiResponse(false, "User not found!", null, 500);
        } catch (Exception $e) {
            return apiResponse(false, $e->getMessage(), null, 500);
        }
    }
}
