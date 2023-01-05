<?php
/*
 * Vé tam giác số
 *
 * 1
 * 2 3
 * 4 5 6
 * 7 8 9 10
 * 11 12 13 14 15
 *
 * Phân tích bài toán:
 * - Số cột và số dòng bằng nhau
 * - Số tăng dần
 *
 * Ý tưởng triển khai:
 * - Dùng vòng lồng nhau
 * + Vòng lặp đại diện cho số hàng
 * + Vòng lặp đại diện cho số cột (Phụ thuộc vào hàng)
 * */

$line = 15;
$count = 0;
for ($row = 1; $row<=$line; $row++){
    for ($cols = 1; $cols<=$row; $cols++){
        echo ++$count.' ';
    }
    echo "<br/>";
}