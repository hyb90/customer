<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\where_am_i;

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::prefix('general')->group(function () {
        Route::post('login', 'AuthController@login')->name('login')->middleware(where_am_i::class);
    });
    Route::prefix('customer')->group(function () {
        Route::post('login', 'AuthController@customerLogin');
        Route::post('register', 'AuthController@customerRegister')->middleware(['addAuthorId',where_am_i::class]);
    });
    Route::prefix('vendor')->group(function () {
        Route::post('login', 'AuthController@vendorLogin');
        Route::post('register', 'AuthController@vendorRegister')->middleware(['addAuthorId',where_am_i::class]);
    });
    Route::prefix('employee')->group(function () {
        Route::post('login', 'AuthController@employeeLogin');
        Route::post('register', 'AuthController@employeeRegister')->middleware(['addAuthorId',where_am_i::class]);
    });
    Route::post('sendResetPasswordEmail', 'AuthController@sendResetPasswordEmail');
    Route::post('sendActivationEmail', 'AuthController@sendActivationEmail')->middleware(['auth:api', 'scope:user']);
    Route::post('activatEmail', 'AuthController@activatEmail')->middleware(['auth:api', 'scope:user']);
    Route::post('resetPassword', 'AuthController@resetPassword')->middleware(['auth:api', 'scope:user']);
});
