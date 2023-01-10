<?php

require 'includes/function02.php';

$msg = 'Chào mừng bạn đến với Unicode Academy';

setMessage('Khóa học PHP');

echo getMessage();

echo '<br/>';

$string = "Unicode Academy";

updateContent($string, 'Đào tạo PHP');

echo $string.'<br/>';

//=> $string là tham biến

//Tham chiếu

$a = 5;
$b = &$a;
$b = 10;

echo $a.'<br/>';
echo $b.'<br/>';

//Trong php có thể chỉ định tham chiếu bằng cách thêm dấu & vào phía trước tên biến cần chỉ định

//Rest Parameters

//Viết hàm tính tổng, mỗi tham số là 1 giá trị
$total = 0;

getTotal($total, 1, 5, 9, 10, 2, 5, 30);

echo $total.'<br/>';

// if (function_exists('makeTotal')) {
//     makeTotal();
// }