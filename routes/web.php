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
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', 'Admin\HomeController@index')->name('index');
    Route::get('/gallery', 'ImageController@show')->name('gallery');
    Route::group(['prefix' => 'post', 'as' => 'post.'], function () {
        Route::get('/', 'Admin\PostController@index')->name('index');
        Route::get('/create', 'Admin\PostController@create')->name('create');
        Route::get('/{id}', 'Admin\PostController@edit')->name('edit');

        Route::post('/', 'Admin\PostController@store')->name('store');
        Route::post('store', 'Admin\PostController@store')->name('store');
        Route::post('{id}', 'Admin\PostController@update')->name('update');
        Route::delete('{id}', 'Admin\PostController@destroy')->name('delete');
    });

    Route::group(['prefix' => 'schedule', 'as' => 'schedule.'], function () {
        Route::get('/', 'Admin\ScheduleController@index')->name('index');
        Route::get('create', 'Admin\ScheduleController@create')->name('create');
        Route::post('alter', 'Admin\ScheduleController@alter')->name('alter');
        Route::get('edit/{id}', 'Admin\ScheduleController@edit')->name('edit');
        Route::post('store', 'Admin\ScheduleController@store')->name('store');
        Route::post('update/{id}', 'Admin\ScheduleController@update')->name('update');
        Route::get('{id}', 'Admin\ScheduleController@show')->name('show');
        Route::delete('{id}', 'Admin\ScheduleController@destroy')->name('delete');
    });

    Route::group(['prefix' => 'event', 'as' => 'event.'], function () {
        Route::post('store', 'Admin\ScheduleEventController@store')->name('store');
    });

    Route::group(['prefix' => 'member', 'as' => 'member.'], function () {
        Route::get('/', 'MemberController@index')->name('home');
        Route::get('create', 'MemberController@create')->name('create');
        Route::post('store', 'MemberController@store')->name('store');

        Route::get('{id}', 'MemberController@edit')->name('edit');
    });

    Route::group(['prefix' => 'tournament', 'as' => 'tournament.'], function () {
        Route::get('/', 'TournamentController@index')->name('index');
        Route::get('create', 'TournamentController@create')->name('create');
        Route::post('store', 'TournamentController@store')->name('store');
        Route::get('{tournament}', 'TournamentController@edit')->name('edit');
        Route::post('{tournament}', 'TournamentController@update')->name('update');
    });

    Route::group(['prefix' => 'tournament_year', 'as' => 'tournament_year.'], function () {
        Route::post('/', 'TournamentYearController@store')->name('store');
    });
});

// authentication
Auth::routes();

// app routes
Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'App\HomeController@index')->name('home');
    Route::get('about', 'App\HomeController@about')->name('about');
    Route::get('honored', 'App\HomeController@honored')->name('honored');
    Route::get('rules', 'App\HomeController@rules')->name('rules');
    Route::get('laws', 'App\HomeController@laws')->name('laws');
    Route::get('schedule', 'App\HomeController@schedule')->name('schedule');
    Route::get('{slug}', 'PostController@get')->name('post');
});
