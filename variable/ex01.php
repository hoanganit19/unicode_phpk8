<?php
$a = '<h1>Khóa học PHP Online</h1>'; //Câu lệnh hiển thị nội dung ra trình duyệt

/*
Đây là comment nhiều dòng
Chúng ta chuẩn bị học về biến (variable)
*/

//Nối thêm chuỗi vào biến $a
$a.='<h2>Unicode Academy</h2>';

echo '<p>Khóa học PHP</p>';
echo '<p>Khóa học PHP</p>';
echo $a;
echo '<p>Khóa học PHP</p>';
echo '<p>Khóa học PHP</p>';

$customerName = 'Tạ Hoàng An';
$customerPhone = '0388875179';
$userId = 1; $userName = 'hoangan.web@gmail.com'; $userEmail = 'contact@unicode.vn';
echo $customerName.'<br/>';
echo $customerPhone.'<br/>';
echo $userId.'<br/>';

$isEmpty = false; //boolean
$total = 0; //number
$hasProducts = null; //null
$html = ""; //string

echo('<h3>Tôi là Tạ Hoàng An</h3>'); //hàm
echo $userEmail; //câu lệnh, từ khóa