<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('home', 'HomeController@index');
    Route::pattern('id', '[0-9]+');
	Route::get('/', 'FrontController@index');
	Route::get('article/{id}', 'FrontController@show');
	Route::get('category/{id?}', 'FrontController@showPostByCat');
	Route::get('user/{id}/posts', 'FrontController@showPostByUser');
    Route::post('score/{post}/score', 'FrontController@ScorePost');


    Route::group(['middleware' => 'auth'], function () {
    	route::resource('post','PostController');
            Route::get('dashboard/published/{post}', 'PostController@published');
    });
});
