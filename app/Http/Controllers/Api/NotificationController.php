<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PlayerId;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;
use Str;
use OneSignal;

class NotificationController extends Controller
{
    public function savePlayerId(Request $request)
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
            $user = getUserToken($request->bearerToken());
            if (empty($user)) {
                return apiResponse(false, "User not found", null, 500);
            }
            $validator = Validator::make($request->all(), [
                'player_id' => 'required',
            ]);
            if ($validator->fails()) {
                return apiResponse(false, $validator->errors()->all(), null, 200);
            }
            $check = PlayerId::where('user_id', $user->id)->where('player_id', $request->player_id)->first();
            if (empty($check)) {
                $store = PlayerId::create([
                    'user_id' => $user->id,
                    'player_id' => $request->player_id,
                ]);
                if ($store->id) {
                    return apiResponse(true, "Player ID saved", null, 200);
                }
                return apiResponse(false, "Failed to save Player ID", null, 500);
            }
            return apiResponse(false, "Player ID already exist", null, 500);
        }
    }
    public function testNotification(Request $request)
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
            $player_id = PlayerId::all();
            if ($player_id->count() > 0) {
                foreach ($player_id as $index => $value) {
                    OneSignal::sendNotificationToAll(
                        "This is test notification of meeting",
                        $value->player_id,
                        $url = null,
                        $data = null,
                        $buttons = null,
                        $schedule = null
                    );
                }
            }
        }
    }
}
