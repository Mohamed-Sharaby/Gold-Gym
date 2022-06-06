<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\NotificationController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'lang'], function () {
    Route::group(['prefix' => 'auth',], function () {
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);
        Route::post('confirm', [AuthController::class, 'ConfirmUser']);
        Route::post('confirm/resend', [AuthController::class, 'resendConfirmation']);
        Route::post('forget-password', [AuthController::class, 'forgetPassword']);
        Route::post('forget-password/check', [AuthController::class, 'checkCode']);
        Route::post('forget-password/reset', [AuthController::class, 'resetPassword']);

        Route::group(['middleware' => 'auth:api'], function () {
            Route::get('profile', [AuthController::class, 'profile']);
            Route::put('profile', [AuthController::class, 'update']);
            Route::apiResources([
                'notifications' => NotificationController::class,
                'orders'=>OrderController::class,
                'chats'=>ChatController::class
            ]);
        });
    });

    Route::resources([
        'banners' => BannerController::class,
        'blogs' => BlogController::class,
        'galleries' => GalleryController::class,
        'services' => ServiceController::class,
        'offers' => OfferController::class,
    ]);
    Route::post('coupon',CouponController::class);
    Route::get('home',HomeController::class);
    Route::post('contact', ContactController::class);
    Route::get('settings', SettingController::class);
});
