<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/dashboard/pelanggans', PelangganController::class)->middleware('auth');

Route::resource('/dashboard/perusahaans', PerusahaanController::class)->middleware('auth');

Route::resource('/dashboard/penjualans', PenjualanController::class)->middleware('auth');

Route::resource('/dashboard/pembelians', PembelianController::class)->middleware('auth');

Route::resource('/dashboard/pemasukans', PemasukanController::class)->middleware('auth');

Route::resource('/dashboard/pengeluarans', PengeluaranController::class)->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
