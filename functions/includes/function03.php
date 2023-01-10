<?php

//anonymous function => function ẩn danh, không tên
// $getName = function ($name) {
//     return $name;
// };

$getName = fn ($name) => $name; //arrow function

$getAge = fn () => 42;

$a = 10;
$b = 20;

$getTotal = function () use ($a, $b) {
    return $a + $b;
};

function loadModule($module, $args=[])
{
    $path = './modules/'.$module.'.php';
    require_once $path;

    echo call_user_func_array($module, $args);
}

/*
- Không phải module cũng có tham số
- Không biết trước 1 module có bao nhiêu tham số

call_user_func_array => Gọi hàm theo tên và truyền các tham số dạng array
*/