<?php

trait Builder
{
    use Core;
    private $table;

    public function __construct()
    {
        echo 'construct builder traits <br/>';
    }

    public function table($table)
    {
        $this->table = $table;
        return $this;
    }

    public function select(...$columns)
    {
        //Xử lý logic
        return $this;
    }

    public function where($field, $compare, $value)
    {
        //Xử lý logic
        return $this;
    }

    public function get()
    {
        echo 'get data from database <br/>';
    }
}
