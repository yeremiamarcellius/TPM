<?php

use App\Http\Controllers\BookController;
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

Route::get('/home', [BookController::class, 'index'])->name('index'); // bad practice

Route::get('/create-book', [BookController::class, 'create'])->name('create');
Route::post('/store-book', [BookController::class, 'store'])->name('store');
Route::get('/show-book/{id}', [BookController::class, 'show'])->name('show');
Route::get('/edit-book/{id}', [BookController::class, 'edit'])->name('edit');
Route::patch('/update-book/{id}', [BookController::class, 'update']);
Route::delete('/delete-book/{id}', [BookController::class, 'delete']);
