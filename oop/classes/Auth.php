<?php

class Auth implements AuthInterface, RoleInterface
{
    public function login()
    {
        echo 'Login';
    }

    public function register()
    {
        echo 'Register';
    }

    public function active()
    {
        echo 'Active';
    }

    public function getRole()
    {
        echo 'getRole';
    }

    public function toArray()
    {
        echo 'toArray';
    }
}
