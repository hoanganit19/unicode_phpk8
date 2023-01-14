<?php

//Các hàm xử lý chuỗi

/*
Lưu ý: Các hàm xử lý chuỗi chỉ hỗ trợ 1 phần trong các bài xử lý chuỗi
*/

//$str = 'Khóa học \ PHP tại "Unicode"';
$str = '<img src="https://picsum.photos/200" />';

//$str = addcslashes($str, 'PU'); //Thêm ký tự escape(\)

$str = addslashes($str); //Thêm ký tự escape(\) vào trước dấu nháy đơn, nháy kép và \

/*
SQL: SELECT * FROM users WHERE email="hoangan.web@gmail.com" AND password="123456";
=> SQL Injection
*/

//Loại bỏ ký tự escape (đã được thêm bằng hàm addslashes())
$str = stripslashes($str);

$fullname = 'Tạ Hoàng An';

/*
- Đếm trong biến $fullname có bao nhiêu chữ
- Lấy tên
- Xóa tên
*/

$fullnameArr = explode(' ', $fullname); //Chuyển chuỗi thành mảng

//echo count($fullnameArr).'<br/>';
//echo end($fullnameArr).'<br/>';
array_push($fullnameArr, 'Văn');

//Chuyển mảng thành chuỗi
$fullname = implode(' ', $fullnameArr);

// echo $fullname;

/*
Ví dụ: Up ảnh lên facebook => Rename tên ảnh: hashcode_facebook.jpg
*/

$filename = 'anh 01.jpg';

//Lấy phần mở rộng của ảnh (đuôi)
$filenameArr = explode('.', $filename);
$fileExt = end($filenameArr);

$filename = uniqid(). '_facebook.'. $fileExt;

//echo $filename.'<br/>';

$str = 'Tạ Hoàng An';
//$length = strlen($str); //Chỉ đếm nếu chuỗi không phải tiếng việt có dấu
$length = mb_strlen($str, 'UTF-8');

//echo 'Độ dài: '.$length;

// echo str_repeat($str, 5);

//$str = str_replace('An', 'Hoàng', $str);

$path = 'phpk8\string\ex.php'; //=> phpk8/string/ex.php

$path = str_replace('\\', '/', $path);

//echo $path.'<br/>';

$password = '123456';

//$password = md5($password); //Không thể dịch ngược lại được
//$password = sha1($password);

/*
- Dùng để mã hóa mật khẩu
- Dùng tạo các mã ngẫu nhiên ít trùng lặp (token)
*/

$uniqueId = uniqid('unicode_', true); //Tạo chuỗi ngẫu nhiên
//echo $uniqueId;

//Mã hóa 2 chiều: encode, decode

$str = 'Tạ Hoàng An';
$strEnCode = base64_encode($str);
$str = base64_decode($strEnCode);

/*
Một số trường hợp đặc biệt của mã hóa 2 chiều
- mã hóa url (urlencode, urldecode)
- json (jdon_encode, json_decode)
*/

$keyword = 'ta hoang an';
$keyword = urlencode($keyword);
$url = 'https://unicode.vn/?keyword='.urlencode($keyword);
//echo $url;

//echo urldecode($keyword);

$arr = [
    'name' => 'Hoàng An',
    'age' => 30
];

$json = json_encode($arr); //Chuyển thành chuỗi json

$arr = json_decode($json, true);

// print_r($arr);