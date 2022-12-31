<?php 
//Kiểu số nguyên => Không có phần thập phân
$number = 1; //Số nguyên
$check = is_int($number);

var_dump($check);
echo '<br/>';

//Số thực => Số có phần thập phân (Dấu chấm .)
$number = 1.5;
$check = is_float($number);
var_dump($check);
echo '<br/>';

//=> Kiểm tra 1 biến có phải là số hay không?
$number = '0';
$check = is_numeric($number); //Ép các chuỗi số về dạng number
var_dump($check);

/*
Bài toán xử lý number
- Ép kiểu dữ liệu về dạng số
- Chuyển đổi định dạng
- Phép toán: =, - , *, /, % (Lấy phần dư),..
*/
echo '<br/>';
//Kiểu chuỗi (string) => Tất cả các ký tự đặt trong dấu nháy đơn hoặc nháy kép
$customer = 'Tạ Hoàng An'; 
$check = is_string($customer); //Kiểm tra biến có phải là chuỗi hay không?
var_dump($check);

/*
Các bài toán xử lý chuỗi => Chuyên đề riêng về xử lý chuỗi
*/

echo '<br/>';

//Kiểu boolean (Logic, true false) => Chỉ có 2 giá trị: true hoặc false

$isLarge = false;

$check = is_bool($isLarge); //trả về kiểu boolean

var_dump($check);

/*
Khi áp dụng vào biểu thức logic => PHP sẽ tự động ép các kiểu dữ liệu khác về boolean
- 0, "", null => Về false
- Các trường hợp còn lại => true

=> Làm rõ trong câu lệnh rẽ nhánh (if else, swich case)
*/

echo '<br/>';

//Kiểu null => Được sử dụng để giả định giá trị ban đầu cho biến

$total = null;
var_dump(is_null($total));

echo '<br/>';

/*
Không chiếm ô nhớ => Gán giá trị ban đầu
*/

//Kiểu mảng
$customer = [
    'Nguyễn Văn A',
    'Nguyễn Văn B',
    'Nguyễn Văn C'
];

$check = is_array($customer); //Kiểm tra biến thuộc kiểu mảng
var_dump($check);

echo '<br/>';

//Kiểu object => Chia sẻ ở phần lập trình hướng đối tượng
$customer = new stdClass();
$customer->name = 'Hoàng An';
$check = is_object($customer); //Kiểm tra biến thuộc kiểu object
var_dump($check);
echo '<br/>';

//Kiểu resource
$file = fopen('data.txt', 'w');
$check = is_resource($file);
var_dump($check);

//Kiểu callable (callback) => Chia sẻ ở phần php nâng cao

//=> Mỗi kiểu dữ liệu sẽ có chuyên đề (Trừ number, boolean, null)

/*
- Xử lý chuỗi
- Xử lý mảng
- Lập trình hướng đối tượng (OOP)
- Callback, Closure
*/