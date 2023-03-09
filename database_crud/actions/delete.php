<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    $condition = "id = ".$id;
    delete('users', $condition);
    setSession('msg', 'Xóa người dùng thành công');
    setSession('msg_type', 'success');
    redirect('index.php');
} else {
    die('Access denied');
}
