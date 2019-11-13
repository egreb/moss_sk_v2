<?php

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

// admin routes
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
	Route::get('/', 'Admin\HomeController@index')->name('index');

	Route::group(['prefix' => 'post', 'as' => 'post.'], function () {
		Route::get('/', 'Admin\PostController@index')->name('index');
		Route::get('/create', 'Admin\PostController@create')->name('create');
		Route::get('/{id}', 'Admin\PostController@edit')->name('edit');

		Route::post('/', 'Admin\PostController@store')->name('store');
		Route::post('store', 'Admin\PostController@store')->name('store');
		Route::post('{id}', 'Admin\PostController@update')->name('update');
		Route::delete('{id}', 'Admin\PostController@destroy')->name('delete');
	});
});

// authentication
Auth::routes();

// app routes
Route::get('/', 'App\HomeController@index')->name('home');
Route::get('/about', 'App\HomeController@about')->name('about');
Route::get('/{slug}', 'PostController@get')->name('post');
