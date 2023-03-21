<?php
class Person{
    private $name;
    private $email;

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function __get($name){
        //echo 'hàm này sẽ chạy khi truy cập vào thuộc tính private <br/>';
        return $this->$name;
    }

    public function __set($name, $value){
        //echo 'Hàm này sẽ chạy khi gán dữ liệu cho thuộc tính private <br/>';
        $this->$name = $value;
    }
}

$person = new Person('Hoàng An', 'contact@example');

$person->name = 'PHP Developer';
$person->email = 'contact@unicode.vn';

echo $person->name.'<br/>';
echo $person->email.'<br/>';