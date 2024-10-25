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
		if ($_POST['date_to'] !== '' || $_POST['date_to'] > '2100-01-01') {
			$date_to = '2100-01-01';
		} else {
			$date_to = $_POST['date_to'];
		}

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
			die(var_dump($e->getMessage()));
		}
		$this->index();
	}

	public function updateView($paramaters) {
		$id = $paramaters['id'];
		if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
			header("Location: /ervaring");
			exit;
		}
		$error = [];
		$data = [];
		$conn = self::initialize();
		try {
			$stmt = $conn->prepare('SELECT * FROM experience WHERE id = :id');
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			$data = $stmt->fetch();
		} catch (Exception $e) {
			$error[] = ['msg' => $e->getMessage(), 'type' => 'CRITICAL'];
		}

		if (empty($data)) {
			$error[] = ['msg' => 'No Experience found', 'type' => 'WARNING'];
		}
		include './Views/form.experience.view.php';
	}

	public function update($paramaters) {
		$id = $paramaters['id'];
		if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
			header("Location: /ervaring");
			exit;
		}

		$user_id = intval($_POST['user_id']);
		$company = htmlspecialchars($_POST['company']);
		$func = htmlspecialchars($_POST['func'] ?? null);
		$date_from = $_POST['date_from'];
		if ($_POST['date_to'] !== '' || $_POST['date_to'] > '2100-01-01') {
			$date_to = '2100-01-01';
		} else {
			$date_to = $_POST['date_to'];
		}

		$conn = self::initialize();
		try {
			$stmt = $conn->prepare('UPDATE experience SET user_id = :user_id, company = :company, func = :func, date_from = :date_from, date_to = :date_to WHERE id = :id');
			$stmt->bindParam(':id', $id);
			$stmt->bindParam(':user_id', $user_id);
			$stmt->bindParam(':company', $company);
			$stmt->bindParam(':func', $func);
			$stmt->bindParam(':date_from', $date_from);
			$stmt->bindParam(':date_to', $date_to);
			$stmt->execute();
		} catch (Exception $e) {
		}

		$this->updateView($paramaters);
	}

	public function delete($paramaters) {
		$id = $paramaters['id'];
		if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
			header('Location: /ervaring');
			exit;
		}

		$conn = self::initialize();
		try {
			$stmt = $conn->prepare('DELETE FROM experience WHERE id = :id');
			$stmt->bindParam(':id', $id);
			$stmt->execute();
		} catch (Exception $e) {
		}

		header('Location: /ervaring');
		exit;
	}
}
