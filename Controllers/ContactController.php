<?php
class ContactController extends Database {
	public function index() {
		$error = [];
		$data = [];
		if ($_SESSION['is_admin']) {
			$conn = self::initialize();
			try {
				$stmt = $conn->prepare('SELECT * FROM contact');
				$stmt->execute();
				$data = $stmt->fetchAll();
			} catch (Exception $e) {
				$error[] = ['msg' => $e->getMessage(), 'type' => 'CRITICAL'];
			}
		}

		include './Views/contact.view.php';
	}

	public function create() {
		$error = [];
		$created = false;

		$name = htmlspecialchars($_POST['name'] ?? null);
		$email = htmlspecialchars($_POST['email'] ?? null);
		$message = htmlspecialchars($_POST['message'] ?? null);

		if (!$name || !$email || !$message) {
			$error[] = ['msg' => 'All fields are required', 'type' => 'CRITICAL'];
		}
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error[] = ['msg' => "Invalid email format > $email", 'type' => 'CRITICAL'];
		}

		if (!empty($error)) {
			include './Views/contact.view.php';
			return;
		}

		$conn = self::initialize();
		try {
			$stmt = $conn->prepare('INSERT INTO contact (name, email, message) VALUE (:name, :email, :message)');
			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':message', $message);
			$stmt->execute();
			$created = true;
		} catch (Exception $e) {
			$error[] = ['msg' => $e->getMessage(), 'type' => 'CRITICAL'];
			$created = false;
		}
		include './Views/contact.view.php';
	}
}
