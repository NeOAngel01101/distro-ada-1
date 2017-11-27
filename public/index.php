<?php
require_once '../vendor/autoload.php';

use Phroute\Phroute\RouteCollector;

// Punto de entrada a la aplicación
require_once '../config.php';
require_once '../connectdb.php';
require_once '../arrays.php';
require_once '../helpers.php';
require_once '../dbhelpers.php';

$baseDir = str_replace(
    basename($_SERVER['SCRIPT_NAME']),
    '',
    $_SERVER['SCRIPT_NAME']);

$baseUrl = "http://" . $_SERVER['HTTP_HOST'] . $baseDir;
define('BASE_URL', $baseUrl);

$route = $_GET['route'] ?? "/";

$router = new RouteCollector();

$router->controller('/', App\Controllers\HomeController::class);
$router->controller('/distros', App\Controllers\DistrosController::class);

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$method = $_REQUEST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$response = $dispatcher->dispatch($method, $route);

// Print out the value returned from the dispatched function
echo $response;