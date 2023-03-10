<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TestimonialResource;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;
use Str;

class TestimonialController extends Controller
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
            $testimonials = Testimonial::where('status', 1)->get();
            if ($testimonials->count() > 0) {
                $resource = TestimonialResource::collection($testimonials);
                return apiResponse(true, "Testimonial List", $resource, 200);
            }
            return  apiResponse(true, "Testimonial List Empty", null, 500);
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
            $testimonial_detail = Testimonial::where("id", $request->id)->where('status', 1)->first();
            if (!empty($testimonial_detail)) {
                $resource = new TestimonialResource($testimonial_detail);
                return apiResponse(true, "Testimonial details", $resource, 200);
            }
            return apiResponse(false, "Testimonial Not Found", null, 500);
        }
    }
}
