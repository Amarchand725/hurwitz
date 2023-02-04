<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AboutUsController;
use App\Http\Controllers\Api\AnnouncementController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SocialController;
use App\Http\Controllers\Api\TestimonialController;

use App\Models\Announcement;
use App\Models\ContactUs;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('get-status', [HomeController::class, 'status']);

Route::get('get-categories', [CategoryController::class, 'categories']);
Route::get('get-subcategories', [CategoryController::class, 'subcategories']);
Route::get('get-subcategories-of-category/{id}', [CategoryController::class, 'categoryDetail']);

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('verify-otp', [AuthController::class, 'verifyOtp']);
Route::post('change-password-withouttoken', [AuthController::class, 'changePasswordWithoutToken']);
Route::get('providers', [SocialController::class, 'getProviders']);
Route::post('social-login', [SocialController::class, 'login']);
Route::get('get-books', [BookController::class, 'index']);
Route::get('book-details/{id}', [BookController::class, 'show']);

Route::group(['middleware' => 'api_auth'], function () {
    Route::get('get-profile', [AuthController::class, 'getProfile']);
    Route::post('update-profile', [AuthController::class, 'updateProfile']);
    Route::get('verify-token', [AuthController::class, 'verifyToken']);
    Route::post('contact-us', [ContactController::class, 'submit']);
    Route::get('about-us', [AboutUsController::class, 'index']);
    Route::get('get-blogs', [BlogController::class, 'index']);
    Route::get('blog-detail/{id}', [BlogController::class, 'show']);
    Route::get('get-testimonials', [TestimonialController::class, 'index']);
    Route::get('testimonial-detail/{id}', [TestimonialController::class, 'show']);
    Route::get('get-products', [ProductController::class, 'index']);
    Route::get('product-details/{id}', [ProductController::class, 'show']);
    Route::get('search-books', [BookController::class, 'searchBooks']);
    Route::get('order-types', [OrderController::class, 'orderTypes']);
    Route::get('order-types/{id}', [OrderController::class, 'orderTypesByBook']);
    Route::get('order-statuses', [OrderController::class, 'orderStatuses']);
    Route::get('order-history', [OrderController::class, 'orderHistory']);
    Route::post('place-order', [OrderController::class, 'orderPlace']);
    Route::get('track-your-order', [OrderController::class, 'trackYourOrder']);
    Route::post('store-player-id', [NotificationController::class, 'savePlayerId']);
    Route::get('send-notification', [NotificationController::class, 'testNotification']);
    Route::get('faqs', [FaqController::class, 'index']);
    Route::get('announcements', [AnnouncementController::class, 'index']);
    Route::get('help-and-support', [HomeController::class, 'helpAndSupport']);
    Route::get('get-countries', [HomeController::class, 'countries']);
    Route::get('get-states/{id}', [HomeController::class, 'states']);
    Route::get('get-cities/{id}', [HomeController::class, 'cities']);
    Route::post('change-password', [AuthController::class, 'changePassword']);

    // Route::post('fund-raiser', [OrderController::class, 'fundRaiser']);
    // Route::get('get-biddings', [BiddingController::class, 'getBiddings']);
    // Route::get('get-product-biddings/{id}', [BiddingController::class, 'getProductBiddings']);

    // Route::post('post-your-bid', [BiddingController::class, 'saveBid']);

    Route::get('user-delete', [AuthController::class, 'user_delete']);
});
