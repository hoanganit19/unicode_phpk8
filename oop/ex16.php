<?php

class Person
{
    public function A()
    {
        echo 'method A <br/>';
    }

    public function B()
    {
        echo 'method B <br/>';
    }
}

class User extends Person
{
    public function B()
    {
        echo 'method B User <br/>';
    }
}

$user = new User();
$user->B();
