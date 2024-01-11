<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/category', [\Modules\Category\Http\Controllers\CategoryApiController::class,'index']);
Route::get('/category/{id}', [\Modules\Category\Http\Controllers\CategoryApiController::class,'getDetail']);
