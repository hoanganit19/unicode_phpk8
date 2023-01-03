<?php 
//Vòng lặp for

//Ví dụ: Cần hiển thị 10 dòng chữ: Xin chào PHP

//Vòng lặp for tăng
for ($i = 0; $i < 10; $i += 2 ) {
    echo "Xin chào PHP ".($i + 1)."<br/>";
}

echo "<hr/>";

//Vòng lặp for giảm

for ($i = 10; $i > 0; $i -= 2 ) {
    echo "Xin chào PHP ".($i)."<br/>";
}

echo "<hr/>";

//Vòng lặp for lồng nhau
for ($i = 0; $i < 10; $i++){
    for ($j = 0; $j < 10; $j++) {
        for ($k = 0; $k < 10; $k++) {
            echo 'i = '.$i.' - j = '.$j.' - k = '.$k.'<br/>';
        }
       
    }
}

/*
Luôn ưu tiên vòng lặp con, khi con chạy xong thì cha mới nhảy đến lần lặp tiếp theo
*/