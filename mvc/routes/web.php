<?php

use Core\Route;
use App\Controllers\HomeController;
use App\Controllers\ProductController;

// Route::get('/', function () {
//     return 'Xin chào Unicode Academy';
// });

// Route::get('/san-pham', function () {
//     return 'Danh sách sản phẩm';
// });

// Route::post('/san-pham', function () {
//     return 'Thêm sản phẩm';
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/bao-cao', [HomeController::class, 'report']);

Route::get('/san-pham/sua/{id}/{slug}', [ProductController::class, 'edit']);
