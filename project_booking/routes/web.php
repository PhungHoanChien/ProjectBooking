<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserOrderController;
use Illuminate\Support\Facades\Route;


// Route::get('/', [HomeController::class, 'index'])
//     ->name('homepage');

Route::get('/login', [AuthController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegister'])->name('showRegister');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Route::middleware('auth')->prefix('admin')->group(function () {
//     Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
// });

Route::get('/', [ShopController::class, 'index'])->name('shop.index');

Route::resource('cart', CartController::class)
    ->only(['index', 'store', 'update', 'destroy']);


