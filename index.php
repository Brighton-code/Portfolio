<?php

require_once './Core/CustomExceptions.php';
require_once './Core/Database.php';
require_once './Core/Router.php';

$router = new Router();

$router->addRoute('GET', '/', ['SiteController', 'home']);
$router->addRoute('GET', '/:id', ['SiteController', 'homeId']);
$router->addRoute('GET', '/about', ['SiteController', 'about']);
$router->addRoute('GET', '/about/:id', ['SiteController', 'aboutId']);

$router->matchRoute();
