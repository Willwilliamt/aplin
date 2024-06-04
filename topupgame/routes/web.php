<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\InfluencerController;
use App\Http\Controllers\QuickBuyController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ConsignmentController;
use App\Http\Controllers\PaymentController;

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

Route::get('/', [KategoriController::class, 'home'])->name('homepage');
Route::get('/login', function () {
    return view('login');
});


Route::post('/get-snap-token', [PaymentController::class, 'getSnapToken']);
Route::post('/purchase/{id}', [PaymentController::class, 'purchase']);
Route::get('/home', [GameController::class, 'home'])->name('games');
Route::get('/quickbuy/{id_game}', [QuickBuyController::class, 'quickbuy'])->name('quickbuy');
Route::get('show-quick-buy/{id}', [GameController::class, 'showQuickBuyForm'])->name('show_quick_buy');

Route::get('/cruduser', [BarangController::class, 'index']);
Route::get('/crudkategori', [KategoriController::class, 'index']);

Route::get('/crudpromo', [PromoController::class, 'index']);
Route::get('/crudinfluencer', [InfluencerController::class, 'index']);

Route::get('/addgame', [GameController::class, 'kategori']);
Route::get('/addproduk',[ProdukController::class,'game']);
Route::get('/crudproduk',[ProdukController::class,'index']);
Route::get('/addbarang', [BarangController::class, 'add']);
Route::get('/securityadmin', [GameController::class, 'index']);
Route::get('/consignment', [ConsignmentController::class, 'index']);

Route::get('/addkategori', function () {
    return view('addkategori');
});
Route::get('/addpromo', function () {
    return view('addpromo');
});
Route::get('/addinfluencer', function () {
    return view('addinfluencer');
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
Route::prefix('topup')->group(function () {
    Route::post('/insert', [ProdukController::class, 'insert']);
    Route::get('show/{id}', [ProdukController::class, 'show'])->name('topup.show');
    Route::put('edit/{id}', [ProdukController::class, 'update'])->name('topup.update');
    Route::delete('destroy/{id}', [ProdukController::class, 'destroy'])->name('topup.destroy');
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

Route::prefix('securityadmin')->group(function () {
    Route::post('/delete', [GameController::class, 'delete']);
});



Route::prefix('promo')->group(function () {
    Route::post('/insert', [PromoController::class, 'insert']);
    Route::get('show/{id}', [PromoController::class, 'show'])->name('promo.show');
    Route::put('edit/{id}', [PromoController::class, 'update'])->name('promo.update');
    Route::delete('destroy/{id}', [PromoController::class, 'destroy'])->name('promo.destroy');
});

Route::prefix('influencer')->group(function () {
    Route::post('/insert', [InfluencerController::class, 'insert']);
    Route::get('show/{id}', [InfluencerController::class, 'show'])->name('influencer.show');
    Route::put('edit/{id}', [InfluencerController::class, 'update'])->name('influencer.update');
    Route::delete('destroy/{id}', [InfluencerController::class, 'destroy'])->name('influencer.destroy');
});

Route::controller(GameController::class)->prefix('games')->group(function () {
    Route::get('show/{id}', 'show')->name('games.show');  
    Route::put('edit/{id}', 'update')->name('games.update');

});


Route::post('/buyconsignment',[ConsignmentController::class,'buyview']);
Route::post('/buybarang',[ConsignmentController::class,'buybarang']);

Route::get('/transaksiconsign',[ConsignmentController::class,'showadmin']);
Route::get('/userconsign',[ConsignmentController::class,'showuser']);
Route::get('/sellerconsign',[ConsignmentController::class,'showseller']);
Route::patch('/confirm-transaction/{id}', [ConsignmentController::class, 'confirmTransaction'])->name('confirmTransaction');

Route::get('/consignment/search', [ConsignmentController::class, 'search']);

Route::get('/games/search', [KategoriController::class, 'search']);

