<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PracticeController;

Route::any('/practice/{n?}', [PracticeController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});