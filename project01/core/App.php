<?php

namespace Core;

use Core\Request;
use Core\Session;

class App
{
    private $route;

    public function __construct()
    {
        Session::start();
    }

    public function execute()
    {
        require_once '../core/helpers/url.php';
        require_once '../core/helpers/validation.php';
        require_once '../core/helpers/config.php';
        require_once '../core/helpers/view.php';

        $request = new Request();

        $this->route = new Route($request);
        $this->route->execute();

    }
}
