<?php

use App\Services\SCSC\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'scsc'], function () {
    Route::group(['prefix' => 'auth'], function () {
        //Route::post('register', [AuthController::class, 'register']);
        //Route::post('send-otp-email', [AuthController::class, 'sendOTPToEmail']);
        //Route::post('send-otp-mobile', [AuthController::class, 'sendOtpToMobile']);
    });
});
