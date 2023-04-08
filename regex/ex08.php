<?php

// $content = '<h3 class="title-news">
// <a href="https://vnexpress.net/cau-long-kieng-o-cua-ngo-tp-hcm-hoan-thanh-vao-thang-9-4591080.html" title="Cầu Long Kiểng ở cửa ngõ TP HCM hoàn thành vào tháng 9" data-medium="Item-6" data-thumb="1" data-itm-source="#vn_source=Home&amp;vn_campaign=ThuongVien&amp;vn_medium=Item-6&amp;vn_term=Desktop&amp;vn_thumb=1" data-itm-added="1">Cầu Long Kiểng ở cửa ngõ TP HCM hoàn thành vào tháng 9</a>
// </h3>';

// $pattern = '#<h3 class="title-news"><a.*href="(.+?)"#s';

// preg_match($pattern, $content, $matches);

// echo '<pre>';
// print_r($matches);
// echo '</pre>';

$content = "<li>Unicode Academy</li>\n<li>Unicode Academy 2</li>\n<li>Unicode Academy 3</li>";

$pattern = '~^<li>(.+)</li>$~m';

preg_match_all($pattern, $content, $matches);

echo '<pre>';
print_r($matches);
echo '</pre>';
