<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use SecTheater\Http\Route;
use SecTheater\Http\Request;
use SecTheater\Http\Response;

require_once __DIR__ .'/../src/support/helpers.php';

require_once base_path() . 'vendor/autoload.php';
require_once base_path() . 'routes/web.php';

$route=new Route(new Request,new Response);



$route->resolve();


