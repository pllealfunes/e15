<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;


# Only enable the following development-specific routes if we’re *not* running the application in the `production` environment
if (!App::environment('production')) {
    Route::get('/test/login-as/{userId}', [TestController::class, 'loginAs']);
    Route::get('/test/refresh-database', [TestController::class, 'refreshDatabase']);
}

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