<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\SalesController;

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

// Route::get('/', function () {
//     return view('login');
// });
Route::post('/daftar', [PendaftaranController::class, 'store'])->name('daftar.simpan');
Route::post('/masuk', [MainController::class, 'masuk'])->name('masuk');
Route::get('/logout', [MainController::class, 'logout'])->name('logout');


Route::group(['middleware'=>['AuthCheck']], function(){
    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::get('/daftar', [PendaftaranController::class, 'index'])->name('daftar');
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route::get('/product', [ProductController::class, 'index'])->name('product');
    // Route::put('/product/{id}', [ProductController::class, 'destroy'])->name('product.delete');
    Route::resource('user',UserController::class);
    Route::resource('product',ProductController::class);
    Route::resource('transaction',TransactionController::class);
    Route::post('/transaction/filter', [TransactionController::class,'filter'])->name('transaction.aa');

    Route::post('/sales/cart', [SalesController::class,'addCart'])->name('sales.addCart');
    Route::get('/sales/reset', [SalesController::class,'reset'])->name('sales.reset');
    Route::resource('sales',SalesController::class);


});

