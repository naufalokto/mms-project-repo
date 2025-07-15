<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Register route
Route::get('/register', function () {
    return view('signup');
})->name('register');

Route::post('/register', [UserController::class, 'register']);

Route::get('/admin/dashboard', function () {
    return "Welcome Admin";
})->middleware(['auth', 'role:admin']);

// Route untuk dashboard customer tanpa authentication (frontend only)
Route::get('/customer/dashboard', function () {
    return view('customer-dashboard');
})->name('customer.dashboard');

// Route untuk halaman produk customer
Route::get('/customer/product', [App\Http\Controllers\ProdukController::class, 'index'])->name('customer.product');

// Route untuk halaman product-customer (frontend only)
Route::get('/product-customer', function () {
    return view('product-customer');
})->name('product.customer');

// Route untuk halaman testimoni customer (frontend only)
Route::get('/customer/testimoni', function () {
    return view('customer-testimoni');
})->name('customer.testimoni');

// Route original dengan middleware (untuk nanti)
// Route::get('/customer/dashboard', [CustomerDashboardController::class, 'index'])
//     ->middleware(['auth', 'role:cust']);

// route sementara belum diberikan middleware
Route::resource('produk', ProdukController::class)->only(['index', 'store', 'create']);