<?php

class AccountController extends Database {
	public function viewLogin() {
		include './Views/login.view.php';
	}

	public function login() {
		$error = [];
		$input = [
			'username' => $_POST['username'] ?? false,
			'password' => $_POST['password'] ?? false
		];
		foreach ($input as $key => $is_set) {
			if (!$is_set) {
				$error[] = ['msg' => "$key not send", 'type' => 'CRITICAL'];
				$error['input'][$key] = "$key required";
			}
		}

		if (!empty($error)) {
			include './Views/login.view.php';
			return;
		}
		if (null !== getenv('IS_ADMIN') && getenv('IS_ADMIN')) {
			$_SESSION['user_id'] = 1;
			$_SESSION['username'] = 'admin';
			$_SESSION['is_admin'] = true;
		} else {
			$data = false;
			$conn = self::initialize();
			try {
				$stmt = $conn->prepare('SELECT * FROM users WHERE name = :name LIMIT 1');
				$stmt->bindParam(':name', $input['username']);
				$stmt->execute();
				$data = $stmt->fetch();
			} catch (Exception $e) {
				$error[] = ['msg' => $e->getMessage(), 'type' => 'CRITICAL'];
			}

			if (!$data || !password_verify($input['password'], $data['passwd'])) {
				$error[] = ['msg' => 'Incorrect Username or Password', 'type' => 'WARNING'];
				$error['input']['message'] = 'Incorrect Username or Password';
				include './Views/login.view.php';
				return;
			}

			$_SESSION['user_id'] = $data['id'];
			$_SESSION['username'] = $data['name'];
			$_SESSION['is_admin'] = $data['is_admin'] ? true : false;
		}
		header('location: /');
		exit;
	}

	public function viewRegister() {
	}

	public function register() {
		$username = 'Brighton';
		$password = getenv('TMP_PASS');
		$password = password_hash($password, PASSWORD_DEFAULT);
		$is_admin = true;

		$conn = self::initialize();
		try {
			$stmt = $conn->prepare('INSERT INTO users (name, passwd, is_admin) value (:name, :passwd, :is_admin)');
			$stmt->bindParam(':name', $username);
			$stmt->bindParam(':passwd', $password);
			$stmt->bindParam(':is_admin', $is_admin, PDO::PARAM_INT);
			$stmt->execute();
		} catch (Exception $e) {
			$error[] = ['msg' => $e->getMessage(), 'type' => 'CRITICAL'];
		}
	}

	public function logout() {
		if (!isset($_SESSION['user_id'])) {
			session_start();
		}
		session_destroy();
		header('location: /');
		exit;
	}
}
