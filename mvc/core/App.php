<?php

namespace Core;

use Core\Request;

class App
{
    private $route;

    public function execute()
    {
        require_once '../core/helpers/url.php';
        require_once '../core/helpers/validation.php';
        $request = new Request();

        $this->route = new Route($request);
        $this->route->execute();

    }
}
