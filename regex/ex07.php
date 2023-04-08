<?php
/*
Kiểm tra độ mạnh yếu mật khẩu

- Độ dài >=8
- Có ít nhất 2 chữ hoa
- Có ít nhất 2 chữ thường
- Có ít nhất 2 chữ số
- Có ít nhất 1 ký tự đặc biệt: !@#$%^&*()

Ý tưởng:
- Không theo thứ tự
- Sử dụng look around (?=)
*/

$pattern = '/^(?=.*[A-Z].*[A-Z].*)(?=.*[a-z].*[a-z].*)(?=.*\d.*\d.*)(?=.*[!@#$%^&*()].*).{8,}$/';

$password = 'UNb@1236456';

if (preg_match($pattern, $password)) {
    echo 'Mật khẩu mạnh';
} else {
    echo 'Mật khẩu yếu';
}
