<?php
/**
 * PUBLIC ROUTES
 * Accessible to all visitors (authenticated or not)
 */

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\TransaksiController;
use Illuminate\Support\Facades\Route;

// ─────────────────────────────────────────────────────
// STATIC PAGES
// ─────────────────────────────────────────────────────
Route::view('/', 'pages.welcome')->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/rules', 'pages.rules')->name('rules');
Route::view('/categories', 'categories')->name('categories');
Route::view('/new-arrivals', 'new-arrivals')->name('new-arrivals');
Route::view('/popular', 'popular')->name('popular');
Route::view('/fines', 'fines')->name('fines');


Route::prefix('books')->name('books.')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('index');
    Route::get('/{book}', [BookController::class, 'show'])->name('show');
});


Route::get('/transaksi-bukti/{bookingCode}', [TransaksiController::class, 'receipt'])
    ->middleware('auth')
    ->name('transaksi.receipt');
