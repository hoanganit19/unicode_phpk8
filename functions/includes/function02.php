<?php

function getMessage()
{
    //biến nằm bên ngoài hàm => biến toàn cục
    //Muốn sử dụng biến toàn cục trong hàm => khai báo global $tenbien
    //Biến toàn cục => Đặt trước khi gọi hàm
    //Nếu thay đổi giá trị biến toàn cục trong hàm => Giá trị sẽ được lưu vào toàn cục => hàm khác sử dụng theo giá trị mới

    global $msg;

    return $msg;
}

function setMessage($value)
{
    global $msg;

    $msg = $value;
}

function updateContent(&$result, $newContent)
{
    $result.= $newContent;
}

function getC()
{
    return 'C';
}

function getTotal(&$total, ...$args)
{
    //$args sẽ trả về 1 array
    //rest parameters sẽ phải đặt ở cuối cùng

    foreach ($args as $arg) {
        $total += $arg;
    }
}

//Không thể tạo 2 hàm trùng tên nhau => kiểm tra bằng function_exists
if (!function_exists('getTotal')) {
    function getTotal()
    {
        return 1;
    }
}