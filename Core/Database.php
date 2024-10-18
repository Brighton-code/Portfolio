<?php

class Database {
	public static function initialize() {
		try {
			$dsn = sprintf('mysql:host=%s;dbname=%s;', [$_ENV['DB_HOST'], $_ENV['DB_NAME']]);
			$options = [
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
			];
			$conn = new PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASS'], $options);
			return $conn;
		} catch (PDOException $e) {
			var_dump($e->getMessage());
		}
	}
}
