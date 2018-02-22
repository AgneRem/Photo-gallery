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

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index')->name('home');

//nurodom, kad sitie keliai bus tik prisijungusiems. prefix nurodo, kad pradzioje url visada bus admin ir kad nereiketu rasytu
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function() {
  Route::get('/', 'AlbumsController@index');
  Route::get('/albums', 'AlbumsController@index');
  Route::get('/albums/create', 'AlbumsController@create');
  Route::post('/albums/store', 'AlbumsController@store');
  Route::get('/albums/{id}', 'AlbumsController@show');
  Route::get('/photos/create/{id}', 'PhotosController@create');
  Route::post('/photos/store', 'PhotosController@store');
  Route::resource('/themes', 'ThemeController');
  Route::post('/photos/{id}', 'PhotosController@destroy');
  // Route::resource('/albums', 'AlbumController');
  // Route::resource('/photos', 'PhotosController');


});
