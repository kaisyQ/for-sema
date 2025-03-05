<?php

use Jason\Backend\Controllers\AboutController;
use Jason\Backend\Controllers\AdminController;
use Jason\Backend\Controllers\HomeController;
use Jason\Backend\Core\Database\DatabaseFactory;
use Jason\Backend\Core\RequestFactory;
use Jason\Backend\Core\Response;
use Jason\Backend\Core\Route;
use Jason\Backend\Core\Model\ClassMethod;
use Symfony\Component\Yaml\Yaml;

require_once __DIR__ . '/vendor/autoload.php';

$request = RequestFactory::create();

/** @var array<class-string> $controllers */
$controllers = [
    HomeController::class,
    AboutController::class,
    AdminController::class,
];

$value = Yaml::parseFile(__DIR__ .'/config/database.yml');
$value = $value['pdo'];
$databaseFactory = new DatabaseFactory(
    $value['host'], 
    $value['port'],
    $value['username'],
    $value['password'],
    $value['db_name'],
);
$database = $databaseFactory->create();


/** @var array<string, ClassMethod> $routeClassMethodMap */
$routeClassMethodMap = [];

foreach ($controllers as $controller) {
    $reflection = new ReflectionClass($controller);
    foreach ($reflection->getMethods() as $method) {
        foreach ($method->getAttributes() as $attribute) {
            if ($attribute->getName() === Route::class) {
                $classMethod = new ClassMethod();
                $classMethod->setMethodName($method->getName());
                $classMethod->setClassName($controller);
                $routeClassMethodMap[$attribute->getArguments()[0]] = $classMethod;
            }
        }
    }
}

if (!isset($routeClassMethodMap[$request->getUri()])) {
    $response = new Response();
    $response->status = 404;
    $response->body = file_get_contents(__DIR__ . '/views/404.jason.html');
} else {
    $classMethod = $routeClassMethodMap[$request->getUri()];
    $className = $classMethod->getClassName();
    $methodName = $classMethod->getMethodName();

    $class = new $className();
    /** @var Response */
    $response = $class->$methodName();
}

echo $response;