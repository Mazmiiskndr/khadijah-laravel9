<?php

use App\Http\Controllers\Auth\Admin\LoginController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\PromoController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Customer\CustomerLoginController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Index Page
Route::controller(HomeController::class)->group(function () {
    Route::get('/','index')->name('index');
});

// Login For Customer
Route::controller(CustomerLoginController::class)->name('customer.')->prefix('customer')->group(function () {
    Route::get('/login','create')->name('login');
    Route::post('/login', 'store')->name('store');
    Route::post('/logout', 'destroy')->name('logout');
});

// Login For Admin
Route::controller(LoginController::class)->name('admin.')->prefix('admin')->group(function () {
    Route::get('/login','index')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});

// Dashboard
Route::middleware(['auth','verified'])->name('backend.')->prefix('backend')->group(function () {
    Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('customer', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::resource('product', ProductController::class);
    Route::get('promo', [PromoController::class, 'index'])->name('promo.index');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
