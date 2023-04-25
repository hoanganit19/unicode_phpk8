<?php

use Core\View;
use Core\Route;
use Core\Request;
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

Route::get('san-pham', [ProductController::class, 'index']);

Route::get('products/add', [ProductController::class, 'add'])->name('products-get');

Route::get('san-pham/sua/{id}/{slug}', [ProductController::class, 'edit']);

Route::post('products/handle-add', [ProductController::class, 'handleAdd'])
->name('products-post');

Route::get('/test/{id}', function ($id, Request $request) {
    echo $request->keyword.'<br/>';
    echo $id.'<br/>';
    return 'test';
});