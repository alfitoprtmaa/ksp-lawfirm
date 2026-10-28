<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Customer Routes
Route::get('/customer/login/signin', function () {
    return view('customer.login.signin');
})->name('customer.login.signin');

Route::get('/customer/login/signup', function () {
    return view('customer.login.signup');
})->name('customer.login.signup');

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

Route::get('/admin/customer/index', function () {
    return view('admin.customer.index');
})->name('admin.customer.index');

Route::get('/admin/lawyer/index', function () {
    return view('admin.lawyer.index');
})->name('admin.lawyer.index');

Route::get('/admin/artikel/index', function () {
    return view('admin.artikel.index');
})->name('admin.artikel.index');
