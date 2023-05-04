<?php

use Core\App;
use Core\Route;
use Dotenv\Dotenv;

define('BASE_ROOT', dirname(__DIR__));

$dotenv = Dotenv::createImmutable(BASE_ROOT);
$dotenv->safeLoad();

$app = new App();

$app->execute();
