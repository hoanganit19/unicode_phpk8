<?php

require_once 'classes/Database.php';
require_once 'classes/Bussiness.php';
require_once 'classes/Model.php';

$bussiness = new Bussiness(); //Tồn tại kế thừa
$bussiness->query();
$bussiness->getDetail();
$bussiness->getFullInfo();
//$bussiness->getTable();
$bussiness->getTableFromDb();

// $database = new Database(); //Không tồn tại kế thừa
// $database->getFullInfo();

/*
1 số lưu ý khi làm việc với kế thừa
- Thuộc tính và phương thức đều có thể override (Trừ phương thức final và class final)
- 1 class chỉ được phép kế thừa từ 1 class duy nhất
- Nếu muốn kế thừa từ nhiều class, dùng kế thừa đa cấp:A => B => C => D
- Nếu muốn đa kế thừa mà không sử dụng kế thừa đa cấp => Sử dụng Trait
*/
echo '<hr/>';
$model = new Model();
$model->getData();
