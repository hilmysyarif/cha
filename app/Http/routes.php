<?php

Route::get('/', function() {
    return view('welcome');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('home', 'HomeController@index');

	Route::group(['middleware' => 'auth'], function () {
		Route::get('articles/spa', 'ArticlesController@spa');
	    Route::resource('articles', 'ArticlesController');
	});
});

Route::group(['prefix' => 'api', 'namespace' => 'Api', 'middleware' => 'api'], function () {
    Route::resource('articles', 'ArticlesController');
});
