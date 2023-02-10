<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\SubCategoryResource;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;
use Str;

class CategoryController extends Controller
{
    public function categories(Request $request)
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
            $categories = Category::with('sub_categories')->get();
            if ($categories->count() > 0) {
                $resource = CategoryResource::collection($categories);
                return apiResponse(true, "Category List", $resource, 200);
            }
            return apiResponse(true, "Category List Empty", null, 500);
        }
    }
    public function subcategories(Request $request)
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
            $categories = SubCategory::with('category')->get();
            if ($categories->count() > 0) {
                $resource = SubCategoryResource::collection($categories);
                return apiResponse(true, "Sub Category List", $resource, 200);
            }

            return apiResponse(true, "Sub Categories not found", null, 500);
        }
    }
    public function categoryDetail(Request $request, $id){
        $token = PersonalAccessToken::findToken($request->bearerToken());

        if (!$token) {
            $response = [
                'success' => false,
                'code' => 422,
                'message' => 'Credentials not found.'
            ];

            return response()->json($response);
        }else{
            $categories = SubCategory::with('category')->where('category_id', $id)->get();
            if ($categories->count() > 0) {
                $resource = SubCategoryResource::collection($categories);
                return apiResponse(true, "Sub Category List", $resource, 200);
            }
            return apiResponse(true, "Sub Categories not found", null, 500);
        }
    }
}
