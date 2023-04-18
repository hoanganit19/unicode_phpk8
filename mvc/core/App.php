<?php

namespace Core;

use Core\Request;

class App
{
    private $route;

    public function execute()
    {
        require_once '../core/helpers/url.php';
        $request = new Request();
        $this->route = new Route($request);
        $this->route->execute();

    }
}
