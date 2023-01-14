<?php

//Khái niệm chuỗi => Bao gồm các ký tự được đặt trong dấu nháy đơn hoặc nháy kép
//Một số trường hợp lấy dữ liệu động: form, database
//Nguyên tắc với chuỗi: Ký tự escape (\)
//Chuỗi là 1 mảng => Mỗi phần tử mảng là 1 ký tự => Lấy từng ký tự của chuỗi bằng cú pháp mảng:
//$tenbienchuoi[$index]

$fullname = 'Hoàng An Unicode';

$age = 30;

//$age = (string)$age;
$age = $age.'';

var_dump($age);

echo '<br/>';

$fullname = 'Nguyễn Văn Quân';

echo "Ký tự thứ 0 = ".$fullname[0].'<br/>';
echo "Ký tự thứ 1 = ".$fullname[1].'<br/>';
echo "Ký tự thứ 2 = ".$fullname[2].'<br/>';
echo "Ký tự thứ 3 = ".$fullname[3].'<br/>';
echo "Ký tự thứ 4 = ".$fullname[4].'<br/>';

//Giải pháp đọc và xử lý tiếng việt có dấu => mbstring extension (Sử dụng được các hàm xử lý chuỗi có tiền tố mb_)