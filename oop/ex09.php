<?php

class User
{
    private static $name = 'Hoàng An';

    public static function getName()
    {
        return self::$name;
    }
}

/*
Từ khóa self và static đều được dùng để gọi phương thức tĩnh, thuộc tính tĩnh
Nếu không có kế thừa => 2 từ khóa này giống nhau

Nếu có kế thừa:
- static => Lấy theo class được gọi
- self => Luôn lấy theo class cha
*/

//echo User::getName();

class Car
{
    public static function model()
    {
        return self::getModel();
    }

    public static function getModel()
    {
        return 'This is model a car';
    }
}

class Honda extends Car
{
    public static function getModel()
    {
        return 'This is model a Honda';
    }
}

// echo Honda::model().'<br/>';
