<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::post("user/login", [LoginController::class,"authenticate"]);

Route::post("user/login", [UserController::class,"login"]);
Route::post('user/logout', [UserController::class, 'logout']);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('category/all',[CategoryController::class,'all']);
Route::get('category/slug/{category:slug}',[CategoryController::class,'slug']);
Route::get('post/all',[PostController::class,'all']);
Route::get('post/slug/{post:slug}',[PostController::class,'slug']);

Route::post('post/upload/{post}',[PostController::class,'upload']);
Route::post("user/logout", [UserController::class,"logout"]);


Route::group(['middleware'=> 'auth:sanctum'], function () {
    Route::resource('post',PostController::class)->except(['create','edit']);
    Route::resource('category',CategoryController::class)->except(['create','edit']);
});


