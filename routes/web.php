<?php

use App\Http\Controllers\AsetController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TransaksiDetailController;
use Illuminate\Support\Facades\Route;



Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});


// Kategori route
Route::middleware('auth')->prefix('kategori')->name('kategori.')->group(function () {
    Route::get('/data', [KategoriController::class, 'index_data'])->name('index.data');

    Route::get('/', [KategoriController::class, 'index'])->name('index');
    Route::get('/create', [KategoriController::class, 'create'])->name('create');
    Route::post('/', [KategoriController::class, 'store'])->name('store');
    Route::get('/{id}', [KategoriController::class, 'edit'])->name('edit');
    Route::put('/{id}', [KategoriController::class, 'update'])->name('update');
    Route::delete('/{id}', [KategoriController::class, 'destroy'])->name('destroy');
});


// aset route
Route::middleware('auth')->prefix('asets')->name('aset.')->group(function () {
    Route::get('/data', [AsetController::class, 'index_data'])->name('index.data');
    Route::get('/rekap/data', [AsetController::class, 'index_rekap_data'])->name('index_rekap.data');

    Route::get('/', [AsetController::class, 'index'])->name('index');
    Route::get('/rekap', [AsetController::class, 'rekap'])->name('rekap');
    Route::get('/create', [AsetController::class, 'create'])->name('create');
    Route::post('/', [AsetController::class, 'store'])->name('store');
    Route::get('/{id}', [AsetController::class, 'edit'])->name('edit');
    Route::put('/{id}', [AsetController::class, 'update'])->name('update');
    Route::delete('/{id}', [AsetController::class, 'destroy'])->name('destroy');
});

// transaksi route
Route::middleware('auth')->prefix('transaksis')->name('transaksi.')->group(function () {
    Route::get('/data', [TransaksiController::class, 'transaksi_index_data'])->name('index.data');
    Route::get('/{transaksi_id}/transaksi_detail/data', [TransaksiController::class, 'transaksi_detail_create_data'])->name('transaksi_detail_create_data');
    Route::get('/{transaksi_id}/show/data', [TransaksiController::class, 'transaksi_detail_show_data'])->name('transaksi_detail_show_data');

    Route::get('/', [TransaksiController::class, 'index'])->name('index');
    Route::get('/create', [TransaksiController::class, 'create'])->name('create');
    Route::post('/', [TransaksiController::class, 'store'])->name('store');
    Route::get('/{id}', [TransaksiController::class, 'edit'])->name('edit');
    Route::get('/{id}/show', [TransaksiController::class, 'show'])->name('show');
    Route::put('/{id}', [TransaksiController::class, 'update'])->name('update');
    Route::delete('/{id}', [TransaksiController::class, 'destroy'])->name('destroy');

    Route::get('/{transaksi_id}/create_detail', [TransaksiController::class, 'create_detail'])->name('create_detail');
    Route::post('/{transaksi_id}/store_detail', [TransaksiController::class, 'store_detail'])->name('store_detail');
    Route::delete('/{transaksi_id}/destroy_detail', [TransaksiController::class, 'destroy_detail'])->name('destroy_detail');
});




