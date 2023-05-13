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

Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');

Route::get('/admin/users/add', [UserController::class, 'add'])->name('admin.users.add');

Route::post('/admin/users/add', [UserController::class, 'handleAdd']);

Route::get('/admin/users/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');

Route::post('/admin/users/edit/{id}', [UserController::class, 'handleEdit']);

Route::post('/admin/users/delete/{id}', [UserController::class, 'delete'])->name('admin.users.delete');

Route::post('/admin/users/deletes', [UserController::class, 'deletes'])->name('admin.users.deletes');

//Clients
Route::get('/', function () {
    return 'Welcome PHPk8';
});
