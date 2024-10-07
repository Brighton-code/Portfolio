<?php

$uri = $_SERVER['REQUEST_URI'];
switch ($uri) {
	case '':
	case '/':
		require 'controllers/HomeController.php';
		$homeController::page();
		break;
	case '/about':
		require 'controllers/AboutController.php';
		$aboutController::page();
		break;
	case '/contact':
		require 'controllers/ContactController.php';
		$contactController::page();
		break;
	case '/portfolio':
		require 'controllers/PortfolioController.php';
		$portfolioController::page();
		break;
	default:
		header('HTTP/1.1 404 Not Found');
		require 'views/404.view.php';
		break;
}
