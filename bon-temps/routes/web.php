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

// 'except' don't show the one is written
// 'only' shows only the one written down
Route::resource('overzicht', 'OverzichtController',['except' => ['create']]);
Route::resource('reserveren', 'ReserverenController');
Route::resource('bestel-menu', 'BestelMenuController');
Route::get('/', 'PagesController@getMenu');
Route::get('/get_menu', 'ReserverenController@check');
Route::get('/search', 'OverzichtController@search');
Route::get('/klanten', 'OverzichtController@download');

Route::get('test/datum={datum}&tijd={time}&x={x_people}', 'OverzichtController@test');

Route::group(['middleware' => ['web']], function(){
	//
});