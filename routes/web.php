<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuItemController;

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('menu-items', MenuItemController::class);
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
});
use App\Http\Controllers\Admin\ProductController;

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('products', ProductController::class);
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
    Route::delete('products/{product}/remove-image', [\App\Http\Controllers\Admin\ProductController::class, 'removeImage'])->name('products.removeImage');
});




require __DIR__.'/auth.php';
