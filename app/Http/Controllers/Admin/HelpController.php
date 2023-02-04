<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HelpAndSupport;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Str;

class HelpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = "Help And Support";
        $data['menu'] = "helps";
        $data['edit'] = HelpAndSupport::orderby("id", "desc")->first();
        if (!empty($data['edit'])) {
            return view('admin.helps.edit', $data);
        }
        return view('admin.helps.create', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
                'description' => 'required|string',
                'image' => 'required',
            ]);
            if ($validator->fails()) {
                return back()
                    ->withInput()
                    ->withErrors($validator);
            }
            $slug = getSlug($request->title);
            if ($request->image) {
                $image = $request->file('image');
                $image_name = time() . $slug . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/helps/'), $image_name);
            }
            $create = HelpAndSupport::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => isset($image_name) && !empty($image_name) ? $image_name : null,
            ]);
            if ($create->id) {
                return redirect()->route('helps.index')->with('message', 'Help And Support has been Created');
            }
            return redirect()->back()->with('error', 'Help And Support not created, Try again!');
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
        //
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
            ]);
            if ($validator->fails()) {
                return back()
                    ->withInput()
                    ->withErrors($validator);
            }
            $edit = HelpAndSupport::where('id', $id)->first();
            if (!empty($edit)) {
                $slug = getSlug($request->title);
                if ($request->image) {
                    @unlink(public_path('images/helps/' . $edit->image));
                    $image = $request->file('image');
                    $image_name = time() . $slug . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('images/helps/'), $image_name);
                } else {
                    $image_name = $edit->image;
                }
                $update = $edit->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'image' => isset($image_name) && !empty($image_name) ? $image_name : null,
                ]);
                if ($update = 1) {
                    return redirect()->route('helps.index')->with('message', 'Help And Support has been Updated');
                }
                return redirect()->back()->with('error', 'Help And Support not created, Try again!');
            }
            return redirect()->route('helps.index')->with('error', 'Record not found!');
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
        //
    }
}
