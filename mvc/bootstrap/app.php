<?php

use Core\App;
use Core\Route;
use Core\Session;

define('BASE_ROOT', dirname(__DIR__));
Session::start();
$app = new App();

$app->execute();