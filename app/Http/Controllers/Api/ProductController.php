<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Str;

class ProductController extends Controller
{
    public function index()
    {
       $products = Product::where('status', 1)->get();
       if ($products->count() > 0) {
          $resource = ProductResource::collection($products);
          return apiResponse(true, "products List", $resource, 200);
       }
       return apiResponse(true, "Products List Empty", null, 500);
    }

    public function show(Request $request){
        $product = Product::where('id', $request->id)->where('status', 1)->first();
        if (!empty($product)) {
           $resource = new ProductResource($product);
           return apiResponse(true, "Product Detail", $resource, 200);
        }
        return apiResponse(true, "Products not found", null, 500);
    }
}
