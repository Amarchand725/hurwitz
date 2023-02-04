<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Str;
use Exception;
use App\Models\Social;
use App\Models\User;

class SocialController extends Controller
{

    public function getProviders()
    {
        $providers = Provider::all();
        if ($providers->count() > 0) {
            $array = [];
            foreach ($providers as $index => $value) {
                $array[$index]['iod']  = $value->id;
                $array[$index]['name']  = $value->name;
            }
            return apiResponse(true, "Providers List", $array, 200);
        }
        return apiResponse(false, "Providers List Empty", null, 500);
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'provider_id' => 'required',
            'uid' => 'required',
        ]);
        try {
            $provider = $request->provider_id;
            if (isset($request->token) && !empty($request->token)) {
                $token = $request->token;
            } else {
                $token = "";
                
            }

            if (isset($request->username) && !empty($request->username)) {
                $username = $request->username;
            } else {
                $username = "";
            }


            if ($validator->passes()) {
                $user = User::where('email', $request->email)->first();
                if (!empty($user)) {
                    $validateSocial = Social::where('uid', $request->uid)->first();
                    if (!empty($validateSocial)) {
                        $userDetail  = $this->userDetail($user->id);
                        return apiResponse(true, "Succesfuly Logged In", $userDetail, 200);
                    }
                    $socialLogin = $this->storeSocial($user->id, $request->uid, $provider, $token);
                    return response()->json(['success' => $socialLogin['success'], 'data' => $socialLogin['data']], $socialLogin['code']);
                }



                $name = $request->first_name . " " . $request->last_name;
                if (isset($request->username) && !empty(isset($request->username))) {
                    $password  = $request->username;
                } else {
                    $password = $request->email;
                }



                $storeUser = $this->storeUser($name, $request->email, $provider, $password, $username);

                if ($storeUser->success == true) {
                    $user = $storeUser->data->user;
                    $socialLogin = $this->storeSocial($user->id, $request->uid, $provider,  $token);
                    if ($socialLogin == true) {
                        return apiResponse(true, "User Logged In", $user, 200);
                    } else {
                        return apiResponse(true, "Failed to logged In", null, 500);
                    }
                }
                return response()->json(['success' => false, 'msg' => 'Something Went Wrong'], 200);
            }
            return response()->json(['success' => false, 'errors' => $validator->errors()->all()], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'errors' => $e->getMessage()], 200);
        }
    }
    public function storeSocial($user_id, $uid, $provider, $token)
    {
        $storeSocial = Social::create([
            'user_id' => $user_id,
            'uid' => $uid,
            'provider_id' => $provider,
            'token' => $token,
        ]);
        if (!empty($storeSocial->id)) {
            return true;
        }
        return false;
    }

    public function storeUser($name, $email, $provider, $password, $username)
    {
        $token = Str::random(50);
        $password = Hash::make($password);
        $storeUser = User::create([
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'phone' => 0,
            'remember_token' => $token,
        ]);
        if (!empty($storeUser->id)) {
            $provider = Provider::where('id', $provider)->first();
            $user = new UserResource($storeUser);
            $data = (object) ['user' =>  $user, 'provider' => $provider];
            return (object) ['success' => true, 'data' =>  $data];
        }
        return ['success' => false, 'message' => 'Error whilte saving the User'];
    }

    public function userDetail($id)
    {
        $token = Str::random(50);
        User::where('id', $id)->update(['remember_token' => $token]);
        $user = User::where('id', $id)->first();
        $resource = new UserResource($user);
        return $resource;
    }
}
