<?php

namespace Core;

class Route
{
    public static $routes = [];

    public function __construct()
    {
        require_once __DIR__.'/../routes/web.php';
    }

    //Tương ứng với http method = get
    public static function get($path, $callback)
    {
        $path = self::handlePath($path);
        self::$routes['get'][$path] = $callback;

    }

    public static function post($path, $callback)
    {
        $path = self::handlePath($path);
        self::$routes['post'][$path] = $callback;
    }

    public static function handlePath($path)
    {

        $path = preg_replace('/\{.+?\}/', '(.+)', $path);
        return trim($path, '/');
    }

    public function execute()
    {
        $path = $this->getPath(); //Lấy path hiện tại


        $method = $this->getMethod(); //Lấy method hiện tại
        //echo $path.'<br/>';
        //echo $method;

        //$routes[$method][$path] = $callback
        // echo '<pre>';
        // print_r(self::$routes[$method]);
        // echo '</pre>';
        $callback = null;
        $params = [];
        if (!empty(self::$routes[$method])) {
            foreach (self::$routes[$method] as $key => $value) {

                if (preg_match('~^'.$key.'$~i', $path, $matches)) {
                    $callback = self::$routes[$method][$key];
                    if (!empty($matches[1])) {
                        $params = $matches;
                    }
                }
            }
        }

        unset($params[0]);
        $params = array_values($params);


        if (!empty($callback)) {
            //$callback = self::$routes[$method][$path];
            //execute callback
            if (is_array($callback)) {
                $controllerName = $callback[0];
                $controllerAction = $callback[1];
                $controller = new $controllerName(); //Tạo object từ controller
                echo call_user_func_array([$controller, $controllerAction], $params);
            } else {
                echo call_user_func_array($callback, []);
            }

        } else {
            require_once '../core/errors/404.php';
        }

    }

    public function getPath()
    {
        $requestUri = parse_url($_SERVER['REQUEST_URI']);
        $requestUri = $requestUri['path'];

        $dirnamePublic = dirname($_SERVER['SCRIPT_NAME']);

        $pathArr = explode($dirnamePublic, $requestUri);

        $path = trim(end($pathArr), '/');

        return $path;

    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}
