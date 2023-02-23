<?php

require_once 'connect.php';

$sql = "UPDATE groups SET name=:name WHERE id=:id";


$statement = $conn->prepare($sql);

$data = [
    'name' => 'Super Admin 2',
    'id' => 1
];

$status = $statement->execute($data);

var_dump($status);
