<?php
/*
giả sử bài toán
- Cần tính tổng của 100 số khác nhau
- Cần tạo 100 biến có kiểu số

Nếu dùng mảng
- Tạo 1 biến mảng có 100 phần tử

=> Mảng:
- Kiểu dữ liệu phức hợp
- Bao gồm các phần tử với các kiểu dữ liệu khác nhau (string, number, boolean, null, array, object,...)
- Để truy cập đến các element => Cần có địa chỉ (key)
+ Chỉ số (index): Số
+ Chuỗi (associative)

Nếu khai báo mảng hoặc thêm phần tử vào mảng mà không khai báo key => Mặc định là index

Mảng chỉ có key là index theo thứ tự tăng dần => Mảng tuần tự
Ngược lại => Mảng hỗ hợp

Mảng chỉ có các phần tử đơn: number, string, null, boolean => Mảng 1 chuỗi

Mảng có các phần tử là array => Mảng đa chiều

*/

//Khai báo mảng
$customers = []; //Khai báo mảng rỗng

// $customers = [
//     'An',
//     'Anh',
//     'Đạt',
//     'Tùng'
// ];

// $customers = [
//     'An',
//     'age' => 30,
//     10 => 'Đạt',
//     'name' => 'Tùng',
//     'Quân'
// ];

//Thêm phần tử vào mảng
$customers[] = 'Hoàng An'; //index tự tăng
$customers['name'] = 'Văn Quân';
$customers[10] = 'Đạt';
$customers[] = 'Tuấn';
$customers['age'] = 30;

//Cập nhật phần tử mảng (Xác định được key của mảng)
$customers['name'] = 'Nguyễn Văn Quân';
$customers['address'] = 'Hà Nội'; //không tồn tại sẽ thêm mới

//Xóa phần tử mảng (Xác định được key của mảng)
unset($customers['age']);

echo '<pre>';
print_r($customers);
echo '</pre>';

//Duyệt mảng (Đọc mảng)

//1. Xác định được key của mảng => Dùng cú pháp: $tenbienmang[key]

//2. Duyệt tất cả mảng dựa vào vòng lặp

//Chỉ lấy element
foreach ($customers as $customer) {
    echo $customer.'<br/>';
}

//Lấy element và key
foreach ($customers as $key => $customer) {
    echo $key.' => '.$customer.'<br/>';
}

/*
Lưu ý: Với mảng tuần tự => Có thể dùng vòng lặp for để duyệt
*/

$users = [
    'An',
    'Quân',
    'Đạt',
    'Tuấn'
];

echo '<pre>';
print_r($users);
echo '</pre>';

for ($i = 0; $i<count($users); $i++) {
    echo $users[$i].'<br/>';
}