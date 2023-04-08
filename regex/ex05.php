<?php

$content = 'Lorem Ipsum is 0388875179 simply dummy text of the contact@unicode.vn printing and hoangan.web@gmail.com typesetting industry. Lorem Ipsum has been the industry https://unicode.vn/ standard dummy text https://vnexpress.net/the-gioi/ ever since the 1500s';

//Thay thế số điện thoại
$pattern = '/(0\d{9})/';

$content = preg_replace($pattern, '<a href="tel:$1">$1</a>', $content);

//Thay thế email
$pattern = '/([a-z]+[a-z0-9-_\.]{2,}@[a-z]+[a-z-_\.]*\.[a-z]{2,})/';

$content = preg_replace($pattern, '<a href="mailto:$1">$1</a>', $content);

//Thay thế url
$pattern = '/((?:http|https):\/\/[a-z]+[a-z-_\.]*\.[a-z]{2,}(?:\/[\S]*|))/';

$content = preg_replace($pattern, '<a href="$1" target="_blank">$1</a>', $content);

echo $content;
