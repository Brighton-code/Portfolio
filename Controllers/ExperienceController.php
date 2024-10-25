<?php

class ExperienceController extends Database {
	public function index() {
		$error = [];
		$data = [];
		$conn = self::initialize();
		try {
			$stmt = $conn->prepare('SELECT * FROM experience');
			$stmt->execute();
			$data = $stmt->fetchAll();
		} catch (Exception $e) {
			$error[] = ['msg' => $e->getMessage(), 'type' => 'CRITICAL'];
		}

		if (empty($data)) {
			$error[] = ['msg' => 'No Experience found', 'type' => 'WARNING'];
		}
		include './Views/experience.view.php';
	}

	public function createView() {
		if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
			header('Location: /ervaring');
			exit;
		}
		include './Views/form.experience.view.php';
	}

	public function create() {
		if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
			$this->index();
			return;
		}
	}
}
