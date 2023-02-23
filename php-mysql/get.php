<?php

require_once 'connect.php';

//Tạo statement
$sql = 'SELECT * FROM groups';

$statement = $conn->prepare($sql);

//Thực thi câu lệnh sql
$statement->execute();

//Trả về dữ liệu

// $users = $statement->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// print_r($users);
// echo '</pre>';

//Lấy số lượng bản ghi trả về
echo $statement->rowCount();

// $user = $statement->fetch(PDO::FETCH_ASSOC);

// echo '<pre>';
// print_r($user);
// echo '</pre>';
