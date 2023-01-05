<?php
//Lấy đường dẫn gốc của webserver (htdocs)
echo $_SERVER['DOCUMENT_ROOT'].'<br/>';

//Lấy folder của file đang chạy
echo __DIR__.'<br/>';

//Lấy đường dẫn tới file đang chạy
echo __FILE__.'<br/>';

//Lấy tên file của 1 đường dẫn bất kỳ
echo basename(__FILE__).'<br/>';

// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";

//Lấy folder của file bất kỳ
echo dirname(__DIR__.'/pages/products.php').'<br/>';