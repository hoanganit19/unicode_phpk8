<?php

namespace Core\Database;

use PDO;
use Exception;

class Connection
{
    private $conn;
    private static $instance = null;

    public function __construct()
    {
        //Code connect database

        $connectionDefault = config('database.connection_default');

        $databaseInfo = config('database.'.$connectionDefault);

        $driver = $databaseInfo['driver'];

        $host = $databaseInfo['host'];

        $user = $databaseInfo['user'];

        $password = $databaseInfo['password'];

        $dbName = $databaseInfo['db_name'];

        try {
            $dns = $driver.':dbname='.$dbName.';host='.$host;

            $options = [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", //Hỗ trợ tiếng việt
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //Đẩy lỗi ra ngoại lệ khi gặp lỗi truy vấn (Sai lệnh câu lệnh SQL)
            ];
            $this->conn = new PDO(
                $dns,
                $user,
                $password,
                $options
            );
        } catch(Exception $e) {
            echo $e->getMessage().'<br/>';
            echo $e->getLine().'<br/>';
            echo $e->getFile().'<br/>';
            die();
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}