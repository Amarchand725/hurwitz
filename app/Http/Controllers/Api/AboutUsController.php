<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AboutResource;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;
use Str;

class AboutUsController extends Controller
{
    public function index(Request $request)
    {
        $token = PersonalAccessToken::findToken($request->bearerToken());

        if (!$token) {
            $response = [
                'success' => false,
                'message' => 'Credentials not found.'
            ];

            return response()->json($response, 422);
        }else{
            $about = AboutUs::orderby("id", "desc")->first();
            if (!empty($about)) {
                $resource = new AboutResource($about);
                return apiResponse(true, "About Us", $resource, 200);
            }
            return apiResponse(false, "About Us Not Found", null, 500);
        }
    }
}
