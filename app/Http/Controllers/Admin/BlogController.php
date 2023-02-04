<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
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
            $query = Blog::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('title', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                $query->where('status', $request['status']);
            }
            $models = $query->paginate($per_page_records);
            return (string) view('admin.blogs.search', compact('models'));
        }
        $page_title = 'All Blogs';
        $onlySoftDeleted = Blog::onlyTrashed()->get();
        $models = Blog::orderby('id','DESC')->paginate($per_page_records);
        return view('admin.blogs.index', compact('models', 'page_title', 'onlySoftDeleted'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['menu'] = 'blogs';
        $data['page_title'] = 'Create Blog';
        return view('admin.blogs.create', $data);
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
                'title' => 'required',
                'short_description' => 'required|string',
                'long_description' => 'required|string',
                'main_image' => 'required',
                'featured_image' => 'required',
                'status' => 'required',
            ]);
            if ($validator->fails()) {
                return back()
                    ->withInput()
                    ->withErrors($validator);
            }
            $slug = getSlug($request->title);
            if ($request->main_image) {
                $main_image = $request->file('main_image');
                $main_image_name = 'main_'. time() . $slug . '.' . $main_image->getClientOriginalExtension();
                $main_image->move(public_path('images/blogs/'), $main_image_name);
            }

            if ($request->featured_image) {
                $featured_image = $request->file('featured_image');
                $featrued_image_name = 'featured_'. time() . $slug . '.' . $featured_image->getClientOriginalExtension();
                $featured_image->move(public_path('images/blogs/'), $featrued_image_name);
            }
            $create = Blog::create([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'status' => $request->status,
                'slug' => $slug,
                'main_image' => isset($main_image_name) && !empty($main_image_name) ? $main_image_name : null,
                'featured_image' => isset($featrued_image_name) && !empty($featrued_image_name) ? $featrued_image_name : null,
            ]);
            if ($create->id) {
                return redirect()->route('blogs.index')->with('message', 'Blog has been Created');
            }
            return redirect()->back()->with('error', 'Blog not created, Try again!');
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
        $data['show'] = Blog::where('id', $id)->first();
        $data['page_title'] = 'Show Blog';
        if (!empty($data['show'])) {
            return view('admin.blogs.show', $data);
        }
        return redirect()->route('book.index')->with('error', 'Record not found or deleted!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['menu'] = 'blogs';
        $data['page_title'] = 'Edit Blog';
        $data['edit'] =  Blog::where('id', $id)->first();
        if (!empty($data['edit'])) {
            return view('admin.blogs.edit', $data);
        }
        return redirect()->route('admin.blogs.index')->with('error', 'Record not found or deleted!');
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
                'short_description' => 'required|string',
                'long_description' => 'required|string',
                'status' => 'required',
            ]);
            if ($validator->fails()) {
                return back()
                    ->withInput()
                    ->withErrors($validator);
            }
            $edit = Blog::where('id', $id)->first();
            if (!empty($edit)) {

                $slug = getSlug($request->title);
                if ($request->main_image) {
                    $main_image = $request->file('main_image');
                    $main_image_name = 'main_' . time() . $slug . '.' . $main_image->getClientOriginalExtension();
                    $main_image->move(public_path('images/blogs/'), $main_image_name);
                } else {
                    $main_image_name = $edit->main_image;
                }

                if ($request->featured_image) {
                    $featured_image = $request->file('featured_image');
                    $featrued_image_name = 'featured_' . time() . $slug . '.' . $featured_image->getClientOriginalExtension();
                    $featured_image->move(public_path('images/blogs/'), $featrued_image_name);
                } else {
                    $featrued_image_name = $edit->featured_image;
                }
                $update = $edit->update([
                    'title' => $request->title,
                    'short_description' => $request->short_description,
                    'long_description' => $request->long_description,
                    'status' => $request->status,
                    'main_image' => isset($main_image_name) && !empty($main_image_name) ? $main_image_name : null,
                    'featured_image' => isset($featured_image_name) && !empty($featured_image_name) ? $featured_image_name : null,
                    'slug' => $slug,
                ]);
                if ($update = 1) {
                    return redirect()->route('blogs.index')->with('message', 'Blog has been Updated');
                }
                return redirect()->back()->with('error', 'Blog not created, Try again!');
            }
            return redirect()->route('blogs.index')->with('error', 'Record not found!');
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
            $delete = Blog::where('id', $id)->first();
            $onlySoftDeleted = Blog::onlyTrashed()->count();
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

    public function trashAllBlogs(Request $request)
    {
        $page_title = 'All Trashed Records';
        $per_page_records = 10;
        if(!empty(systemSetting())){
            $per_page_records = systemSetting()->per_page_record;
        }
        if($request->ajax()){
            $query = Blog::where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('title', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                $query->where('status', $request['status']);
            }
            $models = $query->onlyTrashed()->paginate($per_page_records);
            return (string) view('admin.blogs.trash-search', compact('models'));
        }
        $models = Blog::onlyTrashed()->paginate($per_page_records);
        return view('admin.blogs.trash-index', compact('models', 'page_title'));
    }
    public function restore($id)
    {
        Blog::onlyTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('message', 'Record Restored Successfully.');
    }
}
