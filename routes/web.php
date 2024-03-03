<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\LoanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/items/search', [ItemController::class, 'search'])->name('items.search');
// Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');

Route::post('/items/{id}/lend', [ItemController::class, 'lend'])->name('items.lend');
// Route::delete('/items/{id}', [ItemController::class, 'destroy'])->name('items.destroy');
// Route::get('/items/{item}', [ItemController::class, 'show'])->name('items.show');


Route::resource('boxes', BoxController::class)->middleware('auth');
Route::resource('items', ItemController::class)->middleware('auth');
Route::resource('loans', LoanController::class)->middleware('auth');

Route::post('/loans/{id}/return', [LoanController::class, 'returnItem'])->name('loans.return');


// Route::get('/items/{item}/loans', [LoanController::class, 'index'])->name('items.loans.index');
Route::post('/items/{id}/lend', [ItemController::class, 'lend'])->name('items.lend');
// Route::get('items/{id}/return', [ItemController::class, 'return'])->name('items.return');




require __DIR__ . '/auth.php';
