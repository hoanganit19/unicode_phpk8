<?php 
exit('<h1 style="color: red; text-align: center">Website đang bảo trì</h1>');
/*
- break => Dùng cho tất cả vòng lặp
+ Thoát vòng lặp khi vòng lặp chưa chạy xong
+ Đảm bảo tính đúng và hiệu năng của chương trình
- continue => Dùng cho tất cả vòng lặp
- die => Dùng cho file php
- exit => Dùng cho file php
*/


//Ví dụ: Tìm số chẵn nhỏ nhất trong khoảng từ $min đến $max

$min = 1;
$max = 20;

$minEven = null;
for ($i = $min; $i <= $max; $i++){
    if ($i % 2 == 0){
        $minEven = $i;
        break;
    }
}

echo "Số chẵn nhỏ nhất là: ".$minEven.'<br/>';


//Từ khóa continue => Bỏ qua lần lặp và chạy đến lần lặp tiếp theo

for ($i = 1; $i<=10; $i++){
    //Muốn bỏ qua đoạn code nào => Thêm từ khóa continue phía trước nó
    if ($i == 5){
        continue;
    }
 
    echo "Vòng lặp thứ: ".$i.'<br/>';
    echo "Lần lặp thứ: ".$i.'<br/>';
  
}

//Từ khóa die, exit => Dừng chương trình từ vị trí gọi die, exit
//Các cách viết của die, exit
/*
- die, exit
- die(), exit()
- die('Nội dung'), exit('Nội dung')

Tác dụng: 
- Hỗ trợ trong quá trình debug
- Xây dựng chức năng bảo trì website
- Ngăn chặn chạy chương trình khi chuyển hướng
*/