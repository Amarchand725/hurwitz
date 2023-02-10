<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Resources\HelpAndSupportResource;
use App\Models\Country;
use App\Models\HelpAndSupport;
use Illuminate\Http\Request;
use Validator;
use Str;
use Exception;
use Laravel\Sanctum\PersonalAccessToken;

class HomeController extends Controller
{
    public function roles(Request $request)
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
            $roles = roles();
            if ($roles != null) {
                return response()->json(['success' => true, 'roles' => roles()], 200);
            }
            return response()->json(['success' => false, 'message' => 'Roles not found!'], 500);
        }
    }
    public function status(Request $request)
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
            $status = status();
            if ($status != null) {
                return response()->json(['success' => true, 'status' => $status], 200);
            }
            return response()->json(['success' => false, 'message' => 'Status list not found!'], 500);
        }
    }
    public function countries(Request $request)
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
            $countries = getCountries();
            return $countries;
            if ($countries != null) {
                return response()->json(['success' => true, 'country' => $countries], 200);
            }
            return response()->json(['success' => false, 'message' => 'Countries not found!'], 500);
        }
    }
    public function states(Request $request, $id)
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
            $states = getStates($id);
            if ($states != null) {
                return response()->json(['success' => true, 'states' => $states], 200);
            }
            return response()->json(['success' => false, 'message' => 'States not found!'], 500);
        }
    }
    public function cities(Request $request, $id)
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
            $cities = getCities($id);
            if ($cities != null) {
                return response()->json(['success' => true, 'cities' => $cities], 200);
            }
            return response()->json(['success' => false, 'message' => 'Cities not found!'], 500);
        }
    }
    public function helpAndSupport()
    {
        $check = HelpAndSupport::orderby('id', 'desc')->first();
        if (!empty($check)) {
            $data = new HelpAndSupportResource($check);
            return response()->json(['success' => true, 'message' => 'Help and Support', 'data' => $data], 200);
        }
        return apiResponse(false, 'Data not foud', null, 500);
    }
}
