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


Auth::routes();

Route::get('/', function(){
    if(\Auth::check() && \Auth::user()->is_admin==1){
         return \Redirect::to('/admin');
    }

     return \Redirect::to('/home');

});
Route::get('/home', 'HomeController@index');


Route::group(['middleware' => ['App\Http\Middleware\AdminMiddleware']], function () {
	Route::get('/admin', 'NyfnController@admin');	
	Route::get('/show/{id}', 'NyfnController@show');		
	Route::post('/delete', 'NyfnController@delete');
    Route::post('/approve', 'NyfnController@approve');
    Route::post('/search', 'NyfnController@search');
});

Route::post('/getZone', 'NyfnController@getZone');
Route::post('/getDistrict', 'NyfnController@getDistrict');
Route::post('/uploadimage', 'NyfnController@uploadimage');


Route::group(['middleware'=>'auth'],function(){
	Route::get('/edit/{id}', 'NyfnController@edit');
	Route::post('/update/{id}', 'NyfnController@update');

});

    Route::post('/checkEmail', 'NyfnController@checkEmail');