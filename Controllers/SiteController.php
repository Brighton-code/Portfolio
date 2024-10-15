<?php

namespace Controller;

class SiteController {
	public function home() {
		echo "Home page!";
	}
	public function homeId($uriParams) {
		$id = $uriParams['id'];
		echo $id;
	}
	public function about() {
		echo "About page!";
	}
	public function aboutId($uriParams) {
		$id = $uriParams['id'];
		echo $id;
		echo '<br> About';
	}
}
