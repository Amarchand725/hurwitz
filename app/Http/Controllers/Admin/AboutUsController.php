<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutAccordion;
use App\Models\AboutUs;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Str;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = "About Us";
        $data['menu'] = "abouts";
        $data['edit'] = AboutUs::orderby("id", "desc")->first();
        $data['accordions'] = AboutAccordion::orderby("id", "desc")->get();
        if (!empty($data['edit'])) {
            return view('admin.about_us.edit', $data);
        }
        return view('admin.about_us.create', $data);
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
                'short_description' => 'required|string',
                'description' => 'required|string',

                'image' => 'required',
                'video' => 'required',
                'image_2' => 'required',
                'image_3' => 'required',
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
                $image->move(public_path(config('upload_path.about_us')), $image_name);
            }
            if ($request->video) {
                $video = $request->file('video');
                $video_name = time() . $slug . '.' . $video->getClientOriginalExtension();
                $video->move(public_path(config('upload_path.about_us')), $video_name);
            }
            if ($request->image_2) {
                $image_2 = $request->file('image_2');
                $image_2_name = time() . $slug . '.' . $image_2->getClientOriginalExtension();
                $image_2->move(public_path(config('upload_path.about_us')), $image_2_name);
            }
            if ($request->image_3) {
                $image_3 = $request->file('image_3');
                $image_3_name = time() . $slug . '.' . $image_3->getClientOriginalExtension();
                $image_3->move(public_path(config('upload_path.about_us')), $image_3_name);
            }
                 $aboutAccordion = AboutAccordion::truncate();
            $create = AboutUs::create([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'qoute' => $request->qoute,
                'image' => isset($image_name) && !empty($image_name) ? $image_name : null,
                'video' => isset($video_name) && !empty($video_name) ? $video_name : null,
                'image_2' => isset($image_2_name) && !empty($image_2_name) ? $image_2_name : null,
                'image_3' => isset($image_3_name) && !empty($image_3_name) ? $image_3_name : null,
            ]);



            $data = [];
            $a_titles = $request->accordion_title;
            $a_details = $request->accordion_details;
            foreach ($request->accordion_title as $key => $value) {
                $data[] = [
                    'title' => $a_titles[$key],
                    'details' => $a_details[$key],
                ];

            $urls = AboutAccordion::insert($data);

             return redirect()->back()->with('success', 'About Us created!');
            }

            return redirect()->back()->with('error', 'About Us not created, Try again!');
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
                'short_description' => 'required|string',
                'description' => 'required|string',
            ]);
            if ($validator->fails()) {
                return back()
                    ->withInput()
                    ->withErrors($validator);
            }
            $edit = AboutUs::where('id', $id)->first();
            if (!empty($edit)) {
                $slug = getSlug($request->title);
                if ($request->image) {
                    @unlink(public_path('images/about_us' . $edit->image));
                    $image = $request->file('image');
                    $image_name = time() . $slug . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('images/about_us'), $image_name);
                } else {
                    $image_name = $edit->image;
                }
                if ($request->video) {
                    $video = $request->file('video');
                    $video_name = time() . $slug . '.' . $video->getClientOriginalExtension();
                    $video->move(public_path('images/about_us'), $video_name);
                } else {
                    $video_name = $edit->video;
                }
                if ($request->image_2) {
                    @unlink(public_path('images/about_us' . $edit->image_2));
                    $image_2 = $request->file('image_2');
                    $image_2_name = time() . $slug . '.' . $image_2->getClientOriginalExtension();
                    $image_2->move(public_path('images/about_us'), $image_2_name);
                } else {
                    $image_2_name = $edit->image_2;
                }

                if ($request->image_3) {
                    @unlink(public_path('images/about_us' . $edit->image_3));
                    $image_3 = $request->file('image_3');
                    $image_3_name = time() . $slug . '.' . $image_3->getClientOriginalExtension();
                    $image_3->move(public_path('images/about_us'), $image_3_name);
                } else {
                    $image_3_name = $edit->image_3;
                }
                $aboutAccordion = AboutAccordion::truncate();
                $update = $edit->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'qoute' => $request->qoute,
                    'short_description' => $request->short_description,
                    'image' => isset($image_name) && !empty($image_name) ? $image_name : null,
                    'video' => isset($video_name) && !empty($video_name) ? $video_name : null,
                    'image_2' => isset($image_2_name) && !empty($image_2_name) ? $image_2_name : null,
                    'image_3' => isset($image_3_name) && !empty($image_3_name) ? $image_3_name : null,
                ]);

                $a_titles = $request->accordion_title;
                $a_details = $request->accordion_details;
                foreach ($request->accordion_title as $key => $value) {
                    if ($a_titles[$key] != '') {
                        AboutAccordion::create([
                            'abouts_id' => $id,
                            'title' => $a_titles[$key],
                            'details' => $a_details[$key],
                        ]);
                    }
                }
                if ($update = 1) {
                    return redirect()->back()->with('message', 'About Us has been Updated');
                }
                return redirect()->back()->with('error', 'About Us not created, Try again!');
            }
            return redirect()->back()->with('error', 'Record not found!');
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
    public function removeImage(){
        $record= AboutUs::orderby("id", "desc")->first()->update(array('image' => ''));
        if(!empty($record)){
            return redirect()->route('admin.abouts.index')->with('success', 'Image has been Updated');
        }
    }
       public function removeImage2(){
        $record= AboutUs::orderby("id", "desc")->first()->update(array('image_2' => ''));
        if(!empty($record)){
            return redirect()->route('admin.abouts.index')->with('success', 'Image 2 has been Updated');
        }
    }
       public function removeImage3(){
        $record= AboutUs::orderby("id", "desc")->first()->update(array('image_3' => ''));
        if(!empty($record)){
            return redirect()->route('admin.abouts.index')->with('success', 'Image 3 has been Updated');
        }
    }

      public function destroy_accordion($id)
    {

        try {
            $delete = AboutAccordion::where('id', $id)->first();

            if (!empty($delete)) {
                $delete->delete();
            }
            return redirect()->back()->with('success', 'Accordion Removed!');
        } catch (Exception $e) {
            return redirect() - back()->with('error', $e->getMessage());
        }
    }
}
