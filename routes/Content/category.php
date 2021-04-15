<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Content\Categories','prefix' => 'categories'], function () {

    Route::get('index', 'CategoriesController@index');
    Route::get('show', 'CategoriesController@show');

});

Route::group(['namespace' => 'App\Http\Controllers\Content\Categories','prefix' => 'categories' , 'middleware' => ['auth:api']], function () {

    Route::post('update', 'CategoriesController@update');
    Route::get('add', 'CategoriesController@store');
    Route::get('edit', 'CategoriesController@edit');
    Route::get('delete', 'CategoriesController@destroy');
    Route::get('add-category-translation', 'CategoriesController@add_translation');
    Route::get('pages/add', 'CategoriesController@add_page');
    Route::get('pages', 'CategoriesController@categories_of_page');


//    Route::get('api/Categories/{page_name}', 'CategoriesController@view_by_page_name')->middleware(['cors']);;;
//    Route::get('api/categories_tree_sons/{page_name}', 'CategoriesController@show_tree_sons_by_page_name')->middleware(['cors']);;;
//    Route::get('categories_son', 'CategoriesController@view_sons');
//    Route::get('api/edit-Categories/{id}', 'CategoriesController@edit');
//    Route::get('api/cat/test', 'CategoriesController@create');
});
Route::group(['namespace' => 'App\Http\Controllers\Content\Categories' ,'prefix' => 'categories'], function () {


    Route::get('root', 'CategoryToCategoryController@show_root');

    Route::get('category-sons/{category}', 'CategoryToCategoryController@show_sons');

    Route::get('category-parents/{category}', 'CategoryToCategoryController@show_parents');

    Route::get('add-parent', 'CategoryToCategoryController@add_parent');

    Route::get('rem-parent', 'CategoryToCategoryController@rem_parent');


});
