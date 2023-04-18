<?php

namespace Core;

class Request
{
    public function __get($name)
    {

        if (!empty($this->$name)) {
            return $this->$name;
        }

        return null;
    }

    public function all()
    {
        return $_POST;
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

    public function setData()
    {
        $method = $this->getMethod();
        if ($method == 'get') {
            $data = $_GET;
        } elseif ($method == 'post') {
            $data = $_POST;
        }

        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $this->{$key} = $value;
            }
        }
    }

    public function validate()
    {

    }
}
