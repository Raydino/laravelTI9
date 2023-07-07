<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DetailProdukController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/salam', function(){
    return 'Assalamualaikum';
});

//routing mengarahkan ke view
Route::get('/hallo', function(){
    return view ('hallo');
});
Route::get('/after_register', function(){
    return view('after_register');
});
Route::get('/hallo2', function(){
    return view ('hallo.halloworld');
});
Route::get('/from', [FormController::class, 'index']);
Route::post('/hasil', [FormController::class, 'store']);

Route::get('/detailproduk', [DetailProdukController::class, 'index']);

Route::group(['middleware' => ['auth','role:admin-maneger']],function(){
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/create', [ProdukController::class,'create']);
Route::post('/produk/store', [ProdukController::class,'store']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

