<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\General\Regions', 'middleware' => ['auth:api']], function () {
    Route::group(['prefix' => 'regions'], function () {
        Route::get('create', 'RegionsController@create');
        Route::put('update', 'RegionsController@update');
        Route::get('edit', 'RegionsController@edit');
        Route::get('index', 'RegionsController@index');
        Route::delete('delete/{region}', 'RegionsController@destroy');
    });
    Route::group(['prefix' => 'region-types'], function () {
        Route::get('create', 'RegionTypesController@create');
        Route::put('update', 'RegionTypesController@update');
        Route::get('edit', 'RegionTypesController@edit');
        Route::delete('delete/{regionType}', 'RegionTypesController@destroy');
        Route::get('index', 'RegionTypesController@index');
    });
});
