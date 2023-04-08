<?php

$content = 'Lorem Ipsum is simply 0388875179 dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry 0388875181 standard dummy text ever since the 1500s';

$pattern = '/(0(\d{9}))/';

$content = preg_replace($pattern, '<a href="tel:$1">+84$2</a>', $content); //khác với str_replace

echo $content;

//Yêu cầu: => Chuyển tất cả các số 0 của số điện thoại thành +84
