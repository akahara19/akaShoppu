<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/product{id}', [ProductController::class, 'show'])->name('show');
Route::get('/login', [AuthController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [AuthController::class, 'login'])->name('postLogin');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('customer.register');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('customer/cart', [UserController::class, 'cart'])->name('cart');
    Route::post('/postcart/{produk}', [UserController::class, 'postCart'])->name('customer.postcart');
    Route::get('/pay{detailtransaksi}', [UserController::class, 'pay'])->name('customer.pay');
    Route::post('/payprocess{detailtransaksi}', [UserController::class, 'payprocess'])->name('customer.payprocess');
    Route::get('/summary', [UserController::class, 'summary'])->name('customer.summary');
    Route::get('/admin/produk', [AdminController::class, 'index'])->name('admin.produk');
});
