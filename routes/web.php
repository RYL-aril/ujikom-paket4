<?php
// routes/web.php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\TransaksiController;
use Illuminate\Support\Facades\Route;

// ─────────────────────────────────────────────────────
// PUBLIC ROUTES
// ─────────────────────────────────────────────────────
Route::view('/', 'pages.welcome')->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/rules', 'pages.rules')->name('rules');

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

// Public receipt route (accessible by booking code)
Route::get('/transaksi-bukti/{bookingCode}', [TransaksiController::class, 'receipt'])->name('transaksi.receipt');

// ─────────────────────────────────────────────────────
// AUTH ROUTES (Profile)
// ─────────────────────────────────────────────────────
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Member/Anggota routes
    Route::get('/member/transaksi', [TransaksiController::class, 'memberTransactions'])->name('member.transaksi');
    Route::post('/books/{book}/borrow', [TransaksiController::class, 'borrowRequest'])->name('books.borrow');
});

Route::get('/dashboard', function () {
    return view('pages.admin.dashboard');
})->middleware(['auth', 'role:admin,petugas'])->name('dashboard');

// Member Dashboard
Route::get('/member/dashboard', function () {
    $user = auth()->user();

    $borrowingStats = [
        'active' => $user->transaksis()->where('status', 'dipinjam')->orWhere('status', 'terlambat')->count(),
        'pending' => $user->transaksis()->where('status', 'pending')->count(),
        'returned' => $user->transaksis()->where('status', 'dikembalikan')->count(),
        'limit' => 4,
    ];

    $activeBorrowings = $user->transaksis()
        ->with('book')
        ->where(function ($q) {
            $q->where('status', 'dipinjam')->orWhere('status', 'terlambat');
        })
        ->latest()
        ->get();

    $pendingBorrowings = $user->transaksis()
        ->with('book')
        ->where('status', 'pending')
        ->latest()
        ->get();

    return view('pages.member.dashboard', compact('borrowingStats', 'activeBorrowings', 'pendingBorrowings'));
})->middleware('auth')->name('member.dashboard');

// ─────────────────────────────────────────────────────
// ADMIN ROUTES (Prefix: /admin, Name Prefix: admin.)
// ─────────────────────────────────────────────────────
Route::middleware(['auth', 'role:admin,petugas'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // User Management (Resource Style)
        Route::resource('users', UserController::class) // Customize jika perlu
            ->names([
                'index' => 'users.index',
                'create' => 'users.create',
                'edit' => 'users.edit',
            ]);

        // Custom user routes
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users-trashed', [UserController::class, 'trashed'])->name('users.trashed');
        Route::post('/users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');

        // Book Management
        Route::get('/books', [BookController::class, 'index'])->name('books.index');
        Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
        Route::post('/books/store', [BookController::class, 'store'])->name('books.store');
        Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
        Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
        Route::patch('/books/{book}', [BookController::class, 'update'])->name('books.update');
        Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');

        // Transaction Routes (Admin & Petugas)
        Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
        Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
        Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');
        Route::get('/transaksi/{transaksi}', [TransaksiController::class, 'show'])->name('transaksi.show');
        Route::patch('/transaksi/{transaksi}/approve', [TransaksiController::class, 'approve'])->name('transaksi.approve');
        Route::patch('/transaksi/{transaksi}/reject', [TransaksiController::class, 'reject'])->name('transaksi.reject');
        Route::patch('/transaksi/{transaksi}/return', [TransaksiController::class, 'returnBook'])->name('transaksi.return');
        Route::get('/transaksi/export/data', [TransaksiController::class, 'export'])->name('transaksi.export');
    });

// ─────────────────────────────────────────────────────
// OTHER STATIC ROUTES
// ─────────────────────────────────────────────────────
Route::view('/categories', 'categories')->name('categories');
Route::view('/new-arrivals', 'new-arrivals')->name('new-arrivals');
Route::view('/popular', 'popular')->name('popular');
Route::view('/fines', 'fines')->name('fines');

require __DIR__ . '/auth.php';
