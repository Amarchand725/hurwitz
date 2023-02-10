<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;
use Str;

class ProductController extends Controller
{
    public function index()
    {
        $token = PersonalAccessToken::findToken($request->bearerToken());

        if (!$token) {
            $response = [
                'success' => false,
                'code' => 422,
                'message' => 'Credentials not found.'
            ];

            return response()->json($response);
        }else{
            $products = Product::where('status', 1)->get();
            if ($products->count() > 0) {
                $resource = ProductResource::collection($products);
                return apiResponse(true, "products List", $resource, 200);
            }
            return apiResponse(true, "Products List Empty", null, 500);
        }
    }

    public function show(Request $request){
        $token = PersonalAccessToken::findToken($request->bearerToken());

        if (!$token) {
            $response = [
                'success' => false,
                'code' => 422,
                'message' => 'Credentials not found.'
            ];

            return response()->json($response);
        }else{
            $product = Product::where('id', $request->id)->where('status', 1)->first();
            if (!empty($product)) {
            $resource = new ProductResource($product);
            return apiResponse(true, "Product Detail", $resource, 200);
            }
            return apiResponse(true, "Products not found", null, 500);
        }
    }
}
