<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SearchController;

Route::get('/', [PageController::class, 'home']);
Route::get('/search', [SearchController::class, 'search']);