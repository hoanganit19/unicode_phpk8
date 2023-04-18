<?php

namespace Core;

class Route
{
    public static $routes = [];
    public static $routeObj = null;
    public static $path = [];
    public static $pathList = [];
    public $request = null;

    public function __construct($request)
    {
        self::$routeObj = $this;
        $this->request = $request;
        $this->request->setData();

        require_once __DIR__.'/../routes/web.php';
    }

    //Tương ứng với http method = get
    public static function get($path, $callback)
    {
        self::$pathList[] = $path;
        $path = self::handlePath($path);
        self::$routes['get'][$path] = $callback;

        return self::$routeObj;
    }

    public static function post($path, $callback)
    {
        self::$pathList[] = $path;
        $path = self::handlePath($path);
        self::$routes['post'][$path] = $callback;

        return self::$routeObj;
    }

    public static function handlePath($path)
    {

        $path = preg_replace('/\{.+?\}/', '(.+)', $path);
        return trim($path, '/');
    }

    public function execute()
    {
        // echo '<pre>';
        // print_r(self::$name);
        // echo '</pre>';

        $path = $this->request->getPath(); //Lấy path hiện tại


        $method = $this->request->getMethod(); //Lấy method hiện tại
        //echo $path.'<br/>';
        //echo $method;

        //$routes[$method][$path] = $callback
        // echo '<pre>';
        // print_r(self::$routes);
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

        //Thêm request vào params
        $params = array_merge([$this->request], $params);

        if (!empty($callback)) {
            //$callback = self::$routes[$method][$path];
            //execute callback
            if (is_array($callback)) {
                $controllerName = $callback[0];
                $controllerAction = $callback[1];
                $controller = new $controllerName(); //Tạo object từ controller
                echo call_user_func_array([$controller, $controllerAction], $params);
            } else {
                echo call_user_func_array($callback, $params);
            }

        } else {
            require_once '../core/errors/404.php';
        }


    }

    public function name($name)
    {
        self::$path[$name] = end(self::$pathList);
    }

    public static function getUrl($name, $params=[])
    {

        $protocol = !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
        $appUrl = $protocol.$_SERVER['HTTP_HOST'];
        $fullUrl = $appUrl.'/'.self::$path[$name];
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                $fullUrl = str_replace('{'.$key.'}', $value, $fullUrl);
            }
        }

        return $fullUrl;
    }


}
