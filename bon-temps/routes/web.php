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

	//open de pagina home
	Route::get('/', 'pagesController@index');

	//open de pagina reserveren
	Route::get('reserveren', 'reserverenController@index');

	//open de pagina overzicht
	Route::get('overzicht', 'overzichtController@index');

	//Open de pagina bestel Menu
	Route::get('bestel-menu', 'bestelmenuController@index');

	//Pagina openen om het bestelmenu aan te passen
	Route::get('editebestelmenu/{id}','bestelmenuController@aanpassen');



	Route::get('editereservation/{id}','dataController@aanpassen');

	Route::get('verwijderenreservation/{id}','dataController@delete');

	Route::get('editereservation/{id}','dataController@aanpassen');


	Route::post('save','dataController@save');
	

	Route::post('update','dataController@update');
	Route::post('update', 'bestelmenuController@update');


	Route::post('zoeken','overzichtController@zoeken');

	// Route::get('/getRequest', function(){
	// 	if(Request::ajax()){
	// 		return "Hoi je vroeg naar mij";
	// 	}
	// });	

});

