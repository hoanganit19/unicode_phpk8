<?php

use Core\View;
use Core\Route;
use App\Controllers\Admin\UserController;
use App\Controllers\Auth\LoginController;
use App\Controllers\Admin\DashboardController;

//Auth
Route::get('/auth/login', [LoginController::class, 'getForm'])->name('login');

Route::post('/auth/login', [LoginController::class, 'login']);

Route::get('/auth/logout', [LoginController::class, 'logout'])->name('logout');

//Admin
Route::get('/admin', [DashboardController::class, 'index'])->name('admin.index');

Route::get('/admin/profile', [UserController::class, 'profile'])->name('admin.user.profile');

Route::post('/admin/profile', [UserController::class, 'handleProfile']);

Route::get('/admin/change-password', [UserController::class, 'changePassword'])->name('admin.user.password');

Route::post('/admin/change-password', [UserController::class, 'handleChangePassword']);


//Clients
Route::get('/', function () {
    return 'Welcome PHPk8';
});
