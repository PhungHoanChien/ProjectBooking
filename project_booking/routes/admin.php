<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManufactureController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProtypeController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::post('products', [ProductController::class, 'index'])->name('products.index');

    Route::get('products.create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products.create', [ProductController::class, 'create'])->name('products.create');

    Route::post('products.store', [ProductController::class, 'store'])->name('products.store');

    Route::resource('products', ProductController::class);

    Route::resource('manufactures', ManufactureController::class);

    Route::resource('protypes', ProtypeController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('sales', SaleController::class);
    Route::resource('users', UserController::class);
});