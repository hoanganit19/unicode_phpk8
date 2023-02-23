<?php

//Các cấp độ errors

/*
1. notice
2. warning
3. Errors
*/


// $arr = [];
// echo $arr[0];

//echo $a //Lỗi cú pháp => Vô phương cứu chữa
//echo a(); //Lỗi biên dịch



//Xử lý ngoại lệ
try {
    echo a();
    //echo $a;
} catch(Error $e) {
    echo $e->getMessage();
}

echo '<h2>Unicode Academy</h2>';
