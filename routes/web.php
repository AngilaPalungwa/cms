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

Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::get('/news-details/{slug}',[\Modules\Post\Http\Controllers\PostController::class,'details'])->name('post.detail');

Route::group(['prefix' =>'admin'], function () {
    Route::view('dashboard', 'welcome');
});


