<?php

require_once 'includes/function03.php';

echo $getName('Hoàng An Unicode');

echo '<br/>';

echo $getAge();

echo '<br/>';

echo $getTotal();

echo '<br/>';

//Thực thi 1 hàm với các tham số động

//loadModule('home');

loadModule('product', [10]);