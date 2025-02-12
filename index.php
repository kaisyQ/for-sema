<?php

require_once __DIR__ . '/Core/Request.php';
require_once __DIR__ . '/Core/Response.php';
require_once __DIR__ . '/Core/Route.php';
require_once __DIR__ . '/Core/AbstractController.php';
require_once __DIR__ . '/Controllers/HomeController.php';
require_once __DIR__ . '/Controllers/AdminController.php';
require_once __DIR__ . '/Controllers/AboutController.php';

$request = new Request(
    $_SERVER['REQUEST_METHOD'],
    $_SERVER['REQUEST_URI'],
    $_SERVER['SERVER_PROTOCOL'],
);

$homeController = new HomeController();
$aboutController = new AboutController();
$adminController = new AdminController();

/** @var array<class-string> $controllers */
$controllers = [
    HomeController::class,
    AboutController::class,
    AdminController::class,
];

class ClassMethod
{
    public string $methodName;

    public string $className;
}

/** @var array<string, ClassMethod> $routeClassMethodMap */
$routeClassMethodMap = [];

foreach ($controllers as $controller) {
    $reflection = new ReflectionClass($controller);
    foreach ($reflection->getMethods() as $method) {
        foreach ($method->getAttributes() as $attribute) {
            if ($attribute->getName() === Route::class) {
                $classMethod = new ClassMethod();
                $classMethod->methodName = $method->getName();
                $classMethod->className = $controller;
                $routeClassMethodMap[$attribute->getArguments()[0]] = $classMethod;
            }
        }
    }
}

$classMethod = $routeClassMethodMap[$request->uri];
$className = $classMethod->className;
$methodName = $classMethod->methodName;

$class = new $className();

$response = $class->$methodName();

if (!isset($response)) {
    $response = new Response();
        $response->status = 404;
        $response->body = file_get_contents(__DIR__ . '/views/404.html');
}

foreach ($response->headers as $name => $header) {
    header("$name: $header");
}

echo $response->body;
