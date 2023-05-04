<?php

namespace App\Controllers\Auth;

use Core\Request;
use Core\Session;
use App\Models\User;
use Core\Controller;

class LoginController extends Controller
{
    private $userModel = null;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->userModel = new User();
    }

    public function getForm()
    {
        // if (Session::get('userLogin')) {
        //     redirect(route('admin.index'));
        // }
        $pageTitle = 'Đăng nhập hệ thống';
        $msg = Session::getFlash('msg');
        return $this->view('auth/login', compact('pageTitle', 'msg'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'required' => ':attribute bắt buộc phải nhập',
            'email' => ':attribute không đúng định dạng'
        ], [
            'email' => 'Email',
            'password' => 'Mật khẩu'
        ]);

        //Xử lý đăng nhập
        $user = $this->userModel->getUserByEmail(
            $request->email
        );

        if (!empty($user)) {
            $hash = $user['password'];
            if (password_verify($request->password, $hash)) {
                Session::put('userLogin', $user);
                redirect(route('admin.index'));
            } else {
                Session::put('msg', 'Email hoặc mật khẩu không chính xác');
                redirect(route('login'));
            }
        }


    }
}