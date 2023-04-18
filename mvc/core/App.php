<?php

namespace Core;

class App
{
    private $route;

    public function execute()
    {
        $this->route = new Route();
        $this->route->execute();
    }
}
