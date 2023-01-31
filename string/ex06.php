<?php

//Kiểm tra độ mạnh yếu của mật khẩu
/*
- Chứa ít nhất 1 chữ HOA
- Chứa ít nhất 1 chữ thường
- Chứa ít nhất 1 chữ số
- Chứa ít nhất 1 ký tự đặc biệt
- Độ dài >=6
*/

$password = 'Hoangan@123';

/*
Ý tưởng:
- Đặt 5 lá cờ tương ứng với 5 điều kiện
- Kiểm tra từng điều kiện => gắn vào lá cờ
- Kiểm tra 5 lá cờ
+ 5 lá cờ thỏa mãn => mật khẩu mạnh
+ 1 trong 5 lá cờ không thỏa mãn => Mật khẩu yếu
*/

$checkLength = false;
$checkUpper = false;
$checkLower = false;
$checkNumber = false;
$checkSymbol = false;

if (mb_strlen($password, 'UTF-8') >= 6) {
    $checkLength = true;

    //Định nghĩa các số
    $number = '0123456789'; //Coi là 1 chuỗi

    //Đọc từng ký tự của mật khẩu
    for ($i = 0; $i < mb_strlen($password, 'UTF-8'); $i++) {
        $char = mb_substr($password, $i, 1, 'UTF-8');

        //Kiểm tra số

        if (mb_strpos($number, $char, 0, 'UTF-8')!==false) {
            $checkNumber = true;
        }
        /*
        Lý do không thể so sánh >=0
        - Hàm mb_strpos() trả về false khi không tìm thấy
        - false chính falsy của 0

        Lý do không thể so sánh > 0
        - Chỉ đúng khi số không ở vị trí đầu tiên

        Lý do không thể so sánh !=false
        - Nếu tìm thấy số ở vị trí đầu tiền => Kết quả mb_strpos() bằng 0 => falsy trả về false
        - Nếu so sánh tuyệt đối => Check cả kiểu dữ liệu
        */

        //Định nghĩa ký tự đặc biệt
        $symbols = '!@#$%^&*()';

        //Kiểm tra ký tự đặc biệt

        if (mb_strpos($symbols, $char, 0, 'UTF-8')!==false) {
            $checkSymbol = true;
        }

        //Kiểm tra chữ hoa
        if ($char>='A' && $char<='Z') {
            $checkUpper = true;
        }

        //Kiểm tra chữ thường
        if ($char>='a' && $char<='z') {
            $checkLower = true;
        }
    }
}

if ($checkLength && $checkSymbol && $checkUpper && $checkLower && $checkNumber) {
    echo 'Mật khẩu mạnh';
} else {
    echo 'Mật khẩu yếu';
}