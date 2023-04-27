<?php

namespace Core\Database;

use PDO;
use PDOException;
use Core\Database\Connection;

trait Database
{
    private $conn = null;

    public function __construct()
    {
        $instance = Connection::getInstance();
        $this->conn =  $instance->getConnection();

    }

    private function query($sql, $data=[], $isStatus = true)
    {
        //Trả về statement
        try {
            $statement = $this->conn->prepare($sql);
            $status = $statement->execute($data);

            if ($isStatus) {
                return $status;
            }

            return $statement;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

    //Viết các phương thức truy vấn CSDL

    private function get($sql, $data = [])
    {
        //truy vấn lấy danh sách trong database
        $statement = $this->query($sql, $data, false);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    private function first($sql)
    {
        $statement = $this->query($sql, $data, false);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    private function create($table, $attributes = [])
    {
        if (!empty($attributes)) {
            $keys = array_keys($attributes);
            $sql = "INSERT INTO {$table}(".implode(', ', $keys).") VALUES(:".implode(', :', $keys).")";
            $status = $this->query($sql, $attributes);

            return $status;
        }

        return false;
    }

    private function createGetId($table, $attributes = [])
    {
        global $conn;
        if (!empty($attributes)) {
            $this->create($table, $attributes);
            return $this->conn->lastInsertId();
        }

        return false;
    }

    private function update($table, $attributes = [], $condition = null)
    {
        //UPDATE groups SET name=:name, email=:email WHERE id=:id

        if (!empty($attributes)) {
            $keys = array_keys($attributes);
            $update = "";
            foreach ($keys as $key) {
                $update.=$key.'=:'.$key.', ';
            }

            $update = rtrim($update, ', ');

            if (!empty($condition)) {
                $sql = "UPDATE {$table} SET ".$update." WHERE $condition";
            } else {
                $sql = "UPDATE {$table} SET ".$update."";
            }

            $status = $this->query($sql, $attributes);

            return $status;
        }

        return false;
    }


    private function remove($table, $condition = null)
    {
        if (!empty($condition)) {
            $sql = "DELETE FROM {$table} WHERE $condition";
        } else {
            $sql = "DELETE FROM {$table}";
        }

        $status = $this->query($sql);
        return $status;
    }

    private function count($sql, $data = [])
    {
        $statement = $this->query($sql, $data, false);
        return $statement->rowCount();
    }

    public static function __callStatic($method, $args)
    {
        return call_user_func_array([new self(), $method], $args);
    }

    public function __call($method, $args)
    {
        return call_user_func_array([$this, $method], $args);
    }
}
