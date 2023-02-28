<?php

require_once 'config.php';
require_once 'connect.php';
require_once 'functions.php';

// update('users', [
//     'name' => "hoàng an",
//     'email' => 'hoangan.web@gmail.com'
// ], "id = 10");

// delete("users", "id = 11");

// $groups = get("SELECT * FROM groups");

// echo '<pre>';
// print_r($groups);
// echo '</pre>';

// $group = first("SELECT * FROM groups WHERE id = :id", ['id' => 2]);
// echo '<pre>';
// print_r($group);
// echo '</pre>';

echo getRows("SELECT nam FROM users");
