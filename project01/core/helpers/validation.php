<?php

use Core\Session;

function error($field)
{
    $errors = Session::get('errors');
    if (!empty($errors[$field])) {
        $error = reset($errors[$field]);
        unset($errors[$field]);
        Session::put('errors', $errors);
        return $error;
    }

    return null;
}

function old($field)
{
    $old = Session::get('old');
    if (!empty($old[$field])) {
        $data = $old[$field];
        unset($old[$field]);
        Session::put('old', $old);
        return $data;
    }

    return null;
}
