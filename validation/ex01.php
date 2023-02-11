<?php

$email = 'hoangan.web';

//Kiểm tra email có hợp lệ hay không?

/*
Cách 1: Xử lý chuỗi thông thường: Dùng vòng lặp kết hợp với các hàm xử lý chuỗi

Cách 2: Dùng Regular Expression (Chưa học)

Cách 3: Dùng thông qua hàm filter_var()
*/

// $check = filter_var($email, FILTER_VALIDATE_EMAIL);

// var_dump($check);

$age = 41;

$check = filter_var($age, FILTER_VALIDATE_INT, ['options' => [
    'min_range' => 30,
    'max_range' => 40
]]);

var_dump($check);