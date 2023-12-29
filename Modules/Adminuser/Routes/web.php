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

Route::prefix('adminuser')->group(function() {
    Route::get('/', 'AdminuserController@index')->name('users.index');
    Route::view('create', 'adminuser::create')->name('users.create');
    Route::post('store', 'AdminuserController@store')->name('users.store');
    Route::post('reset', 'AdminuserController@reset')->name('user.password.reset');
    Route::get('edit/{id}', 'AdminuserController@edit')->name('users.edit');
    Route::post('update/{id}', 'AdminuserController@update')->name('users.update');

});
