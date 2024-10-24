<?php

class ProjectController extends Database {
	public function index() {
		$error = [];
		$data = [];
		$conn = self::initialize();
		try {
			$stmt = $conn->prepare('SELECT * FROM projects LEFT JOIN users on projects.user_id = users.id');
			$stmt->execute();
			$data = $stmt->fetchAll();
		} catch (Exception $e) {
			$error[] = ['msg' => $e->getMessage(), 'type' => 'CRITICAL'];
		}

		if (empty($data)) {
			$error[] = ['msg' => 'No projects found', 'type' => 'WARNING'];
		}
		include './Views/projects.view.php';
	}
}
