<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

// authors
Route::get('/authors', [App\Http\Controllers\AuthorController::class, 'index']);
Route::get('/authors/create', [App\Http\Controllers\AuthorController::class, 'create']);
Route::post('/authors', [App\Http\Controllers\AuthorController::class, 'store']);
Route::get('/authors/{author}/edit', [App\Http\Controllers\AuthorController::class, 'edit']);
Route::put('/authors/{author}', [App\Http\Controllers\AuthorController::class, 'update']);
Route::delete('/authors/{author}', [App\Http\Controllers\AuthorController::class, 'destroy']);

// books
Route::get('/books', [App\Http\Controllers\BookController::class, 'index']);
Route::get('/books/create', [App\Http\Controllers\BookController::class, 'create']);
Route::post('/books', [App\Http\Controllers\BookController::class, 'store']);
Route::get('/books/{book}/edit', [App\Http\Controllers\BookController::class, 'edit']);
Route::put('/books/{book}', [App\Http\Controllers\BookController::class, 'update']);
Route::delete('/books/{book}', [App\Http\Controllers\BookController::class, 'destroy']);

// catalogs
Route::get('/catalogs', [App\Http\Controllers\CatalogController::class, 'index']);
Route::get('/catalogs/create', [App\Http\Controllers\CatalogController::class, 'create']);
Route::post('/catalogs', [App\Http\Controllers\CatalogController::class, 'store']);
Route::get('/catalogs/{catalog}/edit', [App\Http\Controllers\CatalogController::class, 'edit']);
Route::put('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'update']);
Route::delete('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'destroy']);

// members
Route::get('/members', [App\Http\Controllers\MemberController::class, 'index']);

// publishers
Route::get('/publishers', [App\Http\Controllers\PublisherController::class, 'index']);
Route::get('/publishers/create', [App\Http\Controllers\PublisherController::class, 'create']);
Route::post('/publishers', [App\Http\Controllers\PublisherController::class, 'store']);
Route::get('/publishers/{publisher}/edit', [App\Http\Controllers\PublisherController::class, 'edit']);
Route::put('/publishers/{publisher}', [App\Http\Controllers\PublisherController::class, 'update']);
Route::delete('/publishers/{publisher}', [App\Http\Controllers\PublisherController::class, 'destroy']);


// transactions
Route::get('/transactions', [App\Http\Controllers\TransactionController::class, 'index']);

// transaction_details
Route::get('/transactiondetails', [App\Http\Controllers\TransactionDetailController::class, 'index']);
