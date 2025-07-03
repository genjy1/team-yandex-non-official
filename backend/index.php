<?php

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
header('Access-Control-Allow-Origin: *');

use TeamYandex\Router;

require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/vendor/autoload.php';

$router = new Router();
$router->setApi([
    'route' => '/api/players',
    'file' => '/scripts/parser.php'
]);

$resolvedPath = $router->resolve($_SERVER['REQUEST_URI']);
if ($resolvedPath) {
    include $resolvedPath;
}else {
    echo '404 Not Found';
}
