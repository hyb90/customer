<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'App\Http\Controllers\General\Services',
    'prefix' => 'services',
    'middleware' => ['auth:api', 'addAuthorId']
], function () {
    Route::get('', 'ServicesController@index');
    Route::get('add', 'ServicesController@create');
    Route::get('show', 'ServicesController@show');
    Route::get('edit', 'ServicesController@edit');
    Route::put('update', 'ServicesController@update');
    Route::delete('delete', 'ServicesController@destroy');
    Route::get('add_region', 'Service_regionsController@create');
    Route::delete('remove_region', 'Service_regionsController@destroy');
});
