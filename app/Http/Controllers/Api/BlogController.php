<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Str;

class BlogController extends Controller
{
    public function index()
    {

        $blogs = Blog::where('status', 1)->get();
        if ($blogs->count() > 0) {
            $resource = BlogResource::collection($blogs);
            return apiResponse(true, "Blogs List", $resource, 200);
        }
        return  apiResponse(true, "Blogs List Empty", null, 500);
    }

    public function show(Request $request)
    {

        $blog_detail = Blog::where("id", $request->id)->where('status', 1)->first();
        if (!empty($blog_detail)) {
            $resource = new BlogResource($blog_detail);
            return apiResponse(true, "Blog details", $resource, 200);
        }
        return apiResponse(false, "Blog Not Found", null, 500);
    }
}
