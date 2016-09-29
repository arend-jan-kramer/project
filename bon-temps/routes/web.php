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

Route::group(['middleware' => ['web']], function(){

	Route::get('/', 'pagesController@index');
	Route::get('reserveren', 'reserverenController@index');
	Route::get('overzicht', 'overzichtController@index');
	Route::get('bestel-menu', 'bestelmenuController@index');

	Route::get('editereservation/{id}','dataController@aanpassen');
	Route::get('editebestelmenu/{id}','bestelmenuController@aanpassen');
	Route::get('verwijderenreservation/{id}','dataController@delete');

	Route::post('save','dataController@save');
	Route::post('zoeken','overzichtController@zoeken');

	// Route::get('/getRequest', function(){
	// 	if(Request::ajax()){
	// 		return "Hoi je vroeg naar mij";
	// 	}
	// });	

});

