<?php

session_start(); //Đặt đầu file php

//set session

// $_SESSION['email'] = 'hoangan.web@gmail.com';
// $_SESSION['username'] = 'hoangan';

//get session

// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

//update session
//$_SESSION['email'] = 'contact@unicode.vn';

//delete session

//unset($_SESSION['email']);

//delete all session

//session_destroy(); //Xóa cả file session

session_unset(); //Xóa nội dung file session
