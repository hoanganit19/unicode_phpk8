<?php

namespace Core;

use Core\Validator;

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

    public function validate($rules, $messages, $attributes=[])
    {
        $validator = Validator::make($this->body, $rules, $messages, $attributes);
        if ($validator->fails()) {
            if (!empty($_SERVER['HTTP_REFERER'])) {
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }

    public function is($path)
    {
        //$request->is('admin') => Check đường dẫn admin
        //$request->is('admin/*') => Check tất cả đường dẫn có tiền tố là admin
        $check = false;
        if (strpos($path, '*')!==false) {
            //Check đường dẫn con
            $path = str_replace('*', '.*', $path);
            if (preg_match('~'.$path.'~i', $this->getPath())) {
                $check = true;
            }
        } else {
            if ($this->getPath() == $path) {
                $check = true;
            }
        }

        return $check;
    }

    public function getParams()
    {
        return !empty($_SERVER['QUERY_STRING']) ? trim($_SERVER['QUERY_STRING']) : null;
    }
}
