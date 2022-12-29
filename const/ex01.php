<?php 
define('_WEB_URL', 'http://localhost/phpk8');
const _SITE_NAME = 'Unicode Academy';
echo _WEB_URL;
echo '<br/>';
echo _SITE_NAME;

echo '<hr/>';
$siteUrl = 'http://localhost/phpk8';
//define('_CURRENT_URL', _WEB_URL.'/khoa-hoc');
//define('_CURRENT_URL', $siteUrl.'/khoa-hoc');

//const _CURRENT_URL = _WEB_URL.'/khoa-hoc';
const _SITE_URL = 'http://localhost/phpk';
const _CURRENT_URL = _SITE_URL.'/khoa-hoc';

echo _CURRENT_URL;

echo '<hr/>';

$check = defined('_SITE_NAME');
var_dump($check);