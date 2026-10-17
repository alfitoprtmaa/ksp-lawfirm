<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Customer Routes
Route::get('/customer/index', function () {
    return view('customer.index');
})->name('customer.index');

Route::get('/customer/tracking/index', function () {
    return view('customer.tracking.index');
})->name('customer.tracking.index');

Route::get('/customer/buatkonsultasi/index', function () {
    return view('customer.buatkonsultasi.index');
})->name('customer.buatkonsultasi.index');

// Admin Routes
Route::get('/admin/login', function () {
    return view('admin.login');
});

Route::get('/admin/dashboard/index', function () {
    return view('admin.dashboard.index');
})->name('admin.dashboard.index');

Route::get('/admin/artikel/index', function () {
    return view('admin.artikel.index');
})->name('admin.artikel.index');
