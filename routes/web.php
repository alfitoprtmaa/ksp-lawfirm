<?php

use Illuminate\Support\Facades\Route;

// Controllers Landing
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ArticlesController;

// Controllers Customer
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\CustomerPerkaraController;
use App\Http\Controllers\CustomerBuatKonsultasiController;
use App\Http\Controllers\CustomerAkunController;
use App\Http\Controllers\CustomerTrackingController;

// Controllers Lawyer
use App\Http\Controllers\LawyerAuthController;
use App\Http\Controllers\LawyerDashboardController;
use App\Http\Controllers\LawyerJadwalController;
use App\Http\Controllers\Lawyer\AkunController;
use App\Http\Controllers\Lawyer\PusatReferensiController;
use App\Http\Controllers\Lawyer\KelolaPerkaraController;

// Controllers Admin
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\KonsultasiOnlineController;
use App\Http\Controllers\Admin\KonsultasiPerkaraController;
use App\Http\Controllers\Admin\DataAdvokatController;
use App\Http\Controllers\Admin\DataRoleController;
use App\Http\Controllers\Admin\DataKlienController;
use App\Http\Controllers\Admin\DataLayananController;
use App\Http\Controllers\Admin\DataArtikelController;
use App\Http\Controllers\Admin\DataFaqController;
use App\Http\Controllers\Admin\AdminPusatReferensiController;

// =========================================================================
// LANDING ROUTES
// =========================================================================
Route::get('/', [LandingController::class, 'index'])->name('welcome');
Route::get('/about-us', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/articles', [ArticlesController::class, 'index'])->name('articles');

// =========================================================================
// CUSTOMER ROUTES
// =========================================================================
Route::prefix('customer')->name('customer.')->group(function () {
    // Auth
    Route::view('/login/signin', 'customer.login.signin')->name('login.signin');
    Route::view('/login/signup', 'customer.login.signup')->name('login.signup');

    Route::controller(CustomerAuthController::class)->group(function () {
        Route::get('/login', 'showLoginForm')->name('login');
        Route::post('/login', 'login')->name('login.submit');
    });

    // Dashboard & Tracking
    Route::get('/index', [CustomerDashboardController::class, 'index'])->name('index');
    Route::get('/tracking/index', [CustomerTrackingController::class, 'index'])->name('tracking.index');

    // Buat Konsultasi
    Route::controller(CustomerBuatKonsultasiController::class)->group(function () {
        Route::get('/buatkonsultasi/index', 'index')->name('buatkonsultasi.index');
        Route::post('/perkara-baru', 'store')->name('buatkonsultasi.store');
    });

    // Riwayat Perkara
    Route::controller(CustomerPerkaraController::class)->group(function () {
        Route::get('/perkaralama/index', 'index')->name('perkaralama.index');
        Route::post('/perkara/{bookingId}/dokumen', 'uploadDocument')->name('perkaralama.uploadDocument');
    });

    // Pengaturan Akun
    Route::controller(CustomerAkunController::class)->group(function () {
        Route::get('/akun/index', 'index')->name('akun.index');
        Route::put('/pengaturan-akun/profil', 'updateProfile')->name('akun.updateProfile');
        Route::put('/pengaturan-akun/password', 'updatePassword')->name('akun.updatePassword');
        Route::post('/pengaturan-akun/foto', 'updateAvatar')->name('akun.updateAvatar');
    });
});

// =========================================================================
// LAWYER ROUTES
// =========================================================================
Route::prefix('lawyer')->name('lawyer.')->group(function () {
    // Auth
    Route::controller(LawyerAuthController::class)->group(function () {
        Route::get('/login', 'showLoginForm')->name('login');
        Route::post('/login', 'login')->name('login.submit');
        Route::post('/logout', 'logout')->name('logout');
    });

    // Dashboard
    Route::get('/index', [LawyerDashboardController::class, 'index'])->name('index');

    // Kelola Perkara
    Route::prefix('kelolaperkara')->name('kelolaperkara.')->controller(KelolaPerkaraController::class)->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/dikerjakan', 'dikerjakan')->name('dikerjakan');
        Route::get('/selesai', 'selesai')->name('selesai');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/{id}/perkembangan', 'storeExecution')->name('execution.store');
        Route::patch('/{id}/selesai', 'complete')->name('complete');
        Route::patch('/{id}/arsip', 'archive')->name('archive');
    });

    // Jadwal
    Route::controller(LawyerJadwalController::class)->group(function () {
        Route::get('/jadwal/index', 'index')->name('jadwal.index');
        Route::post('/jadwal', 'store')->name('jadwal.store');
    });

    // Pusat Referensi
    Route::controller(PusatReferensiController::class)->group(function () {
        Route::get('/pusat-referensi', 'index')->name('pusatreferensi.index');
        Route::post('/pusat-referensi', 'store')->name('pusatreferensi.store');
    });

    // Akun
    Route::controller(AkunController::class)->group(function () {
        Route::get('/akun', 'index')->name('akun.index');
        Route::put('/akun', 'update')->name('akun.update');
        Route::delete('/akun/avatar', 'deleteAvatar')->name('akun.avatar.delete');
    });
});

// =========================================================================
// ADMIN ROUTES
// =========================================================================
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Kelola Jadwal
    Route::prefix('jadwal')->name('jadwal.')->controller(JadwalController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/tambah', 'create')->name('create');
        Route::post('/', 'store')->name('store');
    });

    // Konsultasi Online Gratis
    Route::prefix('konsultasionline')->controller(KonsultasiOnlineController::class)->group(function () {
        Route::get('/index', 'index')->name('konsultasionline.index');
        Route::post('/ketersediaan', 'saveAvailability')->name('konsultasi.availability');
    });

    // Konsultasi Perkara
    Route::controller(KonsultasiPerkaraController::class)->name('perkara.')->group(function () {
        Route::get('/perkara/index', 'index')->name('index');
        Route::get('/konsultasi-perkara/{caseCode}', 'show')->name('show');
        Route::post('/konsultasi-perkara/{caseCode}/revisi', 'requestRevision')->name('revisi');
        Route::get('/konsultasi-perkara/{caseCode}/seleksi', 'seleksi')->name('seleksi');
        Route::post('/konsultasi-perkara/{caseCode}/tugaskan', 'assignLawyer')->name('tugaskan');
    });

    // Data Advokat
    Route::prefix('advokat')->name('advokat.')->controller(DataAdvokatController::class)->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // Data Role
    Route::prefix('role')->name('role.')->controller(DataRoleController::class)->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::put('/{roleCode}', 'update')->name('update');
        Route::delete('/{roleCode}', 'destroy')->name('destroy');
    });

    // Data Klien
    Route::prefix('klien')->name('klien.')->controller(DataKlienController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/daftar', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::patch('/{id}/role', 'updateRole')->name('updateRole');
    });

    // Data Layanan
    Route::prefix('layanan')->name('layanan.')->controller(DataLayananController::class)->group(function () {
        Route::get('/index', 'index')->name('index');

        Route::post('/practicing-area', 'storePracticingArea')->name('pa.store');
        Route::put('/practicing-area/{id}', 'updatePracticingArea')->name('pa.update');
        Route::delete('/practicing-area/{id}', 'destroyPracticingArea')->name('pa.destroy');

        Route::post('/legal-service', 'storeLegalService')->name('ls.store');
        Route::put('/legal-service/{id}', 'updateLegalService')->name('ls.update');
        Route::delete('/legal-service/{id}', 'destroyLegalService')->name('ls.destroy');
    });

    // Data Artikel
    Route::prefix('artikel')->name('artikel.')->controller(DataArtikelController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/tambah', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // Data FAQ (RESTful murni -> cukup 1 baris)
    Route::resource('faq', DataFaqController::class)->only(['index', 'store', 'update', 'destroy']);

    // Pusat Referensi
    Route::controller(AdminPusatReferensiController::class)->name('referensi.')->group(function () {
        Route::get('/referensi/index', 'index')->name('index');
        Route::post('/pusat-referensi', 'store')->name('store');
        Route::put('/pusat-referensi/{id}', 'update')->name('update');
        Route::delete('/pusat-referensi/{id}', 'destroy')->name('destroy');
    });
});