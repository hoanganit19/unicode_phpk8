<?php

//Kết nối với database => check kết quả => Trả về (echo)

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    if ($email == 'nguyenvana@gmail.com') {
        $response = [
            'status' => 'success'
        ];
    } else {
        $response = ['status' => 'error'];
    }

    echo json_encode($response);
}
