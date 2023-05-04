<?php

use Core\View;

function view($path, $data = [])
{
    View::render($path, $data);
}
