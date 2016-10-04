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

Route::resource('reserveren', 'ReserverenController');
Route::resource('bestel-menu', 'BestelMenuController');
Route::get('/', 'PagesController@getMenu');

Route::group(['middleware' => ['web']], function(){

});

