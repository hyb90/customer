<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'App\Http\Controllers\General\Managing','prefix' =>'managing', 'middleware' => ['auth:api']], function () {

    Route::get('image-upload', 'ManagingController@imageUpload')->name('image.upload');
    Route::post('image-upload', 'ManagingController@imageUploadPost')->name('image.upload.post');
    Route::get('add-convertions', 'ManagingController@add_convertions');

    Route::get('set-configs', 'ManagingController@set_configs');
});

