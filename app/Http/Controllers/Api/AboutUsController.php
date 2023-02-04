<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AboutResource;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Str;

class AboutUsController extends Controller
{
    public function index(Request $request)
    {
        $user = getUserToken($request->bearerToken());
        if (!empty($user)) {
            $about = AboutUs::orderby("id", "desc")->first();
            if (!empty($about)) {
                $resource = new AboutResource($about);
                return apiResponse(true, "About Us", $resource, 200);
            }
            return apiResponse(false, "About Us Not Found", null, 500);
        }
        return apiResponse(false, "User not found", null, 500);
    }
}
