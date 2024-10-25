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

		$user_id = intval($_POST['user_id']);
		$company = htmlspecialchars($_POST['company']);
		$func = htmlspecialchars($_POST['func'] ?? null);
		$date_from = $_POST['date_from'];
		$date_to = $_POST['date_to'];

		$conn = self::initialize();
		try {
			$stmt = $conn->prepare('INSERT INTO experience (user_id, company, func, date_from, date_to) VALUE (:user_id, :company, :func, :date_from, :date_to)');
			$stmt->bindParam(':user_id', $user_id);
			$stmt->bindParam(':company', $company);
			$stmt->bindParam(':func', $func);
			$stmt->bindParam(':date_from', $date_from);
			$stmt->bindParam(':date_to', $date_to);
			$stmt->execute();
		} catch (Exception $e) {
		}
		$this->index();
	}
}
