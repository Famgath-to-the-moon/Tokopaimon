<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::get('/register',[AuthController::class,'register'])->name('register');

Route::post('/do-login',[AuthController::class,'doLogin'])->name('do-login');
Route::post('/do-register',[AuthController::class,'doRegister'])->name('do-register');
Route::post('/do-logout',[AuthController::class,'logout'])->name('do-logout');


Route::get('/',[ProdukController::class,'getAll'])->name('home');

Route::group(['prefix'=>'produk'],function(){
    Route::get('/',[ProdukController::class,'getAll'])->name('produk-client');
    Route::get('/{id}',[ProdukController::class,'getDetail'])->name('produk-detail');
    Route::get('/kategori/{id}',[ProdukController::class,'getByKategoriId'])->name('produk-by-kategori');
});
Route::group(['prefix'=>'kategori'],function(){
    Route::get('/',[KategoriController::class,'getAll'])->name('kategori-client');
    Route::get('/{id}',[KategoriController::class,'getDetail'])->name('kategori-detail');
});


Route::middleware('auth:sanctum','roleuser')->group(function() {
    Route::group(['prefix'=>'transaksi'],function(){
        // Route::post('/',[TransaksiController::class,'add'])->name('transaksi-client');
        Route::post('/produk/{id}',[TransaksiController::class,'add'])->name('transaksi-client-add');
    });
});
Route::middleware('auth:sanctum','roleadmin')->group(function() {
    Route::group(['prefix'=>'admin'],function(){
        Route::get('/dashboard',function(){
            return view('admin.dashboard');
        })->name('admin-home');

        Route::group(['prefix'=>'produk'],function(){
            Route::get('/',[ProdukController::class,'All'])->name('produk-admin');
            Route::post('/',[ProdukController::class,'add'])->name('add-produk-admin');
            Route::put('/{id}',[ProdukController::class,'edit'])->name('edit-produk-admin');
            Route::delete('/{id}',[ProdukController::class,'delete'])->name('delete-produk-detail');
        });
        Route::group(['prefix'=>'kategori'],function(){
            Route::get('/',[KategoriController::class,'getAll'])->name('kategori-admin');
        });
        Route::get('/transaksi',[TransaksiController::class,'getAll'])->name('transaksi-admin');
    });
});

