<?php

//mảng 2 chiều

$customers = [
    [
        'name' => 'John',
        'email' => 'john@gmail.com',
        'address' => 'Rua Fidêncio Ramos',
    ],
    [
        'name' => 'Maria',
        'email' =>'maria@gmail.com',
        'address' => 'Rua Fidêncio Ramos',
    ],
    [
        'name' => 'Sandro',
        'email' =>'sandro@gmail.com',
        'address' => 'Rua Fidêncio Ramos',
    ],
    [
        'name' => 'Maria',
        'email' =>'maria@gmail.com',
        'address' => 'Rua Fidêncio Ramos',
    ]
];

$customers[] = [
    'name' => 'Hoàng An',
    'email' => 'hoangan.web@gmail.com',
    'address' => 'Hà Nội'
];

$customers[3]['name'] = 'Văn Quân';

$customers[2]['age'] = 30;
$customers[2][] = 'Test abc';
$customers[2]['history'] = [
    'Item 1',
    'Item 2',
    'Item 3'
];

$customers[2]['history'][] = 'Item 4';

echo '<pre>';
print_r($customers);
echo '</pre>';

// if (!empty($customers)) {
//     foreach ($customers as $customer) {
//         echo $customer['name'].' - '.$customer['email'].'<br/>';
//     }
// }