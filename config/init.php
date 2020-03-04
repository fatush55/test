<?php

define('DEBUG', 1);
define('LAYOUT', 'spa');

define('ROOT', dirname(__DIR__));
define('WWW', ROOT . '/public');
define('APP', ROOT . '/app');
define('LIBS', ROOT . '/vendor/spa/core/libs');

$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
$app_path = preg_replace("#[^/]+$#", '', $app_path);
$app_path = str_replace("/public/", '', $app_path);
define('PATH', $app_path);

require_once ROOT . '/vendor/autoload.php';


