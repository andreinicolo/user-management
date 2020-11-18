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
Route::get('/login', 'Auth\LoginController@showLogin')->name('login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/login', 'Auth\LoginController@authenticate')->name('login.post');

Route::middleware('auth')->group(function () {
	Route::get('/home', 'UserController@users')->name('users');
	Route::post('/create-user', 'UserController@store')->name('users.create');
	Route::patch('/edit-user/{id}', 'UserController@update')->name('users.edit');
	Route::delete('/delete-user/{id}', 'UserController@destroy')->name('users.delete');
});

Route::get('/', function () {
    return view('welcome');
});
