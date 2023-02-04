<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Str;

class FaqController extends Controller
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
            $query = Faq::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('question', 'like', '%'. $request['search'] .'%');
                $query->orWhere('answer', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                $query->where('status', $request['status']);
            }
            $models = $query->paginate($per_page_records);
            return (string) view('admin.faqs.search', compact('models'));
        }
        $page_title = 'All FAQs';
        $onlySoftDeleted = Faq::onlyTrashed()->get();
        $models = Faq::orderby('id','DESC')->paginate($per_page_records);
        return view('admin.faqs.index', compact('models', 'page_title', 'onlySoftDeleted'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['menu'] = 'faqs';
        $data['page_title'] = 'Create Faq';
        return view('admin.faqs.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'question' => 'required',
                'answer' => 'required',
                'status' => 'required',
            ]);
            if ($validator->fails()) {
                return back()
                    ->withInput()
                    ->withErrors($validator);
            }
            $create = Faq::create([
                'question' => $request->question,
                'answer' => $request->answer,
                'status' => $request->status,
            ]);
            if ($create->id) {
                return redirect()->route('faqs.index')->with('message', 'Faq has been Created');
            }
            return redirect()->back()->with('error', 'Faq not created, Try again!');
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
        $data['menu'] = 'faqs';
        $data['page_title'] = 'Edit Blog';
        $data['edit'] =  Faq::where('id', $id)->first();
        if (!empty($data['edit'])) {
            return view('admin.faqs.edit', $data);
        }
        return redirect()->route('admin.faqs.index')->with('error', 'Faq not found or deleted!');
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
        try {
            $validator = Validator::make($request->all(), [
                'question' => 'required',
                'answer' => 'required',
                'status' => 'required',
            ]);
            if ($validator->fails()) {
                return back()
                    ->withInput()
                    ->withErrors($validator);
            }
            $edit = Faq::where('id', $id)->first();
            if (!empty($edit)) {

                $update = $edit->update([
                    'question' => $request->question,
                    'answer' => $request->answer,
                    'status' => $request->status,
                ]);
                if ($update = 1) {
                    return redirect()->route('faqs.index')->with('message', 'FAQ has been Updated');
                }
                return redirect()->back()->with('error', 'FAQ not Updated, Try again!');
            }
            return redirect()->route('faqs.index')->with('error', 'FAQ not found!');
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
            $delete = Faq::where('id', $id)->first();
            $onlySoftDeleted = Faq::onlyTrashed()->count();
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

    public function trashAllFaqs(Request $request)
    {
        $page_title = 'All Trashed Records';
        $per_page_records = 10;
        if(!empty(systemSetting())){
            $per_page_records = systemSetting()->per_page_record;
        }
        if($request->ajax()){
            $query = Faq::where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('question', 'like', '%'. $request['search'] .'%');
                $query->orWhere('answer', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                $query->where('status', $request['status']);
            }
            $models = $query->onlyTrashed()->paginate($per_page_records);
            return (string) view('admin.faqs.trash-search', compact('models'));
        }
        $models = Faq::onlyTrashed()->paginate($per_page_records);
        return view('admin.faqs.trash-index', compact('models', 'page_title'));
    }
    public function restore($id)
    {
        Faq::onlyTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('message', 'Record Restored Successfully.');
    }
}
