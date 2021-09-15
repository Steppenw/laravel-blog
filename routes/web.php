<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//Guests
Route::get('/', 'HomeController@index');
Route::get('/posts', 'PostController@index')->name('guests.posts.index');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home'); Generata da 'php artisan ui bootstrap --auth'

//Admin
Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('/posts', 'PostController');
    });