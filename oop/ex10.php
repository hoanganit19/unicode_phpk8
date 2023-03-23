<?php

require_once 'classes/Session.php';
require_once 'classes/Cookie.php';
Session::init();

//Session::put('email', 'contact@unicode.vn');

Session::destroy('email');

echo Session::get('email');

Cookie::put('email', 'contact@unicode.vn', 120);
