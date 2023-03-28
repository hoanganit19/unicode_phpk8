<?php

require_once 'classes/BaseModel.php';
require_once 'classes/User.php';

$user = new User();

echo $user->add();
