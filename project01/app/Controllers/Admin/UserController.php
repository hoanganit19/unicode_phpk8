<?php

namespace App\Controllers\Admin;

use Core\Request;
use Core\Session;
use App\Core\Auth;
use Carbon\Carbon;
use Core\Validator;
use App\Models\User;
use Core\Controller;

class UserController extends Controller
{
    private $user = null;
    public function __construct()
    {
        $this->user = new User();
    }
    public function profile()
    {
        $user = Auth::user();

        $pageTitle = 'Tài khoản';

        $msg = Session::getFlash('msg');

        $this->view('admin/users/profile', compact('user', 'pageTitle', 'msg'));
    }

    public function handleProfile(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
          'name' => 'required',
          'email' => 'required|email|unique:users,email,'.$id
        ], [
            'required' => ':attribute không được để trống',
            'email' => ':attribute không đúng định dạng',
            'unique' => ':attribute đã có người sử dụng'
        ], [
            'name' => 'Tên',
            'email' => 'Email'
        ]);

        //Update
        $attributes = [
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => Carbon::now()
        ];

        $this->user->updateById($attributes, $id);

        $user = $this->user->getUser('id', $id);

        Auth::setLogin($user);

        Session::put('msg', 'Cập nhật thành công');

        redirect(route('admin.user.profile'));

    }

    public function changePassword()
    {
        $pageTitle = 'Đổi mật khẩu';

        $msg = Session::getFlash('msg');

        $this->view('admin/users/change_password', compact('pageTitle', 'msg'));
    }

    public function handleChangePassword(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password'
        ], [
            'required' => ':attribute bắt buộc phải nhập',
            'min' => ':attribute phải từ :min ký tự',
            'same' => ':attribute không khớp'
        ], [
            'old_password' => 'Mật khẩu cũ',
            'password' => 'Mật khẩu mới',
            'confirm_password' => 'Nhập lại mật khẩu mới'
        ]);

        $user = $this->user->getUser(
            'id',
            $id
        );

        if (!empty($user)) {
            $hash = $user['password'];
            if (!password_verify($request->old_password, $hash)) {
                Validator::pushError('old_password', 'Mật khẩu cũ không khớp');
            } else {
                //Xử lý update
                $hash = password_hash($request->password, PASSWORD_DEFAULT);
                $status = $this->user->updateById(
                    [
                        'password' => $hash,
                        'updated_at' => Carbon::now()
                    ],
                    $id
                );

                if ($status) {
                    Session::put('msg', 'Đổi mật khẩu thành công');
                    Auth::logout();
                } else {
                    Session::put('msg', 'Bạn không thể đổi mật khẩu lúc này');
                }
            }

            redirect(route('admin.user.password'));
        }
    }
}