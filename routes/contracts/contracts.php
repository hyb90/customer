<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Orders' ,'prefix' => 'orders/statuses'],function () {
    Route::post('create', 'OrderStatusesController@create');
    Route::put('update/{id}', 'OrderStatusesController@update');
    Route::get('edit/{id}', 'OrderStatusesController@edit');
    Route::get('index', 'OrderStatusesController@index');
    Route::delete('delete/{id}', 'OrderStatusesController@destroy');
});

