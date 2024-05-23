<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PromoController;

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

Route::get('/', [KategoriController::class, 'home'])->name('home');
Route::get('/login', function () {
    return view('login');
});
Route::get('/cruduser', [BarangController::class, 'index']);
Route::get('/crudkategori', [KategoriController::class, 'index']);

Route::get('/crudpromo', [PromoController::class, 'index']);

Route::get('/addgame', [GameController::class, 'kategori']);

Route::get('/addbarang', [BarangController::class, 'add']);
Route::get('/securityadmin', [GameController::class, 'index']);

Route::get('/addkategori', function () {
    return view('addkategori');
});

Route::get('/addpromo', function () {
    return view('addpromo');
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
Route::prefix('game')->group(function () {
    Route::post('/insert', [GameController::class, 'insert']);
});

Route::prefix('kategori')->group(function () {
    Route::post('/insert', [KategoriController::class, 'insert']);
    Route::get('show/{id}', [KategoriController::class, 'show'])->name('kategori.show');
    Route::put('edit/{id}', [KategoriController::class, 'updateCategory'])->name('kategori.update');
    Route::delete('destroy/{id}', [KategoriController::class, 'destroyCategory'])->name('kategori.destroy');
});


Route::controller(BarangController::class)->prefix('products')->group(function () {
    Route::get('show/{id}', 'show')->name('products.show');  
    Route::put('edit/{id}', 'update')->name('products.update');
    Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
});

Route::get('/logout', [PenggunaController::class, 'logout'])->name('logout');
Route::get('/signup', [PenggunaController::class, 'signup'])->name('signup');



Route::prefix('promo')->group(function () {
    Route::post('/insert', [PromoController::class, 'insert']);
    Route::get('show/{id}', [PromoController::class, 'show'])->name('promo.show');
    Route::put('edit/{id}', [PromoController::class, 'update'])->name('promo.update');
    Route::delete('destroy/{id}', [PromoController::class, 'destroy'])->name('promo.destroy');
});
