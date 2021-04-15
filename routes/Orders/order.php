<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Orders' ,'prefix' => 'orders/statuses'],function () {
    Route::post('create', 'OrderStatusesController@create');
    Route::put('update/{id}', 'OrderStatusesController@update');
    Route::get('edit/{id}', 'OrderStatusesController@edit');
    Route::get('index', 'OrderStatusesController@index');
    Route::delete('delete/{id}', 'OrderStatusesController@destroy');
});
Route::group(['namespace' => 'App\Http\Controllers\Orders' ,'prefix' => 'orders/types'],function () {
    Route::post('create', 'OrderTypesController@create');
    Route::put('update/{id}', 'OrderTypesController@update');
    Route::get('edit/{id}', 'OrderTypesController@edit');
    Route::get('index', 'OrderTypesController@index');
    Route::delete('delete/{id}', 'OrderTypesController@destroy');
});
Route::group(['namespace' => 'App\Http\Controllers\Orders' ,'prefix' => 'orders'],function () {
    Route::post('create', 'OrdersController@create');
    Route::put('update/{id}', 'OrdersController@update');
    Route::get('edit/{id}', 'OrdersController@edit');
    Route::get('index', 'OrdersController@index');
    Route::delete('delete/{id}', 'OrdersController@destroy');
    Route::delete('bulk-delete', 'OrdersController@bulk_destroy');
});
Route::group(['namespace' => 'App\Http\Controllers\Orders' ,'prefix' => 'orders/files'],function () {
    Route::post('create', 'OrderFilesController@create');
    Route::put('update/{id}', 'OrderFilesController@update');
    Route::get('edit/{id}', 'OrderFilesController@edit');
    Route::get('index', 'OrderFilesController@index');
    Route::delete('delete/{id}', 'OrderFilesController@destroy');
});
