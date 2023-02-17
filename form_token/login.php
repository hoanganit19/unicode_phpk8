<?php

session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_SESSION['csrf_token']) && !empty($_POST['_token'])) {
        $token = $_POST['_token'];
        $tokenSession = $_SESSION['csrf_token'];

        if ($token == $tokenSession) {
            echo '<pre>';
            print_r($_POST);
            echo '</pre>';
        } else {
            echo 'Token không hợp lệ';
        }
    } else {
        echo 'Token không hợp lệ';
    }
}
