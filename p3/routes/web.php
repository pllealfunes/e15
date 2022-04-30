<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\PostController;

Route::any('/practice/{n?}', [PracticeController::class, 'index']);

Route::get('/', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);