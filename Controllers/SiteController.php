<?php

class SiteController {
	public function home() {
		echo "Home page!";
	}
	public function homeId($uriParams) {
		$id = $uriParams['id'];
		echo $id;
	}
}
