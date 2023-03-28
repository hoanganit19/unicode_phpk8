<?php

require_once 'interface/ArrayAccessInterface.php';
require_once 'interface/AuthInterface.php';
require_once 'interface/RoleInterface.php';
require_once 'classes/Auth.php';

$auth = new Auth();
$auth->login();
echo '<br/>';
echo $auth::MSG.'<br/>';
