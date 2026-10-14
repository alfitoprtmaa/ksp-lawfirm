<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/login', function () {
    return view('admin.login');
});

Route::get('/admin/dashboard/index', function () {
    return view('admin.dashboard.index');
})->name('admin.dashboard.index');

Route::get('/admin/artikel/index', function () {
    return view('admin.artikel.index');
})->name('admin.artikel.index');
