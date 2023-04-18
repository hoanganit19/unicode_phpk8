<?php

use Core\View;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('san-pham/them', [ProductController::class, 'add'])->name('products-get');

Route::post('products/handle-add', [ProductController::class, 'handleAdd'])
->name('products-post');

Route::get('test-1/{id}/{slug}', function ($id, $slug) {
    return 'Test 1 - '.$id.' - '.$slug;
})->name('test-1');
