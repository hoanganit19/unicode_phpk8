<?php 
//Bài tập 1: Tính thuế thu nhập + lương thực nhận

$luong = 5000000; //Input

//Tính phần trăm thuế theo lương (giấy tờ)
$taxRate = 0;

if ($luong < 7000000){
    $taxRate = 10;
}elseif ($luong >=7000000 && $luong <=15000000){
    $taxRate = 20;
}else{
    $taxRate = 30;
}

//Tính thuế thu nhập = $luong * $taxRate / 100;

$tax = $luong * $taxRate / 100;

//Tính lương thực nhận

$luongthucnhan = $luong  - $tax; 

//Hiển thị kết quả

echo "<p>Lương: ".number_format($luong)."đ</p>";
echo "<p>Thuế thu nhập: ".number_format($tax)."đ</p>";
echo "<p>Lương thực nhận: ".number_format($luongthucnhan)."đ</p>";

//Bài tập 2: Tính tuổi

$age = 20; //Tuổi của học sinh
$ageVail = 15; //Tuổi hợp lệ vào lớp 10

echo "<p>Tuổi: ".$age."</p>";

echo "<p>Học sinh: ".($age >= $ageVail?"Đủ ":"Không đủ ")."tuổi vào lớp 10</p>";
//Luyện tập cách viết toán tử 3 ngôi

//Bài 3: Tìm số lớn nhất của 3 số $a, $b, $c

$a = 30;
$b = 15;
$c = 7;

/*
Ý tưởng: 
- Giả định số lớn nhất là số $a (Tạm gọi là $max)
- So sánh số giả định $max với số $b
+ Nếu $max < $b => Gán $max = $b
+ Nếu $max > $b => Bỏ qua
- So sánh số giả định $max với biến $c
+ Nếu $max < $c => Gán $max = $c
+ Nếu $max > $c => Bỏ qua

=> Cuối cùng: In ra giá trị $max chính là giá trị lớn nhất cần tìm
*/

$max = $a;
if ($max < $b) {
    $max = $b;
}

if ($max < $c) {
    $max = $c;
}

echo '<p>Giá trị lớn nhất là: '.$max.'</p>';
//=> Kỹ thuật đặt lính canh

//Bài 4: Hoán vị 2 số $a, $b

$a = 30;
$b = 15;

//=> Result: $a = 15; $b = 30;

/*
3 cách: 
01: Dùng biến trung gian
02: Dùng phép +, - hoặc *, /
03: Dùng Destructuring Array
*/
$a = $a + $b;
$b = $a - $b;
$a = $a - $b;
//[$a, $b] = [$b, $a]; Destructuring Array
echo '<p>a = '.$a.'</p>';
echo '<p>b = '.$b.'</p>';

//Bài 5: Xếp hạng học lực của học sinh

//Input
$diemkiemtra = 11;
$diemgiuaky = 9;
$diemcuoiky = 10;

//Tính điểm trung bình

if ($diemkiemtra <=10 && $diemgiuaky <= 10 && $diemcuoiky <= 10){
    $diemtrungbinh = ($diemkiemtra + $diemgiuaky + $diemcuoiky) / 3;

    //So sánh $diemtrungbinh với các chỉ số => Đưa ra xếp hạng
    
    $hang = null;
    if ($diemtrungbinh < 5){
        $hang = 'F';
    }elseif ($diemtrungbinh >=5 && $diemtrungbinh < 7){
        $hang = 'C';
    }elseif ($diemtrungbinh >= 7 && $diemtrungbinh < 9){
        $hang = 'B';
    }else{
        $hang = 'A';
    }
    echo '<p>Điểm kiểm tra = '.$diemkiemtra.'</p>';
    echo '<p>Điểm giữ kỳ = '.$diemgiuaky.'</p>';
    echo '<p>Điểm cuối kỳ = '.$diemcuoiky.'</p>';
    echo '<p>Hạng = '.$hang.'</p>';
}else{
    echo '<p>Điểm không hợp lệ</p>';
}