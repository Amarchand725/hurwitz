<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Exception;

class OrdertypeController extends Controller
{
    public function index(Request $request)
    {
        $per_page_records = 10;
        if(!empty(systemSetting())){
            $per_page_records = systemSetting()->per_page_record;
        }
        if($request->ajax()){
            $query = OrderType::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('title', 'like', '%'. $request['search'] .'%');
            }
            $models = $query->paginate($per_page_records);
            return (string) view('admin.ordertypes.search', compact('models'));
        }
        $page_title = 'All Order Types';
        $onlySoftDeleted = OrderType::onlyTrashed()->get();
        $models = OrderType::orderby('id','DESC')->paginate($per_page_records);
        return view('admin.ordertypes.index', compact('models', 'page_title', 'onlySoftDeleted'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['menu'] = 'ordertypes';
        $data['page_title'] = 'Create Order Type';
        return view('admin.ordertypes.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255'
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        try {
            $create = OrderType::create([
                'title' => $request->title,
            ]);
            if ($create->id) {
                return redirect()->route('ordertypes.index')->with('message', 'Ordertype has been Created');
            }
            return redirect()->back()->with('error', 'Order type not created, Try again!');

        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['menu'] = 'ordertypes';
        $data['page_title'] = 'Edit ordertypes';
        $data['edit'] = OrderType::where('id',$id)->first();
        if(!empty($data['edit'])){
            return view('admin.ordertypes.edit',$data);
        }
        return redirect()->route('admin.ordertypes.index')->with('error','Record not found or deleted!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255'
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        try {
            $edit = OrderType::where('id', $id)->first();
            if (!empty($edit)) {
                $update = $edit->update([
                    'title' => $request->title
                ]);
                if ($update = 1) {
                    return redirect()->route('ordertypes.index')->with('message', 'Order Type has been Updated');
                }
                return redirect()->back()->with('error', 'Order Type not created, Try again!');
            }
            return redirect()->route('admin.ordertypes.index')->with('error', 'Record not found!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $delete = OrderType::where('id', $id)->first();
            $onlySoftDeleted = OrderType::onlyTrashed()->count();
            if (!empty($delete)) {
                $delete->delete();
                return response()->json([
                    'status' => true,
                    'trash_records' => $onlySoftDeleted
                ]);
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function trashAllOrderTypes(Request $request)
    {
        $page_title = 'All Trashed Records';
        $per_page_records = 10;
        if(!empty(systemSetting())){
            $per_page_records = systemSetting()->per_page_record;
        }
        if($request->ajax()){
            $query = OrderType::where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('title', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                $query->where('status', $request['status']);
            }
            $models = $query->onlyTrashed()->paginate($per_page_records);
            return (string) view('admin.ordertypes.trash-search', compact('models'));
        }
        $models = OrderType::onlyTrashed()->paginate($per_page_records);
        return view('admin.ordertypes.trash-index', compact('models', 'page_title'));
    }
    public function restore($id)
    {
        OrderType::onlyTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('message', 'Record Restored Successfully.');
    }
}
