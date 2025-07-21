<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LokasiController;

Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

Route::post('/lokasi', [LokasiController::class, 'store'])->name('lokasi.store');
Route::put('/lokasi/{id}', [LokasiController::class, 'update'])->name('lokasi.update');
Route::delete('/lokasi/{id}', [LokasiController::class, 'destroy'])->name('lokasi.destroy');

// Dashboard (Home)
Route::get('/', [DashboardController::class, 'index'])->name('home');
// Aset routes
Route::prefix('aset')->name('aset.')->controller(AsetController::class)->group(function () {
    Route::get('/', 'aset')->name('aset');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{aset}/edit', 'edit')->name('edit');
    Route::put('/{aset}', 'update')->name('update');
    Route::delete('/{aset}', 'destroy')->name('destroy');

    // Mutasi routes
    Route::get('/mutasi', 'mutasi')->name('mutasi');
    Route::get('/mutasi/export', 'export')->name('mutasi.export');
});
