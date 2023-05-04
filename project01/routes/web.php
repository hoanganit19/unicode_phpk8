<?php

use Core\Route;
use App\Controllers\Auth\LoginController;
use App\Controllers\Admin\DashboardController;

//Auth
Route::get('/auth/login', [LoginController::class, 'getForm'])->name('login');

Route::post('/auth/login', [LoginController::class, 'login']);

//Admin
Route::get('/admin', [DashboardController::class, 'index'])->name('admin.index');

//Clients
Route::get('/', function () {
    return 'Welcome PHPk8';
});
