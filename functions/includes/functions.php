<?php

//Định nghĩa hàm

//Hàm không có giá trị trả về
function getMessage(string $content): void
{
    echo "<h3>Xin chào Unicode: $content</h3>";
}

//Hàm có giá trị trả về
function getTotal(float $a, float $b): float
{
    $total = $a + $b; //Biến $total => Biến cục bộ (Chỉ sử dụng nội bộ trong hàm)

    if ($total > 10) {
        return $total;
    }

    return 0;
}