<?php

// $content = 'Lorem Ipsum is 0123456789 simply dummy text of the printing and typesetting industry. Lorem Ipsum 0388875179 has been the industry standard dummy text ever since the 1500s';

// $pattern = '/0\d{9}/';

// preg_match_all($pattern, $content, $matches);

// echo '<pre>';
// print_r($matches);
// echo '</pre>';

$content = 'Lorem Ipsum is simply an@unicode.vn dummy text of the printing and typesetting industry. Lorem Ipsum abc@gmail.com has been the industry';

$pattern = '/[a-z]+@([a-z]+\.[a-z]{2,})/';

preg_match($pattern, $content, $matches);

echo '<pre>';
print_r($matches);
echo '</pre>';
