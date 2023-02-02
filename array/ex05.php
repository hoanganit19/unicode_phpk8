<?php

$numbers  = [
 5, 8, 1, 2
];

unset($numbers[1]);

$numbers = array_values($numbers); //reset key

$customres = [
    'name' => 'Hoàng An',
    'age' => 30,
    'address' => 'Hà Nội'
];

//$lastDelete = array_pop($customres);

//$count = array_push($customres, 'Item 1', 'Item 3', 'Item 4'); //Rest Params

//$firstDelete = array_shift($customres);

//$count = array_unshift($customres, 'Item 1', 'Item 3', 'Item 4');

// sort($customres);

// $customres =array_reverse($customres);

// echo '<pre>';
// print_r($customres);
// echo '</pre>';

// $arr1 = [
//     1, 2, 3
// ];

// $arr2 = [
//     4, 5, 6
// ];

// $arr = array_merge($arr1, $arr2);

// echo '<pre>';
// print_r($arr);
// echo '</pre>';

// $urls = [
//     'https://unicode.vn',
//     'https://vnexpress.net',
//     'https://dantri.com',
//     'https://tech2.vn',
//     'https://google.com'
// ];

// $key = array_rand($urls, 2);

// echo $urls[$key[0]].'<br/>';
// echo $urls[$key[1]].'<br/>';

$customers = [
    'Hoàng An',
    'Văn Quân',
    'Anh Tuấn',
    'Văn Anh',
    'Hoàng An',
    ''
];

// $key = array_search('Văn Quân2', $customers);

// var_dump($key);

// $check = in_array('Văn Quân', $customers);

// var_dump($check);

// $sub = array_slice($customers, 1);

// echo '<pre>';
// print_r($sub);
// echo '</pre>';

// $customers = array_unique($customers);
echo '<pre>';
print_r($customers);
echo '</pre>';

//Lấy phần tử đầu tiên của mảng
$firstEl = reset($customers);

//Lấy phần tử cuối cùng
$lastEl = end($customers);
// echo $lastEl;

$customers = array_filter($customers);
echo '<pre>';
print_r($customers);
echo '</pre>';

//Tạo dãy số dưới dạng mảng

$numbers = range(1, 100);
echo '<pre>';
print_r($numbers);
echo '</pre>';