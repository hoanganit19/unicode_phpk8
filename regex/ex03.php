<?php

// $content = 'https://unicode.vn';
// $pattern = '/(?:http|https):\/\/([a-z]+\.[a-z]{2,})/';
// preg_match($pattern, $content, $matches);
// echo '<pre>';
// print_r($matches);
// echo '</pre>';

$html = '<p>Unicode Academy</p><img width="200" src="https://unicode.vn/image/image1.jpg" alt="Unicode Academy" /> fvsdfsdf <img width="200" src="https://unicode.vn/image/image2.jpg" alt="Unicode Academy" />';

$pattern = '/<img.*?src="(.+?)".*?\/>/';

preg_match_all($pattern, $html, $matches);

echo '<pre>';
print_r($matches);
echo '</pre>';
