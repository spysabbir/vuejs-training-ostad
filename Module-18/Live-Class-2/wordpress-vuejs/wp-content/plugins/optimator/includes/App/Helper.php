<?php

namespace Engramium\Optimator\App;

// If this file is called directly, abort.
defined('ABSPATH') || exit;

/**
 * Any kind of helper class
 *
 *
 * @author sayedulsayem
 * @since 1.0.0
 */
class Helper {

	use \Engramium\Optimator\Traits\Singleton;

	/**
	 * env file read function
	 *
	 * @return array
	 * @since 1.0.0
	 */
	public function read_env_file() {
		$env_data = [];

		$env_file = OPTIMATOR_PATH . '.env';

		if (!file_exists($env_file)) {
			return $env_data;
		}

		$lines = file($env_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

		foreach ($lines as $line) {
			if (strpos($line, '=') !== false && strpos($line, '#') !== 0) {
				list($key, $value) = explode('=', $line, 2);
				$key = trim($key);
				$value = trim($value);

				if (!array_key_exists($key, $env_data)) {
					$env_data[$key] = $value;
				}
			}
		}

		return $env_data;
	}
}
