<?php

class Person
{
    //Thuộc tính tĩnh
    public static $name = 'Hoàng An';
    public $email = 'hoangan.web@gmail.com';

    //Phương thức tĩnh
    public static function getName()
    {
        //Từ phương thức tĩnh, truy cập vào thuộc tính tĩnh dùng từ khóa self
        return self::$name;
    }

    public static function setName($name)
    {
        self::$name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
}

//echo Person::$name.'<br/>';
Person::setName('Hoàng An Unicode');
echo Person::getName().'<br/>';

$person = new Person();
//echo Person::getName().'<br/>';
$person->setEmail('contact@unicode.vn');
echo $person->getEmail().'<br/>';

$girl = new Person();
echo $girl->getEmail().'<br/>';
