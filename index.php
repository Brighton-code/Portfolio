<?php

require_once './Core/CustomExceptions.php';
require_once './Core/EnvHandler.php';
require_once './Core/Database.php';
require_once './Core/Router.php';

EnvHandler::get_env();
$router = new Router();

$router->addRoute('GET', '/', ['SiteController', 'home']);
$router->addRoute('GET', '/login', ['AccountController', 'viewLogin']);
$router->addRoute('POST', '/login', ['AccountController', 'login']);
$router->addRoute('GET', '/logout', ['AccountController', 'logout']);
$router->addRoute('GET', '/:id', ['SiteController', 'homeId']);

$router->matchRoute();
