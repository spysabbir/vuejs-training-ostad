<?php

/**
 * Plugin Name: Eazy Plugin Manager
 * Description: Powerful Plugin Management Solution for WordPress
 * Author URI:  https://eazyplugins.com/
 * Plugin URI:  https://eazyplugins.com/eazy-plugin-manager/
 * Version:     4.1.6
 * Author:      EazyPlugins
 * Text Domain: eazy-plugin-manager
 * Domain Path: /i18n
 */

namespace EazyPlugins;

use POS_Assets;
use POS_Plugins;
use ZipArchive;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use Rest_Api;

require_once plugin_dir_path(__FILE__) . 'libs/class.global_functions.php';
require_once plugin_dir_path(__FILE__) . 'libs/class.pos_plugins.php';
require_once plugin_dir_path(__FILE__) . 'libs/class.pos_assets.php';

if(!defined('POS_PATH')) {
	define('POS_PATH', plugin_dir_path(__FILE__));
}

if(!defined('POS_URL')) {
	define('POS_URL', plugin_dir_url(__FILE__));
}

if( !defined('POS_API_ENDPOINT') ) {
	define('POS_API_ENDPOINT', 'https://api.eazypluginmanager.com');
}

class EazyPluginManager {

	private $site_id;
	private $x16s;
	private $x32s;
	private $x64s;
	private $signature;
	private $all_plugins;
	private $plugins_detail;

	function __construct() {
		$this->define_constants();
		$this->x16s = ['68d6b7ffee6bed49763affbc223426a084f25fe', '689a612d0c9184056bf5027df6bcbdd24f4eb632', 'fc1138b05bd931c1772eed76b192633c6436167a', 'fa6881c8c5835cf7bab33667f8269f7e06800857', 'fcacfa5b229133d001cbd2fafc8686911be5e68c'];
		$this->x32s = ['689a612d0c9184056bf5027df6bcbdd24f4eb632', 'fc1138b05bd931c1772eed76b192633c6436167a', 'fa6881c8c5835cf7bab33667f8269f7e06800857', 'fcacfa5b229133d001cbd2fafc8686911be5e68c', 'f14179f0bf68dbbeb1eba5b8f6a0ed8be8c5f6cc'];
		$this->x64s = ['fc1138b05bd931c1772eed76b192633c6436167a', 'fcacfa5b229133d001cbd2fafc8686911be5e68c'];
		$this->signature = sha1(get_option('pos-x16'));
		add_action('init', [$this, 'init']);
		add_action('admin_init', [$this, 'activation_redirect']);
		register_activation_hook(__FILE__, [$this, 'activate']);

		if (!function_exists('get_plugins')) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		$this->site_id = str_replace('.', '_', $_SERVER['SERVER_NAME']);
		// $this->fetch_histories();

		$request_uri = sanitize_url($_SERVER['REQUEST_URI']);
		if (is_admin()) {
			$this->all_plugins = get_plugins();
		}

		add_action('admin_notices', [$this, 'display_login_notice']);
	}

	function display_login_notice() {
		if (current_user_can('manage_options')) {
			$login_link = '<a href="' . admin_url('/admin.php?page=pos-settings') . '">' . __("sign in", POS_TEXT_DOMAIN) . '</a>';
			if (!$this->isLoggedIn() && get_option('pos_login_notice_dismissed') == false) {
				echo '<div class="notice notice-warning pos-notice is-dismissible"><p>' .
					sprintf(__('Please %s to use all features of Eazy Plugin Manager.', POS_TEXT_DOMAIN), $login_link) .
					'</p></div>';
			}
		}
	}


	function display_freeze_notice() {
		$current_user = wp_get_current_user();
		if (get_option('pos_plugin_frozen', 2) == 1 && $current_user->user_nicename != get_option('pos_plugin_frozen_by')) {
			echo '<div class="notice notice-error pos-notice"><p>' .
				sprintf(__('You cannot install/activate/deactivate plugins because this feature is frozen. Please contact <span class="pos_frozen_by"><strong>%s</strong></span> for unfreezing.', POS_TEXT_DOMAIN), get_option('pos_plugin_frozen_by')) .
				'</p></div>';
		}
	}

	function add_download_links() {
		foreach ($this->all_plugins as $key => $value) {
			add_filter('plugin_action_links_' . $key, array($this, 'pos_plugin_download_link'), 20, 2);
		}
	}

	function pos_plugin_download_link($links, $plugin_file) {
		$version = $this->all_plugins[$plugin_file]['Version'];
		if (strpos($plugin_file, '/') !== false) {
			$explode = explode('/', $plugin_file);
			$path    = $explode[0];
			$folder  = 1;
		} else {
			$path   = $plugin_file;
			$folder = 2;
		}

		$pluginDownloadLink = admin_url('plugins.php?action=pos-download&pos_plugin_download=' . $path . '&f=' . $folder);
		$download_link      = array(
			'<span class="pos_download-wrap">
            <a href="' . esc_url($pluginDownloadLink) . '" class="pos_download_link">' . esc_html__('Download', POS_TEXT_DOMAIN) . '</a>
            </span>',
			'<span class="pos_bookmark-wrap">
            <a href="#" class="pos_bookmark_link pos_bookmark_link_' . esc_attr($path) . '" data-slug="' . esc_attr($path) . '">' . esc_html__('Bookmark', POS_TEXT_DOMAIN) . '</a>
            </span>',
		);

		$download_link[] =
			'<span class="pos_vault-wrap">
				<a href="#" data-folder="' . $folder . '" class="pos_vault_link" data-slug="' . esc_attr($path) . '" data-version="' . esc_attr($version) . '">' . esc_html__('Send To Vault', POS_TEXT_DOMAIN) . '</a>
				</span>';

		return array_merge($links, $download_link);
	}

	function activation_redirect() {
		//

		if (get_option('pos_activation_redirect', false) == true) {
			delete_option('pos_activation_redirect');
			exit(wp_redirect("admin.php?page=pos-settings"));
		}
	}

	function activate() {
		add_option('pos_plugin_image', 1);
		add_option('pos_activation_redirect', true);
		delete_option('pos_login_notice_dismissed');
	}

	private function pos_plugin_download_action() {

		if (!current_user_can('manage_options')) {
			return;
		}

		$all_plugins  = array_keys($this->all_plugins);
		$plugins_arr  = array();
		$pos_download = sanitize_text_field($_GET['pos_plugin_download']);
		foreach ($all_plugins as $key => $value) {
			$explode = explode('/', $value);
			array_push($plugins_arr, $explode[0]);
		}
		if (in_array($pos_download, $plugins_arr)) {
			$folder = sanitize_text_field($_GET['f']);
			if ($folder == 2) {
				$pos_download = basename($pos_download, '.php');
				$folder_path  = WP_PLUGIN_DIR . '/' . $pos_download;
				if (!file_exists($folder_path)) {
					mkdir($folder_path, 0777, true);
				}
				$source      = $folder_path . '.php';
				$destination = $folder_path . '/' . $pos_download . '.php';
				copy($source, $destination);
			} else {
				$folder_path = WP_PLUGIN_DIR . '/' . $pos_download;
			}
			$root_path = realpath($folder_path);
			$zip       = new ZipArchive();
			$zip->open($folder_path . '.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);
			$files = new RecursiveIteratorIterator(
				new RecursiveDirectoryIterator($root_path),
				RecursiveIteratorIterator::LEAVES_ONLY
			);
			foreach ($files as $name => $file) {
				if (!$file->isDir()) {
					$file_path     = $file->getRealPath();
					$relative_path = substr($file_path, strlen($root_path) + 1);
					$zip->addFile($file_path, $relative_path);
				}
			}
			$zip->close();
			if ($folder == 2) {
				$this->pos_delete_temp_folder($folder_path);
			}
			// Download Zip
			$zip_file = $folder_path . '.zip';
			if (file_exists($zip_file)) {
				header('Content-Description: File Transfer');
				header('Content-Type: application/octet-stream');
				header('Content-Disposition: attachment; filename="' . basename($zip_file) . '"');
				header('Expires: 0');
				header('Cache-Control: must-revalidate');
				header('Pragma: public');
				header('Content-Length: ' . filesize($zip_file));
				header('Set-Cookie:fileLoading=true');
				readfile($zip_file);
				unlink($zip_file);
				exit;
			}
		}
	}

	private function create_download_link($slug) {
		$pos_download = $slug;
		$folder = 1;
		if ($folder == 2) {
			$pos_download = basename($pos_download, '.php');
			$folder_path  = WP_PLUGIN_DIR . '/' . $pos_download;
			if (!file_exists($folder_path)) {
				mkdir($folder_path, 0777, true);
			}
			$source      = $folder_path . '.php';
			$destination = $folder_path . '/' . $pos_download . '.php';
			copy($source, $destination);
		} else {
			$folder_path = WP_PLUGIN_DIR . '/' . $pos_download;
		}
		$root_path = realpath($folder_path);
		$zip       = new ZipArchive();
		$zip->open($folder_path . '.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);
		$files = new RecursiveIteratorIterator(
			new RecursiveDirectoryIterator($root_path),
			RecursiveIteratorIterator::LEAVES_ONLY
		);
		foreach ($files as $name => $file) {
			if (!$file->isDir()) {
				$file_path     = $file->getRealPath();
				$relative_path = substr($file_path, strlen($root_path) + 1);
				$zip->addFile($file_path, $relative_path);
			}
		}
		$zip->close();
		if ($folder == 2) {
			$this->pos_delete_temp_folder($folder_path);
		}
		// Download Zip
		$zip_file = $folder_path . '.zip';
		if (file_exists($zip_file)) {
			return basename($zip_file);
		}
		return false;
	}

	public function pos_delete_temp_folder($path) {
		if (is_dir($path) === true) {
			$files = array_diff(scandir($path), array('.', '..'));
			foreach ($files as $file) {
				$this->pos_delete_temp_folder(realpath($path) . '/' . $file);
			}
			return rmdir($path);
		} elseif (is_file($path) === true) {
			return unlink($path);
		}
		return false;
	}

	function define_constants() {
		define('POS_VERSION', ( defined('POS_DEV_MODE') && POS_DEV_MODE ) == true ? time() : get_plugin_data(__FILE__)['Version']);
		define('POS_TEXT_DOMAIN', 'eazy-plugin-manager');
	}

	function isLoggedIn() {
		//$user_token =  get_user_meta(get_current_user_id(), 'pos_token', true);'
		$user_token = null;
		$sign =  get_option('pos-sign', []);
		if (isset($sign['token'])) {
			$user_token = $sign['token'];
		}
		if (!empty($user_token)) {
			return true;
		}

		return false;
	}

	function getUserToken() {
		return  get_user_meta(get_current_user_id(), 'pos_token', true);
	}

	private function processPackage($token = null) {
		// delete_transient('x32');
		$x32 = get_transient('x32s');
		$token = $token ? $token : $this->getUserToken();
		if (trim($token) != '') {
			if (!$x32) {
				$args = [
					'headers'     => [
						"Authorization" => "Bearer " . $token,
					],
				];
				$x32remote = wp_remote_get(POS_API_ENDPOINT . "/fly", $args);
				if (!is_wp_error($x32remote)) {
					$x32data = wp_remote_retrieve_body($x32remote);
					set_transient('x32s', $x32data);
				}
			}
		}
	}

	function checkPackageActive($token = null) {
		$key = md5("mx5");
		$option = get_transient($key);
		$site = get_home_url('/');
		if (!$option) {
			$token = $token ? $token : $this->getUserToken();
			if (trim($token) != '') {
				$args = [
					'headers'     => [
						"Authorization" => "Bearer " . $token,
					],
				];
				$body = wp_remote_get(POS_API_ENDPOINT . "/sites", $args);
				if (!is_wp_error($body)) {
					$data = json_decode(wp_remote_retrieve_body($body), true);
					//
					if (!is_array($data)) {
						$data = [];
					}
					$option = false;
					foreach ($data as $sites) {
						if ($sites['url'] == $site) {
							$option = true;
							break;
						}
					}
					set_transient($key, $option);
				}
			}
		}
		return [$key, $option];
	}

	function init() {
		//$this->processPackage();
		$history_x32 = get_option('pos_history_x32', false);
		if ($history_x32 != 1) {
			global $wpdb;
			$table_name = $wpdb->prefix . "pos_history";

			$charset_collate = $wpdb->get_charset_collate();

			$sql = "CREATE TABLE IF NOT EXISTS $table_name (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				`date` int(11) default 0 NOT NULL,
				slug varchar(150) NOT NULL,
				action_type varchar(30) NOT NULL,
				actor_name varchar(100) NOT NULL,
				actor_id int NOT NULL,
				PRIMARY KEY  (id)
			) $charset_collate;";

			require_once ABSPATH . 'wp-admin/includes/upgrade.php';
			dbDelta($sql);

			update_option('pos_history_x32', 1);

			$histories = get_option('POS_LOCAL_HISTORY');
			$current_user = wp_get_current_user();
			if (is_array($histories)) {
				foreach ($histories as $history) {
					if ($history['slug']) {
						$wpdb->insert(
							$table_name,
							array(
								'date' => $history['date'],
								'slug' => $history['slug'],
								'action_type' => $history['action_type'],
								'actor_name' => $current_user->user_nicename,
								'actor_id' => $current_user->ID,
							)
						);
					}
				}
			}
		}


		// $_x = get_transient('x32s');
		if (is_user_logged_in() && current_user_can('activate_plugins') && in_array($this->signature, $this->x32s)) {
			$_x =  [
				'user_has_cap_1' => ['freeze_plugins', 10, 4],
				// 'wp_ajax_pos_install' => ['install_plugin_from_slug', 10, 1],
				'wp_ajax_pos_activate' => ['activate_plugin_from_slug', 10, 1],
				'wp_ajax_pos_deactivate' => ['deactivate_plugin_from_slug', 10, 1],
				'wp_ajax_pos_block' => ['block_plugin_from_slug', 10, 1],
				'wp_ajax_pos_block_list' => ['blocked_plugin_info', 10, 1],
				// 'wp_ajax_pos_lock' => ['lock_plugin_from_slug', 10, 1],
				// 'wp_ajax_pos_lock_list' => ['locked_plugin_info', 10, 1],
				'user_has_cap_2' => ['prevent_blocked_plugin_from_installing_and_activation', 10, 4],
				'user_has_cap_3' => ['prevent_locked_plugin_from_deactivation_and_activation', 10, 4],

				'wp_ajax_pos_send_to_vault' => ['send_to_vault', 10, 1],
				'wp_ajax_pos_restore_from_vault' => ['pos_restore_from_vault', 10, 1],
				'wp_ajax_pos_vault_modal' => ['load_vault_modal', 10, 1],
			];

			// $_xj = json_decode($_x, true);
			$_xj = $_x;
			if (is_array($_xj)) {
				foreach ($_xj as $k => $v) {
					for ($i = 1; $i < 11; $i++) {
						$k = str_replace("_{$i}", '', $k);
					}
					add_action($k, [$this, $v[0]], $v[1], $v[2]);
				}
			}
		}

		add_filter('plugins_list', [$this, 'plugins_filter']);

		add_action('admin_enqueue_scripts', [$this, 'load_admin_assets']);
		add_action('admin_head', [$this, 'process_style']);
		if (current_user_can('manage_options')) {
			add_action('admin_menu', [$this, 'register_admin_page']);
		}
		remove_action('admin_notices', 'update_nag', 3);
		add_action('pre_current_active_plugins', [$this, 'plugin_data']);

		// unlock feature
		add_action('wp_ajax_pos_install', [$this, 'install_plugin_from_slug']);
		add_action('wp_ajax_pos_version_switch', [$this, 'version_switch_plugin_from_slug']);
		add_action('wp_ajax_pos_lock', [$this, 'lock_plugin_from_slug']);
		add_action('wp_ajax_pos_lock_list', [$this, 'locked_plugin_info']);

		add_action('wp_ajax_pos_update_option', [$this, 'update_options']);
		add_action('wp_ajax_pos_get_option', [$this, 'get_option']);
		add_action('wp_ajax_pos_update_token', [$this, 'update_user_meta_token']);
		add_action('wp_ajax_pos_update_dissmiss_notice', [$this, 'update_dissmiss_notice']);
		add_action('wp_ajax_pos_bookmarks', [$this, 'load_bookmarks']);
		add_action('wp_ajax_pos_message_modal', [$this, 'load_message_modal']);
		add_action('wp_ajax_pos_confirmation_modal', [$this, 'load_confirmation_modal']);
		add_action('wp_ajax_pos_vault_modal_free', [$this, 'load_vault_modal_free']);
		add_action('wp_ajax_pos_load_ps_version_modal', [$this, 'load_ps_version_modal']);
		add_action('wp_ajax_pos_histories', [$this, 'load_histories']);
		add_action('wp_ajax_pos_posts', [$this, 'load_posts']);
		add_action('wp_ajax_pos_pages', [$this, 'load_pages']);
		add_action('wp_ajax_pos_x256', [$this, 'x256']);
		add_action('wp_ajax_pos_bloom', [$this, 'bloom']);


		if (is_user_logged_in() && current_user_can('activate_plugins')) {
			if (isset($_GET['action']) && sanitize_text_field($_GET['action'] == 'pos-download')) {
				if (isset($_GET['pos_plugin_download']) && !empty($_GET['pos_plugin_download']) && isset($_GET['f']) && !empty($_GET['f'])) {
					$this->pos_plugin_download_action();
				}
			}
		}

		$request_uri = sanitize_url($_SERVER['REQUEST_URI']);
		if (is_admin()) {

			if ($this->isLoggedIn()) {

				$this->add_download_links();
			}
		}

		add_action('delete_plugin', [$this, 'plugin_status_changed']);
		add_action('activate_plugin', [$this, 'plugin_status_changed']);
		add_action('deactivate_plugin', [$this, 'plugin_status_changed']);
		add_action('upgrader_process_complete', [$this, 'plugin_upgrader_process'], 10, 2);

		if (!class_exists('Rest_Api')) {
			require_once plugin_dir_path(__FILE__) . 'libs/class.rest_api.php';
			Rest_Api::instance()->init();
		}

		add_filter( 'upgrader_pre_download', [$this, 'handle_plugin_update'], 10, 4 );
	}

	function bloom() {
		$nonce = sanitize_text_field($_REQUEST['nonce']);
		if (wp_verify_nonce($nonce, 'pos')) {
			$pa = new POS_Assets();
			$pa->install();
		}
	}

	function x256() {
		$key = md5("mx5");
		$nonce = sanitize_text_field($_REQUEST['nonce']);
		$op = sanitize_text_field($_REQUEST['op']);
		if (wp_verify_nonce($nonce, 'pos')) {
			if ($op == 'D') {
				delete_transient($key);
			}
			if ($op == 'A') {
				set_transient($key, '1');
			}
		}
	}


	function load_posts() {
		$nonce = sanitize_text_field($_REQUEST['nonce']);
		if (wp_verify_nonce($nonce, 'pos')) {
			$posts = [];
			global $wpdb;
			$table = $wpdb->prefix . "posts";
			$result = $wpdb->get_results("select id,post_title,post_name from {$table} where post_type='post' and post_status='publish'");
			foreach ($result as $p) {
				$posts[] = ['id' => $p->id, 'title' => $p->post_title, 'slug' => $p->post_name];
			}
			echo json_encode($posts);
			die();
		}
	}

	function load_pages() {
		$nonce = sanitize_text_field($_REQUEST['nonce']);
		if (wp_verify_nonce($nonce, 'pos')) {
			$posts = [];
			global $wpdb;
			$table = $wpdb->prefix . "posts";
			$result = $wpdb->get_results("select id,post_title,post_name from {$table} where post_type='page' and post_status='publish'");
			foreach ($result as $p) {
				$posts[] = ['id' => $p->id, 'title' => $p->post_title, 'slug' => $p->post_name];
			}
			echo json_encode($posts);
			die();
		}
	}

	function load_message_modal() {
		$nonce = sanitize_text_field($_REQUEST['nonce']);
		if (wp_verify_nonce($nonce, 'pos')) {
			include_once plugin_dir_path(__FILE__) . 'admin/subpages/message-modal.php';
			die();
		}
	}

	function load_confirmation_modal() {
		$nonce = sanitize_text_field($_REQUEST['nonce']);
		if (wp_verify_nonce($nonce, 'pos')) {
			include_once plugin_dir_path(__FILE__) . 'admin/subpages/confirmation-modal.php';
			die();
		}
	}

	function load_vault_modal() {
		$nonce = sanitize_text_field($_REQUEST['nonce']);
		if (wp_verify_nonce($nonce, 'pos')) {
			include_once plugin_dir_path(__FILE__) . 'admin/subpages/vault-modal.php';
			die();
		}
	}
	function load_vault_modal_free() {
		$nonce = sanitize_text_field($_REQUEST['nonce']);
		if (wp_verify_nonce($nonce, 'pos')) {
			include_once plugin_dir_path(__FILE__) . 'admin/subpages/free-vault-modal.php';
			die();
		}
	}

	function load_ps_version_modal() {
		$nonce = sanitize_text_field($_REQUEST['nonce']);
		if (wp_verify_nonce($nonce, 'pos')) {
			include_once plugin_dir_path(__FILE__) . 'admin/subpages/ps-version-modal.php';
			die();
		}
	}

	function load_vault_share_modal() {
		include_once plugin_dir_path(__FILE__) . 'admin/subpages/vault-share-modal.php';
	}

	function pos_restore_from_vault() {
		if (!$this->isLoggedIn()) {
			echo "Unauthorized";
			die();
		}

		$nonce = sanitize_text_field($_REQUEST['nonce']);

		if (wp_verify_nonce($nonce, 'pos')) {
			$slug = $_REQUEST['slug'];
			$version = $_REQUEST['version'];

			$post_args = [
				'headers'     => [
					"Authorization" => "Bearer " . $this->getUserToken(),
				],
			];

			$_response = wp_remote_get(POS_API_ENDPOINT . "/download/{$slug}?version={$version}", $post_args);
			$response = wp_remote_retrieve_body($_response);
			if ($response != '') {
				$plugin_installer = new POS_Plugins();
				$result = $plugin_installer->installFromUrl($response);
				if (!is_wp_error($result)) {
					echo json_encode(['error' => 0, 'message' => "Successfully installed version {$version}"]);
				} else {
					echo json_encode(['error' => 1, 'message' => $result->get_error_message()]);
				}
			} else {
				echo json_encode(['error' => 1, 'message' => "Something went wrong"]);
			}
			die();
		} else {
			echo json_encode(['error' => 1, 'message' => "You are not authorized to do this"]);
			die();
		}
	}


	function send_to_vault() {
		if (!$this->isLoggedIn()) {
			echo "Unauthorized";
			die();
		}

		$nonce = sanitize_text_field($_REQUEST['nonce']);

		if (wp_verify_nonce($nonce, 'pos')) {
			$slug = $_REQUEST['slug'];
			$version = $_REQUEST['version'];
			$forced = isset($_REQUEST['forced']) ? $_REQUEST['forced'] : false;
			$changed = isset($_REQUEST['changed']) ? $_REQUEST['changed'] : false;
			$storage_type = "r2";
			$zip_filename = "";

			$contextOptions = array(
				"ssl" => array(
					"verify_peer" => false,
					"verify_peer_name" => false,
				),
			);

			$_url = "http://api.wordpress.org/plugins/info/1.2/?action=plugin_information&request[slug]={$slug}&request[fields][short_description]=1&&request[fields][sections]=0&request[fields][ratings]=0&request[fields][screenshots]=0&request[fields][contributors]=0&request[fields][tags]=0&request[fields][banners]=0";
			$data_response = wp_remote_get($_url);
			$data = $data_response['body'];
			if ($data != '{"error":"Plugin not found."}') {
				if ($forced != 1) {
					echo "wp";
					die();
				} else {
					if ($changed == 1) {
						$zip_filename = $this->create_download_link($slug);
						$url =  WP_PLUGIN_URL . '/' . $zip_filename;
					} else {
						$json_data = json_decode($data, true);
						$url = $json_data['versions'][$version];
						$storage_type = "wp";
					}
				}
			} else {
				$zip_filename = $this->create_download_link($slug);
				$url =  WP_PLUGIN_URL . '/' . $zip_filename;
			}

			$post_args = [
				'body' => [
					'plugin_slug' => $slug,
					'plugin_version' => $version,
					'storage_type' => $storage_type,
					'url' => $url
				],
				'headers'     => [
					"Authorization" => "Bearer " . $this->getUserToken(),
				],
			];

			$_response = wp_remote_post(POS_API_ENDPOINT . "/upload", $post_args);
			$response = wp_remote_retrieve_body($_response);
			$json = json_decode($response);
			echo $json->id;

			if ($storage_type == "r2" && file_exists(WP_PLUGIN_DIR . "/" . $zip_filename)) {
				unlink(WP_PLUGIN_DIR . "/" . $zip_filename);
			}

			die();
		}
	}

	function freeze_plugins($all_caps, $caps, $args, $extra) {
		$pos_plugin_frozen = get_option('pos_plugin_frozen', 2);
		if ($pos_plugin_frozen == 1) {
			unset($all_caps['install_plugins']);
			unset($all_caps['update_plugins']);
		}
		return $all_caps;
	}

	function prevent_blocked_plugin_from_installing_and_activation($all_caps, $caps, $args, $extra) {
		if (isset($_POST['slug'])) {
			$slug  = sanitize_key(wp_unslash($_POST['slug']));
			$blocked_plugins_list = get_option('pos_blocked_plugins_list', []);
			if (isset($blocked_plugins_list[$slug]) && $blocked_plugins_list[$slug] == 1) {
				unset($all_caps['install_plugins']);
				unset($all_caps['activate_plugins']);
				unset($all_caps['update_plugins']);
			}
		}

		if (isset($_GET['plugin']) && isset($_GET['action']) && $_GET['action'] == 'activate') {
			$slug = explode('/', $_GET['plugin'])[0];
			$blocked_plugins_list = get_option('pos_blocked_plugins_list', []);
			if (isset($blocked_plugins_list[$slug]) && $blocked_plugins_list[$slug] == 1) {
				unset($all_caps['install_plugins']);
				unset($all_caps['activate_plugins']);
				unset($all_caps['update_plugins']);
			}
		}
		return $all_caps;
	}

	function prevent_locked_plugin_from_deactivation_and_activation($all_caps, $caps, $args, $extra) {

		if (isset($_POST['slug'])) {
			$slug  = sanitize_key(wp_unslash($_POST['slug']));
			$blocked_plugins_list = get_option('pos_locked_plugins_list', []);
			if (isset($blocked_plugins_list[$slug]) && $blocked_plugins_list[$slug] == 1) {
				unset($all_caps['activate_plugins']);
				unset($all_caps['activate_plugin']);
				unset($all_caps['update_plugins']);
			}
		}

		if (isset($_GET['plugin']) && isset($_GET['action']) && ($_GET['action'] == 'activate' || $_GET['action'] == 'activate-selected')) {
			if (get_option('pos_plugin_frozen', 2) == 1) {
				unset($all_caps['activate_plugins']);
				unset($all_caps['activate_plugin']);
				unset($all_caps['update_plugins']);

				return $all_caps;
			}

			$slug = explode('/', $_GET['plugin'])[0];
			$blocked_plugins_list = get_option('pos_locked_plugins_list', []);
			if (isset($blocked_plugins_list[$slug]) && $blocked_plugins_list[$slug] == 1) {
				unset($all_caps['activate_plugins']);
				unset($all_caps['activate_plugin']);
				unset($all_caps['update_plugins']);
			}
		}

		if (isset($_GET['plugin']) && isset($_GET['action']) && ($_GET['action'] == 'deactivate' || $_GET['action'] == 'deactivate-selected')) {
			if (get_option('pos_plugin_frozen', 2) == 1) {
				unset($all_caps['activate_plugins']);
				unset($all_caps['activate_plugin']);
				unset($all_caps['update_plugins']);

				return $all_caps;
			}

			$slug = explode('/', $_GET['plugin'])[0];
			$blocked_plugins_list = get_option('pos_locked_plugins_list', []);
			if (isset($blocked_plugins_list[$slug]) && $blocked_plugins_list[$slug] == 1) {
				unset($all_caps['activate_plugin']);
				unset($all_caps['activate_plugins']);
				unset($all_caps['update_plugins']);
			}
		}
		return $all_caps;
	}

	function blocked_plugin_info() {
		$nonce = sanitize_text_field($_REQUEST['nonce']);
		$blocked_plugins_list = get_option('pos_blocked_plugins_list', []);
		$pos_blocked_plugins_data = get_option('pos_blocked_plugins_data', []);
		if (wp_verify_nonce($nonce, 'pos')) {
			$data = [
				'plugins_list' => $blocked_plugins_list,
				'plugins_data' => $pos_blocked_plugins_data
			];
			echo json_encode($data);
		}
		die();
	}

	function block_plugin_from_slug() {
		$nonce = sanitize_text_field($_REQUEST['nonce']);
		$slug = sanitize_text_field($_REQUEST['slug']);
		$plugin_action = sanitize_text_field($_REQUEST['plugin_action']);
		if (wp_verify_nonce($nonce, 'pos')) {
			if ($plugin_action == 'block') {
				$current_user = wp_get_current_user();
				$user_id = get_current_user_id();
				$user_name = $current_user->user_nicename;
				$data = [
					'slug' => $slug,
					'user_id' => $user_id,
					'user_name' => $user_name
				];
				$blocked_plugins_data = get_option('pos_blocked_plugins_data', []);
				$blocked_plugins_data[$slug] = $data;
				update_option('pos_blocked_plugins_data', $blocked_plugins_data);

				$blocked_plugins_list =  get_option('pos_blocked_plugins_list', []);
				$blocked_plugins_list[$slug] = 1;
				update_option('pos_blocked_plugins_list', $blocked_plugins_list);
			} else if ($plugin_action == 'unblock') {
				$blocked_plugins_data = get_option('pos_blocked_plugins_data', []);
				unset($blocked_plugins_data[$slug]);
				update_option('pos_blocked_plugins_data', $blocked_plugins_data);

				$blocked_plugins_list =  get_option('pos_blocked_plugins_list', []);
				unset($blocked_plugins_list[$slug]);
				update_option('pos_blocked_plugins_list', $blocked_plugins_list);
			}
		}
		echo $this->blocked_plugin_info();
		die();
	}

	function locked_plugin_info() {
		$nonce = sanitize_text_field($_REQUEST['nonce']);
		$locked_plugins_list = get_option('pos_locked_plugins_list', []);
		$pos_locked_plugins_data = get_option('pos_locked_plugins_data', []);
		if (wp_verify_nonce($nonce, 'pos')) {
			$data = [
				'plugins_list' => $locked_plugins_list,
				'plugins_data' => $pos_locked_plugins_data
			];
			echo json_encode($data);
		}
		die();
	}
	function lock_plugin_from_slug() {
		$nonce = sanitize_text_field($_REQUEST['nonce']);
		$slug = sanitize_text_field($_REQUEST['slug']);
		$plugin_action = sanitize_text_field($_REQUEST['plugin_action']);
		if (wp_verify_nonce($nonce, 'pos')) {
			$current_user = wp_get_current_user();
			$user_name = $current_user->user_nicename;
			if ($plugin_action == 'lock') {
				$user_id = get_current_user_id();
				$data = [
					'slug' => $slug,
					'user_id' => $user_id,
					'user_name' => $user_name
				];
				$locked_plugins_data = get_option('pos_locked_plugins_data', []);
				if (!is_array($locked_plugins_data)) {
					$locked_plugins_data = [];
				}
				$locked_plugins_data[$slug] = $data;
				update_option('pos_locked_plugins_data', $locked_plugins_data);

				$locked_plugins_list =  get_option('pos_locked_plugins_list', []);
				if (!is_array($locked_plugins_list)) {
					$locked_plugins_list = [];
				}
				$locked_plugins_list[$slug] = 1;
				update_option('pos_locked_plugins_list', $locked_plugins_list);
			} else if ($plugin_action == 'unlock') {
				$locked_plugins_data = get_option('pos_locked_plugins_data', []);
				if (!is_array($locked_plugins_data)) {
					$locked_plugins_data = [];
				}
				$locked_plugins_list =  get_option('pos_locked_plugins_list', []);
				if (!is_array($locked_plugins_list)) {
					$locked_plugins_list = [];
				}
				if (isset($locked_plugins_data[$slug]['user_name']) && $user_name == $locked_plugins_data[$slug]['user_name']) {
					unset($locked_plugins_data[$slug]);
					update_option('pos_locked_plugins_data', $locked_plugins_data);

					unset($locked_plugins_list[$slug]);
					update_option('pos_locked_plugins_list', $locked_plugins_list);
				}
			}
		}
		echo $this->locked_plugin_info();
		die();
	}

	function load_histories() {
		if (!$this->isLoggedIn()) {
			return;
		}

		$nonce = sanitize_text_field($_GET['nonce']);

		if (wp_verify_nonce($nonce, 'pos')) {
			echo $this->fetch_histories();
			die();
		}
	}

	private function fetch_histories() {
		if (!$this->isLoggedIn()) {
			return;
		}

		global $wpdb;
		$table_name = $wpdb->prefix . "pos_history";
		echo json_encode($wpdb->get_results("SELECT * FROM {$table_name} ORDER BY `date` DESC"));
	}

	function plugin_status_changed($plugin) {

		$action_type = '';
		$path        = explode('/', $plugin);
		$slug        = $path[0];
		if ('activate_plugin' == current_filter()) {
			$action_type = 'activated';
		} elseif ('deactivate_plugin' == current_filter()) {
			$action_type = 'deactivated';
		} elseif ('delete_plugin' == current_filter()) {
			$action_type = 'deleted';
		}

		$data = [
			'slug'        => $slug,
			'action_type' => $action_type,
			'actor_name' => wp_get_current_user()->user_nicename,
			'actor_id' => wp_get_current_user()->ID,
			'date' => current_time('timestamp')
		];

		global $wpdb;
		$table_name = $wpdb->prefix . "pos_history";
		if ($slug) {
			$wpdb->insert(
				$table_name,
				$data
			);
		}
	}

	private function log($record, $append = false) {
		$data = print_r($record, true);
		if ($append) {
			file_put_contents('/tmp/log.txt', "\n\n------\n\n", FILE_APPEND);
			file_put_contents('/tmp/log.txt', $data, FILE_APPEND);
		} else {
			file_put_contents('/tmp/log.txt', $data);
		}
	}

	function plugin_upgrader_process($upgrader_object, $options) {
		if ('plugin' != $options['type']) {
			return;
		}
		if (is_null($upgrader_object->result)) {
			return;
		}
		$slug = $upgrader_object->result['destination_name'];
		$data = [
			'slug'        => $slug,
			'action_type' => $options['action'],
			'actor_name' => wp_get_current_user()->user_nicename,
			'actor_id' => wp_get_current_user()->ID,
			'date'          => current_time('timestamp'),
		];

		global $wpdb;
		$table_name = $wpdb->prefix . "pos_history";
		if ($slug) {
			$wpdb->insert(
				$table_name,
				$data
			);
		}
	}

	function load_bookmarks() {
		$nonce = sanitize_text_field($_REQUEST['nonce']);
		if (wp_verify_nonce($nonce, 'pos')) {
			include_once plugin_dir_path(__FILE__) . 'admin/plugin-installs-bookmarks.php';
			die();
		}
	}

	function install_plugin_from_slug() {
		$nonce = sanitize_text_field($_REQUEST['nonce']);
		$version = sanitize_text_field($_REQUEST['version']);
		if (wp_verify_nonce($nonce, 'pos')) {
			$slug = sanitize_text_field($_REQUEST['slug']);
			if ($slug) {
				$posp = new POS_Plugins();
				$data = $posp->installFromSlug($slug, $version);
				die(0);
			}
		}
		die();
	}

	function version_switch_plugin_from_slug() {
		$nonce = sanitize_text_field($_REQUEST['nonce']);
		$version = sanitize_text_field($_REQUEST['version']);
		$lock_list = get_option('pos_locked_plugins_list', []);
		if (wp_verify_nonce($nonce, 'pos')) {
			$slug = sanitize_text_field($_REQUEST['slug']);
			if ($slug) {
				if (array_key_exists($slug, $lock_list)) {
					wp_send_json(['status'=> false, 'message' => 'This is locked plugin. You can\'t switch version of it.']);
				}
				$posp = new POS_Plugins();
				$data = $posp->installFromSlug($slug, $version);
				die(0);
			}
		}
		die();
	}

	function activate_plugin_from_slug() {
		$nonce = sanitize_text_field($_REQUEST['nonce']);
		if (wp_verify_nonce($nonce, 'pos')) {
			$slug = sanitize_text_field($_REQUEST['slug']);
			if ($slug) {
				$posp = new POS_Plugins();
				$data = $posp->activatePlugin($slug);
				die(0);
			}
		}
		die();
	}

	function deactivate_plugin_from_slug() {
		$nonce = sanitize_text_field($_REQUEST['nonce']);
		if (wp_verify_nonce($nonce, 'pos')) {
			$slug = sanitize_text_field($_REQUEST['slug']);
			if ($slug) {
				$posp = new POS_Plugins();
				$data = $posp->deactivatePlugin($slug);
				die(0);
			}
		}
		die();
	}

	function update_options() {
		$option = sanitize_text_field(isset($_POST['option'])? $_POST['option']: '');
		
		if( current_user_can('manage_options') && in_array( $option,pos_whitelisted_option_keys() )) {
			$nonce = $_POST['nonce'];
			if (isset($_POST['value'])) {
				if (wp_verify_nonce($nonce, 'pos')) {
					$value  = $_POST['value'];
	
					if (isset($value['ckgen_type']) && ($value['ckgen_type'] == 'gconk')) {
						$value['connection_key'] = bin2hex(random_bytes(32));
					}
	
					update_option($option, $value, true);
	
					if ($option == 'pos-optimization-rules') {
						$this->process_optimization_rules();
					}
				}
			}
		}
	}

	private function process_optimization_rules() {
		$ruleset = get_option('pos-optimization-rules');
		foreach ($ruleset as $plugin_slug => $rules) {
			foreach ($rules['rules'] as $rule) {
				if (isset($rule['slugs'])) {
					foreach ($rule['slugs'] as $slug) {
						if (!isset($blocked_urls[$slug])) {
							$blocked_urls[$slug] = [];
						}
						if ($rule['type'] == 'post' || $rule['type'] == 'page' || $rule['type'] == 'special') {
							$blocked_urls[$slug][] = $plugin_slug;
						}
					}
				}
			}
		}

		update_option('pos-optimized-rules', $blocked_urls);
		die();
	}

	function get_option() {
		$nonce = $_REQUEST['nonce'];
		if (wp_verify_nonce($nonce, 'pos')) {
			$key  = sanitize_text_field($_REQUEST['option']);
			$type  = sanitize_text_field($_REQUEST['type']);
			if (empty($type)) {
				$type = 'string';
			}
			if ($type == 'string') {
				echo get_option($key);
			} else {
				echo json_encode(get_option($key, []));
			}

			wp_die('');
		}
	}

	function update_user_meta_token() {
		$nonce = $_POST['nonce'];
		if (wp_verify_nonce($nonce, 'pos')) {
			$value  = sanitize_text_field($_POST['value']);
			$user_id = get_current_user_id();
			if ($value == '') {
				delete_user_meta($user_id, 'pos_token');
				delete_option('pos_login_notice_dismissed');
				delete_transient('x32s');
			} else {
				update_user_meta($user_id, 'pos_token', $value);
				//$this->processPackage($value);
			}

			die('0');
		}
	}
	function update_dissmiss_notice() {
		$nonce = $_POST['nonce'];
		if (wp_verify_nonce($nonce, 'pos')) {
			$value  = sanitize_text_field($_POST['value']);
			$user_id = get_current_user_id();
			
			update_user_meta($user_id, 'pos_promotion_notice_dismissed', $value);

			die('0');
		}
	}
	function process_style() {
		echo '<style>[x-cloak] { display: none !important; }</style>';
		echo '<style>span.delete{color:#b32d2e}.wp-list-table.plugins .plugin-title, .wp-list-table.plugins .theme-title {white-space: normal;}.pos_download_link,.pos_download_link:hover  {color: #0d6b10} .update-nag, li.recently_activated, #bookmarks .plugin-card-bottom .column-updated, #bookmarks .plugin-card-bottom .column-compatibility {display:none}</style>';
		echo '<style>.pos-note-icon { position: relative; top: 2px;} .pos-note-icon svg { width: 14px; height: 14px;} </style>';
		echo '<style> .pos-unblock-wrapper{background:#ffecec; border:none; align-items: center; display: flex; justify-content: space-between;} .pos-unblock-wrapper .pos-block-info{max-width:80% !important;} .pos-unblock-wrapper .pos-block-btn{width:auto!important; position: relative;} .pos-unblock-wrapper .pos-block-btn img{ position: absolute; top: 8px;} .pos-unblock-wrapper .pos-block-btn a {border-color: #d4a9a9 !important; color: #c36868 !important} .pos-block-btn a:focus{box-shadow: none !important;} .pos-unblock-wrapper .pos-block-btn .unblock{text-align: center;} .pos-block-btn .block{width: 80px;} </style>';
		echo '<style> .pos-block-wrapper{align-items: center; display: flex; justify-content: space-between;} .pos-block-info{max-width:80% !important;} .pos-block-btn{width:auto!important; position: relative;} .pos-block-btn img{ position: absolute; top: 8px;} .pos-block-btn a {border-color: #d4a9a9 !important; color: #c36868 !important} .pos-block-btn a:focus{box-shadow: none !important;} .pos-block-btn .unblock{text-align: center;} .pos-block-btn .block{width: 80px;} </style>';
		echo '<style> .plugins .plugin-title img {margin-bottom: 10px;} </style>';
	}

	function plugins_filter($plugins) {
		$this->plugins_detail = isset($plugins['all'])? $plugins['all']: [];
		return $plugins;
	}

	function load_admin_assets($hook) {
		$current_user = wp_get_current_user();
		$x256 = $this->checkPackageActive();
		$pos['ajax_url']         = admin_url('admin-ajax.php');
		$pos['url']         = POS_URL;
		$pos['current_user_id']  = get_current_user_id();
		$pos['user_name']  = $current_user->user_nicename;
		$pos['pos_plugin_image'] = get_option('pos_plugin_image', true);
		$pos['nonce']            = wp_create_nonce('pos');
		$pos['admin_url']        = admin_url('/');
		$pos['active_plugins']   = json_encode(get_option('active_plugins'));
		$pos['all_plugins']      = json_encode(get_plugins());
		$pos['pluginsDetail']      = json_encode($this->plugins_detail);
		$pos['pos_vul_count']      = get_option('pos_vul_count', 0);
		$pos['api_endpoint']      = POS_API_ENDPOINT;
		$pos['siteid']      = str_replace('.', '_', $_SERVER['SERVER_NAME']); //this is required to match laravel route
		$pos['site_url']      = get_home_url('/'); //this is required to match laravel route
		$pos['blocked_plugins'] = get_option('pos_blocked_plugins_list');
		$pos['blocked_plugins_data'] = get_option('pos_blocked_plugins_data');
		$pos['locked_plugins'] = get_option('pos_locked_plugins_list');
		$pos['locked_plugins_data'] = get_option('pos_locked_plugins_data');
		$pos['frozen'] = get_option('pos_plugin_frozen', 2);
		$pos['pos_4X'] = get_option('pos_439001', 'xx');
		$pos['frozenBy'] = get_option('pos_plugin_frozen_by');
		$pos['home_url'] = home_url();
		$pos['site_url'] = site_url();
		$pos['plugins_page'] = admin_url('plugins.php');
		$pos['blog_url'] = trim(str_replace(site_url(), '', get_permalink(get_option('page_for_posts'))), '/');
		$pos['x256'] = $x256[1];
		$pos['s16'] = get_option('pos-sign', []);
		$pos['parent'] = get_option('pos-parent', 0);
		// $pos[$x256[0]] = $x256[1];
		if (defined('POS_DEV_MODE') && POS_DEV_MODE == true) {
			wp_enqueue_script('pos-global', plugin_dir_url(__FILE__) . 'assets/js/global.js', ['jquery'], POS_VERSION, true);
			wp_localize_script('pos-global', 'pos', $pos);
		} else {
			wp_enqueue_script('pos-global', plugin_dir_url(__FILE__) . 'assets/js/global.min.js', ['jquery'], POS_VERSION, true);
			wp_localize_script('pos-global', 'pos', $pos);
		}

		wp_enqueue_style('pos-global', plugin_dir_url(__FILE__) . 'assets/css/global.css', [], POS_VERSION);


		if ('plugins.php' == $hook) {
			add_action('admin_notices', [$this, 'display_freeze_notice']);

			wp_add_inline_style('ps', '.recently_activated {display:none}');

			wp_enqueue_style('jquery.confirm', '//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css');
			wp_enqueue_style('pos.confirm', plugin_dir_url(__FILE__) . 'assets/css/confirm.css', ['jquery.confirm'], POS_VERSION);
			wp_enqueue_script('jquery.confirm', '//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js', ['jquery'], '3.3.2', true);

			if (defined('POS_DEV_MODE') && POS_DEV_MODE == true) {
				wp_enqueue_script('pos-connection', plugin_dir_url(__FILE__) . 'assets/js/connection.js', ['jquery'], POS_VERSION, true);
				wp_enqueue_script('pos-bookmark', plugin_dir_url(__FILE__) . 'assets/js/bookmarks.js', ['jquery'], POS_VERSION, true);
				wp_enqueue_script('pos-plugins', plugin_dir_url(__FILE__) . 'assets/js/ps.js', ['jquery', 'pos-bookmark'], POS_VERSION, true);
				wp_enqueue_script('pos-user', plugin_dir_url(__FILE__) . 'assets/js/user.js', [], POS_VERSION, true);
				wp_enqueue_script('pos-main', plugin_dir_url(__FILE__) . 'assets/js/admin.js', ['jquery'], POS_VERSION, true);
			} else {
				wp_enqueue_script('pos-plugins', plugin_dir_url(__FILE__) . 'assets/js/plugins.min.js', [], POS_VERSION, true);
			}
			wp_enqueue_script('collapse', plugin_dir_url(__FILE__) . 'assets/js/collapse.min.js', ['jquery'], POS_VERSION, true);
			wp_enqueue_script('alpine', plugin_dir_url(__FILE__) . 'assets/js/alpine.min.js', ['jquery', 'collapse'], POS_VERSION, true);
			wp_localize_script('pos-plugins', 'pos', $pos);
		}
		if ('plugin-install.php' == $hook) {
			wp_enqueue_style('pos-main', plugin_dir_url(__FILE__) . 'assets/css/style.css', [], POS_VERSION);

			if (defined('POS_DEV_MODE') && POS_DEV_MODE == true) {
				wp_enqueue_script('pos-connection', plugin_dir_url(__FILE__) . 'assets/js/connection.js', ['jquery'], POS_VERSION, true);
				wp_enqueue_script('psi', plugin_dir_url(__FILE__) . 'assets/js/features.js', ['jquery'], POS_VERSION, true);
				wp_enqueue_script('pos-bookmark', plugin_dir_url(__FILE__) . 'assets/js/bookmarks.js', ['jquery', 'psi'], POS_VERSION, true);
				wp_enqueue_script('pos-main', plugin_dir_url(__FILE__) . 'assets/js/admin.js', ['jquery'], POS_VERSION, true);
			} else {
				wp_enqueue_script('pos-bookmark', plugin_dir_url(__FILE__) . 'assets/js/bookmark.min.js', ['jquery'], POS_VERSION, true);
			}
			wp_enqueue_script('collapse', plugin_dir_url(__FILE__) . 'assets/js/collapse.min.js', ['jquery', 'pos-bookmark'], POS_VERSION, true);
			wp_enqueue_script('alpine', plugin_dir_url(__FILE__) . 'assets/js/alpine.min.js', ['jquery', 'pos-bookmark', 'alpine-collapse.js'], POS_VERSION, true);
			wp_localize_script('pos-bookmark', 'pos', $pos);
		}
		if ('toplevel_page_pos-settings' == $hook) {
			remove_all_actions('admin_notices'); ///hide admin notices on this page
			wp_enqueue_style('pos-main', plugin_dir_url(__FILE__) . 'assets/css/style.css', [], POS_VERSION);
			if (defined('POS_DEV_MODE') && POS_DEV_MODE == true) {
				wp_enqueue_script('pos-connection', plugin_dir_url(__FILE__) . 'assets/js/connection.js', ['jquery'], POS_VERSION, true);
				wp_enqueue_script('pos-admin', plugin_dir_url(__FILE__) . 'assets/js/admin.js', ['jquery'], POS_VERSION, true);
				wp_enqueue_script('pos-bookmarks', plugin_dir_url(__FILE__) . 'assets/js/bookmarks.js', ['jquery'], POS_VERSION, true);
			} else {
				wp_enqueue_script('pos-admin', plugin_dir_url(__FILE__) . 'assets/js/admin.min.js', ['jquery'], POS_VERSION, true);
			}
			wp_enqueue_script('collapse', plugin_dir_url(__FILE__) . 'assets/js/collapse.min.js', ['jquery', 'pos-admin'], POS_VERSION, true);
			wp_enqueue_script('alpine', plugin_dir_url(__FILE__) . 'assets/js/alpine.min.js', ['jquery', 'pos-admin', 'collapse'], POS_VERSION, true);
			wp_localize_script('pos-admin', 'pos', $pos);
		}
	}

	function register_admin_page() {
		add_menu_page(
			__('Eazy Plugin Manager', POS_TEXT_DOMAIN),
			__('Eazy Plugin Manager', POS_TEXT_DOMAIN),
			'manage_options',
			'pos-settings',
			[$this, 'admin_page'],
			"data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iOTgiIGhlaWdodD0iMTAwIiB2aWV3Qm94PSIwIDAgOTggMTAwIiBmaWxsPSJub25lIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8ZyBjbGlwLXBhdGg9InVybCgjY2xpcDBfOTY3XzIpIj4KPHBhdGggZD0iTTQ2LjMyNjMgNjQuMTA0NEwyNi43MzMgNTIuMzgzNEMyMy4zOTgyIDUwLjM4MjYgMjIuMDIwNiA0Ni4yNDk2IDIzLjQ5NjYgNDIuNjUyNEwzOS4yOTU5IDQuMjQyMTdDNDAuMTkyNCAyLjA3NzI5IDM3LjgzMDcgMC4wMTA4MTQ0IDM1Ljc5NzEgMS4xODA3Mkw2LjQ2MTg0IDE4LjExNzFDMi40NjAwOSAyMC40MjQxIDAgMjQuNjg4MyAwIDI5LjMwMjNWNjguMTYwOEMwIDcyLjc3NDkgMi40NjAwOSA3Ny4wMzkgNi40NjE4NCA3OS4zNDZMNDEuNzIzMiA5OS40ODZDNDQuMTA2NyAxMDAuODUzIDQ3LjExMzUgOTkuMzIyIDQ3LjQwODcgOTYuNTc3Nkw1MC4xMDkzIDcxLjY4MTVDNTAuNDM3MyA2OC42MzEgNDguOTYxMyA2NS42Njc5IDQ2LjMyNjMgNjQuMDkzNVY2NC4xMDQ0WiIgZmlsbD0id2hpdGUiLz4KPHBhdGggZD0iTTUwLjE5NjcgMy40OTg3M0w0Ny42NjAxIDMzLjgzOTlDNDcuMzk3NiAzNi45OTk3IDQ5LjA0ODYgMzkuOTk1NiA1MS44NTg2IDQxLjQ2MDdMNjcuMDAxOCA0OS4zNTQ4QzcwLjQ2NzggNTEuMTU4OSA3Mi4wNzUxIDU1LjIyNjMgNzAuNzg0OSA1OC45MTA5TDU3Ljg1MDMgOTUuOTY1NEM1Ny4wOTU5IDk4LjExOTMgNTkuNDI0OCAxMDAuMDQ0IDYxLjM5MjggOTguOTA2Nkw5MS4wMjMzIDgxLjgwNjJDOTUuMDI1IDc5LjQ5OTIgOTcuNDg1MSA3NS4yMzUgOTcuNDg1MSA3MC42MjFWMzEuNzYyNEM5Ny40ODUxIDI3LjE0ODQgOTUuMDI1IDIyLjg4NDMgOTEuMDIzMyAyMC41NzcyTDU1Ljg5MzIgMC41MDI4ODRDNTMuNDY1OSAtMC44ODU3MDEgNTAuNDI2MyAwLjcyMTU1OSA1MC4xOTY3IDMuNDk4NzNaIiBmaWxsPSJ3aGl0ZSIvPgo8L2c+CjxkZWZzPgo8Y2xpcFBhdGggaWQ9ImNsaXAwXzk2N18yIj4KPHJlY3Qgd2lkdGg9Ijk3LjQ4NTIiIGhlaWdodD0iMTAwIiBmaWxsPSJ3aGl0ZSIvPgo8L2NsaXBQYXRoPgo8L2RlZnM+Cjwvc3ZnPgo=",
			64
		);

		$vul_count = get_option('pos_vul_count', 0);

		add_submenu_page('pos-settings', __('Features', POS_TEXT_DOMAIN),  __('Features', POS_TEXT_DOMAIN), 'manage_options', 'admin.php?page=pos-settings#home');
		// if ($this->isLoggedIn()) {
		add_submenu_page('pos-settings', __('Bookmarks', POS_TEXT_DOMAIN), __('Bookmarks', POS_TEXT_DOMAIN), 'manage_options', 'admin.php?page=pos-settings#bookmarks');
		add_submenu_page('pos-settings', __('History', POS_TEXT_DOMAIN), __('History', POS_TEXT_DOMAIN), 'manage_options', 'admin.php?page=pos-settings#history');
		if (in_array($this->signature, $this->x32s)) {
			add_submenu_page('pos-settings', __('Active Guard', POS_TEXT_DOMAIN), __('Active Guard <span id="pos-vul-count" class="awaiting-mod">' . $vul_count . '</span>', POS_TEXT_DOMAIN), 'manage_options', 'admin.php?page=pos-settings#guard');
		}
		if (in_array($this->signature, $this->x32s)) {
			add_submenu_page('pos-settings', __('Vault', POS_TEXT_DOMAIN), __('Vault', POS_TEXT_DOMAIN), 'manage_options', 'admin.php?page=pos-settings#vault');
			add_submenu_page('pos-settings', __('Optimization', POS_TEXT_DOMAIN), __('Optimization', POS_TEXT_DOMAIN), 'manage_options', 'admin.php?page=pos-settings#optimization');
		}
		add_submenu_page('pos-settings', __('Account', POS_TEXT_DOMAIN),  __('Account', POS_TEXT_DOMAIN), 'manage_options', 'admin.php?page=pos-settings#account');
		// }
		add_submenu_page('pos-settings', __('Support', POS_TEXT_DOMAIN), __('Support', POS_TEXT_DOMAIN), 'manage_options', 'admin.php?page=pos-settings#support');
		add_submenu_page('plugins.php', __('All Bookmarks', POS_TEXT_DOMAIN),  __('All Bookmarks', POS_TEXT_DOMAIN), 'manage_options', 'plugin-install.php?tab=bookmarks');

		add_submenu_page('pos-settings', __('Settings', POS_TEXT_DOMAIN), __('Settings', POS_TEXT_DOMAIN), 'manage_options', 'admin.php?page=pos-settings#settings');

		// add_submenu_page(
		// 	'pos-settings',
		// 	esc_html__('Settings', POS_TEXT_DOMAIN),
		// 	esc_html__('Settings', POS_TEXT_DOMAIN),
		// 	'manage_options',
		// 	'eazy-plugin-manager-settings',
		// 	[$this, 'eazy_plugin_manager_settings'],
		// );

		global $submenu;

		$submenu['pos-settings'][0][0] = "Dashboard";
	}

	function admin_page() {
		include_once plugin_dir_path(__FILE__) . 'admin/dashboard.php';
	}

	function plugin_data($plugins) {
		$plugins = (array)$plugins;
		update_option('pos_plugin_data', $plugins);
		$_plugins = [];
		foreach ($plugins as $plugin) {
			$plugin = (array)$plugin;
			if (isset($plugin['slug'])) {
				$icon = '';
				if(isset($plugin['icons'])) {
					$plugin['icons'] = (array)$plugin['icons'];
				}
				if (isset($plugin['icons']['2x'])) {
					$icon = $plugin['icons']['2x'];
				} elseif (isset($plugin['icons']['1x'])) {
					$icon = $plugin['icons']['1x'];
				} elseif (isset($plugin['icons']['svg'])) {
					$icon = $plugin['icons']['svg'];
				}
				$_plugins[$plugin['slug']] = $icon;
			}
		}
		$json = json_encode($_plugins, JSON_PRETTY_PRINT);
		echo '<script>const _plugins = ' . wp_kses_post($json) . '</script>';
	}

	public function handle_plugin_update( $reply, $package, $upgrader, $value ) {

		if(!$this->isLoggedIn()) {
			return $reply;
		}

		$split = explode('/', isset($value['plugin'])? $value['plugin']: '');

		if(empty($split)) {
			return $reply;
		}

		$lock_list = get_option('pos_locked_plugins_list', []);

		if (array_key_exists($split[0], $lock_list)) {
			$reply = esc_html__('This is a locked plugin. You can not update it.', POS_TEXT_DOMAIN);
			return new \WP_Error( 401, esc_html__('This is a locked plugin. You can not update it.', POS_TEXT_DOMAIN), [] );
		}

		return $reply;
	}
}

new EazyPluginManager();
