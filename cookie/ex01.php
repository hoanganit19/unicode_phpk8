<?php

//echo time(); //trả về timestamp tính tới thời điểm hiện tại
//setcookie('email', 'hoangan.web@gmail.com', time() + 86400, '/');

$customers = [
    'name' => 'John Doe',
    'email' => 'john.doe@gmail.com',
];


//setcookie('customers', json_encode($customers), time() + 86400, '/');

setcookie('customers', '', time() - 86400, '/');

echo '<pre>';
print_r($_COOKIE);
echo '</pre>';

$customers = $_COOKIE['customers'];
$customers = json_decode($customers, true);
echo '<pre>';
print_r($customers);
echo '</pre>';
