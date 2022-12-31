<?php
$age = 29;

echo '<h2>Chương trình bắt đầu</h2>';

if ($age >= 30){
    echo '<h2>Tuổi hợp lệ</h2>';
}else{
    echo '<h2>Tuổi không hợp lệ</h2>';
}

echo '<h2>Chương trình kết thúc</h2>';

/*
Nếu không có ngoặc nhọn sau mệnh đề if => Chương trình chỉ chạy 1 câu lệnh

1. Câu lệnh if thiếu (Chỉ có trường hợp đúng)

2. Câu lệnh if else đầy đủ (Có 2 trường hợp đúng sai)

3. Câu lệnh if elseif (Áp dụng cho trường hợp > 2 nhánh)

4. Câu lệnh if else lồng nhau 

*/

$number = 100;
/*
Yêu cầu: 
- Nếu number < 0 => Số âm
- Nếu number >=0 và number < 5 => Số siêu nhỏ
- Nếu number >=5 và number < 10 => Số nhỏ
- Nếu number >= 10 và number < 15 => Số trung bình
- Nếu number >=15 và number < 20 => Số lớn
- Nếu number >= 20 => Số siêu lớn
*/

if ($number < 0){
    echo 'Số âm';
}elseif ($number >= 0 && $number < 5){
    echo 'Số siêu nhỏ';
}elseif ($number>=5 && $number<10){
    echo 'Số nhỏ';
}elseif ($number>=10 && $number < 15){
    echo 'Số trung bình';
}elseif ($number>=15 && $number<20){
    echo 'Số lớn';
}else{
    echo 'Số siêu lớn';
}

echo '<br/>';

/*
Bài toán: Cho email và password => Hiển thị thông báo yêu cầu phải nhập email, password
*/

$email = 'a';
$password = '';

if ($email=='' || $password==''){
    if ($email==''){
        echo 'Vui lòng nhập email';
    }else{
        echo 'Vui lòng nhập password';
    }
}else{
    echo 'Thông tin hợp lệ';
}

echo '<hr/>';

/*
Cú pháp viết tắt: if ($tenbien) ~ if ($tenbien == true)
*/

//Truthy và Falsy

$number = 1;

//Kiểm tra nếu $number != 0 => Hiển thị hợp lệ

if ($number){
    echo 'Hợp lệ';
}else{
    echo 'Không hợp lệ';
}

/*
Truthy => Nếu các kiểu dữ liệu khác khi chuyển về boolean mang giá trị true

Falsy => Nếu các kiểu dữ liệu khác khi chuyển về boolean mang giá trị false
- ""
- 0
- null
- []
*/

echo '<br/>';
//Kiểm tra sự tồn tại của biến 
$fullname = 'Hoàng An';
if (isset($fullname) && $fullname){
    echo $fullname;
}

/*
Hàm isset() sẽ kiểm tra biến tồn tại hay không?
- Nếu tồn tại => Trả về true
- Nếu không tồn tại => Trả về false

Lưu ý: 
- Hàm isset() không kiểm tra giá trị mà chỉ kiểm tra sự tồn tại của biến
- Hàm isset() sẽ không kiểm tra được biến có giá trị null
*/

echo '<br/>';
$a = null;
if (isset($a)){
    echo 'Tồn tại';
}

echo '<br/>';

//Hàm empty()

/*
- Kiểm tra sự tồn tại và giá trị của biến 
- Hàm empty() trả về giá trị true nếu: biến không tồn tại hoặc biến mang giá trị trong các trường hợp sau
+ 0
+ ''
+ null
+ [] => mảng rỗng
+ false

=> Nếu muốn kiểm tra biến tồn tại và có dữ liệu => Sử dụng !empty()
*/

$b = 1;
if (!empty($b)){
   // echo 'Empty hợp lệ';
   echo 'Biến tồn tại và có dữ liệu';
}else{
    //echo 'Empty không hợp lệ';
    echo 'Biến không tồn tại hoặc không có dữ liệu';
}

/*
Tổng kết: 
- Trong tình huống cần kiểm tra biến tồn tại và có dữ liệu => dùng !empty()
- trong tình huống chỉ cần kiểm tra biến tồn tại => dùng isset()
*/

// $status = 0;
// if (isset($status)){
    
// }