<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PostingController;
use App\Http\Controllers\DashboardPromoController;

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
// Route::get('/', function () { return redirect()->route('dashboard'); });
Route::get('/in', function () { return redirect()->route('dashboard'); })->name('in');
//internal dashboard
Route::get('/loginDashboard', [MainController::class, 'index'])->name('loginDashboard'); //page login
Route::post('/masuk', [MainController::class, 'masuk'])->name('masuk'); //prosses login
Route::get('/daftar', [PendaftaranController::class, 'index'])->name('daftar'); //page register
Route::post('/daftar', [PendaftaranController::class, 'store'])->name('daftar.simpan'); //proses register
Route::get('/logout', [MainController::class, 'logout'])->name('logout'); //proses logout
//public
Route::get('/', [LandingController::class, "index"])->name('home'); //home apps & list posting
Route::get('post', [LandingController::class, "addPost"])->name('posting'); //page create posting
Route::post('posting', [PostingController::class, "store"])->name('posting.save'); //proses save postingan
Route::post('posting/{id}', [PostingController::class, "show"])->name('posting.detail'); // page detail posting
Route::post('changeActive/{id}',[DashboardPromoController::class,"store"])->name("dashboardPromo.changeActive");
Route::group(['middleware'=>['AuthCheck']], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route::get('/product', [ProductController::class, 'index'])->name('product');
    // Route::put('/product/{id}', [ProductController::class, 'destroy'])->name('product.delete');
    Route::resource('user',UserController::class);
    Route::resource('dashboardPromo',DashboardPromoController::class);
    Route::resource('product',ProductController::class);
    Route::resource('transaction',TransactionController::class);
    Route::post('/transaction', [TransactionController::class,'index'])->name('transaction.index');
    // Route::get('/transactionrr', [TransactionController::class, 'rr'])->name('rr');
    Route::get('/export', [TransactionController::class,'export'])->name('transaction.export');

    Route::post('/sales/cart', [SalesController::class,'addCart'])->name('sales.addCart');
    Route::get('/sales/reset', [SalesController::class,'reset'])->name('sales.reset');
    Route::get('/print', [SalesController::class,'print']);
    Route::resource('sales',SalesController::class);


});

