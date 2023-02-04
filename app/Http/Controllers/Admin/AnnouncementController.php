<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Str;

class AnnouncementController extends Controller
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
            $query = Announcement::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('title', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                $query->where('status', $request['status']);
            }
            $models = $query->paginate($per_page_records);
            return (string) view('admin.announcements.search', compact('models'));
        }
        $page_title = 'All Announcements';
        $onlySoftDeleted = Announcement::onlyTrashed()->get();
        $models = Announcement::orderby('id','DESC')->paginate($per_page_records);
        return view('admin.announcements.index', compact('models', 'page_title', 'onlySoftDeleted'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['menu'] = 'announcements';
        $data['page_title'] = 'Create Announcement';
        return view('admin.announcements.create', $data);
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
                $image->move(public_path('images/announcements/'), $image_name);
            }
            $create = Announcement::create([
                'title' => $request->title,
                'slug' => $slug,
                'description' => $request->description,
                'image' => isset($image_name) && !empty($image_name) ? $image_name : null,
            ]);
            if ($create->id) {
                return redirect()->route('announcements.index')->with('message', 'Announcement has been Created');
            }
            return redirect()->back()->with('error', 'Announcement not created, Try again!');
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
        $data['menu'] = 'announcements';
        $data['page_title'] = 'Edit Announcement';
        $data['edit'] = Announcement::where('id', $id)->first();
        if (!empty($data['edit'])) {

            return view('admin.announcements.edit', $data);
        }
        return redirect()->route('admin.announcements.index')->with('error', 'Announcement deleted or not found!');
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
        $edit = Announcement::where('id', $id)->first();
        if (!empty($edit)) {
            try {

                $slug = getSlug($request->title);
                if ($request->image) {
                    @unlink(public_path('images/announcements/' . $edit->image));
                    $image = $request->file('image');
                    $image_name = time() . $slug . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('images/announcements/'), $image_name);
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
                    return redirect()->route('announcements.index')->with('message', 'Announcement has been Updated');
                }
                return redirect()->back()->with('error', 'Announcement not Updated, Try again!');
            } catch (Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
        return redirect()->route('announcements.index')->with('error', 'Announcement not found');
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
            $delete = Announcement::where('id', $id)->first();
            $onlySoftDeleted = Announcement::onlyTrashed()->count();
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

    public function trashAllAnnouncements(Request $request)
    {
        $page_title = 'All Trashed Records';
        $per_page_records = 10;
        if(!empty(systemSetting())){
            $per_page_records = systemSetting()->per_page_record;
        }
        if($request->ajax()){
            $query = Announcement::where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('title', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                $query->where('status', $request['status']);
            }
            $models = $query->onlyTrashed()->paginate($per_page_records);
            return (string) view('admin.announcements.trash-search', compact('models'));
        }
        $models = Announcement::onlyTrashed()->paginate($per_page_records);
        return view('admin.announcements.trash-index', compact('models', 'page_title'));
    }
    public function restore($id)
    {
        Announcement::onlyTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('message', 'Record Restored Successfully.');
    }
}
