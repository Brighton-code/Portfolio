<?php

require_once './Core/CustomExceptions.php';
require_once './Core/EnvHandler.php';
require_once './Core/Database.php';
require_once './Core/Router.php';

EnvHandler::get_env();
$router = new Router();

$router->addRoute('GET', '/', ['SiteController', 'index']);
$router->addRoute('GET', '/login', ['AccountController', 'viewLogin']);
$router->addRoute('POST', '/login', ['AccountController', 'login']);
$router->addRoute('GET', '/logout', ['AccountController', 'logout']);

$router->addRoute('GET', '/projects', ['ProjectController', 'index']);
$router->addRoute('POST', '/projects', ['ProjectController', 'createProject']);
$router->addRoute('GET', '/projects/create', ['ProjectController', 'createProjectView']);
$router->addRoute('GET', '/projects/:id', ['ProjectController', 'viewProject']);
$router->addRoute('GET', '/projects/:id/update', ['ProjectController', 'updateProject']);

$router->matchRoute();
