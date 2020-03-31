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

// Page
Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::get('/contact', 'PagesController@showContact');
Route::post('/contact', 'PagesController@storeContact');

Route::get('/tag/{tagId}/posts', 'PostsController@getPostsByTag')->name('tags.show_post');
Route::get('/category/{categoryId}/posts', 'PostsController@getPostsByCategory')->name('categories.show_post');

// Conversation
Route::get('conversations', 'ConversationsController@index');
Route::get('conversations/{conversation}', 'ConversationsController@show')->name('conversations.show');
Route::post('best-replies/{reply}', 'ConversationBestReplyController@store');


Route::resource('posts', 'PostsController');
Route::resource('items', 'ItemController');

// Login/Register
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
