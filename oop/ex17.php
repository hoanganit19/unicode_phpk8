<?php

//DB::table('users')->where('id', '>', 1)->get();
//DB::where('id', '>', 1)->table('users')->orderBy()->get();

trait QueryBuilder
{
    private function table($table)
    {
        echo $table.'<br/>';
        return $this;
    }

    private function get()
    {
        echo 'Fetch All Data <br/>';
    }

    private function where($field, $compare, $value)
    {
        echo 'where <br/>';
        return $this;
    }
}

class DB
{
    use QueryBuilder;

    private $query;

    public static function __callStatic($method, $args)
    {
        //CallStatic sẽ gọi khi truy cập vào 1 phương thức tĩnh không được phép hoặc không tồn tại
        return call_user_func_array([new self(), $method], $args);
    }

    public function __call($method, $args)
    {
        return call_user_func_array([$this, $method], $args);
    }

    public function getA()
    {

    }

    private function getResult()
    {
        //echo __CLASS__;
        //echo __METHOD__;
        // if (method_exists($this, 'getA')) {
        //     echo 'Tồn tại phương thức getA';
        // } else {
        //     echo 'Không tồn tại phương thức getA';
        // }

        if (property_exists($this, 'query')) {
            echo 'Tồn tại thuộc tính query';
        } else {
            echo 'Không tồn tại thuộc tính query';
        }
    }
}

//DB::where('id', '>', 1)->table('users')->get();
// DB::get();
DB::getResult();
