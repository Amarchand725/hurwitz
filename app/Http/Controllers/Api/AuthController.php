<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Mail\ForgotPassword;
use App\Models\PasswordResetCode;
use App\Models\User;
use App\Models\Userdetail;
use Exception;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Laravel\Ui\Presets\React;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $email = Validator::make($request->all(), [
            'email' => 'required|unique:users,email,NULL,id,deleted_at,NULL',
        ]);
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
        ]);
        if ($validator->fails()) {
            return apiResponse(false, $validator->errors()->first(), null, 500);
        }
        if ($email->fails()) {
            return apiResponse(false, $email->errors()->first(), null, 500);
        }
        if (empty($request->name)) {
            return response()->json(['success' => false, 'message' => 'Please Enter Your Name'], 500);
        }
        if (empty($request->email)) {
            return response()->json(['success' => false, 'message' => 'Please Enter Email'], 500);
        }


        if (empty($request->phone)) {
            return response()->json(['success' => false, 'message' => 'Please Enter Phone Number'], 500);
        }
        $user = User::where('email', $request->email)->where('deleted_at', null)->first();
        if (!empty($user)) {
            return response()->json(['success' => false, 'message' => 'A user with this email already exist '], 500);
        }
        if (empty($request->password)) {
            return response()->json(['success' => false, 'message' => 'Please Enter Password'], 500);
        }
        try {
            $token = Str::random(50);
            $user  = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'remember_token' => $token,
            ]);
            if ($user->id) {
                $user = User::where('id', $user->id)->first();
                updateAuthToken($user->id, $token);
                $resource = new UserResource($user);
                return response()->json(['success' => true, 'message' => 'Successfuly Registered', 'user' => $resource], 200);
            }
            return response()->json(['success' => false, 'message' => 'User Registeration failed!'], 500);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
    public function login(Request $request)
    {
    
  
        if (empty($request->email)) {
            return response()->json(['success' => false, 'message' => 'Please Enter Email'], 500);
        }
        $email = Validator::make($request->all(), [
            'email' => 'email',
        ]);
        if ($email->fails()) {
            return apiResponse(false, $email->errors()->first(), null, 500);
        }
        if (empty($request->password)) {
            return response()->json(['success' => false, 'message' => 'Please Enter Password'], 500);
        }
        $user = User::where('email', $request->email)->where('deleted_at', null)->first();
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Invalid Email'], 500);
        }

        if (!empty($user->email)) {
            if (!Hash::check($request->password, $user->password)) {
                return response()->json(['success' => false, 'message' => 'Invalid Password'], 500);
            }
        }
        if ($user->email == $request->email && Hash::check($request->password, $user->password)) {
            $token = Str::random(50);
            updateAuthToken($user->id, $token);
            $user = User::where("id", $user->id)->first();
            $user_data = new UserResource($user);
            return response()->json(['success' => true, 'message' => 'Successfuly Logged In', 'user' => $user_data], 200);
        }
        return response()->json(['success' => false, 'message' => 'Error occured in User login, Please Try Again!'], 500);
    }
    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            return apiResponse(false, $validator->errors()->all(), null, 500);
        }
        $user = User::where('email', $request->email)->first();
        if (empty($user)) {
            return apiResponse(false, "User does not exist with this Email ID", null, 500);
        }
        $old_code = PasswordResetCode::where('user_id', $user->id)->where('status', 0)->get();
        foreach ($old_code as $index => $value) {
            $value->update(['status' => 1]);
        }

        $code = generateOTP($user->id);
        $saveCode = saveOTP($code, $user->id);
        $details  = [
            'name' => $user->name,
            'otp' =>  $code,
        ];
        Mail::to($user->email)->send(new ForgotPassword($details));
        return apiResponse(true, "OTP has been sent to your email address", null, 200);
    }
    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp' => 'required|string',
        ]);
        if ($validator->fails()) {
            return apiResponse(false, $validator->errors()->all(), null, 500);
        }
        $verify = PasswordResetCode::where('code', $request->otp)->first();
        if (empty($verify)) {
            return apiResponse(false, "Invalid OTP", null, 500);
        }
        if (!empty($verify)) {
            if ($verify->status == 1) {
                return apiResponse(false, "OTP has been expied", null, 500);
            } else {
                $verify->update(['status' => 1]);
                return apiResponse(true, "OTP has been verified", null, 200);
            }
        }
    }
    public function changePassword(Request $request)
    {
        $msgs = [
            'password.confirmed' => 'Confirm Password does not match',
        ];
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|string',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required',
        ], $msgs);
        if ($validator->fails()) {
            return apiResponse(false, $validator->errors()->all(), null, 500);
        }
        $user = getUserToken($request->bearerToken());
        if (!Hash::check($request->old_password, $user->password)) {
            return apiResponse(false, 'Invalid Old Password', null, 500);
        }
        $update = $user->update([
            'password' => Hash::make($request->password),
        ]);
        if ($update > 0) {
            return apiResponse(true, "Password has been changed", $user, 200);
        } else {
            return apiResponse(false, "Failed to chagne password", null, 500);
        }
    }
    public function changePasswordWithoutToken(Request $request)
    {
        $msgs = [
            'password.confirmed' => 'Confirm Password does not match',
        ];
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required',
        ], $msgs);
        if ($validator->fails()) {
            return apiResponse(false, $validator->errors()->all(), null, 500);
        }
        $user = User::where('email', $request->email)->first();
        if (empty($user)) {
            return apiResponse(false, "User not found", null, 500);
        }
        $update = $user->update([
            'password' => Hash::make($request->password),
        ]);
        if ($update > 0) {
            $user = new UserResource($user);
            return apiResponse(true, "Password has been changed", $user, 200);
        } else {
            return apiResponse(false, "Failed to chagne password", null, 500);
        }
    }
    public function getProfile(Request $request)
    {
        $user = getUserToken($request->bearerToken());
        if (empty($user)) {
            return apiResponse(false, "User not found", null, 500);
        }
        return apiResponse(true, "User Profile", $user, 200);
    }
    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);
        if ($validator->fails()) {
            return apiResponse(false, $validator->errors()->all(), null, 500);
        }
        $user = getUserToken($request->bearerToken());
        if (empty($user)) {
            return apiResponse(false, "User not found", null, 500);
        }
        $update = $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);


        $details = Userdetail::where('user_id', $user->id)->first();
        // return $request;
        if (!empty($details) && isset($details)) {

            $details->user_id = $user->id;
            $details->country_id = $request->country_id;
            $details->city_id = $request->city_id;
            $details->state_id = $request->state_id;
            $details->postal_code = $request->postal_code;
            $details->save();
        } else {

            $details = Userdetail::create([
                'user_id' => $user->id,
                'country_id' => $request->country_id,
                'city_id' => $request->city_id,
                'state_id' => $request->state_id,
                'postal_code' => $request->postal_code,
            ]);
        }


        if ($update > 0) {
            $updated =  User::where('id', $user->id)->with('userdetail')->first();
            $user = new UserResource($updated);
            return apiResponse(true, "User Profile Updated", $user, 200);
        }
        return apiResponse(false, "User profile not updated", null, 500);
    }
    public function verifyToken(Request $request)
    {
        $user = getUserToken($request->bearerToken());
        if (empty($user)) {
            return apiResponse(false, "User not found or may be logged out", null, 500);
        }
        return apiResponse(true, "User Authorization Verified", $user, 200);
    }

    public function user_delete(Request $request)
    {
        $user = getUserToken($request->bearerToken());
        if (empty($user)) {
            return apiResponse(false, 'User not found', null, 500);
        }

        $check_user = User::with('userdetail')->where('id', $user->id)->first();
        if (isset($check_user) && !empty($check_user)) {
            if (!empty($check_user->userdetail)) {
                $check_user->userdetail->delete();
            }
            $check_user->delete();

            return apiResponse(true, 'User successfuly deleted.', null, 200);
        }
        return apiResponse(false, 'User not found', null, 500);
    }
}
