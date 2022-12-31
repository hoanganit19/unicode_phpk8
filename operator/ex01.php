<?php 
/*
Toán tử và biểu thức

- Toán tử số học: +, -, *, /, % (Số phần dư), ** (Lũy thừa), ++ (phép tăng), -- (phép giảm)
*/

$a = 10;
$b = 2;
$result = $a ** $b; //a = cơ số, b = số mũ
echo 'Lũy thừa: '.$result.'<br/>';

$count = 0;
//$count++; //count = count+1
//++$count;
//$count--;
//--$count;

/*
Phân biệt count++ và ++count
- Nếu không gắn với biểu thức => 2 cách giống nhau
- Nếu gắn với biểu thức
+ count++ => Thực hiện biểu thức trước, sau đó tăng biến đếm
+ ++count => Tăng biến đếm trước, thực hiện biểu thức
*/

$total = 1 + 2 + $count++;

// echo 'Count: '.$count.'<br/>';
// echo 'Total: '.$total.'<br/>';

$count = 0;
echo 'Count: '.++$count.'<br/>';

/*
Toán tử gán (=)
Cú pháp: tenbien = giá trị

tenbien += giá trị
tenbien -= giá trị
tenbien *= giá trị
tenbien /= giá trị
tenbien %= giá trị
tenbien .= giá trị

*/

$a = 1;
//$a = $a + 10;
$a += 10; //a = a + 10;
echo 'a = '.$a.'<br/>';

$str = 'Unicode Academy';
$str .= 'Khóa học php';

echo $str.'<br/>';