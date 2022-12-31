<?php
//Toán tử so sánh: >, <, >=, <=, == (So sánh bằng theo giá trị), === (So sánh bằng theo giá trị và kiểu dữ liệu), != (So sánh khác theo giá trị), !== (So sánh khác theo giá trị và kiểu dữ liệu)

//Khi áp dụng toán tử so sánh vào biểu => Biểu thức sẽ trả về kiểu dữ liệu boolean

$a = '10';
$check = (int)$a === 10;
var_dump($check);

/*
Cú pháp ép kiểu trong PHP
(tenkieu) tenbien
*/

$a = '10';
$check = (int)$a !== 10;
var_dump($check);

echo '<br/>';

//Toán tử lý luận (kết hợp): &&, ||, ! (and, or, not)
//- && => Chỉ đúng nếu tất cả các biểu thức con đều đúng
// || => Chỉ sai khi tất cả các biểu thức con đều sai
// ! => Trả về kết quả ngược lại

//=> Lưu ý: Nếu biểu thức phức tạp, cần độ ưu tiên => Nhóm các biểu thức con vào cặp ngoặc tròn

$a = 10;
$check = !($a < 10 || $a > 20);

var_dump($check);