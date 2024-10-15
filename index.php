<?php


use Router;
use Controller;

$router = new Router\Router();

$router->addRoute('GET', '/', [Controller\SiteController::class, 'home']);
$router->addRoute('GET', '/about', [Controller\SiteController::class, 'about']);
$router->addRoute('GET', '/:id', [Controller\SiteController::class, 'homeId']);
$router->addRoute('GET', '/about/:id', [Controller\SiteController::class, 'aboutId']);


$router->matchRoute();
