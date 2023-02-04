<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FaqResource;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Str;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::where('status', 1)->get();
        if ($faqs->count() > 0) {
            return apiResponse(true, "Faqs List", FaqResource::collection($faqs), 200);
        }
        return apiResponse(false, "Faqs Empty", null, 500);
    }
}
