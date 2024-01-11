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

Route::prefix('post')->group(function() {
    Route::get('/', 'PostController@index')->name('posts');
    Route::get('/create', 'PostController@create')->name('posts.create');
    Route::post('/store', 'PostController@store')->name('posts.store');
    Route::get('/edit/{id}', 'PostController@edit')->name('post.edit');
    Route::post('/update/{id}', 'PostController@update')->name('post.update');
    Route::get('/delete/{id}', 'PostController@destroy')->name('post.delete');
});
