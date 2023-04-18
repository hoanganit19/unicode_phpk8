<?php

namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        //Xử lý logic

        // $data = [
        //     'title' => "Unicode",
        //     'users' => [
        //         'Item 1',
        //         'Item 2',
        //         'Item 3'
        //     ]
        // ];

        $title = 'Unicode Academy';
        $users = [
            'Item 1',
            'Item 2',
            'Item 3'
        ];

        $this->view('home/index', compact('title', 'users'));
    }

    public function report()
    {
        $this->view('home/report');
    }
}

/*
Tên class => controller
Tên phương thức => action
*/
