<?php

function showMsg($msg, $type='success')
{
    return $msg ? '<div class="alert alert-'.$type.' text-center">'.$msg.'</div>' : '';
}
