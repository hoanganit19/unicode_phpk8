<?php

namespace Core;

use Core\Database\Connection;

class Model
{
    private $conn = null;

    public function __construct()
    {
        $instance = Connection::getInstance();
        $this->conn =  $instance->getConnection();
    }

    public function query($sql)
    {
        //Trả về statement
    }

    //Viết các phương thức truy vấn CSDL

    public function get($sql)
    {
        //truy vấn lấy danh sách trong database
    }

    public function first($sql)
    {

    }

    public function create($table, $data = [])
    {

    }

    public function update($table, $data = [], $condition = null)
    {

    }

    public function remove($table, $condition = null)
    {

    }
}