<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeaturedPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('featured-post', [FeaturedPostController::class, 'index'])->name('featured-post');
Route::get('post/{slug}', [PostController::class, 'show'])->name('post.show');
