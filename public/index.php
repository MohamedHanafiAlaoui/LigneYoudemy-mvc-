<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;


$routes = require __DIR__ . '/../App/config/routes.php';


$url = $_GET['url'] ?? 'home';


if (array_key_exists($url, $routes)) {
    $controllerName = "App\\Controllers\\" . $routes[$url]['controller'];
    $method = $routes[$url]['method'];

    
    $controller = new $controllerName();
    $controller->$method();
} else {
    $controller = new HomeController();
    $controller->notFound();
}