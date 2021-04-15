<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'problems'],function (){
    Route::get('all', 'ErrorsController@index');
    Route::post('add', 'ErrorsController@add');
});

Route::group(['namespace' => 'App\Http\Controllers\Tasks', 'prefix' => 'tasks'],function (){
    Route::get('all', 'TasksController@index');
    Route::post('add', 'TasksController@add');
    Route::get('completed/{task_id}', 'TasksController@completed');
    Route::get('delete/{task_id}', 'TasksController@delete');
});

Route::get('/home', 'HomeController@index')->name('home');
