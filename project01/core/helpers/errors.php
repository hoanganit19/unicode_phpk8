<?php

function abort($error)
{
    $path = BASE_ROOT.'/core/errors/'.$error.'.php';
    require $path;
    die();
}