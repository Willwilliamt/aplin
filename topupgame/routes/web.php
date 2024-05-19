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
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/cruduser', [BarangController::class, 'index']);

Route::get('/addbarang', function () {
    return view('addbarang');
});

Route::get('/home', function () {
    return view('home');
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
