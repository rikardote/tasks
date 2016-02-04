<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'TasksController@index');
    

//Route::resource('tasks', 'TasksController');
Route::get('tasks','TasksController@index');
Route::get('tasks/{id}/edit','TasksController@edit');
Route::post('tasks/{id}/update','TasksController@update');
Route::get('tasks/create','TasksController@create');
Route::post('tasks/store','TasksController@store');
Route::get('tasks/{id}/show','TasksController@show');
Route::get('tasks/{id}/delete','TasksController@delete');
Route::get('tasks/{id}/destroy','TasksController@destroy');



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
