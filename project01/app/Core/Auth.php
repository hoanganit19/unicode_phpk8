<?php

namespace App\Core;

use Core\Cookie;
use Core\Session;
use App\Models\User;

class Auth
{
    public static function check()
    {
        $isLogin = Session::get('userLogin');

        if ($isLogin) {
            return true;
        } else {
            //Không tồn tại session => Kiểm tra xem có rememberToken ở cookie không
            if (Cookie::get('rememberToken')) {
                $token = Cookie::get('rememberToken');

                $defaultType = config('auth.default');

                $model = config('auth.'.$defaultType.'.model');

                $userModel = new $model();
                $user = $userModel->getUser('remember_token', $token);
                if (!empty($user)) {
                    self::setLogin($user);
                    return true;
                }
            }
        }
        return false;
    }

    public static function user()
    {
        if (self::check()) {
            $user = Session::get('userLogin');
            return (object)$user;
        }

        return null;
    }

    public static function logout()
    {
        Session::remove('userLogin');
        Cookie::remove('rememberToken');
        return true;
    }

    public static function setLogin($data)
    {
        Session::put('userLogin', $data);
    }
}
