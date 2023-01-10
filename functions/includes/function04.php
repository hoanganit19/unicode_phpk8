<?php

function getMessage($content, $type='success', $show=false)
{
    echo $content.'<br/>';
    echo $type.'<br/>';
    var_dump($show);
}