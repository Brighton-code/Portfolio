<?php

// Make use of namespace? didn't work, kept getting not found error.
require_once 'Router.php';
require_once 'Controllers/SiteController.php';

$router = new Router();

$router->addRoute('GET', '/', [SiteController::class, 'home']);
$router->addRoute('GET', '/about', [SiteController::class, 'about']);
$router->addRoute('GET', '/:id', [SiteController::class, 'homeId']);
$router->addRoute('GET', '/about/:id', [SiteController::class, 'aboutId']);

$router->matchRoute();
