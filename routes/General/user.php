<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\General\Users', 'prefix' => 'users'], function () {
    Route::get('index', 'UserController@index');
    Route::get('profile', 'UserController@profile');
    Route::delete('delete', 'UserController@destroy');
    Route::post('editUserProfile', 'UserController@editUserProfile')->middleware(['auth:api', 'scope:user']);
    Route::get('get_locations/{user_id}', 'UserController@getLocationsOfUser');
});


