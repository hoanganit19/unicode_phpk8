<?php

//Đảo chữ đầu tiên và chữ cuối cùng cho nhau
//=>PHP đào tạo lập trình Unicode
//Lưu ý: Không được sử dụng phương pháp thay thế
/*
Ý tưởng:
- Lấy chữ đầu tiên
- Lấy chữ cuối cùng
- Lấy chữ ở giữa
- Nối 3 phần: chữ cuối + chữ giữa + chữ đầu
*/

$str = 'Unicode đào tạo PHP lập trình PHP';

$firstPos = mb_strpos($str, ' ', 0, 'UTF-8'); //lấy vị trí dấu cách đầu tiên
$firstWord = mb_substr($str, 0, $firstPos, 'UTF-8'); //lấy chữ đầu tiên

$lastPos = mb_strripos($str, ' ', 0, 'UTF-8')+1; //lấy vị trí dấu cách cuối cùng (Cộng thêm 1 để loại bỏ dấu cách)
$lastWord = mb_substr($str, $lastPos, null, 'UTF-8'); //Lấy chữ cuối cùng

$middleWord = mb_substr($str, $firstPos, $lastPos-$firstPos, 'UTF-8'); //Lấy nội ở giữ

$str = $lastWord.$middleWord.$firstWord; //Nối chuỗi

echo $str;