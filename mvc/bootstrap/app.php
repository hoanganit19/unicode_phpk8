<?php

use Core\App;
use Core\Route;

define('BASE_ROOT', dirname(__DIR__));

$app = new App();
$app->execute();
