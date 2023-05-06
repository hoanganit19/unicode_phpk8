<?php

use Core\View;
use Core\Route;
use App\Controllers\Auth\LoginController;
use App\Controllers\Admin\DashboardController;

//Auth
Route::get('/auth/login', [LoginController::class, 'getForm'])->name('login');

Route::post('/auth/login', [LoginController::class, 'login']);

Route::get('/auth/logout', [LoginController::class, 'logout'])->name('logout');

//Admin
Route::get('/admin', [DashboardController::class, 'index'])->name('admin.index');

//Clients
Route::get('/', function () {
    return 'Welcome PHPk8';
});
