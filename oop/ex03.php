<?php
class Person{
    private $name = 'Hoàng An';
    private $email = 'contact@unicode.vn';

    public function getName(){
        return $this->name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function setEmail($email){
        $this->email = $email;
    }
}

$person = new Person();

$person->setName('PHP Developer');
$person->setEmail('hoangan.web@gmail.com');

echo $person->getName().'<br/>';
echo $person->getEmail().'<br/>';

/*
Setter
Getter
*/