<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BiddingController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\FundRaiserController;
use App\Http\Controllers\Admin\HelpController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\TutorialController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Amin\OrderController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Admin\OrdertypeController;
use Illuminate\Support\Facades\Route;




Auth::routes();
Route::delete('destroy-audio/{id}', [BookController::class, 'destroy_audio'])->name('books.destroyAudio');
Route::group(['prefix' => 'admin/', 'as' => 'admin.'], function () {

        Route::get('login', [AuthController::class, 'loginform'])->name('login');
        // Route::post('custom-login', [AuthController::class, 'login'])->name('custom.login');

        Route::middleware(['admin_auth'])->group(function () {

                Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
                Route::get('sub-category-of-category/{p_id}', [SubCategoryController::class, 'index'])->name('sub_categories.index');
                Route::get('create-sub-category-of-category/{p_id}', [SubCategoryController::class, 'create'])->name('sub_categories.create');
                Route::post('store-sub-category-of-category/{p_id}', [SubCategoryController::class, 'store'])->name('sub_categories.store');
                Route::get('edit-sub-category-of-category/{p_id}/{c_id}', [SubCategoryController::class, 'edit'])->name('sub_categories.edit');
                Route::put('update-sub-category-of-category/{p_id}/{c_id}', [SubCategoryController::class, 'update'])->name('sub_categories.update');
                Route::delete('delete-sub-category-of-category/{p_id}/{c_id}', [SubCategoryController::class, 'delete'])->name('sub_categories.destroy');
                Route::post('store-audio', [BookController::class, 'store_audio'])->name('books.storeAudio');
               
                Route::get('destroy-type/{id}/{type}', [BookController::class, 'destroy_type'])->name('books.destroytype');
                  Route::get('destroy-accordion/{id}', [AboutUsController::class, 'destroy_accordion'])->name('about.destroyAccordion');
                   Route::get('destroy-removeImage', [AboutUsController::class, 'removeImage'])->name('about.removeImage');
                    Route::get('destroy-removeImage2', [AboutUsController::class, 'removeImage2'])->name('about.removeImage2');
                     Route::get('destroy-removeImage3', [AboutUsController::class, 'removeImage3'])->name('about.removeImage3');
                Route::post('change-order-status', [OrderController::class, 'changeOrderStatus'])->name('orders.changeOrderStatus');
                Route::post('change-bidding-status', [BiddingController::class, 'changeBiddingStatus'])->name('biddings.changeBiddingStatus');
                Route::resource('fund-raisers', FundRaiserController::class);
                Route::resource('faqs', FaqController::class);
                Route::resource('states', StateController::class);
                Route::resource('users', UserController::class);
                Route::resource('categories', CategoryController::class);
                Route::resource('sub-categories', SubCategoryController::class);
                Route::resource('contacts', ContactUsController::class);
                Route::resource('abouts', AboutUsController::class);
                Route::resource('helps', HelpController::class);
                Route::resource('settings', SettingController::class);
                Route::resource('books', BookController::class);
                Route::resource('testimonials', TestimonialController::class);
                    Route::resource('ordertypes', OrdertypeController::class);
                Route::resource('products', ProductController::class);
                Route::resource('blogs', BlogController::class);
                Route::resource('orders', OrderController::class);
                Route::resource('announcements', AnnouncementController::class);
                Route::resource('biddings', BiddingController::class);
                Route::post('logout', [AuthController::class, 'logout'])->name('logout');
                Route::get('get-book-types', [BookController::class, 'get_order_types'])->name('book.get_order_types');
        });
    });

    