<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'App\Http\Controllers\PageController@home');
Route::resource('posts', 'App\Http\Controllers\PostController');
Route::post('/posts/{id}', 'App\Http\Controllers\PostController@comment')->name('posts.comment');
Auth::routes();

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');
Route::get('/userpage/{id}', 'App\Http\Controllers\DashboardController@userpage');
Route::post('/posts/{id}/{like}', 'App\Http\Controllers\PostController@like')->name('post.like');
Route::get('/posts/{id}', 'App\Http\Controllers\PostController@dislike');
