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

	public function viewProject($paramaters) {
		$id = $paramaters['id'];
		$error = [];
		$data = [];
		$conn = self::initialize();
		try {
			$stmt = $conn->prepare('SELECT p.id project_id, p.user_id user_id, p.title title, p.description description, p.content content, p.created_at created_at, p.updated_at updated_at, u.name name, u.is_admin is_admin FROM projects AS p LEFT JOIN users AS u on p.user_id = u.id WHERE p.id = :id ');
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			$data = $stmt->fetch();
		} catch (Exception $e) {
			$error[] = ['msg' => $e->getMessage(), 'type' => 'CRITICAL'];
		}

		if (empty($data)) {
			$error[] = ['msg' => 'No project found', 'type' => 'WARNING'];
		}
		include './Views/single.projects.view.php';
	}
}
