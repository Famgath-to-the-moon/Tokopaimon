<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');



Route::group(['prefix' => 'admin'], function() {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::get('/produk', function () {
        return view('admin.produk');
    })->name('produk');
    
    Route::get('/kategori', function () {
        return view('admin.kategori');
    })->name('kategori');
    
    Route::get('/transaksi', function () {
        return view('admin.transaksi');
    })->name('transaksi');
});

