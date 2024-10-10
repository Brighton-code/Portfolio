<?php

require_once 'Router.php';

Router::add('GET', '/', 'HomeController', 'page');
Router::add('GET', '/about', 'AboutController', 'page');
Router::add('GET', '/contact', 'ContactController', 'page');
Router::add('GET', '/portfolio', 'PortfolioController', 'page');

Router::run();
