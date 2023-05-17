<?php

use Core\Request;

function request($name=null, $default = null)
{
    $request =  new Request();
    $request->setData();

    if (!empty($name)) {
        return $request->{$name} ?? $default;
    }

    return $request;
}
