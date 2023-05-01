<?php declare(strict_types=1);

require 'vendor/autoload.php';

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {
    $r->addRoute('GET', '/', 'GifController@search');
    $r->addRoute('GET', '/trending', 'GifController@trending');
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
        break;
    case Dispatcher::FOUND:
        $handler = $routeInfo[1];

        [$controllerName, $methodName] = explode('@', $handler);
        $controllerName = 'App\Controllers\\' . $controllerName;
        $controller = new $controllerName;
        $response = $controller->{$methodName}();
        break;
}