<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;

Route::get('/', [PostController::class, 'index']);

Route::get('/category/{category}', [CategoryController::class, 'index']);
Route::get('/profile/{id}', [ProfileController::class, 'index']);

Route::group(['middleware' => 'auth'], function () {
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);
Route::post('/posts/{id}/comments', [CommentController::class, 'store']);
Route::delete('/posts/{id}/delete', [PostController::class, 'destroy']);
Route::delete('/comments/{id}/delete', [CommentController::class, 'destroy']);
});

Route::get('/posts/{id}', [PostController::class, 'show']);