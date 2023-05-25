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
        require_once '../core/helpers/request.php';
        require_once '../core/helpers/url.php';
        require_once '../core/helpers/validation.php';
        require_once '../core/helpers/config.php';
        require_once '../core/helpers/errors.php';
        require_once '../core/helpers/view.php';

        $request = new Request();

        //Alias Class
        $aliasClass = config('app.alias');
        if (!empty($aliasClass)) {
            foreach ($aliasClass as $key => $value) {
                class_alias($value, $key);
            }
        }

        $this->route = new Route($request);

        //Thực thi Middleware
        $middlewares = config('app.middleware');
        if (!empty($middlewares)) {
            foreach ($middlewares as $middleware) {
                $middlewareObj = new $middleware();
                $status = $middlewareObj->handle($request);
                if (!$status) {
                    die('Can\'t next request');
                }
            }
        }

        $this->route->execute();

    }
}
