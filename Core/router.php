<?php

use Core\Response;
use JetBrains\PhpStorm\NoReturn;

$routes = require base_path('routes.php');

function routeToController($uri, $routes): void
{
    if (array_key_exists($uri, $routes)) {
        require base_path($routes[$uri]);
    } else {
        abort();
    }
}

#[NoReturn] function abort($statusCode = Response::NOT_FOUND): void
{
    http_response_code($statusCode);
    require base_path("views/{$statusCode}.php");
    die();
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToController($uri, $routes);