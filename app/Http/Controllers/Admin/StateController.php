<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Str;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $per_page_records = 10;
        if(!empty(systemSetting())){
            $per_page_records = systemSetting()->per_page_record;
        }
        if($request->ajax()){
            $query = State::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('name', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                $query->where('status', $request['status']);
            }
            $models = $query->paginate($per_page_records);
            return (string) view('admin.states.search', compact('models'));
        }
        $page_title = 'All States';
        $onlySoftDeleted = State::onlyTrashed()->get();
        $models = State::orderby('id','DESC')->paginate($per_page_records);
        return view('admin.states.index', compact('models', 'page_title', 'onlySoftDeleted'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['menu'] = 'states';
        $data['page_title'] = 'Create State';
        $data['countries'] = Country::all();
        return view('admin.states.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'country_id' => 'required|integer',
            'name' => 'required|string|max:50',
            'price' => 'required',
        ], [
            'price.required' => 'Shippping charges required',
        ]);
        try {
            $create = State::create([
                'name' => $request->name,
                'country_id' => $request->country_id,
                'price' => $request->price,
            ]);
            if ($create->id) {
                return redirect()->route('states.index')->with('message', 'State has been Created');
            }
            return redirect()->back()->with('error', 'State not created, Try again!');
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
        $data['menu'] = 'states';
        $data['page_title'] = 'Edit State';
        $data['edit'] = State::where('id', $id)->first();
        if (!empty($data['edit'])) {
            $data['countries'] = Country::all();
            return view('admin.states.edit', $data);
        }
        return redirect()->route('states.index')->with('error', 'State not found or deleted!');
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
        $this->validate(
            $request,
            [
                'name' => 'required|string|max:50',
                'country_id' => 'required|integer',
                'price' => 'required',
            ],
            [
                'price.required' => 'Shippping charges required',
            ]
        );
        try {
            $edit = State::where('id', $id)->first();

            if (!empty($edit)) {

                $create = $edit->update([
                    'name' => $request->name,
                    'country_id' => $request->country_id,
                    'price' => $request->price,
                ]);
                if ($update = 1) {
                    return redirect()->route('states.index')->with('message', 'State has been Updated');
                }
                return redirect()->back()->with('error', 'State not updated, Try again!');
            }
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
            $delete = State::where('id', $id)->first();
            $onlySoftDeleted = State::onlyTrashed()->count();
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

    public function trashAllStates(Request $request)
    {
        $page_title = 'All Trashed Records';
        $per_page_records = 10;
        if(!empty(systemSetting())){
            $per_page_records = systemSetting()->per_page_record;
        }
        if($request->ajax()){
            $query = State::where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('name', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                $query->where('status', $request['status']);
            }
            $models = $query->onlyTrashed()->paginate($per_page_records);
            return (string) view('admin.states.trash-search', compact('models'));
        }
        $models = State::onlyTrashed()->paginate($per_page_records);
        return view('admin.states.trash-index', compact('models', 'page_title'));
    }
    public function restore($id)
    {
        State::onlyTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('message', 'Record Restored Successfully.');
    }
}
