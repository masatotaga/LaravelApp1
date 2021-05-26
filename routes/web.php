<?php

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

Auth::routes();

Route::get('/posts/search','PostController@search')->name('posts.search');
Route::get('/posts/page','PostController@page')->name('posts.page');

Route::get('/','PostController@index')->name('posts.index');

Route::resource('/posts','PostController',['except' => ['index']]);
Route::resource('/users','UserController');
Route::resource('/comments','CommentController')->middleware('auth');