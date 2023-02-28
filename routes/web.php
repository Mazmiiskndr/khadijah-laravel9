<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Customer\CustomerLoginController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;
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



// Route::view('index', 'index')->name('index');

// Route::get('/', function () {
//     return view('welcome');
// })->name('/');

Route::controller(HomeController::class)->group(function () {
    Route::get('/','index')->name('index');
});
Route::controller(CustomerLoginController::class)->name('customer.')->prefix('customer')->group(function () {
    Route::get('/login','create')->name('login');
    Route::post('/login', 'store')->name('store');
    Route::post('/logout', 'destroy')->name('logout');
});

// Dashboard
Route::middleware(['auth','verified'])->name('backend.')->prefix('backend')->group(function () {
    Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
