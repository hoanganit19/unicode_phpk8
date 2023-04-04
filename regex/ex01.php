<?php

$subject = 'tahoanganit19@gmail.com';
$pattern = '/[A-Z0-9a-z@abc]/'; // /hoangan/

$check = preg_match($pattern, $subject);
var_dump($check);
