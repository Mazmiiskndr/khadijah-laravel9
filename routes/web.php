<?php

use App\Http\Controllers\Auth\Admin\LoginController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\PromoController;
use App\Http\Controllers\Backend\ReportProductController;
use App\Http\Controllers\Backend\ReportVisitorController;
use App\Http\Controllers\Backend\Setting\ContactController as SettingContactController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Customer\CustomerLoginController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\FaqController;
use App\Http\Controllers\Frontend\GalleryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Middleware\CountVisitor;
use Illuminate\Support\Facades\Route;

// Index Page / Home Page
Route::middleware(CountVisitor::class)->controller(HomeController::class)->group(function () {
    Route::get('/','index')->name('index');
    Route::get('/shop','shop')->name('shop');
    Route::get('/about','about')->name('about');
    Route::get('/contact','contact')->name('contact');
});

// Frontend Product Page
Route::middleware(CountVisitor::class)->group(function () {
    // TODO:
    Route::resource('product', FrontendProductController::class)->only(['index', 'show']);
    // About Page
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    // Contact Page
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    // Gallery Page
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    // FAQ Page
    Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

    // Wrap the cart route with the 'customer.auth' middleware to require customer login
    Route::middleware(['customer.auth'])->group(function () {
        Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
        Route::resource('checkout', CheckoutController::class)->only(['index', 'show', 'create']);
    });
});

// Login For Customer
Route::controller(CustomerLoginController::class)->name('customer.')->prefix('customer')->group(function () {
    Route::get('/login','create')->name('login');
    Route::get('/register','register')->name('register');
    Route::post('logout', 'destroy')->name('logout');
});

// Profile Page Customer
Route::middleware(['customer.auth'])->controller(ProfileController::class)->name('profile.')->prefix('profile')->group(function () {
    Route::get('/detail/{uid}', 'show')->name('detail');
});

// Login For Admin
Route::controller(LoginController::class)->name('admin.')->prefix('admin')->group(function () {
    Route::get('/login','index')->name('login');

});


// Dashboard
Route::middleware(['auth','verified'])->name('backend.')->prefix('backend')->group(function () {
    Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('customer', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('tags', [TagController::class, 'index'])->name('tags.index');
    // PRODUCT
    Route::get('datatable-product', [ProductController::class, 'datatable'])->name('product.datatable');
    Route::get('gallery-product', [ProductController::class, 'gallery'])->name('product.gallery');
    Route::resource('product', ProductController::class)->only(['index','show','create']);

    Route::get('promo', [PromoController::class, 'index'])->name('promo.index');
    Route::get('report-product', [ReportProductController::class, 'index'])->name('report-product.index');
    Route::get('report-visitor', [ReportVisitorController::class, 'index'])->name('report-visitor.index');


    Route::get('contact', [SettingContactController::class, 'index'])->name('contact.index');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
