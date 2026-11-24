<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\CustomerPerkaraController;
use App\Http\Controllers\CustomerBuatKonsultasiController;
use App\Http\Controllers\CustomerAkunController;
use App\Http\Controllers\CustomerTrackingController;

Route::get('/', [LandingController::class, 'index'])->name('welcome');
Route::get('/about-us', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/articles', [ArticlesController::class, 'index'])->name('articles');

// Customer Routes

// alternative route for customer login form
Route::get('/customer/login/signin', function () {
    return view('customer.login.signin');
})->name('customer.login.signin');

Route::get('/customer/login/signup', function () {
    return view('customer.login.signup');
})->name('customer.login.signup');

// route for customer login form
Route::get('/customer/login', [CustomerAuthController::class, 'showLoginForm'])->name('customer.login');
Route::post('/customer/login', [CustomerAuthController::class, 'login'])->name('customer.login.submit');

// customer index route
Route::get('/customer/index', [CustomerDashboardController::class, 'index'])->name('customer.index');

// csutomer tracking route
Route::get('/customer/tracking/index', [CustomerTrackingController::class, 'index'])->name('customer.tracking.index');

// customer create consultation route
Route::get('/customer/buatkonsultasi/index', [CustomerBuatKonsultasiController::class, 'index'])->name('customer.buatkonsultasi.index');
Route::post('/customer/perkara-baru', [CustomerBuatKonsultasiController::class, 'store'])->name('customer.buatkonsultasi.store');

// customer case history route
Route::get('/customer/perkaralama/index', [CustomerPerkaraController::class, 'index'])->name('customer.perkaralama.index');
Route::post('/customer/perkara/{bookingId}/dokumen', [CustomerPerkaraController::class, 'uploadDocument'])->name('customer.perkaralama.uploadDocument');

// customer account route
Route::get('/customer/akun/index', [CustomerAkunController::class, 'index'])->name('customer.akun.index');
Route::put('/customer/pengaturan-akun/profil', [CustomerAkunController::class, 'updateProfile'])->name('customer.akun.updateProfile');
Route::put('/customer/pengaturan-akun/password', [CustomerAkunController::class, 'updatePassword'])->name('customer.akun.updatePassword');
Route::post('/customer/pengaturan-akun/foto', [CustomerAkunController::class, 'updateAvatar'])->name('customer.akun.updateAvatar');

// Lawyer Routes
Route::get('/lawyer/login', function () {
    return view('lawyer.login');
});

Route::get('/lawyer/index', function () {
    return view('lawyer.index');
})->name('lawyer.index');

Route::get('/lawyer/kelolaperkara/index', function () {
    return view('lawyer.kelolaperkara.index');
})->name('lawyer.kelolaperkara.index');

Route::get('/lawyer/jadwal/index', function () {
    return view('lawyer.jadwal.index');
})->name('lawyer.jadwal.index');

Route::get('/lawyer/pusatreferensi/index', function () {
    return view('lawyer.pusatreferensi.index');
})->name('lawyer.pusatreferensi.index');

Route::get('/lawyer/akun/index', function () {
    return view('lawyer.akun.index');
})->name('lawyer.akun.index');

// Admin Routes
Route::get('/admin/login', function () {
    return view('admin.login');
});

Route::get('/admin/dashboard/index', function () {
    return view('admin.dashboard.index');
})->name('admin.dashboard.index');

Route::get('/admin/customer/index', function () {
    return view('admin.customer.index');
})->name('admin.customer.index');

Route::get('/admin/lawyer/index', function () {
    return view('admin.lawyer.index');
})->name('admin.lawyer.index');

Route::get('/admin/artikel/index', function () {
    return view('admin.artikel.index');
})->name('admin.artikel.index');
