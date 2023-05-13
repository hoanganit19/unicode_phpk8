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

    public function index()
    {
        $pageTitle = 'Danh sách người dùng';
        $msg = Session::getFlash('msg');

        $users = $this->user->getUsers();

        $this->view('admin/users/lists', compact('pageTitle', 'msg', 'users'));
    }

    public function add()
    {
        $pageTitle = 'Thêm người dùng';
        $msg = Session::getFlash('msg');
        $this->view('admin/users/add', compact('pageTitle', 'msg'));
    }

    public function handleAdd(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password'
          ], [
              'required' => ':attribute không được để trống',
              'email' => ':attribute không đúng định dạng',
              'unique' => ':attribute đã có người sử dụng',
              'min' => ':attribute phải từ :min ký tự',
              'same' => ':attribute không khớp'
          ], [
              'name' => 'Tên',
              'email' => 'Email',
              'password' => 'Mật khẩu',
              'confirm_password' => 'Nhập lại mật khẩu'
          ]);

        //Xử lý thêm
        $attributes = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => password_hash($request->password, PASSWORD_DEFAULT),
            'status' => $request->status,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        $this->user->addUser($attributes);

        Session::put('msg', 'Thêm người dùng thành công');

        redirect(route('admin.users.index'));
    }

    public function edit($id)
    {
        $pageTitle = 'Sửa người dùng';
        $msg = Session::getFlash('msg');
        $user = $this->user->getUser('id', $id);
        $this->view('admin/users/edit', compact('pageTitle', 'msg', 'user'));
    }

    public function handleEdit(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
        ];

        $attributes = [
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
            'updated_at' => Carbon::now()
        ];

        if ($request->password) {
            $rulePassword = [
                'password' => 'min:6',
                'confirm_password' => 'required|min:6|same:password'
            ];

            $rules = array_merge($rules, $rulePassword);

            $attributes['password'] = password_hash($request->password, PASSWORD_DEFAULT);

        }

        $request->validate($rules, [
              'required' => ':attribute không được để trống',
              'email' => ':attribute không đúng định dạng',
              'unique' => ':attribute đã có người sử dụng',
              'min' => ':attribute phải từ :min ký tự',
              'same' => ':attribute không khớp'
          ], [
              'name' => 'Tên',
              'email' => 'Email',
              'password' => 'Mật khẩu',
              'confirm_password' => 'Nhập lại mật khẩu'
          ]);

        //Update
        $this->user->updateById($attributes, $id);

        Session::put('msg', 'Cập nhật người dùng thành công');

        redirect(route('admin.users.edit', ['id' => $id]));

    }

    public function delete($id)
    {
        if (Auth::user()->id != $id) {
            $this->user->deleteUser($id);
            Session::put('msg', 'Xóa người dùng thành công');
        } else {
            Session::put('msg', 'Không được xóa vì tài khoản này đang đăng nhập');
        }

        redirect(route('admin.users.index'));
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
            'unique' => ':attribute đã có người sử dụng',

        ], [
            'name' => 'Tên',
            'email' => 'Email',
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

    public function deletes(Request $request)
    {
        if ($request->ids) {
            $this->user->deleteUsers($request->ids);
            Session::put('msg', 'Xóa người dùng thành công');
            redirect(route('admin.users.index'));
        }
    }
}

//Where id in(1,4,6)
