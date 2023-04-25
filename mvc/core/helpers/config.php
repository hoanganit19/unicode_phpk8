<?php

function config($path)
{
    $pathArr = explode('.', $path);
    $result = null;
    if (!empty($pathArr)) {
        $fileName = $pathArr[0];
        $configContent = require BASE_ROOT.'/config/'.$fileName.'.php';
        unset($pathArr[0]);
        $pathArr = array_values($pathArr);

        if (!empty($pathArr)) {
            foreach ($pathArr as $key) {
                if ($result==null) {
                    $result = $configContent[$key];
                } else {
                    $result = $result[$key];
                }

            }
        }
    }

    return $result;
}

//config('app.timezone')
//config('database.mysql.driver')

function env($name, $default = null)
{
    return !empty($_ENV[$name]) ? $_ENV[$name] : $default;
}