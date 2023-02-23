<?php

require_once 'connect.php';

$sql = "INSERT INTO groups(name, created_at, updated_at) VALUES (:name, :created_at, :updated_at)";

$statement = $conn->prepare($sql);

$data = [
    'name' => 'Super Admin',
    'created_at' => date('Y-m-d H:i:s'),
    'updated_at' => date('Y-m-d H:i:s')
];

$status = $statement->execute($data);

var_dump($status);

echo 'Id vừa insert: '.$conn->lastInsertId();
