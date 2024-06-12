<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\DarahController;
use App\Http\Controllers\API\KecamatanController;
use App\Http\Controllers\API\KelurahanController;
use App\Http\Controllers\API\KotaController;
use App\Http\Controllers\API\LembagaController;
use App\Http\Controllers\API\ProvinsiController;
use App\Http\Controllers\API\ViewController;

Route::get('/', function () {
    return view('welcome');
});

// Use AuthController for login functionality
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'authenticate']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('dashboard', function () {
    return view('layouts/dashboard');
});

Route::get('/home', [ViewController::class, 'index']);

// Resource Routes for various entities
Route::resource('kantongdarah', DarahController::class);
Route::resource('kantongdarah', DarahController::class)->names([
    'show' => 'darah.show',
    'edit' => 'darah.edit',
    'destroy' => 'darah.destroy',
]);


Route::resource('kecamatan', KecamatanController::class);
Route::resource('kelurahan', KelurahanController::class);
Route::resource('kota', KotaController::class);
Route::resource('lembaga', LembagaController::class);
Route::resource('provinsi', ProvinsiController::class);