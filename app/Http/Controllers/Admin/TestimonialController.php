<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Exception;

use Str;

class TestimonialController extends Controller
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
            $query = Testimonial::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('title', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                $query->where('status', $request['status']);
            }
            $models = $query->paginate($per_page_records);
            return (string) view('admin.testimonials.search', compact('models'));
        }
        $page_title = 'All Testimonials';
        $onlySoftDeleted = Testimonial::onlyTrashed()->get();
        $models = Testimonial::orderby('id','DESC')->paginate($per_page_records);
        return view('admin.testimonials.index', compact('models', 'page_title', 'onlySoftDeleted'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['menu'] = 'testimonials';
        $data['page_title'] = 'Create Testimonial';
        return view('admin.testimonials.create',$data);
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
            $validator =Validator::make($request->all(),[
                'title' => 'required',
                'description' => 'required|string',
                'image' => 'required',
                'status' => 'required',
            ]);
            if ($validator->fails()) {
                return back()
                ->withInput()
                ->withErrors($validator);
            }
            $slug= getSlug($request->title);
            if ($request->image) {
                $image = $request->file('image');
                $image_name = time() . $slug . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/testimonials/'), $image_name);
            }
            $create = Testimonial::create([
                'title' => $request->title,
                'description' => $request->description,
                'slug' => $slug,
                'status' => $request->status,
                'image' => isset($image_name) && !empty($image_name) ? $image_name : null,
            ]);
            if ($create->id) {
                return redirect()->route('testimonials.index')->with('message', 'Testimonial has been Created');
            }
            return redirect()->back()->with('error', 'Testimonial not created, Try again!');

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
        $data['menu'] = 'blogs';
        $data['show'] = Testimonial::where('id', $id)->first();
        $data['page_title'] = 'Show Testimonail';
        if (!empty($data['show'])) {
            return view('admin.testimonials.show', $data);
        }
        return redirect()->route('testimonails.index')->with('error', 'Record not found or deleted!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['menu'] = 'testimonials';
        $data['page_title'] = 'Edit Testimonails';
        $data['edit'] = Testimonial::where('id',$id)->first();
        if(!empty($data['edit'])){
            return view('admin.testimonials.edit', $data);
        }
        return redirect()->route('admin.testimonials.index')->with('error','Record not found or deleted!');
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
                'title' => 'required',
                'description' => 'required|string',
                'status' => 'required',
            ]);
            if ($validator->fails()) {
                return back()
                    ->withInput()
                    ->withErrors($validator);
            }
            $edit = Testimonial::where('id', $id)->first();
            if (!empty($edit)) {
                $slug = getSlug($request->title);
                if ($request->image) {
                    @unlink(public_path('images/testimonials/' . $edit->image));
                    $image = $request->file('image');
                    $image_name = time() . $slug . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('images/testimonials/'), $image_name);
                }
                else{
                    $image_name = $edit->image;
                }
                $update = $edit->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'status' => $request->status,
                    'slug' => $slug,
                    'image' => isset($image_name) && !empty($image_name) ? $image_name : null,
                ]);
                if ($update = 1) {
                    return redirect()->route('testimonials.index')->with('message', 'Testimonial has been Updated');
                }
                return redirect()->back()->with('error', 'Testimonial not created, Try again!');
            }
            return redirect()->route('testimonials.index')->with('error', 'Record not found!');
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
            $delete = Testimonial::where('id', $id)->first();
            $onlySoftDeleted = Testimonial::onlyTrashed()->count();
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
    public function trashAllTestimonials(Request $request)
    {
        $page_title = 'All Trashed Records';
        $per_page_records = 10;
        if(!empty(systemSetting())){
            $per_page_records = systemSetting()->per_page_record;
        }
        if($request->ajax()){
            $query = Testimonial::where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('title', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                $query->where('status', $request['status']);
            }
            $models = $query->onlyTrashed()->paginate($per_page_records);
            return (string) view('admin.testimonials.trash-search', compact('models'));
        }
        $models = Testimonial::onlyTrashed()->paginate($per_page_records);
        return view('admin.testimonials.trash-index', compact('models', 'page_title'));
    }
    public function restore($id)
    {
        Testimonial::onlyTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('message', 'Record Restored Successfully.');
    }
}
