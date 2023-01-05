<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MailController;
use App\Models\Book;
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

Route::get('/home', [BookController::class, 'index'])->name('index');
Route::post('/send-mail', [MailController::class, 'sendMail']);


// ->middleware('isAdmin');

Route::patch('/update-book/{id}', [BookController::class, 'update']);
Route::delete('/delete-book/{id}', [BookController::class, 'delete']);
Route::get('/create-category', [CategoryController::class, 'create']);
Route::post('/store-category', [CategoryController::class, 'store']);

Route::middleware('isAdmin')->group(function (){
    Route::get('/create-book', [BookController::class, 'create'])->name('create');
    Route::post('/store-book', [BookController::class, 'store'])->name('store');
    Route::get('/show-book/{id}', [BookController::class, 'show'])->name('show');
    Route::get('/edit-book/{id}', [BookController::class, 'edit'])->name('edit');
});

Route::get('/', function () {
    $books = Book::all();

    return view('welcome', compact('books'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
