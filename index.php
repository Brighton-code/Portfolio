<?php

$uri = $_SERVER['REQUEST_URI'];
switch ($uri) {
	case '/':
		require 'views/home.view.php';
		break;
	case '/about':
		require 'views/about.view.php';
		break;
	case '/contact':
		require 'views/contact.view.php';
		break;
	case '/portfolio':
		require 'views/portfolio.view.php';
		break;
	default:
		header('HTTP/1.1 404 Not Found');
		require 'views/404.view.php';
		break;
}
