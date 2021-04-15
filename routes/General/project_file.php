<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'App\Http\Controllers\General\ProjectFiles',
    'prefix' => 'files',
    'middleware' => 'auth:api'
], function () {
    Route::get('add', 'ProjectFileController@create');
    Route::get('', 'ProjectFileController@index');
    Route::delete('delete', 'ProjectFileController@destroy');
    Route::put('update', 'ProjectFileController@update');
    Route::get('show', 'ProjectFileController@show');
});
