<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\FuelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TransaksiDetailController;
use App\Http\Controllers\UserController;
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
    Route::get('/{id}/data', [AsetController::class, 'transaksi_data'])->name('transaksi.data');
    Route::get('/{id}/show/detail_data', [AsetController::class, 'show_detail_data'])->name('show_detail.data');
    // Route::get('/rekap/data', [AsetController::class, 'index_rekap_data'])->name('index_rekap.data');
    Route::get('/{id}/trans_detail', [AsetController::class, 'show_trans_detail'])->name('show.trans_detail');
    
    Route::get('/', [AsetController::class, 'index'])->name('index');
    Route::get('/rekap', [AsetController::class, 'rekap'])->name('rekap');
    Route::get('/create', [AsetController::class, 'create'])->name('create');
    Route::post('/', [AsetController::class, 'store'])->name('store');
    Route::get('/{id}', [AsetController::class, 'edit'])->name('edit');
    Route::get('/{id}/show', [AsetController::class, 'show'])->name('show');
    Route::put('/{id}', [AsetController::class, 'update'])->name('update');
    Route::delete('/{id}', [AsetController::class, 'destroy'])->name('destroy');
});

// transaksi route
Route::middleware('auth')->prefix('transaksis')->name('transaksi.')->group(function () {
    Route::get('/export_excel', [TransaksiController::class, 'transaksi_export_excel'])->name('export_excel');
    Route::get('/data', [TransaksiController::class, 'transaksi_index_data'])->name('index.data');
    Route::get('/pending/data', [TransaksiController::class, 'transaksi_index_pending_data'])->name('index_pending.data');
    Route::get('/{transaksi_id}/transaksi_detail/data', [TransaksiController::class, 'transaksi_detail_create_data'])->name('transaksi_detail_create_data');
    Route::get('/{transaksi_id}/show/data', [TransaksiController::class, 'transaksi_detail_show_data'])->name('transaksi_detail_show_data');

    Route::get('/', [TransaksiController::class, 'index'])->name('index');
    Route::get('/pending', [TransaksiController::class, 'index_pending'])->name('index_pending');
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

//Fuel
Route::group(['middleware' => 'auth'], function () {
    Route::get('fuels/data', [FuelController::class, 'fuels_index_data'])->name('fuels.index.data');
    Route::get('fuels/rekap_data', [FuelController::class, 'fuels_rekap_data'])->name('fuels.rekap.data');
    Route::get('fuels/show_rekap', [FuelController::class, 'fuels_show_rekap'])->name('fuels.show_rekap');
    Route::get('fuels/export_excel', [FuelController::class, 'fuels_export_excel'])->name('fuels.export_excel');
    Route::resource('fuels', FuelController::class);

    //Users
    Route::get('/admin/activate', [UserController::class, 'activate_index'])->name('user.activate_index');
    Route::put('/admin/activate/{id}', [UserController::class, 'activate_update'])->name('user.activate_update');
    Route::get('/admin/deactivate', [UserController::class, 'deactivate_index'])->name('user.deactivate_index');
    Route::put('/admin/deactivate/{id}', [UserController::class, 'deactivate_update'])->name('user.deactivate_update');
    Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('users.update');
    
    Route::get('/admin/users/index/data', [UserController::class, 'index_data'])->name('users.index.data');
    Route::get('/admin/users/activate/data', [UserController::class, 'user_activate_data'])->name('user_activate.data');
    Route::get('/admin/users/deactivate/data', [UserController::class, 'user_deactivate_data'])->name('user_deactivate.data');
});

//approval
Route::middleware('auth')->prefix('approvals')->name('approvals.')->group(function () {
    Route::get('/', [ApprovalController::class, 'index'])->name('index');
    Route::put('/{transaksi_id}/approve', [ApprovalController::class, 'approve'])->name('approve');
    Route::put('/{transaksi_id}/deny', [ApprovalController::class, 'deny'])->name('deny');
});



