<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsetController;

Route::get('/aset', [AsetController::class, 'aset'])->name('aset.aset');
Route::get('/aset/create', [AsetController::class, 'create'])->name('aset.create');
Route::post('/aset', [AsetController::class, 'store'])->name('aset.store');
Route::get('/aset/{aset}', [AsetController::class, 'show'])->name('aset.show');
Route::get('/aset/{aset}/edit', [AsetController::class, 'edit'])->name('aset.edit');
Route::put('/aset/{aset}', [AsetController::class, 'update'])->name('aset.update');
Route::delete('/aset/{aset}', [AsetController::class, 'destroy'])->name('aset.destroy');
Route::get('/aset/mutasi', [AsetController::class, 'mutasi'])->name('aset.mutasi');
Route::resource('aset', AsetController::class)->only(['edit', 'update']);
