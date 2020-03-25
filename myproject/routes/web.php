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

Route::get('/login', 'WebLoginController@login')->name('login');
Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Route::get('/tag/{id}/posts', 'PostsController@getPostsByTag');
Route::get('/category/{id}/posts', 'PostsController@getPostsByCategory');

Route::resource('posts', 'PostsController');
Route::resource('items', 'ItemController');

Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login');
