<?php

class Database {
	public static function initialize() {
		try {
			$dsn = sprintf('mysql:host=%s;port=%s;dbname=%s;', getenv('DB_HOST'), getenv('DB_PORT'), getenv('DB_NAME'));
			$options = [
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
			];
			$conn = new PDO($dsn, getenv('DB_USER'), getenv('DB_PASS'), $options);
			return $conn;
		} catch (PDOException $e) {
			var_dump($e->getMessage());
		}
	}
}
