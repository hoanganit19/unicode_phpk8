<?php

namespace Core;

class Session
{
    public static function start()
    {
        session_start();
    }

    public static function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }

        return null;
    }

    public static function getFlash($key)
    {
        if (isset($_SESSION[$key])) {
            $data = $_SESSION[$key];
            self::remove($key);
            return $data;
        }

        return null;
    }

    public static function remove($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
            return true;
        }

        return false;
    }

}
