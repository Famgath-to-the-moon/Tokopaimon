<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/',[ProdukController::class,'getAll'])->name('home');

Route::group(['prefix'=>'produk'],function(){
    Route::get('/',[ProdukController::class,'getAll'])->name('produk-client');
    Route::get('/{id}',[ProdukController::class,'getDetail'])->name('produk-detail');
    Route::get('/kategori/{id}',[ProdukController::class,'getByKategori'])->name('produk-by-kategori');
});

Route::group(['prefix'=>'transaksi'],function(){
    Route::post('/',[TransaksiController::class,'add'])->name('transaksi-client');
});




// Route::group(['prefix' => 'admin'], function() {

//     //Produk
//     Route::group(['prefix' => 'produk'], function() {
//         // Route::get('/',[ProdukController::class,'getAll'])->name('api-all-produk');
//         Route::get('/paginate',[ProdukController::class,'paginate'])->name('api-paginate-produk');
//         Route::get('/kategori/{kategori_id}',[ProdukController::class, 'getByKategoriId']);
//         Route::get('/{id}',[ProdukController::class, 'getDetail'])-> name('api-detail-produk');
//         Route::post('/',[ProdukController::class,'add'])->name('api-add-produk');
//         Route::put('/{id}',[ProdukController::class, 'edit'])-> name('api-edit-produk');
//         Route::delete('/{id}',[ProdukController::class, 'delete'])-> name('api-delete-produk');
//     });

//     //Transaksi
//     Route::group(['prefix' => 'transaksi'], function () {
//         Route::get('/oke', function () {
//             return 'halo';
//         });
//         Route::get('/', [TransaksiController::class, 'getAll']) -> name('api-get-all-transaksi');
//         Route::get('/paginate', [TransaksiController::class, 'paginate']) -> name('api-get-paginate-transaksi');
//         Route::post('/produk/{id}', [TransaksiController::class, 'add']) -> name('api-add-transaksi');
//     });

//     //Kategori
//     Route::group(['prefix' => 'kategori'], function () {
//         Route::get('/oke', function () {
//             return 'halo';
//         });
//         Route::get('/', [KategoriController::class, 'getAll']) -> name('api-get-all-kategori');
//         Route::get('/paginate', [KategoriController::class, 'paginate']) -> name('api-get-paginate-kategori');
//     });
// });

