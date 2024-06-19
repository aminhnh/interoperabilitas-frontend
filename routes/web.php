<?php

use App\Http\Controllers\API\LembagaController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\API\DarahController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function () {
    return view('auth.login');
})->name('login');

Route::get('register', function () {
    return view('auth.register');
})->name('register');

Route::get('dashboard', function () {
    return view('layouts.dashboard');
})->name('dashboard');

Route::get('wilayah', function () {
    return view('wilayah.wilayah');
})->name('wilayah');

Route::get('/home', [ViewController::class, 'index'])->name('home');

Route::get('/kantongdarah', [DarahController::class, 'kantongdarah'])->name('kantongdarah');

Route::get('/lembaga', [LembagaController::class, 'lembaga'])->name('lembaga');

Route::get('/lembaga/{id}', [LembagaController::class, 'show'])->name('lembaga.show');
