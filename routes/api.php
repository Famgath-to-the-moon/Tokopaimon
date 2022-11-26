<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register'])->name('api-register');
Route::post('/login', [AuthController::class, 'login'])->name('api-login');

Route::middleware('auth:sanctum')->group(function() {
    

    //Produk
    Route::group(['prefix' => 'produk'], function() {
        Route::get('/',[ProdukController::class,'getAll'])->name('api-all-produk');
        Route::get('/paginate',[ProdukController::class,'paginate'])->name('api-paginate-produk');
        Route::get('/kategori/{kategori_id}',[ProdukController::class, 'getByKategoriId']);
        Route::get('/{id}',[ProdukController::class, 'getDetail'])-> name('api-detail-produk');
        Route::post('/',[ProdukController::class,'add'])->name('api-add-produk');
        Route::put('/{id}',[ProdukController::class, 'edit'])-> name('api-edit-produk');
        Route::delete('/{id}',[ProdukController::class, 'delete'])-> name('api-delete-produk');
    });
    
    //Transaksi
    Route::group(['prefix' => 'transaksi'], function () {
        Route::get('/oke', function () {
            return 'halo';
        });
        Route::get('/', [TransaksiController::class, 'getAll']) -> name('api-get-all-transaksi');
        Route::get('/paginate', [TransaksiController::class, 'paginate']) -> name('api-get-paginate-transaksi');
        Route::post('/produk/{id}', [TransaksiController::class, 'add']) -> name('api-add-transaksi');
    });

    //Kategori
    Route::group(['prefix' => 'kategori'], function () {
        Route::get('/oke', function () {
            return 'halo';
        });
        Route::get('/', [KategoriController::class, 'getAll']) -> name('api-get-all-kategori');
        Route::get('/paginate', [KategoriController::class, 'paginate']) -> name('api-get-paginate-kategori');
    });

    //image
    Route::group(['prefix' => 'image'], function () {
        Route::get('/oke', function () {
            return 'halo';
        });
        Route::get('/',[ImageController::class,'getAll'])->name('api-all-image');
        Route::get('/paginate',[ImageController::class,'paginate'])->name('api-paginate-image');
        Route::get('/{id}',[ImageController::class, 'getDetail'])-> name('api-detail-image');
        Route::post('/',[ImageController::class,'add'])->name('api-add-image');
    });
});
Route::put('/{id}',[ImageController::class,'edit'])->name('api-edit-image');