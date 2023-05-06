<?php

namespace Core;

class Cookie
{
    public static function put($key, $value, $expires = null)
    {
        setcookie($key, $value, time() + $expires * 60, '/', "", false, true);
    }

    public static function get($key)
    {
        if (isset($_COOKIE[$key])) {
            return $_COOKIE[$key];
        }

        return null;
    }

    public static function remove($key)
    {
        setcookie($key, null, time(), '/', "", false, true);
    }
}
