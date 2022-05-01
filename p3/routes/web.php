<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::any('/practice/{n?}', [PracticeController::class, 'index']);

Route::get('/', [PostController::class, 'index']);

Route::group(['middleware' => 'auth'], function () {
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);
Route::post('/posts/{id}/comments', [CommentController::class, 'store']);
Route::delete('/posts/{id}/delete', [PostController::class, 'destroy']);
Route::delete('/comments/{id}/delete', [CommentController::class, 'destroy']);
});

Route::get('/posts/{id}', [PostController::class, 'show']);