<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\General\roles', 'prefix' => 'roles', 'middleware' => 'auth:api'],
    function () {
        Route::post('create', 'RoleController@create');
        Route::get('index', 'RoleController@index');
        Route::delete('{role}', 'RoleController@destroy');
        Route::put('{role}', 'RoleController@update');
        Route::get('{role}', 'RoleController@show');
    });
