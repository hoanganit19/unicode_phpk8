<?php

//Làm thế nào để tạo object trong PHP

/*
Cách 1: Convert từ array (ép kiểu)

Cách 2: Tạo class => Tạo object từ class

Cách 3: Tạo object từ class rỗng: stdClass()
*/

//Cách 1:

$customers = [
    'name' => 'Hoàng An',
    'email' => 'hoangan.web@gmail.com',
];

$customerObj = (object)$customers;

echo $customerObj->name.'<br/>';
echo $customerObj->email.'<br/>';

//Cách 2: Tạo class

class Customer
{
    public $name = 'Hoàng An';
    public $email = 'hoangan.web@gmail.com';

    public const MSG = 'Xin chào PHP';

    public function getName()
    {
        return 'Hoàng An Unicode';
    }
}

$customers = new Customer();

echo $customers->name.'<br/>';
echo $customers->email.'<br/>';
echo $customers->getName().'<br/>';
echo Customer::MSG.'<br/>';
echo $customers::MSG.'<br/>';

//Cách 3: Tạo object từ class rỗng: stdClass()
$customers = new stdClass();
$customers->name = 'Hoàng An';
$customers->email = 'hoangan.web@gmail.com';

echo $customers->name.'<br/>';
echo $customers->email.'<br/>';
