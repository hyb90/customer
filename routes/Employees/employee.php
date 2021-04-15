<?php
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Employees\Employee' ,'prefix' => 'Employees', 'middleware' => ['auth:api']], function () {

    Route::get('','EmployeesController@index');
    Route::get('show','EmployeesController@show');
    Route::get('edit','EmployeesController@edit');
    Route::put('update','EmployeesController@update')->middleware('addAuthorId');
    Route::delete('delete','EmployeesController@destroy')->middleware('addAuthorId');

});
Route::group(['namespace' => 'App\Http\Controllers\Employees\EmployeeLabels' ,'prefix' => 'Employee_Labels', 'middleware' => ['auth:api','addAuthorId']], function () {

    Route::get('','EmployeeLabelsController@index');
    Route::get('add','EmployeeLabelsController@create');
    Route::get('show','EmployeeLabelsController@show');
    Route::get('edit','EmployeeLabelsController@edit');
    Route::put('update','EmployeeLabelsController@update');
    Route::delete('delete','EmployeeLabelsController@destroy');

});
Route::group(['namespace' => 'App\Http\Controllers\Employees\EmployeeVsLabels' ,'prefix' => 'EmployeeVsLabels', 'middleware' => ['auth:api','addAuthorId']], function () {

    Route::get('employees_of_label','EmployeeVsLabelsController@employees_of_label');
    Route::get('labels_of_employee','EmployeeVsLabelsController@labels_of_employee');
    Route::get('add','EmployeeVsLabelsController@create');
    Route::delete('delete','EmployeeVsLabelsController@destroy');

});

Route::group(['namespace' => 'App\Http\Controllers\Employees\EmployeeStatuses' ,'prefix' => 'Employee_Statuses', 'middleware' => ['auth:api','addAuthorId']], function () {

    Route::get('','EmployeeStatusesController@index');
    Route::get('add','EmployeeStatusesController@create');
    Route::get('show','EmployeeStatusesController@show');
    Route::get('edit','EmployeeStatusesController@edit');
    Route::put('update','EmployeeStatusesController@update');
    Route::delete('delete','EmployeeStatusesController@destroy');

});
