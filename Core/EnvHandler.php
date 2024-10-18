<?php

class EnvHandler {
	public static function get_env() {
		$env = parse_ini_file('.env');

		foreach ($env as $key => $value) {
			if (getenv($key)) {
				throw new EnvException("$key already exists.");
			}
			putenv("$key=$value");
		}
	}
}
