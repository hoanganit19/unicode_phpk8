<?php 
//Bài 1: Tính tổng s = 1 + 2 + 3 + 4 + ... + N

$n = 5;

$s = 0; //Giá trị giả định (ban đầu)
for ($i = $n; $i > 0; $i--){
    $s = $s + $i;
} 

echo "Tổng s = " .$s.'<br/>';

/*
Mô phỏng bài toán tính tổng s = 1 + 2 + 3 + 4 + ... + N
N = 5;
S = 0;

$i = 1 => $s = $s + $i = 0 + 1 = 1
$i = 2 => $s = $s + $i = 1 + 2 = 3
$i = 3 => $s = $s + $i = 3 + 3 = 6
$i = 4 => $s = $s + $i = 6 + 4 = 10
$i = 5 => $s = $s + $i = 10 + 5 = 15

=> Thoát vòng lặp => Kết quả s cuối cùng sẽ là kết quả của bài toán

Lưu ý: Không phải trường hợp nào cũng gán giá trị ban đầu = 0
*/

echo '<br/>';

//Bài 2: Tính N!

//Công thức N! = 1 * 2 * 3 * 4 * ... * N

$n = 10;
$result = 1; //Giá trị giả định ban đầu
for ($i = $n; $i > 1; $i--){
    $result *= $i;
}

echo $n.'! = '.number_format($result);

// => Hiểu hơn về giá trị giả định, hiểu hơn về cách chọn vòng lặp tăng hay giảm
echo '<br/>';
//Bài 3: Kiểm tra 1 số N xem có phải số nguyên tố hay không? 

/*
Số nguyên tố là gì? 
- > 1
- CHỈ chia hết cho 1 và chính nó

Phân tích bài toán: Loại trừ
- Bước 1: Kiểm tra N xem có vi phạm điều kiện > 1 hay không
+ Nếu vi phạm => Kết luận N không phải số nguyên tố
+ Nếu không vi phạm => Chuyển qua bước 2

- Bước 2: Kiểm tra xem từ 2 đến N - 1 thì N có chia hết cho số nào nữa hay không?
+ Cho vòng lặp for chạy từ 2 đến N - 1
+ Dùng câu lệnh if và toán tử % để kiểm tra 
+ Nếu có chia hết => Kết luận không phải số nguyên tố
+ Nếu không chia hết => Kết luận là số nguyên tố

*/

$n = 10;
$check = true; //Giả định n là số nguyên tố 
if ($check < 1) {
    $check = false;
}else{
    for ($i = 2; $i<$n; $i++) {
        echo 'Chạy <br/>';
        if ($n % $i == 0) {
            $check = false;
            //Thoát vòng lặp
            break; //Thoát vòng lặp khi chương trình chưa chạy hết

        }
    }
}

//Show kết quả
if ($check){
    echo $n.' là số nguyên tố';
}else{
    echo $n.' không là số nguyên tố';
}

//=> Kỹ thuật đặt cờ hiệu (Cắm cờ)