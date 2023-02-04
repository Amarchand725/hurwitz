<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\OrderType;
use App\Models\BookAudio;
use App\Models\BookUrl;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Str;
use Stringable;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $per_page_records = 10;
        if(!empty(systemSetting())){
            $per_page_records = systemSetting()->per_page_record;
        }
        if($request->ajax()){
            $query = Book::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('title', 'like', '%'. $request['search'] .'%');
                $query->orWhere('paper_back_price', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                $query->where('status', $request['status']);
            }
            $models = $query->paginate($per_page_records);
            return (string) view('admin.books.search', compact('models'));
        }
        $page_title = 'All books';
        $onlySoftDeleted = Book::onlyTrashed()->get();
        $models = Book::orderby('id','DESC')->paginate($per_page_records);
        return view('admin.books.index', compact('models', 'page_title', 'onlySoftDeleted'));
    }

    public function create()
    {
        $page_title = 'Add New Book';
        $order_types = OrderType::where('status', 1)->get();
        return view('admin.books.create', compact('order_types', 'page_title'));
    }
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:255',
                'short_description' => 'required',
                'long_description' => 'required',
                'ebook' => 'required',
                'ebook_price' => 'required',
                // 'paper_back_price' => 'required',
                // 'audio_book_price' => 'required',
                'front_image' => 'required',
                'back_image' => 'required',
                'status' => 'required',
            ]);
            if ($validator->fails()) {
                return back()->withInput()->withErrors($validator);
            }
            $slug = getSlug($request->title);
            if ($request->front_image) {
                $front_image = $request->file('front_image');
                $front_image_name = 'front_' . time() . $slug . '.' . $front_image->getClientOriginalExtension();
                $front_image->move(public_path('images/books/'), $front_image_name);
            }
            if ($request->back_image) {
                $back_image = $request->file('back_image');
                $back_image_name = 'back_' . time() . $slug . '.' . $back_image->getClientOriginalExtension();
                $back_image->move(public_path('images/books/'), $back_image_name);
            }
            if ($request->ebook) {
                $ebook = $request->file('ebook');
                $ebook_name = 'ebook_' . time() . $slug . '.' . $ebook->getClientOriginalExtension();
                $ebook->move(public_path('images/books/'), $ebook_name);
            }
             if ($request->sample_audio) {
                $sample = $request->file('sample_audio');
                $sample_name = 'sample_' . time() . $slug . '.' . $sample->getClientOriginalExtension();
                $sample->move(public_path('images/books/'), $sample_name);
            }

            $create = Book::create([
                'title' => isset($request->title) && !empty($request->title) ? $request->title : null,
                'short_description' => isset($request->short_description) && !empty($request->short_description) ? $request->short_description : null,
                'long_description' => isset($request->long_description) && !empty($request->long_description) ? $request->long_description : null,
                'slug' => isset($slug) && !empty($slug) ? $slug : null,
                'ebook' => isset($ebook_name) && !empty($ebook_name) ? $ebook_name : null,
                'front_image' => isset($front_image_name) && !empty($front_image_name) ? $front_image_name : null,
                'back_image' => isset($back_image_name) && !empty($back_image_name) ? $back_image_name : null,
                'sample_audio' => isset( $sample_name) && !empty( $sample_name) ?  $sample_name : null,
                'paper_back_price' => isset($request->paper_back_price) && !empty($request->paper_back_price) ?  $request->paper_back_price : null,
                'ebook_price' => isset($request->ebook_price) && !empty($request->ebook_price) ? $request->ebook_price : null,
                'audio_book_price' => isset($request->audio_book_price) && !empty($request->audio_book_price) ? $request->audio_book_price : null,
                'status' => isset($request->status) && !empty($request->status) ? $request->status : 0,
            ]);

            if ($create->id) {
                if (!empty($request->file('audios'))) {
                    $audios =  $request->file('audios');
                    foreach ($audios as $index => $value) {
                        $audio_name = "Audio_" . $slug . time() . Str::random(20) . '.' . $value->getClientOriginalExtension();
                        $value->move(public_path('images/books/audios'), $audio_name);
                        $audioCreate  = BookAudio::create([
                            'book_id' => $create->id,
                            'audio' => $audio_name,
                        ]);
                        Log::info("Audio File Inserted-" . $audio_name);
                    }
                }

                $urls = $request->urls;
                foreach ($request->statuses as $key => $value) {
                    BookUrl::create([
                        'book_id' => $create->id,
                        'orderType' => $value,
                        'url' => $urls[$key],
                    ]);
                }

                return redirect()->route('book.index')->with('message', 'Book has been Created');
            }
            return redirect()->back()->with('error', 'Book not created, Try again!');
        } catch (Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }
    public function show($id)
    {
        $data['order_types'] = OrderType::all();
        $data['menu'] = 'books';
        $data['show'] = Book::where('id', $id)->with('audios')->with('urls')->first();
        $data['page_title'] = 'Show Book';
        if (!empty($data['show'])) {
            return view('admin.books.show', $data);
        }
        return redirect()->route('admin.book.index')->with('error', 'Record not found or deleted!');
    }
    public function edit($id)
    {
        $data['menu'] = 'books';
        $data['page_title'] = 'Edit Book';
        $ids=[2,4,3];
        $data['order_types'] =  OrderType::whereNotIn('id', $ids)->get();

        $data['edit'] = Book::where('id', $id)->with(['audios' , 'urls'])->first();
        if (!empty($data['edit'])) {
            return view('admin.books.edit', $data);
        }
        return redirect()->route('admin.books.index')->with('error', 'Record not found or deleted!');
    }
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:255',
                'short_description' => 'required',
                'long_description' => 'required',
                // 'ebook' => 'required',
                'ebook_price' => 'required',
                // 'paper_back_price' => 'required',
                // 'audio_book_price' => 'required',
                // 'front_image' => 'required',
                // 'back_image' => 'required',
                'status' => 'required',
            ]);
            if ($validator->fails()) {
                return  $validator->errors()->getMessages();
                return back()->withInput()->withErrors($validator);
            }


            $edit = Book::where('id', $id)->first();
            $bookulrs = BookUrl::where('book_id', $edit->id)->delete();

            if (!empty($edit)) {

                $slug = getSlug($request->title);
                if ($request->front_image) {
                    @unlink(public_path('images/books/' . $edit->front_image));
                    $front_image = $request->file('front_image');
                    $front_image_name = 'front_' . time() . $slug . '.' . $front_image->getClientOriginalExtension();
                    $front_image->move(public_path('images/books/'), $front_image_name);
                } else {
                    $front_image_name = $edit->front_image;
                }

                if ($request->back_image) {
                    @unlink(public_path('images/books/'  . $edit->back_image));
                    $back_image = $request->file('back_image');
                    $back_image_name = 'back_' . time() . $slug . '.' . $back_image->getClientOriginalExtension();
                    $back_image->move(public_path('images/books/'), $back_image_name);
                } else {
                    $back_image_name = $edit->back_image;
                }


                if ($request->ebook) {
                    @unlink(public_path('images/books/' . $edit->ebook));
                    $ebook = $request->file('ebook');
                    $ebook_name = 'back_' . time() . $slug . '.' . $ebook->getClientOriginalExtension();
                    $ebook->move(public_path('images/books/'), $ebook_name);
                } else {
                    $ebook_name = $edit->ebook;
                }
                    if ($request->sample_audio) {
                $sample = $request->file('sample_audio');
                $sample_name = 'sample_' . time() . $slug . '.' . $sample->getClientOriginalExtension();
                $sample->move(public_path('images/books/'), $sample_name);
            } else {
                    $sample_name = $edit->sample_audio;
                }

                if (!empty($request->file('audios'))) {
                    $audios =  $request->file('audios');
                    foreach ($audios as $index => $value) {
                        $audio_name = "Audio_" . $slug . time() . Str::random(20) . '.' . $value->getClientOriginalExtension();
                        $value->move(public_path('images/books/audios'), $audio_name);
                        $audioCreate  = BookAudio::create([
                            'book_id' => $id,
                            'audio' => $audio_name,
                        ]);
                        Log::info("Audio File updated-" . $audio_name);
                    }
                }



                $urls = $request->urls;
                foreach ($request->statuses as $key => $value) {
                    BookUrl::create([
                        'book_id' => $edit->id,
                        'orderType' => $value,
                        'url' => $urls[$key],
                    ]);
                }

                $update = $edit->update([
                    'title' => isset($request->title) && !empty($request->title) ? $request->title : null,
                    'short_description' => isset($request->short_description) && !empty($request->short_description) ? $request->short_description : null,
                    'long_description' => isset($request->long_description) && !empty($request->long_description) ? $request->long_description : null,
                    'slug' => isset($slug) && !empty($slug) ? $slug : null,
                    'ebook' => isset($ebook_name) && !empty($ebook_name) ? $ebook_name : null,
                    'front_image' => isset($front_image_name) && !empty($front_image_name) ? $front_image_name : null,
                    'back_image' => isset($back_image_name) && !empty($back_image_name) ? $back_image_name : null,
                    'sample_audio' => isset( $sample_name) && !empty( $sample_name) ?  $sample_name : null,
                    'paper_back_price' => isset($request->paper_back_price) && !empty($request->paper_back_price) ?  $request->paper_back_price : null,
                    'ebook_price' => isset($request->ebook_price) && !empty($request->ebook_price) ? $request->ebook_price : null,
                    'audio_book_price' => isset($request->audio_book_price) && !empty($request->audio_book_price) ? $request->audio_book_price : null,
                    'status' => isset($request->status) && !empty($request->status) ? $request->status : 0,
                ]);

                if ($update == 1) {
                    return redirect()->route('book.index')->with('message', 'Book has been Updated');
                }
                return redirect()->back()->with('error', 'Book not created, Try again!');
            }
            return redirect()->back()->with('error', 'Book not created, Try again!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $delete = Book::where('id', $id)->first();
            $onlySoftDeleted = Book::onlyTrashed()->count();
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
    public function destroy_audio($id)
    {
        try {
            $delete = BookAudio::where('id', $id)->first();
            if (!empty($delete)) {
                $delete->delete();
                return response()->json([
                    'status' => true,
                    'message' => 'Record deleted successfully!'
                ]);
            }
        } catch (Exception $e) {
            return redirect() - back()->with('error', $e->getMessage());
        }
    }
    public function destroy_type($id, $type)
    {

        try {
            $delete = BookUrl::where('book_id', $id)->where('id', $type)->first();

            if (!empty($delete)) {
                $delete->delete();
            }
            return redirect()->back()->with('success', 'Order Type Url has been deleted!');
        } catch (Exception $e) {
            return redirect() - back()->with('error', $e->getMessage());
        }
    }

    public function store_audio(Request $request)
    {
        try {
            $book = Book::where('id', $request->book_id)->first();
            if (empty($book)) {
                return redirect()->back()->with('error', 'Book Not Found');
            }
            $slug = getSlug($book->title);
            if (!empty($request->file('audios'))) {
                $audios =  $request->file('audios');
                foreach ($audios as $index => $value) {
                    $audio_name = "Audio_" . $slug . time() . Str::random(10) . '.' . $value->getClientOriginalExtension();
                    $value->move(public_path(config('upload_path.book_audios')), $audio_name);
                    $create  = BookAudio::create([
                        'book_id' => $book->id,
                        'audio' => $audio_name,
                    ]);
                }
                return redirect()->back()->with('success', 'Audios created!');
            }
            return redirect()->back()->with('error', 'Audios Not found!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function get_order_types(Request $request)
    {
        $result = array_merge($request->order_type_ids, [2,3,4]);
        $data['order_types'] =  OrderType::whereNotIn('id', $result)->get();
        $data['id'] = $request->id;
        if (!count($data['order_types']) > 0) {
            return ['success' => 404];
        }
        return view('admin.books.ordertypesInput')->with($data);
    }
    public function trashAllBook(Request $request)
    {
        $page_title = 'All Trashed Records';
        $per_page_records = 10;
        if(!empty(systemSetting())){
            $per_page_records = systemSetting()->per_page_record;
        }
        if($request->ajax()){
            $query = Book::where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('title', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                $query->where('status', $request['status']);
            }
            $models = $query->onlyTrashed()->paginate($per_page_records);
            return (string) view('admin.books.trash-search', compact('models'));
        }
        $models = Book::onlyTrashed()->paginate($per_page_records);
        return view('admin.books.trash-index', compact('models', 'page_title'));
    }
    public function restore($id)
    {
        Book::onlyTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('message', 'Record Restored Successfully.');
    }
}
