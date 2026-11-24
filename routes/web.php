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
use App\Http\Controllers\LawyerAuthController;
use App\Http\Controllers\LawyerDashboardController;
use App\Http\Controllers\LawyerJadwalController;
use App\Http\Controllers\Lawyer\AkunController;
use App\Http\Controllers\Lawyer\PusatReferensiController;
use App\Http\Controllers\Lawyer\KelolaPerkaraController;

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

// lawyer login routes
Route::get('/lawyer/login', [LawyerAuthController::class, 'showLoginForm'])->name('lawyer.login');
Route::post('/lawyer/login', [LawyerAuthController::class, 'login'])->name('lawyer.login.submit');
Route::post('/lawyer/logout', [LawyerAuthController::class, 'logout'])->name('lawyer.logout');

// lawyer dashboard route
Route::get('/lawyer/index', [LawyerDashboardController::class, 'index'])->name('lawyer.index');

// lawyer management case routes
Route::prefix('lawyer')->name('lawyer.')->group(function () {
    Route::get('/kelolaperkara/index', [KelolaPerkaraController::class, 'index'])->name('kelolaperkara.index');
    Route::get('/kelolaperkara/dikerjakan', [KelolaPerkaraController::class, 'dikerjakan'])->name('kelolaperkara.dikerjakan');
    Route::get('/kelolaperkara/selesai', [KelolaPerkaraController::class, 'selesai'])->name('kelolaperkara.selesai');
    Route::get('/kelolaperkara/{id}', [KelolaPerkaraController::class, 'show'])->name('kelolaperkara.show');
    Route::post('/kelolaperkara/{id}/perkembangan', [KelolaPerkaraController::class, 'storeExecution'])->name('kelolaperkara.execution.store');
    Route::patch('/kelolaperkara/{id}/selesai', [KelolaPerkaraController::class, 'complete'])->name('kelolaperkara.complete');
    Route::patch('/kelolaperkara/{id}/arsip', [KelolaPerkaraController::class, 'archive'])->name('kelolaperkara.archive');
});

// lawyer schedule routes
Route::get('/lawyer/jadwal/index', [LawyerJadwalController::class, 'index'])->name('lawyer.jadwal.index');
Route::post('/lawyer/jadwal', [LawyerJadwalController::class, 'store'])->name('lawyer.jadwal.store');

// lawyer reference center routes
Route::prefix('lawyer')->name('lawyer.')->group(function () {
    Route::get('/pusat-referensi', [PusatReferensiController::class, 'index'])->name('pusatreferensi.index');
    Route::post('/pusat-referensi', [PusatReferensiController::class, 'store'])->name('pusatreferensi.store');
});

// lawyer account routes
Route::prefix('lawyer')->name('lawyer.')->group(function () {
    // Route pengaturan akun
    Route::get('/akun', [AkunController::class, 'index'])->name('akun.index');
    Route::put('/akun', [AkunController::class, 'update'])->name('akun.update');
    Route::delete('/akun/avatar', [AkunController::class, 'deleteAvatar'])->name('akun.avatar.delete');
});

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
