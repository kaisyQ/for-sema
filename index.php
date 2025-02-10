<?php

require_once __DIR__ . '/Core/Request.php';
require_once __DIR__ . '/Core/Response.php';
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

$response = null;

switch ($request->uri) {
    case '/':
    case "/index":
    case "/home":
        $response = $homeController->getHomePage();
        break;
    case '/about':
        $response = $aboutController->getAboutPage();
        break;
    case '/admin':
        $response = $adminController->getAdminPage();
        break;
    default:
        $response = new Response();
        $response->status = 404;
        $response->body = file_get_contents(__DIR__ . '/views/404.html');
        break;
}

foreach ($response->headers as $name => $header) {
    header("$name: $header");
}

echo $response->body;
