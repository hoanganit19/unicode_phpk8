<?php

class Person
{
    private $name = 'Hoàng An';
    private $email = 'contact@unicode.vn';
    private static $phone = '0388875179';

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __call($method, $args)
    {
        return call_user_func_array(
            [
                $this,
                $method
            ],
            $args
        );
    }

    public static function __callStatic($method, $args)
    {
        return call_user_func_array(
            [
                new self(),
                $method
            ],
            $args
        );
    }

    private function getName()
    {
        return $this->name;
    }

    private function setName($name)
    {
        $this->name = $name;
    }

    private static function getPhone()
    {
        return self::$phone;
    }
}

$person = new Person();
$person->setName('Hoàng An Unicode');
echo $person->getName().'<br/>';
echo $person->name.'<br/>';
echo Person::getPhone().'<br/>';
