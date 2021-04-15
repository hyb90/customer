<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AddAuthorId;

Route::group(['namespace' => 'App\Http\Controllers\General\Pages', 'prefix' => 'pages', 'middleware' => ['auth:api']],
    function () {
        Route::get('add', 'PagesController@create_page')->middleware(AddAuthorId::class);
        Route::delete('delete', 'PagesController@delete_page');
        Route::get('', 'PagesController@index');
        Route::get('update', 'PagesController@update');
        Route::get('edit', 'PagesController@edit');
        Route::get('categories/{category}', 'PagesController@pages_of_category');
    });
