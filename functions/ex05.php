<?php

require_once 'includes/function05.php';

//Tính tổng S = 1 + 2 + 3 +...+n => Không được dùng vòng lặp

/*
Đệ quy: Gọi lại hàm đang định nghĩa theo 1 quy luật nào đó

Ứng dụng: Giải quyết các bài toán đa cấp
- menu đa cấp
- chuyên mục đa cấp
- url đa cấp
- breadcrumbs

Có 2 loại đệ quy
- Đệ quy xuôi
- Đệ quy ngược
*/

// $n = 100;
// $total = getTotal($n);
// echo $total.'<br />';

echo fibonacci(6);