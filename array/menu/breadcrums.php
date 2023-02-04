<?php

require_once 'functions.php';

$categories = [
   [
    'id' => 1,
    'name' => 'Điện thoại',
    'parent' => 0,
   ],

   [
    'id' => 2,
    'name' => 'Máy tính',
    'parent' => 0,
   ],

   [
    'id' => 3,
    'name' => 'Đồ gia dụng',
    'parent' => 0,
   ],

   [
    'id' => 4,
    'name' => 'Apple',
    'parent' => 1,
   ],

   [
    'id' => 5,
    'name' => 'Samsung',
    'parent' => 1,
   ],

   [
    'id' => 6,
    'name' => 'Iphone',
    'parent' => 4,
   ],

   [
    'id' => 7,
    'name' => 'Note',
    'parent' => 5,
   ],
   [
    'id' => 8,
    'name' => 'Macbook',
    'parent' => 2,
   ],

   [
    'id' => 9,
    'name' => 'Macbook Pro',
    'parent' => 8,
   ],

   [
    'id' => 10,
    'name' => 'Macbook Air',
    'parent' => 8,
   ],
   [
    'id' => 11,
    'name' => 'Iphone 14',
    'parent' => 6,
   ],
];

$categoryId = 11;

$breadcums = buildBreadcrums($categories, $categoryId);

if (!empty($breadcums)) {
    echo '<ul style="list-style: none; display: flex; gap: 5px;">';
    foreach ($breadcums as $item) {
        echo '<li><a href="#">'.$item['name'].'</a></li>';
    }

    echo '</ul>';
}

///may-giat/may-giat-samsung-inverter-9-kg-ww90t634dln-sv

/*
Đệ quy ngược thường giải quyết các bài toán
- Breadcrumbs
- Phân cấp url
*/
