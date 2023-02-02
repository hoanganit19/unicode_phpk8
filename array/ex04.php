<?php

$numbers = [1, 5, 2, 9, 3];

//Tìm max, min

$max = $numbers[0];
$min = $numbers[0];


foreach ($numbers as $index => $number) {
    if ($index === 0) {
        continue;
    }
    if ($max < $number) {
        $max = $number;
    }

    if ($min > $number) {
        $min = $number;
    }
}

//Phương pháp đặt lính canh

echo 'Giá trị lớn nhất: '.$max.'<br/>';
echo 'Giá trị nhỏ nhất: '.$min.'<br/>';

//Sắp xếp
echo '<pre>';
print_r($numbers);
echo '</pre>';

/*
Thuật toán sắp xếp nổi bọt
- So sánh từng phần tử với tất cả các phần tử phía sau nó
- Kiểm tra nếu không thỏa mãn điều kiện => Đổi chỗ

Mô phỏng thuật toán

1[0], 5[1], 2[2], 9[3], 3[4]

1. Phần tử 0 với tất cả các phần tử phía sau
- So sánh [0] với [1] => Giữ nguyên: 1, 5, 2, 9, 4
- So sánh [0] với [2] => Giữ nguyên: 1, 5, 2, 9, 4
- So sánh [0] với [3] => Giữ nguyên: 1, 5, 2, 9, 4
- So sánh [0] với [4] => Giữ nguyên: 1, 5, 2, 9, 4

2. Phần tử 1 với tất cả các phần tử phía sau
- So sánh [1] với [2] => Đổi chỗ: 1[0], 2[1], 5[2], 9[3], 4[4]
- So sánh [1] với [3] => Giữ nguyên: 1[0], 2[1], 5[2], 9[3], 4[4]
- So sánh [1] với [4] => Giữ nguyên: 1[0], 2[1], 5[2], 9[3], 4[4]

3. Phần tử 2 với tất cả các phần tử phía sau
- So sánh [2] với [3] => Giữ nguyên: 1[0], 2[1], 5[2], 9[3], 4[4]
- So sánh [2] với [4] => Đổi chỗ: 1[0], 2[1], 4[2], 9[3], 5[4]

4. So sánh 3 với tất cả phần tử phía sau
- So sánh [3] với [4] => Đổi chỗ: 1[0], 2[1], 4[2], 5[3], 9[4]
*/

$numbers = [5, 2, -10, 99, 8, 40, 98];

echo '<p>Mảng ban đầu</p>';
echo '<pre>';
print_r($numbers);
echo '</pre>';

for ($i = 0; $i< count($numbers)-1; $i++) {
    for ($j = $i+1; $j<count($numbers); $j++) {
        if ($numbers[$i] > $numbers[$j]) {
            $tmp = $numbers[$i];
            $numbers[$i] = $numbers[$j];
            $numbers[$j] = $tmp;
        }
    }
}
echo '<p>Mảng đã sắp xếp tăng dần: </p>';
echo '<pre>';
print_r($numbers);
echo '</pre>';


$insertElement = 5.5;

$indexSelected = 0;

$count = count($numbers);

//Kiểm tra xem giá trị cần chèn có nằm ngoài hay không?

if ($insertElement<$numbers[0] || $insertElement>$numbers[$count-1]) {
    //Cần xác định nằm ngoài phía trước hay sau
    if ($insertElement>$numbers[0]) {
        $indexSelected = $count;
        $numbers[$indexSelected] = $insertElement;
    }
} else {
    for ($i = 0; $i< $count-1; $i++) {
        if ($insertElement>=$numbers[$i] && $insertElement<=$numbers[$i+1]) {
            $indexSelected = $i+1;
            break;
        }
    }
}

if ($indexSelected!=$count) {
    $subArr = [];

    for ($i = $indexSelected; $i < $count; $i++) {
        $subArr[$i+1] = $numbers[$i];
        unset($numbers[$i]);
    }


    $numbers[count($numbers)] = $insertElement;
    $numbers = $numbers+$subArr;
}

echo '<p>Mảng sau khi chèn</p>';
echo '<pre>';
print_r($numbers);
echo '</pre>';