<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Auction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = 'products';
        $data['title'] = 'Products ';
        $data['records'] = Product::paginate(20);
        return view('admin.products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['menu'] = 'products';
        $data['title'] = 'Create Product';
        return view('admin.products.create', $data);
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
                'initial_price' => 'required',
            ]);
            if ($validator->fails()) {
                return back()
                    ->withInput()
                    ->withErrors($validator);
            }

            $slug = getSlug($request->title);
            if ($request->main_image) {
                $main_image = $request->file('main_image');
                $main_image_name = "main_" . time() . $slug . '.' . $main_image->getClientOriginalExtension();
                $main_image->move(public_path(config('upload_path.products')), $main_image_name);
            }

            if ($request->featured_image) {
                $featured_image = $request->file('featured_image');
                $featured_image_name = "back_" . time() . $slug . '.' . $featured_image->getClientOriginalExtension();
                $featured_image->move(public_path(config('upload_path.products')), $featured_image_name);
            }


            $create = Product::create([
                'title' => checkIsset($request->title),
                'short_description' => checkIsset($request->short_description),
                'long_description' => checkIsset($request->long_description),
                'initial_price' => checkIsset($request->initial_price),
                'final_price' => checkIsset($request->final_price),
                'slug' => $slug,
                'status' => checkIsset($request->status),
                'open_for_auction' => $request->open_for_auction,
                'main_image' => isset($main_image_name) && !empty($main_image_name) ? $main_image_name : null,
                'featured_image' => isset($featured_image_name) && !empty($featured_image_name) ? $featured_image_name : null,
            ]);
            if ($create->id) {
                return redirect()->route('admin.products.index')->with('success', 'Product has been Created');
            }
            return redirect()->back()->with('error', 'Product not created, Try again!')->withInput();
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
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
        $data['menu'] = 'products';
        $data['show'] = Product::where('id', $id)->first();
        $data['title'] = 'Show Products';
        if (!empty($data['show'])) {
            return view('admin.products.show', $data);
        }
        return redirect()->route('admin.products.index')->with('error', 'Record not found or deleted!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['menu'] = 'products';
        $data['title'] = 'Edit Products';
        $data['edit'] = Product::where('id', $id)->first();
        if (!empty($data['edit'])) {
            return view('admin.products.edit', $data);
        }
        return redirect()->route('admin.products.index')->with('error', 'Product not found or deleted!');
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

            // return $request;
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'short_description' => 'required|string',
                'long_description' => 'required|string',
                'status' => 'required',
                'initial_price' => 'required',
            ]);
            if ($validator->fails()) {
                dd($validator->errors()->all());
                return back()
                    ->withInput()
                    ->withErrors($validator);
            }
            $edit = Product::where('id', $id)->first();
            if (!empty($edit)) {
                $slug = getSlug($request->title);
                if ($request->main_image) {
                    $main_image = $request->file('main_image');
                    $main_image_name = "main_" . time() . $slug . '.' . $main_image->getClientOriginalExtension();
                    $main_image->move(public_path(config('upload_path.products')), $main_image_name);
                } else {
                    $main_image_name = $edit->main_image;
                }

                if ($request->featured_image) {
                    $featured_image = $request->file('featured_image');
                    $featured_image_name = "back_" . time() . $slug . '.' . $featured_image->getClientOriginalExtension();
                    $featured_image->move(public_path(config('upload_path.products')), $featured_image_name);
                } else {
                    $featured_image_name = $edit->featured_image;
                }
                $update = $edit->update([
                    'title' => checkIsset($request->title),
                    'short_description' => checkIsset($request->short_description),
                    'long_description' => checkIsset($request->long_description),
                    'initial_price' => checkIsset($request->initial_price),
                    'final_price' => isset($request->final_price) && !empty($request->final_price) ? $request->final_price : 0,
                    'slug' => checkIsset($slug),
                    'status' => checkIsset($request->status),
                    'open_for_auction' => $request->open_for_auction,
                    'main_image' => isset($main_image_name) && !empty($main_image_name) ? $main_image_name : null,
                    'featured_image' => isset($featured_image_name) && !empty($featured_image_name) ? $featured_image_name : null,

                ]);
                if ($update = 1) {
                    return redirect()->route('admin.products.index')->with('success', 'Product has been Updated');
                }
                return redirect()->back()->with('error', 'Product not created, Try again!');
            }
            return redirect()->route('admin.products.index')->with('error', 'Product not found!');
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
            $delete = Product::where('id', $id)->first();
            if (!empty($delete)) {
                $delete->delete();
                Auction::where('product_id', $id)->delete();
                return redirect()->route('admin.products.index')->with('success', 'Product has been deleted!');
            }
            return redirect()->route('admin.products.index')->with('error', 'Product not deleted!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
