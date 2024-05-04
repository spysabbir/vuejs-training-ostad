<?php
/*
Plugin Name: Optimator
Plugin URI: https://wordpress.org/plugins/optimator/
Description: Simplify and streamline WordPress by removing unnecessary data and functionalities.
Version: 1.0.0
Author: Engramium
Author URI: https://engramium.com
License: GPL-3.0-or-later
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Text Domain: optimator
Domain Path: /i18n
*/

namespace Engramium\Optimator;

// If this file is called directly, abort.
defined( 'ABSPATH' ) || exit;


if (!class_exists(Optimator::class) && is_readable(__DIR__ . '/vendor/autoload.php')) {
    /** @noinspection PhpIncludeInspection */
    require_once __DIR__ . '/vendor/autoload.php';
}

class_exists(Optimator::class) && Optimator::instance()->init();
