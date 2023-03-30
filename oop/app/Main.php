<?php

namespace App;

use App\Admin\Home as AdminHome;
use App\Client\Home;
use DateTime;

class Main
{
    public function __construct()
    {
        $admin = new AdminHome();
        $client = new Home();
        $time = new DateTime();
        var_dump($time);
    }
}