<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\EmailConfig;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use App\Models\SystemSetting;
use App\Models\LogActivity;
use DB;
use Auth;

class SystemController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:setting-list|setting-create|setting-edit|setting-delete', ['only' => ['index','store']]);
         $this->middleware('permission:setting-create', ['only' => ['create','store']]);
         $this->middleware('permission:setting-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:setting-delete', ['only' => ['destroy']]);
    }

    public function setting()
    {
        $this->authorize('setting-create');
        $page_title = 'Settings';
        return view('admin.system.setting', compact('page_title'));
    }
    public function settingStore(Request $request)
    {
        DB::beginTransaction();

        try{
            if(isset($request->id)){
                $model = SystemSetting::where('id', $request->id)->first();
            }else{
                $model = new SystemSetting();
            }

            $model->per_page_record = $request->per_page_record;
            $model->language = $request->language;
            $model->timezone = $request->timezone;
            $model->currency = $request->currency;
            $model->save();

            DB::commit();
            return redirect()->back()->with('message', 'You have saved changes successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error. '.$e->getMessage());
        }
    }

    public function companyProfile()
    {
        $this->authorize('companyprofile-create');
        $page_title = 'Company Profile';
        return view('admin.system.company-profile', compact('page_title'));
    }

    public function storeCompanyProfile(Request $request)
    {
        DB::beginTransaction();

        try{
            if(isset($request->id)){
                $model = CompanyProfile::where('id', $request->id)->first();
            }else{
                $model = new CompanyProfile();
            }

            if ($request->logo) {
                $logo = time().'.'.$request->logo->extension();
                $request->logo->move(public_path('company/logos'), $logo);

                $model->logo = $logo;
            }
            if ($request->favicon) {
                $favicon = time().'.'.$request->favicon->extension();
                $request->favicon->move(public_path('company/favicons'), $favicon);

                $model->favicon = $favicon;
            }

            $model->company = $request->company;
            $model->email = $request->email;
            $model->phone = $request->phone;
            $model->website = $request->website;
            $model->country = $request->country;
            $model->language = $request->language;
            $model->timezone = $request->timezone;
            $model->currency = $request->currency;
            $model->save();

            DB::commit();
            return redirect()->back()->with('message', 'You have saved changes successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error. '.$e->getMessage());
        }
    }
    public function emailConfig()
    {
        $this->authorize('emailconfig-create');
        $page_title = 'Email Configuration';
        return view('admin.system.email-config', compact('page_title'));
    }

    public function emailConfigStore(Request $request)
    {
        $this->validate($request, [
            'mail_mailer' => 'required|max:255',
            'mail_host' => 'required|max:255',
            'mail_port' => 'required|max:255',
            'mail_username' => 'required|max:255',
            'mail_password' => 'required|max:255',
            'mail_encryption' => 'max:255',
            'mail_from_name' => 'max:255',
        ]);

        DB::beginTransaction();

        try{
            if(isset($request->id)){
                $model = EmailConfig::where('id', $request->id)->first();
            }else{
                $model = new EmailConfig();
            }

            $model->mail_mailer = $request->mail_mailer;
            $model->mail_host = $request->mail_host;
            $model->mail_port = $request->mail_port;
            $model->mail_username = $request->mail_username;
            $model->mail_password = $request->mail_password;
            $model->mail_encryption = $request->mail_encryption;
            $model->mail_from_address = $request->mail_from_address;
            $model->mail_from_name = $request->mail_from_name;
            $model->save();

            DB::commit();
            return redirect()->back()->with('message', 'You have saved changes successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error. '.$e->getMessage());
        }
    }
    public function logActivity(Request $request)
    {
        $this->authorize('logactivity-list');
        $per_page_records = 10;
        if(!empty(systemSetting())){
            $per_page_records = systemSetting()->per_page_record;
        }
        if($request->ajax()){
            $query = LogActivity::where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('subject', 'like', '%'. $request['search'] .'%');
                $query->orWhere('url', 'like', '%'. $request['search'] .'%');
                $query->orWhere('method', 'like', '%'. $request['search'] .'%');
                $query->orWhere('ip', 'like', '%'. $request['search'] .'%');
            }
            $models = $query->paginate($per_page_records);
            return (string) view('admin.logActivity.search', compact('models'));
        }
        $page_title = 'All Log Activities';
        $onlySoftDeleted = LogActivity::onlyTrashed()->get();
        $models = \LogActivity::logActivityLists($per_page_records);
        return view('admin.logActivity.index',compact('models','page_title', 'onlySoftDeleted'));
    }
    public function showLogActivity($id)
    {
        $page_title = "Log Activity Details";
        $model = LogActivity::findOrFail($id);
        return view('admin.logActivity.show', compact('page_title', 'model'));
    }
    public function deleteLogActivity($id)
    {
        $this->authorize('logactivity-delete');
        $model = LogActivity::findOrFail($id)->delete();
        $onlySoftDeleted = LogActivity::onlyTrashed()->count();
        if($model){
            return response()->json([
                'status' => true,
                'trash_records' => $onlySoftDeleted
            ]);
        }
    }
    public function trashAllLogactivity(Request $request)
    {
        $page_title = 'All Trashed Records';
        $per_page_records = 10;
        if(!empty(systemSetting())){
            $per_page_records = systemSetting()->per_page_record;
        }
        if($request->ajax()){
            $query = LogActivity::where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('subject', 'like', '%'. $request['search'] .'%');
                $query->orWhere('url', 'like', '%'. $request['search'] .'%');
                $query->orWhere('ip', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                $query->where('status', $request['status']);
            }
            $models = $query->onlyTrashed()->paginate($per_page_records);
            return (string) view('admin.logActivity.trash-search', compact('models'));
        }
        $models = LogActivity::onlyTrashed()->paginate($per_page_records);
        return view('admin.logActivity.trash-index', compact('models', 'page_title'));
    }
    public function restore($id)
    {
        LogActivity::onlyTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('message', 'Record Restored Successfully.');
    }
}
