<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SystemController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\OrdertypeController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('admin.login');
});

Route::group(['middleware' => ['guest']], function(){
    Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('admin/login', [AdminController::class, 'authenticate'])->name('admin.login');
});
Route::get('account/verify/{token}', [App\Http\Controllers\UserController::class, 'verifyAccount'])->name('user.verify');

Route::get('dashboard', [App\Http\Controllers\UserController::class, 'dashboard'])->name('dashboard')->middleware(['auth', 'is_verify_email']);

// auto-routes: admin

Route::group(['prefix'=>'admin', 'middleware' => 'auth'], function() {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/profile/edit', [AdminController::class, 'editProfile'])->name('admin.profile');
    Route::post('/profile/update', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
    Route::post('/logout', [AdminController::class, 'logOut'])->name('admin.logout');
    Route::get('/markasread/{id}', [AdminController::class, 'markasread'])->name('admin.markasread');
    Route::get('/view/all/notifications', [AdminController::class, 'viewAllNotifications'])->name('admin.view.all.notifications');

    //spacial User Permission
    Route::get('/user/create-spacial-permission/{user_id}', [AdminController::class, 'createSpacialPermission'])->name('admin.user.create-spacial-permission');
    Route::post('/user/store-spacial-permission', [AdminController::class, 'storeSpacialPermission'])->name('admin.user.store-spacial-permission');
    Route::patch('/user/update-spacial-permission/{id}', [AdminController::class, 'updateSpacialPermission'])->name('admin.user.update-spacial-permission');

    //get soft deleted records
    Route::get('user/trash/records', 'App\Http\Controllers\Auth\RegisteredUserController@trashAllUser')->name('admin.user.trash.records');
    Route::get('user/restore/{id}', 'App\Http\Controllers\Auth\RegisteredUserController@restore')->name('admin.user.restore');

    //role
    Route::get('role/trash/records', 'App\Http\Controllers\Admin\RoleController@trashAllRole')->name('admin.role.trash.records');
    Route::get('role/restore/{id}', 'App\Http\Controllers\Admin\RoleController@restore')->name('admin.role.restore');

    //permission
    Route::get('permission/trash/records', 'App\Http\Controllers\Admin\permissionController@trashAllPermission')->name('admin.permission.trash.records');
    Route::get('permission/restore/{id}', 'App\Http\Controllers\Admin\permissionController@restore')->name('admin.permission.restore');

    //Log Activity
    Route::get('logactivity/trash/records', 'App\Http\Controllers\Admin\SystemController@trashAlllogActivity')->name('admin.logactivity.trash.records');
    Route::get('logactivity/restore/{id}', 'App\Http\Controllers\Admin\SystemController@restore')->name('admin.logactivity.restore');

    //Menu
    Route::get('menu/trash/records', 'App\Http\Controllers\Admin\MenuController@trashRecords')->name('admin.menu.trash.records');
    Route::get('menu/restore/{id}', 'App\Http\Controllers\Admin\MenuController@restore')->name('admin.menu.restore');

    //get soft deleted records
    Route::get('book/trash/records', 'App\Http\Controllers\Admin\BookController@trashAllBook')->name('admin.book.trash.records');
    Route::get('book/restore/{id}', 'App\Http\Controllers\Admin\BookController@restore')->name('admin.book.restore');

    Route::get('ordertypes/trash/records', 'App\Http\Controllers\Admin\OrdertypeController@trashAllOrderTypes')->name('admin.ordertypes.trash.records');
    Route::get('ordertypes/restore/{id}', 'App\Http\Controllers\Admin\OrdertypeController@restore')->name('admin.ordertypes.restore');

    Route::get('orders/trash/records', 'App\Http\Controllers\Admin\OrderController@trashAllOrders')->name('admin.orders.trash.records');
    Route::get('orders/restore/{id}', 'App\Http\Controllers\Admin\OrderController@restore')->name('admin.orders.restore');

    Route::get('blogs/trash/records', 'App\Http\Controllers\Admin\BlogController@trashAllblogs')->name('admin.blogs.trash.records');
    Route::get('blogs/restore/{id}', 'App\Http\Controllers\Admin\BlogController@restore')->name('admin.blogs.restore');

    Route::get('testimonials/trash/records', 'App\Http\Controllers\Admin\TestimonialController@trashAllTestimonials')->name('admin.testimonials.trash.records');
    Route::get('testimonials/restore/{id}', 'App\Http\Controllers\Admin\TestimonialController@restore')->name('admin.testimonials.restore');

    Route::get('states/trash/records', 'App\Http\Controllers\Admin\StateController@trashAllStates')->name('admin.states.trash.records');
    Route::get('states/restore/{id}', 'App\Http\Controllers\Admin\StateController@restore')->name('admin.states.restore');

    Route::get('faqs/trash/records', 'App\Http\Controllers\Admin\FaqController@trashAllFaqs')->name('admin.faqs.trash.records');
    Route::get('faqs/restore/{id}', 'App\Http\Controllers\Admin\FaqController@restore')->name('admin.faqs.restore');

    Route::get('contacts/trash/records', 'App\Http\Controllers\Admin\ContactUsController@trashAllContacts')->name('admin.contacts.trash.records');
    Route::get('contacts/restore/{id}', 'App\Http\Controllers\Admin\ContactUsController@restore')->name('admin.contacts.restore');

    Route::get('announcements/trash/records', 'App\Http\Controllers\Admin\AnnouncementController@trashAllAnnouncements')->name('admin.announcements.trash.records');
    Route::get('announcements/restore/{id}', 'App\Http\Controllers\Admin\AnnouncementController@restore')->name('admin.announcements.restore');

    //system controller
    Route::get('system/setting', [SystemController::class, 'setting'])->name('admin.system.setting');
    Route::post('system/setting', [SystemController::class, 'settingStore'])->name('admin.system.setting');
    Route::get('system/company/profile', [SystemController::class, 'companyProfile'])->name('admin.system.company.profile');
    Route::post('system/company/profile', [SystemController::class, 'storeCompanyProfile'])->name('admin.system.company.profile');

    Route::get('system/email-config', [SystemController::class, 'emailConfig'])->name('admin.email-config');
    Route::post('system/email-config', [SystemController::class, 'emailConfigStore'])->name('admin.email-config');

    Route::get('logActivity', [SystemController::class, 'logActivity'])->name('admin.logActivity');
    Route::get('logActivity/show/{id}', [SystemController::class, 'showLogActivity'])->name('admin.logActivity.show');
    Route::delete('logActivity/destroy/{id}', [SystemController::class, 'deleteLogActivity'])->name('admin.logactivity.destroy');

    Route::post('change-order-status', [OrderController::class, 'changeOrderStatus'])->name('orders.changeOrderStatus');
    Route::get('get-order-types', [OrderController::class, 'getOrderTypes'])->name('get-order-types');
    Route::get('get-book-types', [BookController::class, 'get_order_types'])->name('book.get_order_types');
    Route::post('store-audio', [BookController::class, 'store_audio'])->name('books.storeAudio');
    Route::delete('destroy-audio/{id}', [BookController::class, 'destroy_audio'])->name('books.destroyAudio');
    Route::get('destroy-type/{id}/{type}', [BookController::class, 'destroy_type'])->name('books.destroytype');

    //permissions
    Route::resource('permission', 'App\Http\Controllers\admin\PermissionController');

    //Roles
    Route::resource('role', 'App\Http\Controllers\Admin\RoleController');

    //Users
    Route::resource('user', 'App\Http\Controllers\Auth\RegisteredUserController');

    //books
    Route::resource('book', 'App\Http\Controllers\Admin\BookController');

    //order types
    Route::resource('ordertypes', 'App\Http\Controllers\Admin\OrdertypeController');

    //orders
    Route::resource('orders', 'App\Http\Controllers\Admin\OrderController');

    //blogs
    Route::resource('blogs', 'App\Http\Controllers\Admin\BlogController');

    //testimonials
    Route::resource('testimonials', 'App\Http\Controllers\Admin\TestimonialController');

    //states
    Route::resource('states', 'App\Http\Controllers\Admin\StateController');

    //faq
    Route::resource('faqs', 'App\Http\Controllers\Admin\FaqController');

    //contacted us
    Route::resource('contacts', 'App\Http\Controllers\Admin\ContactUsController');

    //announcement
    Route::resource('announcements', 'App\Http\Controllers\Admin\AnnouncementController');

    //aboutus
    Route::resource('abouts', 'App\Http\Controllers\Admin\AboutUsController');

    //help & support
    Route::resource('helps', 'App\Http\Controllers\Admin\HelpController');
});

Route::get('privacy-policy', function () {
    return view('privacy-policy');
});

Route::get('terms-condition', function () {
    return view('terms');
});

require __DIR__.'/auth.php';


