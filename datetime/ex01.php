<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');
echo date_default_timezone_get(); //Lấy timezone mặc định của Server
echo '<br/>';
echo time(); //Trả về timestamp của thời điểm hiện tại
echo '<br/>';
echo date('d/m/Y H:i:s'); //Trả về thời gian theo định dạng
echo '<br/>';

$time = '2023-02-16 21:30:00';

//Convert thành dạng d/m/Y H:i:s

$dateObj = date_create($time); //Y-m-d H:i:s (Tháng đứng trước ngày)

echo date_format($dateObj, 'd/m/Y H:i:s');
echo '<br/>';

echo '=====<br/>';

$time = '2023/16/02 21:30:00';
$dateObj = date_create_from_format('Y/d/m H:i:s', $time);
//var_dump($dateObj);
echo date_format($dateObj, 'd/m/Y H:i:s');

echo '<br/>';

$time = '2023-02-15 00:30:30';

//Chuyển thành timestamp

echo strtotime($time).'<br/>';

echo date('d/m/Y H:i:s', strtotime($time)).'<br/>';

//Giả sử có 1 mốc thời gian => Lấy thời gian 5 ngày sau

echo date('d/m/Y H:i:s', strtotime($time.' - 1 year')).'<br/>';
