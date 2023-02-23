<?php

require_once 'connect.php';

$sql = "DELETE FROM groups WHERE id=?";

$statement = $conn->prepare($sql);

$data = [
    1
];

$status = $statement->execute($data);

var_dump($status);
