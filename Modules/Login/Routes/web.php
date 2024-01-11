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

Route::prefix('login')->group(function() {
    Route::get('/', 'LoginController@index')->name('login');
    Route::post('/submit', 'LoginController@submit')->name('frontend.login');
    Route::get('/register', 'RegisterController@register')->name('frontend.register');
    Route::post('/register-submit', 'RegisterController@submit')->name('register.submit');
    Route::get('/password-forget', 'ResetPasswordController@index')->name('login.forget');
    Route::post('/password-reset', 'ResetPasswordController@resetPassword')->name('login.forget.reset');
    Route::get('/show-reset/{token}', 'ResetPasswordController@showResetForm')->name('login.forget.form');
    Route::post('/handle-reset/{token}', 'ResetPasswordController@handleReset')->name('login.forget.handle');

    Route::get('/logout','LoginController@logout')->name('logout');




});
