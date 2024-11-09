<?php

use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::resource('/dashboard/pelanggans', PelangganController::class);

Route::resource('/dashboard/perusahaans', PerusahaanController::class);

Route::resource('/dashboard/penjualans', PenjualanController::class);

Route::resource('/dashboard/pembelians', PembelianController::class);

Route::resource('/dashboard/pemasukans', PemasukanController::class);

Route::resource('/dashboard/pengeluarans', PengeluaranController::class);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
