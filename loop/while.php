<?php 
//Tính tổng s = 1 + 2 + 3 + 4 +...+N

$n = 10;
$i = 1;
$total = 0;
while ($i <= $n) {
    $total+=$i;
    $i++; 
}

echo "Total: $total\n";

/*
Cách hoạt động: 
- 1. Vòng lặp sẽ kiểm tra điều kiện trước
- 2. Nếu điều kiện đúng => Chạy nội dung trong vòng lặp
- 3. Quay lại kiểm tra điều kiện
- 4. Lặp lại bước 2

=> Khi nào điều kiện sai => Thoát vòng lặp
*/
echo "<br/>";
/*
Tính tổng S = 1 + 1/2 + 1/3 + 1/4 + 1/5 + 1/6 + ... + 1/n
Điều kiện: 1/n <= 0.01 => Điều kiện dừng vòng lặp
*/
$i = 1;
$s = 0;
while (1/$i > 0.01) {
    $s = $s + 1/$i;
    $i++;
}

echo "S = $s<br/>";
echo "N = ".($i - 1);
echo "<br/>";

/*
S = 1 + 1*2 + 1*2*3 + 1*2*3*4 + 1*2*3*4*5 + ... + 1*2*3*4*5*...*N
*/

$total = 0;
$i = 1;
$n = 6;
while ($i <= $n){
    $sub = 1;
    $j = 1;
 
    while ($j <= $i){
        $sub *= $j;
        
        $j++;
    }
 
    $total += $sub;
    $i++;
}

echo "Total: $total\n";
echo "<br/>";
$i = 10;
do{
    echo "Do while run";
}while ($i<0);