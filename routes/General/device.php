<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'App\Http\Controllers\General\Devices',
    'prefix' => 'devices',
    'middleware' => ['auth:api']
], function () {
    Route::get('add-device', 'DevicesController@add_device');
    Route::get('index', 'DevicesController@index');
    Route::get('{device}', 'DevicesController@show');
    Route::delete('{device}', 'DevicesController@destory');
    Route::put('{device}', 'DevicesController@update');
});
Route::group([
    'namespace' => 'App\Http\Controllers\General\Devices',
    'prefix' => 'device-types',
    'middleware' => ['auth:api']
], function () {
    Route::get('create', 'DeviceTypesController@add_device');
    Route::get('index', 'DeviceTypesController@index');
    Route::get('{device_type}', 'DeviceTypesController@show');
    Route::delete('{device_type}', 'DeviceTypesController@destory');
    Route::put('{device_type}', 'DeviceTypesController@update');
});
