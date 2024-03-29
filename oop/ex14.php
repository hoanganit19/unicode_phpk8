<?php

require_once 'traits/Core.php';
require_once 'traits/Builder.php';
require_once 'classes/DB.php';

$db = new DB();
$db->table('users')
->select('id', 'name')
->where(
    'id',
    '=',
    1
)->get();

//Query Builder => Truy vấn CSDL mà không cần viết câu lệnh SQL

//DB::table('users')->select('id', 'name', 'email')->where('id', '>=', 2)->get()

//DB::select('id', 'name', 'email')->table('users')->where('id', '>=', 2)->get()

// $db->table();
// $db->select('id', 'name', 'email');
// $db->where();

//$users = $db->table('users')->get(); //SELECT * FROM users
//$users = $db->select('id', 'name', 'email')->table('users')->get(); //SELECT id, name, email FROM users
//$user = $db->table('users')->where('id', '>', 1)->get(); //SELECT * FROM users WHERE id>1
