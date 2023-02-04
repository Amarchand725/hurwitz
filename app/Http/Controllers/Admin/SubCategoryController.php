<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Exception;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $data['menu'] = 'sub_categories';
        $data['title'] = 'Sub Categories';
        $data['records'] = SubCategory::paginate(10);
        $data['create_route'] = route('admin.sub-categories.create');
        if (isset(request()->category_id) && !empty(request()->category_id)) {
            $data['category_id'] = request()->category_id;
            $data['category'] = Category::with('sub_categories')->where('id', $data['category_id'])->first();
            if (!empty($data['category'])) {
                $data['records'] = SubCategory::where('category_id', $data['category']->id)->paginate(10);
                $data['count'] = SubCategory::where('category_id', $data['category']->id)->count();
                $data['title'] = 'Sub Categories Of ' . $data['category']->title;
                $data['create_route'] = route('admin.sub-categories.create', ['category_id' => $data['category']->id]);
            }
        }
        return view('admin.sub_categories.index', $data);
    }

    public function create()
    {
        $data['menu'] = 'sub_categories';
        $data['title'] = 'Create Sub Category';
        $data['categories'] = Category::all();
        $data['store_route'] = route('admin.sub-categories.store');
        $data['back_route'] = route('admin.sub-categories.index');
        if (isset(request()->category_id) && !empty(request()->category_id)) {
            $data['category'] = Category::where('id', request()->category_id)->first();
            if (!empty($data['category'])) {
                $data['back_route']  = route('admin.sub-categories.index', ['category_id' =>  $data['category']->id]);
                $data['store_route'] = route('admin.sub-categories.store', ['category' =>  $data['category']->id]);
            }
        }
        return view('admin.sub_categories.create', $data);
    }




    public function store(Request $request)
    {

        try {
            if (isset($request->category) && !empty($request->category)) {
                $redirect_route =  route('admin.sub-categories.index', $request->category);
            } else {
                $redirect_route =  route('admin.sub-categories.index');
            }
            $slug = getSlug($request->title);
            if ($request->image) {
                $image = $request->file('image');
                $image_name = time() . $slug . '.' . $image->getClientOriginalExtension();
                $image->move(public_path(config('upload_path.sub_category')), $image_name);
            }
            $create = SubCategory::create([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'slug' => $slug,
                'description' => $request->description,
                'image' => isset($image_name) && !empty($image_name) ? $image_name : null,
            ]);
            if ($create->id) {
                return redirect()->to($redirect_route)->with('success', 'Sub Category has been Created');
            }
            return redirect()->back()->with('error', 'Sub Category not created, Try again!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function edit($id)
    {
        $data['menu'] = 'sub_categories';
        $data['title'] = 'Edit Sub Category';
        $data['edit'] = SubCategory::with('category')->where('id', $id)->first();
        $data['back_route'] = route('admin.sub-categories.index');
        if (!empty($data['edit'])) {

            $data['categories'] = Category::all();
            if (isset(request()->category) && !empty(request()->category)) {
                $data['category']  = request()->category_id;
            }
            return view('admin.sub_categories.edit', $data);
        }
        return redirect()->route('admin.sub_categories.index')->with('error', 'Category deleted or not found!');
    }

    public function update(Request $request, $id)
    {
        $edit = SubCategory::where('id', $id)->first();
        if (!empty($edit)) {
            try {

                $slug = getSlug($request->title);
                if ($request->image) {
                    @unlink(public_path(config('upload_path.sub_category') . $edit->image));
                    $image = $request->file('image');
                    $image_name = time() . $slug . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path(config('upload_path.sub_category')), $image_name);
                } else {
                    $image_name = $edit->image;
                }
                $update = $edit->update([
                    'category_id' => $request->category_id,
                    'title' => $request->title,
                    'slug' => $slug,
                    'description' => $request->description,
                    'image' => isset($image_name) && !empty($image_name) ? $image_name : null,
                ]);
                if ($update = 1) {
                    return redirect()->route('admin.sub-categories.index')->with('success', 'Sub Category has been Updated');
                }
                return redirect()->back()->with('error', 'Category not Updated, Try again!');
            } catch (Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
        return redirect()->route('admin.sub-categories.index')->with('error', 'Category not found');
    }
    
    public function delete($id)
    {
        $delete = SubCategory::where('id', $id)->first();
        if (!empty($delete)) {
            @unlink(public_path(config('upload_path.sub_category') .  $delete->image));
            $delete->delete();
            return redirect()->route('admin.sub_categories.index')->with('success', 'Sub Category deleted successfuly!');
        }
        return redirect()->route('admin.categories.index')->with('error', 'Something went wrong!');
    }

    // public function list()
    // {
    //     $data['menu'] = 'sub_categories';
    //     $data['title'] = 'Sub Categories List';
    //     $data['records'] = SubCategory::orderby('created_at', 'desc')->paginate(10);
    //     return view('admin.sub_categories.list', $data);
    // }

    // public function new()
    // {
    //     $data['menu'] = 'sub_categories';
    //     $data['title'] = 'Create Sub Category';
    //     $data['categories'] = Category::all();
    //     $data['category'] = "";
    //     return view('admin.sub_categories.create', $data);
    // }
}
