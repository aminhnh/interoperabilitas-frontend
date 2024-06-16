<?php

use App\Http\Controllers\API\LembagaController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\API\DarahController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login',function () {
    return view('auth.login');
});

Route::get('dashboard',function () {
    return view('layouts.dashboard');
});
Route::get('lembaga',function () {
    return view('lembaga.lembaga');
});

Route::get('/home', [ViewController::class, 'index']);
Route::get('/kantongdarah', [DarahController::class, 'index']);

Route::get('/lembaga', [LembagaController::class, 'index']);
