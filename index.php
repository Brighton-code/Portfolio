<?php

require_once 'Router.php';
$router = new Router();

$router->add('GET', '/', 'HomeController', 'page');
$router->add('GET', '/about', 'AboutController', 'page');
$router->add('GET', '/contact', 'ContactController', 'page');
$router->add('GET', '/portfolio', 'PortfolioController', 'page');

$router->run();
