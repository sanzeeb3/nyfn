<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/afterReg', 'NyfnController@afterReg');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/', 'HomeController@index');

Route::group(['middleware' => ['App\Http\Middleware\AdminMiddleware']], function () {
	Route::get('/admin', 'HomeController@admin');	
});

