<?php

namespace App\Controllers\Admin;

use Core\Session;
use App\Core\Auth;
use Core\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // if (!Session::get('userLogin')) {
        //     Session::put('msg', 'Vui lòng đăng nhập để tiếp tục');
        //     redirect(route('login'));
        // }
        $pageTitle = 'Trang tổng quan';

        return $this->view('admin/dashboard/index', compact('pageTitle'));
    }
}