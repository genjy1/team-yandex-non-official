<?php

use Classes\Players;
use Classes\Response;
use Classes\Router;

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
header('Access-Control-Allow-Origin: *');


require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/vendor/autoload.php';

try {
    $router = new Router();

    $router->setApi([
        'route' => '/api/players',
        'handler' => function() {
            Players::get_players();
        },
    ]);

    $handler = $router->getHandler($_SERVER['REQUEST_URI']);
    if ($handler) {
        $handler();
    } else {
        Response::json(['error' => 'Not Found'], 404);
    }
} catch (\Exception $e) {
    Response::json(['error' => $e->getMessage()], 500);
}



