<?php

use Carbon\Carbon;

function showMsg($msg, $type='success')
{
    return $msg ? '<div class="alert alert-'.$type.' text-center">'.$msg.'</div>' : '';
}

function getDateFormat($date, $format = 'd/m/Y H:i:s')
{
    return !empty($date) ? Carbon::parse($date)->format($format) : null;
}
