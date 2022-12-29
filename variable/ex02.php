<?php 
$customerName = 'Hoàng An';

var_dump($customerName);
echo '<br/>';

$check = true;
var_dump($check);

echo '<br/>';

$total = null;
var_dump($total);

echo '<br/>';

//Xem cấu trúc các kiểu dữ liệu phức hợp: 
/*
- Array (Mảng)
- Object (Đối tượng)
- Resource
*/

$customerArr = [
    'name' => 'Hoàng An',
    'age' => 30,
    'check' => true
];

$customerObj = new stdClass();
$customerObj->name = 'Hoàng an';
$customerObj->age = 30;
echo '<pre>';
print_r($customerObj);
echo '</pre>';