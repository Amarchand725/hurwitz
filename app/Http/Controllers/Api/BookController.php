<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Http\Resources\TestimonialResource;
use App\Http\Resources\AboutResource;
use App\Models\Book;
use App\Models\User;
use App\Models\AboutUs;
use App\Models\Testimonial;
use App\Models\BookAudio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;
use Str;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $token = PersonalAccessToken::findToken($request->bearerToken());

        if (!$token) {
            $response = [
                'success' => false,
                'code' => 422,
                'message' => 'Credentials not found.'
            ];

            return response()->json($response);
        }else{
        $books = Book::orderby('id', 'desc')->get();
        if ($books->count() > 0) {
            $resource = BookResource::collection($books);
            return apiResponse(true, "Books List", $resource, 200);
        }
        return apiResponse(true, "Books List Empty", null, 500);
        }
    }

    public function audio_files(Request $request)
    {
        $token = PersonalAccessToken::findToken($request->bearerToken());

        if (!$token) {
            $response = [
                'success' => false,
                'code' => 422,
                'message' => 'Credentials not found.'
            ];

            return response()->json($response);
        }else{
            $audios = BookAudio::where('book_id', $request->id)->first();
        }
    }

    public function show(Request $request)
    {
        $token = PersonalAccessToken::findToken($request->bearerToken());

        if (!$token) {
            $response = [
                'success' => false,
                'message' => 'Un-authorize login - Please login to continue.'
            ];

            return response()->json($response, 422);
        }else{
            $book = Book::where('id', $request->id)->with('audios')->first();
            if (!empty($book)) {
                $resource = new BookResource($book);
                return apiResponse(true, "Book Detail", $resource, 200);
            }
            return apiResponse(true, "Books not found", null, 500);
        }
    }

    public function searchBooks(Request $request)
    {
        $token = PersonalAccessToken::findToken($request->bearerToken());

        if (!$token) {
            $response = [
                'success' => false,
                'code' => 422,
                'message' => 'Credentials not found.'
            ];

            return response()->json($response);
        }else{
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
   public function getHome(Request $request)
   {
        $token = PersonalAccessToken::findToken($request->bearerToken());

        if (!$token) {
            $response = [
                'success' => false,
                'code' => 422,
                'message' => 'Credentials not found.'
            ];

            return response()->json($response);
        }else{
            $books = Book::where('is_featured', 1)->take(1)->get();
            $data['book_resource'] = BookResource::collection($books);

            $testimonials = Testimonial::orderby('id','DESC')->get(['id', 'slug', 'title', 'description' ]);
            $data['testimonial_resource'] = TestimonialResource::collection($testimonials);

            $about = AboutUs::orderby("id", "desc")->first();
            $data['about_resource'] = new AboutResource($about);

            if (!empty($data)) {
                return apiResponse(true, "Home Data ", $data, 200);
            }
            return apiResponse(false, "Data Not Found", null, 500);
        }
   }
}
