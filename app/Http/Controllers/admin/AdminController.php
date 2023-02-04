<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Book;
use App\Models\Blog;
use App\Models\Order;

class AdminController extends Controller
{
    public function dashboard()
    {
        $page_title = 'Admin Dashboard';
        $data = [];
        $data['total_users'] = User::where('id', '!=', 1)->orderby('id', 'desc')->count();
        $data['users'] = User::where('id', '!=', 1)->orderby('id', 'desc')->take(5)->get();
        $data['active_users'] = User::where('id', '!=', 1)->where('status', 1)->get();
        $data['in_active_users'] = User::where('status', 0)->get();
        $data['new_users'] = User::where('id', '!=', 1)->orderby('id', 'desc')->take(5)->get();

        $data['total_books'] = Book::orderby('id','desc')->count();
        $data['books'] = Book::orderby('id','desc')->take(5)->get();
        $data['active_books'] = Book::where('status', 1)->get();
        $data['in_active_books'] = Book::where('status', 0)->get();
        $data['new_books'] = Book::orderby('id', 'desc')->take(5)->get();

        $data['total_blogs'] = Blog::orderby('id','desc')->count();
        $data['blogs'] = Blog::orderby('id','desc')->take(5)->get();
        $data['active_blogs'] = Blog::where('status', 1)->get();
        $data['in_active_blogs'] = Blog::where('status', 0)->get();
        $data['new_blogs'] = Blog::orderby('id', 'desc')->take(5)->get();

        $data['total_orders'] = Order::orderby('id','desc')->count();
        $data['orders'] = Order::orderby('id','desc')->take(5)->get();
        $data['pending_orders'] = Order::where('order_status_id', 1)->count(); //pending orders
        $data['on_the_way_orders'] = Order::where('order_status_id', 2)->count(); //on the way orders
        $data['delivered_orders'] = Order::where('order_status_id', 3)->count(); //delivered orders
        $data['cancelled_orders'] = Order::where('order_status_id', 4)->count(); //cancelled orders
        $data['new_orders'] = Order::orderby('id', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('page_title', 'data'));
    }
    public function login()
    {
        $page_title = 'Admin Login';
        return view('admin.auth.login', compact('page_title'));
    }
    public function authenticate(Request $request)
    {
        $messages = ([
            'email.required' => 'Email is required',
            'password.required' => 'Password is required'
        ]);
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ], $messages);

        $user = User::where('email', $request->email)->first();
        if(!empty($user)){
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                return response()->json([
                    'status' => 'success',
                ]);
            }
            return response()->json([
                'status' => 'failed',
            ]);
        }elseif(!empty($user) && $user->status==0){
            return response()->json([
                'status' => 'failed-inactive',
            ]);
        }else{
            return response()->json([
                'status' => 'failed-credential',
            ]);
        }
    }

    public function editProfile()
    {
        $page_title = 'Edit Profile';
        $model = User::with('hasProfile')->where('id', Auth::user()->id)->first();
        return view('admin.profile.profile', compact('model', 'page_title'));
    }

    public function updateProfile(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();

        if(isset($request->new_email)){
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->back()->with('message','You have updated email address successfully.');
        }elseif(isset($request->new_password)){
            if (Hash::check($user->password, $request->current_password)) {
                $request->validate([
                    'password' => ['required', 'confirmed', Rules\Password::defaults()],
                ]);

                $user->password = Hash::make($request->password);
                $user->save();

                return redirect()->back()->with('message', 'You have updated password successfully.');
            }else{
                return redirect()->back()->with('error', 'Your current password is incorrect.');
            }
        }else{
            $user->name = $request->first_name.' '.$request->last_name;
            $user->save();

            $model = UserProfile::where('user_id', $user->id)->first();
            if(!empty($model)){
                if ($request->avatar) {
                    $avatar = time().'.'.$request->avatar->extension();
                    $request->avatar->move(public_path('avatar'), $avatar);

                    $model->avatar = $avatar;
                }
                $model->first_name = $request->first_name;
                $model->last_name = $request->last_name;
                $model->phone = $request->phone;
                $model->address = $request->address;
                $model->save();
            }else{
                $model = new UserProfile();
                if ($request->avatar) {
                    $avatar = time().'.'.$request->avatar->extension();
                    $request->avatar->move(public_path('avatar'), $avatar);

                    $model->avatar = $avatar;
                }
                $model->user_id = $user->id;
                $model->first_name = $request->first_name;
                $model->last_name = $request->last_name;
                $model->phone = $request->phone;
                $model->address = $request->address;
                $model->save();
            }

            return redirect()->back()->with('message','Profile updated successfully');
        }
    }
    public function logOut()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    //Password reset
    public function forgotPassword()
    {
        $page_title = 'Forgot Password';
        return view('admin.auth.forgot-password', compact('page_title'));
    }
    public function passwordResetLink(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
        ]);

        $user = User::where('email', $request->email)->where('status', 1)->first();
        if(!empty($user)){
            $page_title = 'Change Password';
            do{
                $verify_token = uniqid();
            }while(User::where('verify_token', $verify_token)->first());

            $user->verify_token = $verify_token;
            $user->update();

            $details = [
                'from' => 'admin-password-reset',
                'title' => "Hello! ". $user->name,
                'body' => "You are receiving this email because we recieved a password reset request for your account.",
                'verify_token' => $user->verify_token,
            ];

            \Mail::to($user->email)->send(new \App\Mail\Email($details));

            return redirect()->route('admin.login')->with('message', 'We have emailed your password reset link!');
        }else{
            return redirect()->back()->with('error', 'Your account not found.');
        }
    }
    public function resetPassword($verify_token)
    {
        $page_title = 'Reset Password';
        return view('web-views.login.change-password', compact('page_title', 'verify_token'));
    }
    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|same:confirm-password',
        ]);

        $user = User::where('verify_token', $request->verify_token)->first();
        $user->password = Hash::make($request->password);
        $user->verify_token = null;
        $user->update();

        if($user){
            return redirect()->route('admin.login')->with('message', 'You have updated password. You can login again.');
        }else{
            return redirect()->back()->with('error', 'Something went wrong try again');
        }
    }

    public function markasread($id)
    {
        if($id){
            auth()->user()->unreadNotifications->where('id', $id)->markAsRead();
        }

        return back();
    }

    public function viewAllNotifications()
    {
        auth()->user()->unreadNotifications->markAsRead();
        $page_title = 'All New User Notifications';
        return view('admin.notification.index', compact('page_title'));
    }

    public function createSpacialPermission($user_id)
    {
        $user = User::where('id', $user_id)->first();
        $permission = Permission::get();
        if($user->hasAnyDirectPermission($permission)){
            $page_title = 'Edit Spacial Permissions';
            $direct_permissions = DB::table("model_has_permissions")->where("model_has_permissions.model_id",$user_id)
            ->pluck('model_has_permissions.permission_id','model_has_permissions.permission_id')
            ->all();

            return view('admin.user.edit-spacial-permission', compact('page_title', 'user', 'permission', 'direct_permissions'));
        }else{
            $page_title = 'Create Spacial Permissions';
            return view('admin.user.create-spacial-permission', compact('page_title', 'user', 'permission'));
        }
    }
    public function storeSpacialPermission(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();
        $user->givePermissionTo($request->input('permission'));
        \LogActivity::addToLog('Assign direct permissions');
        if($user){
            return redirect()->route('user.index')->with('message', 'You have assigned spacial permissions successfully.');
        }
    }

    public function updateSpacialPermission(Request $request, $user_id)
    {
        $user = User::where('id', $user_id)->first();
        $user->givePermissionTo($request->input('permission'));

        \LogActivity::addToLog('Updated direct permissions');

        if($user){
            return redirect()->route('user.index')->with('message', 'You have updated spacial permissions successfully.');
        }
    }
}
