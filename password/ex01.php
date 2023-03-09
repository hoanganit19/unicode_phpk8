<?php

$password = '123456';
//$passwordHash = password_hash($password, PASSWORD_DEFAULT);
//echo $passwordHash;

$dbHash = '$2y$10$Fq6akC63Bqvgj4hHS4FuAOBY8M1yRAb9eQytJdLn/xdr4dPqG9QYG';

$checkPassword = password_verify($password, $dbHash);
var_dump($checkPassword);
