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

Route::get('/', 'HomeController@form')->name('home');
Route::get('/table', 'HomeController@table')->middleware('auth')->name('table');
Route::get('/images/{name}', 'HomeController@image')->middleware('auth');
Route::post('/', 'HomeController@save');

Auth::routes();
