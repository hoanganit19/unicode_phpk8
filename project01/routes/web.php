<?php

use Core\View;
use Core\Route;
use App\Controllers\Admin\PageController;
use App\Controllers\Admin\UserController;
use App\Controllers\Auth\LoginController;
use App\Controllers\Clients\HomeController;
use App\Controllers\Clients\PostController;
use App\Controllers\Admin\CategoryController;
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

//Users
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');

Route::get('/admin/users/add', [UserController::class, 'add'])->name('admin.users.add');

Route::post('/admin/users/add', [UserController::class, 'handleAdd']);

Route::get('/admin/users/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');

Route::post('/admin/users/edit/{id}', [UserController::class, 'handleEdit']);

Route::post('/admin/users/delete/{id}', [UserController::class, 'delete'])->name('admin.users.delete');

Route::post('/admin/users/deletes', [UserController::class, 'deletes'])->name('admin.users.deletes');

//Page
Route::get('/admin/pages', [PageController::class, 'index'])->name('admin.pages.index');

Route::get('/admin/pages/add', [PageController::class, 'add'])->name('admin.pages.add');

Route::post('/admin/pages/add', [PageController::class, 'handleAdd']);

Route::get('/admin/pages/edit/{id}', [PageController::class, 'edit'])->name('admin.pages.edit');

Route::post('/admin/pages/edit/{id}', [PageController::class, 'handleEdit']);

Route::post('/admin/pages/delete/{id}', [PageController::class, 'delete'])->name('admin.pages.delete');

Route::post('/admin/pages/deletes', [PageController::class, 'deletes'])->name('admin.pages.deletes');

//Categories
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');

Route::get('/admin/categories/add', [CategoryController::class, 'add'])->name('admin.categories.add');

Route::post('/admin/categories/add', [CategoryController::class, 'handleAdd']);

Route::get('/admin/categories/edit/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');

Route::post('/admin/categories/edit/{id}', [CategoryController::class, 'handleEdit']);

Route::post('/admin/categories/delete/{id}', [CategoryController::class, 'delete'])->name('admin.categories.delete');

Route::post('/admin/categories/deletes', [CategoryController::class, 'deletes'])->name('admin.categories.deletes');

//Posts
Route::get('/admin/posts', [PostController::class, 'index'])->name('admin.posts.index');

Route::get('/admin/posts/add', [PostController::class, 'add'])->name('admin.posts.add');

Route::post('/admin/posts/add', [PostController::class, 'handleAdd']);

Route::get('/admin/posts/edit/{id}', [PostController::class, 'edit'])->name('admin.posts.edit');

Route::post('/admin/posts/edit/{id}', [PostController::class, 'handleEdit']);

Route::post('/admin/posts/delete/{id}', [PostController::class, 'delete'])->name('admin.posts.delete');

Route::post('/admin/posts/deletes', [PostController::class, 'deletes'])->name('admin.posts.deletes');

//Clients
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/{slug}.html', function ($slug) {
    return 'Trang = '.$slug;
})->name('page');

Route::get('/chuyen-muc/{slug}.html', function ($slug) {
    return 'Chuyên mục = '.$slug;
})->name('categories');

Route::get('/bai-viet/{slug}.html', [PostController::class, 'detail'])->name('posts');
