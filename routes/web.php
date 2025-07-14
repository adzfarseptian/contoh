<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});
use App\Http\Controllers\LoginController;

Route::get('/login', [LoginController::class, 'tampilForm']);
Route::post('/login', [LoginController::class, 'prosesLogin']);

Route::get('/dashboard', function () {
    return 'Selamat datang! Anda berhasil login.';
})->middleware('auth');
