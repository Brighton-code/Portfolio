<?php
if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) {
	if (isset($error) && !empty($error)) {
		var_dump($error);
	}
}
