<?php

function getError($fieldName)
{
    global $errors;
    if (!empty($errors[$fieldName])) {
        return reset($errors[$fieldName]);
    }

    return false;
}

function getOld($fieldName)
{
    global $old;
    if (!empty($old[$fieldName])) {
        return $old[$fieldName];
    }
    return false;
}

function getMessage($message, $type = 'success  ')
{
    return !empty($message) ? '<div class="alert alert-'.$type.'">'.$message.'</div>' : '';
}

function redirect($to)
{
    header('Location: '.$to);
    exit;
}

function reload()
{
    header("Refresh:0");
    exit;
}

//Hàm xử lý session
function setSession($key, $value)
{
    $_SESSION[$key] = $value;
}

function getSession($key)
{
    if (isset($_SESSION[$key])) {
        return $_SESSION[$key];
    }
    return false;
}

function removeSession($key)
{
    if (isset($_SESSION[$key])) {
        unset($_SESSION[$key]);
    }
}

function getFlashData($key)
{
    $data = getSession($key);
    removeSession($key);

    return $data;
}
