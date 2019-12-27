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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* FILM */
Route::get('/film/list', 'FilmController@index')->name('list_film');
Route::get('/film/{id}', 'FilmController@view')->name('view_film');

/* CHARACTER */
Route::post('/character', 'CharacterController@store')->name('character_store');

/* USER */
Route::get('/user', 'UserController@index')->name('user_index');