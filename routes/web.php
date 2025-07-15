<?php

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CustomerDashboardController;
use App\Models\Service;

Route::get('/', function () {
    return view('welcome');
});

// Login & Register
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', function () {
    return view('signup');
})->name('register');
Route::post('/register', [UserController::class, 'register']);

// Admin Dashboard (dengan middleware)
Route::get('/admin/dashboard', function () {
    return View('admin-dashboard'); 
})->middleware(['auth', 'role:admin']);
Route::get('/admin/testimoni', function () {
    return view('admin-testimoni'); 
})->middleware(['auth', 'role:admin']);
Route::get('/admin/berita', function () {
    return view('admin-berita'); 
})->middleware(['auth', 'role:admin']);
Route::get('/admin/produk', function () {
    return view('admin-produk'); 
})->middleware(['auth', 'role:admin']);
Route::get('/admin/booking', function () {
    return view('admin-booking'); 
})->middleware(['auth', 'role:admin']);

Route::put('/admin/service/{id}', [ServiceController::class, 'updateService'])->middleware(['auth', 'role:admin']);
Route::delete('/admin/testimoni/{id}',  [TestimoniController::class, 'deleteTestimoni'])->middleware(['auth', 'role:admin']);

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Customer Dashboard (tanpa middleware)
Route::get('/customer/dashboard', function () {
    return view('customer-dashboard');
})->name('customer.dashboard')->middleware('auth','role:cust');

// Admin Dashboard routes
Route::get('/admin/dashboard', [App\Http\Controllers\AdminDashboardController::class, 'index'])
    ->middleware(['auth', 'role:admin']);

// Produk
Route::resource('produk', ProdukController::class)->only(['index', 'store', 'create']);

// Halaman produk customer
Route::get('/customer/product', [ProdukController::class, 'index'])->name('customer.product')->middleware('auth');
Route::get('/product-customer', function () {
    return view('product-customer');
})->name('product.customer');

// Booking Service
Route::get('/service', [ServiceController::class, 'create'])->name('service.create');
Route::post('/service', [ServiceController::class, 'store'])->name('service.store');
Route::get('/validate-slot', [ServiceController::class, 'validateslot']);
Route::get('/service-types', [ServiceController::class, 'getServiceTypes']);
Route::get('/service/history', [ServiceController::class, 'indexByUser'])->name('service.history');
Route::post('/service/{id}/cancel', [ServiceController::class, 'cancel'])->name('service.cancel');
Route::get('/service/all', [ServiceController::class, 'indexBycabang'])->name('service.all');
Route::post('/service/{id}/start', [ServiceController::class, 'startService'])->name('service.start');

// Testimoni
Route::get('/testimoni', [TestimoniController::class, 'getTestimoni']);
Route::post('/testimoni', [TestimoniController::class, 'postTestimoni']);
Route::delete('/testimoni/{id}', [TestimoniController::class, 'deleteTestimoni']);

// Berita
Route::get('/berita', [BeritaController::class, 'getBerita']);
Route::post('/berita', [BeritaController::class, 'postBerita']);
Route::put('/berita/{id}', [BeritaController::class, 'editBerita']);
Route::delete('/berita/{id}', [BeritaController::class, 'deleteBerita']);

Route::get('/test', function () {
    return view('create');
})->name('test');

Route::get('/test', [ServiceController::class, 'getServiceTypes']);