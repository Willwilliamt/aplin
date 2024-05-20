<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/cruduser', [BarangController::class, 'index']);

Route::get('/addbarang', [BarangController::class, 'add']);
Route::get('/securityadmin', function () {
    return view('securityadmin');
});
Route::get('/superadmin', function () {
    return view('superadmin');
});
Route::prefix('superadmin')->group(function () {
    Route::get('/', [PenggunaController::class, 'index']);
    Route::post('/promote', [PenggunaController::class, 'promote']);
    Route::post('/demote', [PenggunaController::class, 'demote']);
});


Route::prefix('pengguna')->group(function () {
    Route::post('/insert', [PenggunaController::class, 'insert']);
    Route::post('/update', [PenggunaController::class, 'update']);
    Route::post('/delete', [PenggunaController::class, 'delete']);
    Route::post('/login', [AuthController::class, 'login']);
    });

Route::prefix('user')->group(function () {
    Route::post('/insert', [BarangController::class, 'insert']);
});
Route::controller(BarangController::class)->prefix('products')->group(function () {
    Route::get('show/{id}', 'show')->name('products.show');  
    Route::put('edit/{id}', 'update')->name('products.update');
    Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
});

Route::get('/logout', [PenggunaController::class, 'logout'])->name('logout');
Route::get('/signup', [PenggunaController::class, 'signup'])->name('signup');
