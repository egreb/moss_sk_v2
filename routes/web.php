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

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], function () {
    Route::get('/', [HomeController::class, 'index'])
        ->name('dashboard')
        ->middleware('auth');

    Route::get('/posts', function () {
        return inertia('Posts');
    });
    Route::get('/tournaments', function () {
        return inertia('Tournaments');
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

    Route::get('main', 'App\HomeController@redirectFromOldMainRoute');
    Route::get('{slug}', 'PostController@get')->name('post');
});
