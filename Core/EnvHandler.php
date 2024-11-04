<?php

class EnvHandler {
	/**
	 * Get .env file and loop through each key=>value
	 * if key already exists in the enviroment variables
	 * throw error
	 * else insert key=>value in enviroment variables.
	 */
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
