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
use Laravel\Sanctum\PersonalAccessToken;
use Auth;

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
            $user  = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            if ($user->id) {
                $user = User::where('id', $user->id)->first();
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
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = $request->user();

            $data['token'] = $user->createToken('MyApp')->plainTextToken;
            $data['user'] =  new UserResource($user);

            $response = [
                'success' => true,
                'data' => $data,
                'message' => 'You login successfully.',
            ];

            return response()->json($response, 200);
        }else{
            $response = [
                'success' => false,
                'message' => 'Credentials not found.'
            ];

            return response()->json($response);
        }
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
            return apiResponse(false, "Email is invalid", null, 500);
        }

        do{
            $password_otp = rand(10000, 99999);
        }while(User::where('password_otp', $password_otp)->first());

        $user->password_otp = $password_otp;
        $user->update();

        $details  = [
            'name' => $user->name,
            'otp' =>  $password_otp,
        ];

        \Mail::to($user->email)->send(new ForgotPassword($details));

        return apiResponse(true, "OTP has been sent to your email address", null, 200);
    }

    public function verifyAccountForPassword(Request $request)
    {
        $user = User::where('email', $request->email)->where('password_otp', $request->otp)->first();
        if (empty($user)) {
            return apiResponse(false, "OTP is invalid", null, 500);
        }else{
            $user->password_otp = '';
            $user->password = '';
            $user->save();

            $secure_data = [
                'email' => $user->email,
            ];
            return apiResponse(true, "Account verified successfully. Now you can change password.", $secure_data, 200);
        }
    }

    public function resetPassword(Request $request)
    {
        if (empty($request->new_password)) {
            return response()->json(['success' => false, 'message' => 'Please Enter New Password'], 500);
        }
        if (empty($request->confirm_password)) {
            return response()->json(['success' => false, 'message' => 'Please Enter Confirm Password'], 500);
        }

        if ($request->new_password != $request->confirm_password) {
            return response()->json(['success' => false, 'message' => 'Password not confirmed try again.!'], 500);
        }

        $user = User::where('email', $request->email)->first();
        if (empty($user)) {
            return apiResponse(false, "Something went wrong please contact with support.", null, 500);
        }else{
            $user->password = Hash::make($request->password);
            $user->save();

            return apiResponse(true, "You have changed password successfully.", null, 200);
        }
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
        $token = PersonalAccessToken::findToken($request->bearerToken());

        if (!$token) {
            $response = [
                'success' => false,
                'code' => 422,
                'message' => 'Credentials not found.'
            ];

            return response()->json($response);
        }else{
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
    }
    public function changePasswordWithoutToken(Request $request)
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
    }
    public function getProfile(Request $request)
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
            $user = $token->tokenable;
            $user = new UserResource($user);
            return apiResponse(true, "User Profile", $user, 200);
        }
    }
    public function updateProfile(Request $request)
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
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required'
            ]);
            if ($validator->fails()) {
                return apiResponse(false, $validator->errors()->all(), null, 500);
            }
            $user = $token->tokenable;
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
    }
    public function verifyToken(Request $request)
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
            $user = $token->tokenable;
            $user = new UserResource($user);
            return apiResponse(true, "User Authorization Verified", $user, 200);
        }
    }

    public function user_delete(Request $request)
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
            $user = $token->tokenable;

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
}
