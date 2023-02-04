<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Models\BookAudio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Str;

class BookController extends Controller
{
   public function index()
   {
      $books = Book::where('status', 1)->get();
      if ($books->count() > 0) {
         $resource = BookResource::collection($books);
         return apiResponse(true, "Books List", $resource, 200);
      }
      return apiResponse(true, "Books List Empty", null, 500);
   }

   public function audio_files(Request $request)
   {
      $audios = BookAudio::where('book_id', $request->id)->first();
   }

   public function show(Request $request)
   {
      $book = Book::where('id', $request->id)->with('audios')->where('status', 1)->first();
      if (!empty($book)) {
         $resource = new BookResource($book);
         return apiResponse(true, "Book Detail", $resource, 200);
      }
      return apiResponse(true, "Books not found", null, 500);
   }

   public function searchBooks(Request $request)
   {
      if (empty($request->keyword)) {
         return apiResponse(false, "Keyword not found ", null, 500);
      }
      $keyword = $request->keyword;
      $books = Book::where('title', 'LIKE', '%' . $keyword . '%')->get();
      if ($books->count() > 0) {
         $resource = BookResource::collection($books);
         return apiResponse(true, "Search Result", $resource, 200);
      }
      return apiResponse(false, "No Books Found", null, 200);
   }
}
