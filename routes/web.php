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

Route::get('/login',[LoginController::class,'login'])->name('login');

Route::post('/postlogin',[LoginController::class,'doLogin'])->name('do-login');

Route::middleware(['auth', 'roleuser'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('userHome');
});

Route::middleware(['auth', 'roleadmin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('adminHome');
});