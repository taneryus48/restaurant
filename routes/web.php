<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\MenuItemController;
use App\Http\Controllers\MenuController;

// Ana sayfa
Route::get('/', [MenuController::class, 'index'])->name('menu.index');

// Dashboard
Route::get('/dashboard', [ProductController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Kullanıcı profili işlemleri
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Menü sayfası
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/popular', [MenuController::class, 'popular'])->name('menu.popular');
Route::get('/menu/category/{id}', [MenuController::class, 'filterByCategory'])->name('menu.filter');

// Admin işlemleri
Route::prefix('admin')->middleware('auth')->group(function () {
    // Kategori işlemleri
    Route::resource('categories', CategoryController::class);

    // Menü öğesi işlemleri
    Route::resource('menu-items', MenuItemController::class);

    // Ürün işlemleri
    Route::resource('products', ProductController::class)->except(['show']);
    Route::delete('products/{product}/remove-image', [ProductController::class, 'removeImage'])
        ->name('products.removeImage');
});

// Laravel auth rotaları
require __DIR__.'/auth.php';
