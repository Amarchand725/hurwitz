<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = 'categories';
        $data['title'] = 'Categories';
        $data['records'] = Category::with('sub_categories')->orderby('created_at', 'desc')->paginate(10);
        return view('admin.categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['menu'] = 'categories';
        $data['title'] = 'Create Category';
        return view('admin.categories.create', $data);
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
            $slug = getSlug($request->title);
            if ($request->image) {

                $image = $request->file('image');
                $image_name = time() . $slug . '.' . $image->getClientOriginalExtension();
                $image->move(public_path(config('upload_path.category')), $image_name);
            }
            $create = Category::create([
                'title' => $request->title,
                'slug' => $slug,
                'description' => $request->description,
                'image' => isset($image_name) && !empty($image_name) ? $image_name : null,
            ]);
            if ($create->id) {
                return redirect()->route('admin.categories.index')->with('success', 'Category has been Created');
            }
            return redirect()->back()->with('error', 'Category not created, Try again!');
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
        $data['menu'] = 'categories';
        $data['title'] = 'Edit Category';
        $data['edit'] = Category::where('id', $id)->first();
        if (!empty($data['edit'])) {

            return view('admin.categories.edit', $data);
        }
        return redirect()->route('admin.categories.index')->with('error', 'Category deleted or not found!');
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
        $edit = Category::where('id', $id)->first();
        if (!empty($edit)) {
            try {

                $slug = getSlug($request->title);
                if ($request->image) {
                    @unlink(public_path(config('upload_path.category') . $edit->image));
                    $image = $request->file('image');
                    $image_name = time() . $slug . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path(config('upload_path.category')), $image_name);
                } else {
                    $image_name = $edit->image;
                }
                $update = $edit->update([
                    'title' => $request->title,
                    'slug' => $slug,
                    'description' => $request->description,
                    'image' => isset($image_name) && !empty($image_name) ? $image_name : null,
                ]);
                if ($update = 1) {
                    return redirect()->route('admin.categories.index')->with('success', 'Category has been Updated');
                }
                return redirect()->back()->with('error', 'Category not Updated, Try again!');
            } catch (Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
        return redirect()->route('admin.categories.index')->with('error', 'Category not found');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Category::where('id', $id)->first();
        if (!empty($delete)) {
            @unlink(public_path(config('upload_path.category') .  $delete->image));
            $delete->delete();
            return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfuly!');
        }
        return redirect()->route('admin.categories.index')->with('error', 'Something went wrong!');
    }
}
