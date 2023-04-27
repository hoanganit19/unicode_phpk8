<?php

use Core\View;
use Core\Route;
use Core\Request;
use Core\Database\DB;
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

Route::get('/test-database', function () {
    // $db = new DB();
    // $user = $db->get('SELECT * FROM users');
    // // $user = DB::get('SELECT * FROM users');
    // echo '<pre>';
    // print_r($user);
    // echo '</pre>';
});