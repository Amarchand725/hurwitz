<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;
use Str;

class BlogController extends Controller
{
    public function index(Request $request)
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
            $blogs = Blog::orderby('id', 'desc')->get();
            if ($blogs->count() > 0) {
                $resource = BlogResource::collection($blogs);
                return apiResponse(true, "Blogs List", $resource, 200);
            }
            return  apiResponse(true, "Blogs List Empty", null, 500);
        }
    }

    public function show(Request $request)
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
            $blog_detail = Blog::where("id", $request->id)->first();
            if (!empty($blog_detail)) {
                $resource = new BlogResource($blog_detail);
                return apiResponse(true, "Blog details", $resource, 200);
            }
            return apiResponse(false, "Blog Not Found", null, 500);
        }
    }
}
