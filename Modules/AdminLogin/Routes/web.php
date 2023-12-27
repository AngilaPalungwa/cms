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

Route::prefix('adminlogin')->group(function() {
    Route::get('/', 'AdminLoginController@index')->name('admin.login');
    Route::post('submit', 'AdminLoginController@submit')->name('admin.login.submit');
    Route::get('logout', 'AdminLoginController@logout')->name('admin.logout');
});
