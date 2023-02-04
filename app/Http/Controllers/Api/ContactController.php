<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Str;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $user = getUserToken($request->bearerToken());
        if (!empty($user)) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required|max:11|min:8',
                'comment' => 'required|string|max:255',
            ]);
            if($validator->fails()){
                return apiResponse(false , $validator->errors()->all(), null , 500);
            }
            $create = ContactUs::create([
                'user_id' => $user->id,
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'comment' => $request->comment,
            ]);
            if($create->id){
                return apiResponse(true , 'Successfuly Submitted the form, We will contact you soon!', null , 200);
            }
            return apiResponse(false , 'Failed to  Submit  the form!', null , 500);
        }
    }
}
