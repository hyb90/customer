<?php
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Customers\CustomerLabels','prefix' =>'CustomerLabels', 'middleware' => ['auth:api','addAuthorId']], function () {

    Route::get('','CustomerLabelsController@index');
    Route::get('add','CustomerLabelsController@create');
    Route::get('show','CustomerLabelsController@show');
    Route::get('edit','CustomerLabelsController@edit');
    Route::put('update','CustomerLabelsController@update');
    Route::delete('delete','CustomerLabelsController@destroy');

});

Route::group(['namespace' => 'App\Http\Controllers\Customers\CustomerStatuses','prefix' =>'CustomerStatuses', 'middleware' => ['auth:api','addAuthorId']], function () {

    Route::get('','CustomerStatusesController@index');
    Route::get('add','CustomerStatusesController@create');
    Route::get('show','CustomerStatusesController@show');
    Route::get('edit','CustomerStatusesController@edit');
    Route::put('update','CustomerStatusesController@update');
    Route::delete('delete','CustomerStatusesController@destroy');

});

Route::group(['namespace' => 'App\Http\Controllers\Customers\CustomerTypes','prefix' =>'CustomerTypes', 'middleware' => ['auth:api','addAuthorId']], function () {

    Route::get('','CustomerTypesController@index');
    Route::get('add','CustomerTypesController@create');
    Route::get('show','CustomerTypesController@show');
    Route::get('edit','CustomerTypesController@edit');
    Route::put('update','CustomerTypesController@update');
    Route::delete('delete','CustomerTypesController@destroy');

});

Route::group(['namespace' => 'App\Http\Controllers\Customers\CustomerVsLabels','prefix' =>'CustomerVsLabels', 'middleware' => ['auth:api','addAuthorId']], function () {

    Route::get('customers_of_label','CustomerVsLabelsController@customers_of_label');
    Route::get('labels_of_customer','CustomerVsLabelsController@labels_of_customer');
    Route::get('add','CustomerVsLabelsController@create');
    Route::delete('delete','CustomerVsLabelsController@destroy');

});
