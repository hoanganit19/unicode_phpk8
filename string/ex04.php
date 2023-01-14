<?php

$email = 'hoangan.web@gmail.com';

//Lấy username của email => contact

// $emailAfter = strstr($email, '@');
// $username = str_replace($emailAfter, '', $email);

$position = strpos($email, '@');
$username = substr($email, 0, $position);
//echo $username;

$fullname = 'đặng văn ân'; //Chuyển các ký tự đầu tiên của mỗi chữ thành chữ HOA

function convertUpperByIndex($str, $index)
{
    $char = mb_substr($str, $index, 1, 'UTF-8');
    $charUpper = mb_strtoupper($char, 'UTF-8');

    $str = $charUpper.mb_substr($str, $index+1, null, 'UTF-8');

    return $str;
}

$fullname = convertUpperByIndex($fullname, 0);

for ($index = 0; $index < mb_strlen($fullname, 'UTF-8'); $index++) {
    $char = mb_substr($fullname, $index, 1, 'UTF-8');
    if ($char == ' ') {
        $charNext = mb_substr($fullname, $index+1, 1, 'UTF-8');
        echo $charNext.'<br/>';
        //Hoàn thiện nốt => Đặng Văn Ân
    }
}

echo $fullname;