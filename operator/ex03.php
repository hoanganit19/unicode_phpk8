<?php 
/*
Toán tử 3 ngôi
Cú pháp: bieuthuclogic ? ket qua dung: ket qua sai
*/
$age = 29;
echo $age >= 30 ? 'Đủ tuổi': false;
echo '<br/>';

$result = $age >= 30 ? 'Đủ tuổi': 'Không đủ tuổi';

echo $result;

/*
Lưu ý: 
- Toán tử 3 ngôi phải gắn với biểu thức 
- Cú pháp phải đầy đủ, nếu không muốn hiển thị kết quả sai, gán bằng các giá trị: '', false, null
*/

echo '<br/>';

//Cú pháp thay thế của toán tử 3 ngôi

$age = 10;
// $result = $age ?? 0; //$result = $age!=null ? $age: 0

// var_dump($result);

echo $age ?? 0; //echo $age != null ? $age: 0