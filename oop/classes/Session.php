<?php

class Session
{
    public static function init()
    {
        session_start();
    }

    public static function put($name, $value)
    {
        $_SESSION[$name] = $value;
        return true;
    }

    public static function get($name)
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }

        return false;
    }

    public static function getAll()
    {
        if (isset($_SESSION)) {
            return $_SESSION;
        }
    }

    public static function destroy($name)
    {
        if (isset($_SESSION[$name])) {
            unset($_SESSION[$name]);
            return true;
        }

        return false;
    }

    public static function clear()
    {
        session_destroy();
        return true;
    }
}
