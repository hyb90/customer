<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\General\languages', 'prefix' =>'languages', 'middleware' => ['auth:api']], function () {

    Route::get('create', 'LanguageController@create');
    Route::put('update', 'LanguageController@update');
    Route::get('edit', 'LanguageController@edit');
    Route::delete('destroy', 'LanguageController@destroy');
    Route::get('index', 'LanguageController@index');
    Route::get('show', 'LanguageController@show');
});
