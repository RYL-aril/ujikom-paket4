<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::view('/', 'pages.welcome')->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/rules', 'pages.rules')->name('rules');

// Auth static pages (Live views rendered statically)
Route::view('/login', 'pages.auth.login')->name('login');
Route::view('/register', 'pages.auth.register')->name('register');
Route::view('/password/reset', 'pages.auth.reset-password')->name('password.reset');

// Placeholder static pages for navigation (will 404 or create later)
Route::view('/categories', 'categories')->name('categories');
Route::view('/new-arrivals', 'new-arrivals')->name('new-arrivals');
Route::view('/popular', 'popular')->name('popular');
Route::view('/fines', 'fines')->name('fines');

// Admin/Member dashboard placeholders (static for now)
Route::view('/admin/dashboard', 'pages.admin.dashboard')->name('admin.dashboard');
Route::view('/member/dashboard', 'pages.member.dashboard')->name('member.dashboard');
Route::view('/books', 'pages.admin.books.index')->name('books.index');
Route::view('/admin/books/create', 'pages.admin.books.create')->name('admin.books.create');
Route::view('/admin/users', 'pages.admin.users.index')->name('admin.users.index');
Route::view('/admin/users/create', 'pages.admin.users.create')->name('admin.users.create');
Route::view('/profile', 'pages.profile.index')->name('profile');

// Static placeholders
Route::view('/privacy', 'privacy')->name('privacy');
Route::view('/terms', 'terms')->name('terms');

// routes/web.php
Route::get('/transaksi', function () {
    return view('pages.admin.transaksi.index');
})->name('admin.transaksi.index');

Route::get('/transaksi/create', function () {
    return view('pages.admin.transaksi.create'); // Nanti bisa dibuat selanjutnya
})->name('admin.transaksi.create');
// routes/web.php
Route::get('/transaksi/{id}', function ($id) {
    // Nanti ganti dengan controller: return view('admin.transaksi.show', compact('transaction'));
    return view('pages.admin.transaksi.show');
})->name('admin.transaksi.show');

// routes/web.php
Route::get('/books/{id}', function ($id) {
    // Nanti ganti dengan controller
    return view('pages.admin.books.show');
})->name('admin.books.show');

// routes/web.php
Route::get('/users/{id}', function ($id) {
    return view('pages.admin.users.show');
})->name('admin.users.show');

Route::get('/bukti', fn() => view('pages.admin.transaksi.bukti'));
Route::get('/admin/verify', fn() => view('pages.admin.pickup.verify'));
