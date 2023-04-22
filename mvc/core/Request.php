<?php

namespace Core;

class Request
{
    private $body = [];
    private $path = null;

    public function __get($name)
    {

        if (!empty($this->$name)) {
            return $this->$name;
        }

        return null;
    }

    public function all()
    {
        return $this->body;
    }

    public function getPath()
    {
        $requestUri = parse_url($_SERVER['REQUEST_URI']);
        $requestUri = $requestUri['path'];

        $dirnamePublic = dirname($_SERVER['SCRIPT_NAME']);

        $pathArr = explode($dirnamePublic, $requestUri);

        $path = trim(end($pathArr), '/');

        $this->path = $path;

        return $this->path;

    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function setData()
    {
        $method = $this->getMethod();
        if ($method == 'get') {
            $this->body = $_GET;
        } elseif ($method == 'post') {
            $this->body = $_POST;
        }

        if (!empty($this->body)) {
            foreach ($this->body as $key => $value) {
                $this->{$key} = $value;
            }
        }
    }

    public function validate()
    {

    }
}
