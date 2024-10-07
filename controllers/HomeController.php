<?php

class HomeController
{
	public static function page()
	{
		$title = 'Home';
		include 'views/home.view.php';
	}
}
