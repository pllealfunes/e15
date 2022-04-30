<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\PostController;

Route::any('/practice/{n?}', [PracticeController::class, 'index']);

Route::get('/', [PostController::class, 'index']);

Route::group(['middleware' => 'auth'], function () {
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);
});

Route::get('/posts/{id}', [PostController::class, 'show']);