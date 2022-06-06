<?php

use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\LandingClientController;
use App\Http\Controllers\Admin\LandingContactController;
use App\Http\Controllers\Admin\LandingController;
use App\Http\Controllers\Admin\LandingServiceController;
use App\Http\Controllers\Admin\LandingSettingController;
use App\Http\Controllers\Admin\LandingSliderController;
use App\Http\Controllers\Admin\LandingWorkController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
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
Route::get('/', [LandingController::class, 'index'])->name('landing');


Route::group(['middleware' => ['auth:admin', 'admin'], 'as' => 'admin.'], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('main');
    Route::resources([
        'roles' => RoleController::class,
        'admins' => AdminController::class,
        'users' => UserController::class,
        'blogs' => BlogController::class,
        'galleries' => GalleryController::class,
        'banners' => BannerController::class,
        'contacts' => ContactController::class,
        'services' => ServiceController::class,
        'settings' => SettingController::class,
        'notifications' => NotificationController::class,
        'appointments' => AppointmentController::class,
        'offers' => OfferController::class,
        'coupons' => CouponController::class,
        'orders' => OrderController::class,
        'activity-logs' => ActivityLogController::class,
        'chats' => ChatController::class,
        'messages' => MessageController::class,

        // landing page routes
        'landing-services' => LandingServiceController::class,
        'landing-works' => LandingWorkController::class,
        'landing-sliders' => LandingSliderController::class,
        'clients' => LandingClientController::class,
        'landing-settings' => LandingSettingController::class,
    ]);

    Route::delete('delete/photo/{id}', [DashboardController::class, 'deletePhoto'])->name('deletePhoto');
    Route::post('active/{id}/role', [RoleController::class, 'active'])->name('active.role');
    Route::post('active/{id}/{type}', [DashboardController::class, 'active'])->name('active');
    Route::put('change-order-status/{order}', [OrderController::class, 'changeStatus'])->name('changeOrderStatus');
});

Route::post('send-message', [LandingContactController::class, 'store']);

require __DIR__ . '/auth.php';
