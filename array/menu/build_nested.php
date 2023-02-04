<?php

require_once 'data.php';
require_once 'functions.php';

$nested = buildNested($menus);

echo '<pre>';
print_r($nested);
echo '</pre>';
