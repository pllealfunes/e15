<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    // Eventually we’ll want to return a view with our customized home page.
    // For now, we’ll just return a simple string
    return '<h1>Bookmark</h1>';
});

Route::get('/book/{id}', function ($id) {
    return 'You have requested book #'.$id;
});

Route::post('/books', function () {
    return 'Version A';
});

Route::get('/books/{id?}', function () {
    return 'Version B';
});

Route::get('/books', function () {
    return 'Version C';
});*/

Route::get('/', [PageController::class, 'welcome']);
Route::get('/contact', [PageController::class, 'contact']);
Route::get('/books', [BookController::class, 'index']);
Route::get('/books/{title}', [BookController::class, 'show']);
Route::get('/books/filter/{category}/{subcategory}', [BookController::class, 'filter']);