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

Auth::routes();
Route::get('/', 'RedirectController@index');




Route::get('/user', 'GuestController@index')->name('feedback')->middleware('checkUser');
Route::post('/user', 'GuestController@store');




Route::get('/admin', 'AdminController@index')->name('admin')->middleware('checkAdmin');




