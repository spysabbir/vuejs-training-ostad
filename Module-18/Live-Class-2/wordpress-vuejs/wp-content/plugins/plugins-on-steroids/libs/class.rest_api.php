<?php

use EazyPlugins\EazyPluginManager;

class Rest_Api
{

    private static $instance = null;

    public function init()
    {
        add_action('rest_api_init', [$this, 'rest_api_endpoints']);
    }

    public function rest_api_endpoints()
    {
        // site add rest api
        register_rest_route('epm/v1', 'site/add', [
            'methods' => 'POST',
            'callback' => [$this, 'site_add_endpoint_handler'],
            'permission_callback' => '__return_true',
        ]);

        // site ping rest api
        register_rest_route('epm/v1', 'site/ping', [
            'methods' => 'POST',
            'callback' => [$this, 'site_ping_endpoint_handler'],
            'permission_callback' => '__return_true',
        ]);

        // site remove rest api
        register_rest_route('epm/v1', 'site/remove', [
            'methods' => 'POST',
            'callback' => [$this, 'site_remove_endpoint_handler'],
            'permission_callback' => '__return_true',
        ]);

        // site sync rest api
        register_rest_route('epm/v1', 'site/sync', [
            'methods' => 'GET',
            'callback' => [$this, 'site_sync_endpoint_handler'],
            'permission_callback' => '__return_true',
        ]);

        // admin login rest api
        register_rest_route('epm/v1', 'admin/login', [
            'methods' => 'GET',
            'callback' => [$this, 'admin_login_endpoint_handler'],
            'permission_callback' => '__return_true',
        ]);

        // plugin activate, deactivate, delete, version switch, update rest api
        register_rest_route('epm/v1', 'plugin/action', [
            'methods' => 'POST',
            'callback' => [$this, 'plugin_action_endpoint_handler'],
            'permission_callback' => '__return_true',
        ]);

        // plugin block rest api
        register_rest_route('epm/v1', 'plugin/block', [
            'methods' => 'POST',
            'callback' => [$this, 'plugin_block_endpoint_handler'],
            'permission_callback' => '__return_true',
        ]);

        // plugin block rest api
        register_rest_route('epm/v1', 'plugin/lock', [
            'methods' => 'POST',
            'callback' => [$this, 'plugin_lock_endpoint_handler'],
            'permission_callback' => '__return_true',
        ]);

        // plugin vault rest api
        register_rest_route('epm/v1', 'plugin/vault', [
            'methods' => 'POST',
            'callback' => [$this, 'plugin_vault_endpoint_handler'],
            'permission_callback' => '__return_true',
        ]);

        // get site optimization data rest api
        register_rest_route('epm/v1', 'site/optimization', [
            'methods' => 'GET',
            'callback' => [$this, 'get_site_optmz_endpoint_handler'],
            'permission_callback' => '__return_true',
        ]);

        // save site optimization data rest api
        register_rest_route('epm/v1', 'site/optimization', [
            'methods' => 'POST',
            'callback' => [$this, 'save_site_optmz_endpoint_handler'],
            'permission_callback' => '__return_true',
        ]);

        // save site optimization data rest api
        register_rest_route('epm/v1', 'site/wp-core-update', [
            'methods' => 'GET',
            'callback' => [$this, 'wp_core_update_endpoint_handler'],
            'permission_callback' => '__return_true',
        ]);

        // get site users rest api
        register_rest_route('epm/v1', 'site/get-wpusers', [
            'methods' => 'GET',
            'callback' => [$this, 'get_site_wpuser_endpoint_handler'],
            'permission_callback' => '__return_true',
        ]);

        // add site user rest api
        register_rest_route('epm/v1', 'site/wpuser', [
            'methods' => 'POST',
            'callback' => [$this, 'site_wpuser_endpoint_handler'],
            'permission_callback' => '__return_true',
        ]);

        // get wp site settings rest api
        register_rest_route('epm/v1', 'site/get-wpsettings', [
            'methods' => 'GET',
            'callback' => [$this, 'get_site_wpsettings_endpoint_handler'],
            'permission_callback' => '__return_true',
        ]);
        
        // get wp site settings rest api
        register_rest_route('epm/v1', 'site/update-wpsettings', [
            'methods' => 'POST',
            'callback' => [$this, 'update_site_wpsettings_endpoint_handler'],
            'permission_callback' => '__return_true',
        ]);
    }

    public function site_add_endpoint_handler(WP_REST_Request $request)
    {

        $params = $request->get_params();
        $auth_key = sanitize_text_field(isset($params['auth_key']) ? $params['auth_key'] : '');
        $reconnet = rest_sanitize_boolean(isset($params['reconnect']) ? $params['reconnect'] : false);
        $activated = rest_sanitize_boolean(isset($params['activated']) ? $params['activated'] : false);

        $login_info = get_option('pos-sign', false);
        if (!is_array($login_info)) {
            return $this->send_response(false, 'You have to login in "Eazy Plugin Manager" from your WordPress dashboard.');
        }

        if (!$reconnet) {
            $connection = get_option('eazywp_connection', false);
            if (is_array($connection) && $connection['status']) {
                return $this->send_response(false, 'Site is already connected to a user from remote "Eazy Plugin Manager". Disconnect it to connect again.');
            }
        }

        $connecting_info = get_option('eazywp_connecting_info', false);
        $local_site_url = (isset($connecting_info['site_url']) ? $connecting_info['site_url'] : '');
        $local_connection_key = (isset($connecting_info['connection_key']) ? $connecting_info['connection_key'] : '');

        if (empty($local_site_url) || empty($local_connection_key)) {
            return $this->send_response(false, 'Generate connection key from "Eazy Plugin Manager".');
        }

        if ($auth_key == hash('whirlpool', $local_site_url . ':' . $local_connection_key)) {

            if ($activated) {
                $status = update_option('eazywp_connection', [
                    'status' => true,
                    'remote_user_id' => intval($params['remote_user_id'])
                ]);
                return $this->send_response($status, 'Site added.');
            }

            return $this->send_response(true, 'Site added successfully.', [
                "site_name" => get_bloginfo('name'),
                "wordpress_version" => get_bloginfo('version'),
                "php_version" => phpversion(),
                "is_ssl" => is_ssl(),
                "plugins" => pos_get_plugins(),
                "active_plugins" => get_option('active_plugins'),
                "update_plugins" => pos_get_update_plugins(),
                // "themes" => pos_get_themes(),
                // "active_theme" => get_option('stylesheet'),
                // "update_themes" => pos_get_update_themes(),
                "core_update" => pos_get_core_update(),
                // "update_info" => wp_get_update_data(),
                "lock_plugins" => [
                    'data' => get_option('pos_locked_plugins_data', []),
                    'list' => get_option('pos_locked_plugins_list', []),
                ],
                "block_plugins" => [
                    'data' => get_option('pos_blocked_plugins_data', []),
                    'list' => get_option('pos_blocked_plugins_list', []),
                ],
            ]);
        } else {
            return $this->send_response(false, "Site URL or Connection key is not correct.");
        }
    }

    public function site_ping_endpoint_handler(WP_REST_Request $request)
    {
        $params = $request->get_params();
        return $this->send_response(true, 'Success', $params);
    }

    public function site_remove_endpoint_handler(WP_REST_Request $request)
    {
        $params = $request->get_params();

        $auth = $this->request_authentication($params, 'delete');
        if ($auth) {
            return $auth;
        }

        $status = delete_option('eazywp_connection');

        return $this->send_response($status, ($status ? 'Site deleted.' : 'Already deleted or unable to delete.'));
    }

    public function site_sync_endpoint_handler(WP_REST_Request $request)
    {
        $params = $request->get_params();

        $auth = $this->request_authentication($params);
        if ($auth) {
            return $auth;
        }

        return $this->send_response(true, 'Site synced successfully.', [
            "site_name" => get_bloginfo('name'),
            "wordpress_version" => get_bloginfo('version'),
            "php_version" => phpversion(),
            "is_ssl" => is_ssl(),
            "plugins" => pos_get_plugins(),
            "active_plugins" => get_option('active_plugins'),
            "update_plugins" => pos_get_update_plugins(),
            // "themes" => pos_get_themes(),
            // "active_theme" => get_option('stylesheet'),
            // "update_themes" => pos_get_update_themes(),
            "core_update" => pos_get_core_update(),
            // "update_info" => wp_get_update_data(),
            "lock_plugins" => [
                'data' => get_option('pos_locked_plugins_data', []),
                'list' => get_option('pos_locked_plugins_list', []),
            ],
            "block_plugins" => [
                'data' => get_option('pos_blocked_plugins_data', []),
                'list' => get_option('pos_blocked_plugins_list', []),
            ],
        ]);
    }

    public function admin_login_endpoint_handler(WP_REST_Request $request)
    {
        $params = $request->get_params();

        $auth = $this->request_authentication($params);
        if ($auth) {
            return $auth;
        }

        $admin_email = get_bloginfo('admin_email');
        $user = get_user_by('email', $admin_email);

        wp_clear_auth_cookie();
        clean_user_cache($user->ID);
        wp_set_current_user($user->data->ID);
        wp_set_auth_cookie($user->data->ID);
        update_user_caches($user);

        wp_safe_redirect(admin_url(), 302, 'Third-Party SDK');
        exit;
    }

    public function plugin_action_endpoint_handler(WP_REST_Request $request)
    {
        $params = $request->get_params();

        $auth = $this->request_authentication($params);
        if ($auth) {
            return $auth;
        }

        $action = sanitize_text_field(isset($params['action']) ? $params['action'] : '');
        $path = sanitize_text_field(isset($params['path']) ? $params['path'] : '');
        $slug = sanitize_text_field(isset($params['slug']) ? $params['slug'] : '');
        $version = sanitize_text_field(isset($params['version']) ? $params['version'] : 'latest');
        $action_from = sanitize_text_field(isset($params['action_from']) ? $params['action_from'] : '');
        $url = sanitize_url(isset($params['url']) ? $params['url'] : '');

        $plugin_orgin_name  = sanitize_text_field(isset($params['plugin_orgin_name']) ? $params['plugin_orgin_name'] : '');
        $plugin_zip         = sanitize_text_field(isset($params['plugin_zip']) ? $params['plugin_zip'] : '');

        $lock_list = get_option('pos_locked_plugins_list', []);
        $block_list = get_option('pos_blocked_plugins_list', []);

        if ($action == 'activate') {
            $split = explode('/', $path);
            if (array_key_exists($split[0], $lock_list)) {
                return $this->send_response(false, 'This is locked plugin. You can\'t activate it.');
            }
            $return = activate_plugin($path);
            if (is_wp_error($return)) {
                return $this->send_response(false, $return->get_error_message() . ' Please Install the plugin on the remote site.');
            }
            return $this->send_response(true, 'Successfully activated the plugin.', $return);
        }

        if ($action == 'deactivate') {
            $split = explode('/', $path);
            if (array_key_exists($split[0], $lock_list)) {
                return $this->send_response(false, 'This is locked plugin. You can\'t deactivate it.');
            }
            if (!array_key_exists($path, get_plugins())) {
                return $this->send_response(false, 'Plugin file does not exist. Please Install the plugin on the remote site.');
            }
            $status = deactivate_plugins($path);
            return $this->send_response(true, 'Successfully deactivated the plugin.', $status);
        }

        if ($action == 'install' || $action == 'version_switch') {
            $split = explode('/', $path);

            $exist_check_slug = ($action_from == 'path') ? $split[0] :  $slug;
            if ($action == 'version_switch' && !file_exists(WP_PLUGIN_DIR . '/' . $exist_check_slug) && !is_dir(WP_PLUGIN_DIR . '/' . $exist_check_slug)) {
                return $this->send_response(false, 'Plugin file does not exist. Please Install the plugin on the remote site.');
            }

            include_once 'class.pos_plugins.php';

            include_once ABSPATH . '/wp-admin/includes/plugin.php';
            if (file_exists(ABSPATH . '/wp-admin/includes/screen.php')) {
                include_once ABSPATH . '/wp-admin/includes/screen.php';
            }

            include_once ABSPATH . '/wp-admin/includes/file.php';
            include_once ABSPATH . '/wp-admin/includes/template.php';
            include_once ABSPATH . '/wp-admin/includes/misc.php';
            include_once ABSPATH . '/wp-admin/includes/class-wp-upgrader.php';
            include_once ABSPATH . '/wp-admin/includes/class-wp-filesystem-base.php';
            include_once ABSPATH . '/wp-admin/includes/class-wp-filesystem-direct.php';

            $pos_plugin = new POS_Plugins();

            $msg = ($action == 'install') ? 'Successfully installed the plugin.' : 'Successfully switched plugin version.';
            $msg_error = ($action == 'install') ? 'Unable installed the plugin.' : 'Unable to switched plugin version.';

            $status = false;

            $active_plugins = get_option('active_plugins', []);

            //only for zip uploaded
            if ($action_from == 'upload_zip_plugin') {

                $plugin_url = '';
                $publicFolderPath = plugin_dir_path(dirname(__FILE__)) . 'public-uploads/';

                if (!file_exists($publicFolderPath)) {
                    mkdir($publicFolderPath, 0777, true);
                }

                $zipFilePath = $publicFolderPath . $plugin_orgin_name;
                $getPluginZip = base64_decode($plugin_zip);
                $file_size = strlen($getPluginZip);
                $max_upload_size = wp_max_upload_size();

                if ($file_size > $max_upload_size) {
                    return $this->send_response(false, 'File size exceeded upload limit. Can\'t proceed.', []);
                }

                if (!file_exists($zipFilePath)) {
                    $create_plugin_zip = file_put_contents($zipFilePath, $getPluginZip);
                    if ($create_plugin_zip !== false) {
                        $plugin_url = plugin_dir_url(dirname(__FILE__)) . 'public-uploads/' . $plugin_orgin_name;
                    }
                } else {
                    $plugin_url = plugin_dir_url(dirname(__FILE__)) . 'public-uploads/' . $plugin_orgin_name;
                }

                if (empty($plugin_url)) {
                    return $this->send_response(false, $msg_error, []);
                }

                $installed = false;
                // if (array_key_exists($slug, $block_list) && $action == 'install') {
                //     return $this->send_response(false, 'This is blocked plugin. You can\'t install it.', ['case' => 'blocked']);
                // }

                $status = $pos_plugin->installFromUrl($plugin_url);

                if (!$status) {
                    if (file_exists($zipFilePath)) {
                        unlink($zipFilePath);
                        return $this->send_response(false, 'The package could not be installed. No valid plugins were found.', []);
                    }
                }

                if (is_wp_error($status)) {
                    return $this->send_response(false, $status->get_error_message(), []);
                }

                if (file_exists($zipFilePath)) {
                    if (unlink($zipFilePath)) {
                        $plugins = pos_get_plugins();
                        $plugin = null;
                        $c_path = null;

                        foreach ($plugins as $path => $info) {
                            $pluginPath = WP_PLUGIN_DIR . '/' . $path;
                            $timestamp = filemtime($pluginPath);

                            if ($timestamp > $newestTimestamp) {
                                $newestTimestamp = $timestamp;
                                $installed = true;
                                $c_path = $path;
                                $plugin = $info;
                            }
                        }

                        return $this->send_response($installed, ($installed ? $msg : $msg_error), ['path' => $c_path, 'plugin_data' => $plugin, 'active_status' => in_array($c_path, $active_plugins) ? 1 : 0, 'error' => $status]);
                    }
                } else {
                    return $this->send_response(false, $msg_error, []);
                }
            }


            if ($action_from == 'slug') {
                if (array_key_exists($slug, $block_list) && $action == 'install') {
                    return $this->send_response(false, 'This is blocked plugin. You can\'t install it.', ['case' => 'blocked']);
                }
                $status = $pos_plugin->installFromSlug($slug, $version);
                $plugins = pos_get_plugins();
                $plugin = null;
                $c_path = null;
                foreach ($plugins as $key => $val) {
                    if (str_contains($key, $slug) === true) {
                        $c_path = $key;
                        $plugin = $val;
                        break;
                    }
                }

                return $this->send_response(true, $msg, ['path' => $c_path, 'plugin_data' => $plugin, 'active_status' => in_array($c_path, $active_plugins) ? 1 : 0]);
            }
            if ($action_from == 'path') {
                if (array_key_exists($split[0], $block_list) && $action == 'install') {
                    return $this->send_response(false, 'This is blocked plugin. You can\'t install it.', ['case' => 'blocked']);
                }
                $status = $pos_plugin->installFromSlug($split[0], $version);
                return $this->send_response(true, $msg, [
                    'path' => $path,
                    'plugin_data' => pos_get_plugins()[$path],
                    'active_status' => in_array($path, $active_plugins) ? 1 : 0,
                    'status' => $status
                ]);
            }
            if ($action_from == 'url') {
                $installed = false;
                if (array_key_exists($slug, $block_list) && $action == 'install') {
                    return $this->send_response(false, 'This is blocked plugin. You can\'t install it.', ['case' => 'blocked']);
                }
                $status = $pos_plugin->installFromUrl($url);
                if (is_wp_error($status)) {
                    return $this->send_response(false, $status->get_error_message(), ['url' => $url, 'slug' => $slug, 'action_from' => $action_from]);
                }
                $plugins = pos_get_plugins();
                $plugin = null;
                $c_path = null;
                foreach ($plugins as $key => $val) {
                    if (str_contains($key, $slug) === true) {
                        $installed = true;
                        $c_path = $key;
                        $plugin = $val;
                        break;
                    }
                }
                return $this->send_response($installed, ($installed ? $msg : $msg_error), ['path' => $c_path, 'plugin_data' => $plugin, 'active_status' => in_array($c_path, $active_plugins) ? 1 : 0, 'error' => $status]);
            }

            return $this->send_response(false, (($action == 'install') ? 'Not installed.' : 'Unable to switch version.'), $params);
        }

        if ($action == 'delete') {

            $split = explode('/', $path);
            if (array_key_exists($split[0], $lock_list)) {
                return $this->send_response(false, 'This is locked plugin. You can\'t delete it.', ['case' => 'locked']);
            }

            include_once ABSPATH . '/wp-admin/includes/plugin.php';
            if (file_exists(ABSPATH . '/wp-admin/includes/screen.php')) {
                include_once ABSPATH . '/wp-admin/includes/screen.php';
            }

            include_once ABSPATH . '/wp-admin/includes/file.php';
            include_once ABSPATH . '/wp-admin/includes/template.php';
            include_once ABSPATH . '/wp-admin/includes/misc.php';
            include_once ABSPATH . '/wp-admin/includes/class-wp-upgrader.php';
            include_once ABSPATH . '/wp-admin/includes/class-wp-filesystem-base.php';
            include_once ABSPATH . '/wp-admin/includes/class-wp-filesystem-direct.php';

            $status = delete_plugins([$path]);
            return $this->send_response(true, 'Successfully deleted plugin.', $status);
        }

        if ($action == 'update') {

            $split = explode('/', $path);
            if (array_key_exists($split[0], $lock_list)) {
                return $this->send_response(false, 'This is locked plugin. You can\'t update it.', ['case' => 'locked']);
            }

            if (!array_key_exists($path, get_plugins())) {
                return $this->send_response(false, 'Plugin file does not exist. Please Install the plugin on the remote site.');
            }

            include_once ABSPATH . '/wp-admin/includes/update.php';

            include_once ABSPATH . '/wp-admin/includes/plugin.php';
            if (file_exists(ABSPATH . '/wp-admin/includes/screen.php')) {
                include_once ABSPATH . '/wp-admin/includes/screen.php';
            }

            include_once ABSPATH . '/wp-admin/includes/file.php';
            include_once ABSPATH . '/wp-admin/includes/template.php';
            include_once ABSPATH . '/wp-admin/includes/misc.php';
            include_once ABSPATH . '/wp-admin/includes/class-wp-upgrader.php';
            include_once ABSPATH . '/wp-admin/includes/class-wp-filesystem-base.php';
            include_once ABSPATH . '/wp-admin/includes/class-wp-filesystem-direct.php';

            $update_plugin_list = pos_get_update_plugins();

            $active_plugins = get_option('active_plugins', []);

            if (!array_key_exists($path, $update_plugin_list)) {
                return $this->send_response(true, 'The plugin is at the latest version.', ['path' => $path]);
            }

            $is_active = in_array($path, $active_plugins);

            $nonce = 'upgrade-plugin_' . $path;
            $url   = 'update.php?action=upgrade-plugin&plugin=' . urlencode($path);

            $upgrader = new Plugin_Upgrader(new Plugin_Upgrader_Skin(compact('nonce', 'url')));
            $status = $upgrader->upgrade($path);
            
            if ($is_active) {
                activate_plugin($path);
            } else {
                deactivate_plugins($path);
            }

            if (is_wp_error($status)) {
                return $this->send_response(false, $status->get_error_message(), ['path' => $path]);
            }

            if ($status) {
                return $this->send_response(true, 'Successfully updated plugin.', $status);
            }
            
            return $this->send_response(false, 'Unable to update plugin.', $status);
        }

        return $this->send_response(false, 'Invalid Request format.', $params);
    }

    public function get_site_optmz_endpoint_handler(WP_REST_Request $request)
    {
        $params = $request->get_params();

        $auth = $this->request_authentication($params);
        if ($auth) {
            return $auth;
        }

        $blog_url = trim(str_replace(site_url(), '', get_permalink(get_option('page_for_posts'))), '/');
        $active_plugins = pos_get_active_plugins(get_option('active_plugins', []));
        $posts = pos_get_posts();
        $pages = pos_get_posts('page');
        $specials = [
            [
                'title' => 'Homepage',
                'slug' => '__homepage__'
            ],
            [
                'title' => 'Blog Page',
                'slug' => $blog_url ? $blog_url : "",
            ]
        ];
        if (class_exists('WooCommerce')) {
            $specials[] = [
                'title' => 'All Woocommerce Products',
                'slug' => 'product'
            ];
        }

        // if there is no saved value it will return boolean
        return $this->send_response(true, 'Optimization data retrieved', [
            "optimizations" => get_option('pos-optimization-rules', false),
            "posts" => $posts,
            "pages" => $pages,
            "specials" => $specials,
            "active_plugins" => $active_plugins,
        ]);
    }

    public function save_site_optmz_endpoint_handler(WP_REST_Request $request)
    {
        $params = $request->get_params();

        $auth = $this->request_authentication($params);
        if ($auth) {
            return $auth;
        }

        $optimization_rules = $params['data'];
        $option = update_option('pos-optimization-rules', $optimization_rules, true);

        if ($option) {
            pos_process_optimization_rules();
        }

        // if there is no saved value it will return boolean
        return $this->send_response(true, 'Optimization data stored', [
            "old_optimizations" => $params['data'],
            "optimizations" => $optimization_rules,
        ]);
    }

    public function wp_core_update_endpoint_handler(WP_REST_Request $request)
    {
        $params = $request->get_params();

        $auth = $this->request_authentication($params);
        if ($auth) {
            return $auth;
        }

        include_once ABSPATH . '/wp-admin/includes/update.php';
        include_once ABSPATH . '/wp-admin/includes/class-core-upgrader.php';

        if (file_exists(ABSPATH . '/wp-admin/includes/screen.php')) {
            include_once ABSPATH . '/wp-admin/includes/screen.php';
        }

        include_once ABSPATH . '/wp-admin/includes/file.php';
        include_once ABSPATH . '/wp-admin/includes/template.php';
        include_once ABSPATH . '/wp-admin/includes/misc.php';
        include_once ABSPATH . '/wp-admin/includes/class-wp-upgrader.php';
        include_once ABSPATH . '/wp-admin/includes/class-wp-filesystem-base.php';
        include_once ABSPATH . '/wp-admin/includes/class-wp-filesystem-direct.php';

        $current_version = null;

        wp_version_check();

        global $wp_version;

        $core_updates = get_core_updates();

        $lock = $this->check_core_updater_locked();

        if ($lock) {
            return $this->send_response(false, 'Another update is currently in progress.');
        }

        $response = [
            'status' => false,
        ];

        if (is_array($core_updates) && count($core_updates) > 0) {
            foreach ($core_updates as $core_update) {
                if ('latest' === $core_update->response) {
                    $response['status'] = true;
                    $response['message'] = 'No update available';
                    $current_version = $core_update->current;
                } elseif ('upgrade' === $core_update->response && get_locale() === $core_update->locale && version_compare($wp_version, $core_update->current, '<=')) {
                    // Upgrade!
                    $upgrade = false;
                    if (class_exists('\Core_Upgrader')) {
                        $current_version = $core_update->current;
                        $core    = new \Core_Upgrader();
                        $upgrade = $core->upgrade($core_update);
                    }
                    // If this does not work - add code from /wp-admin/includes/class-wp-upgrader.php in the newer versions.
                    // So users can upgrade older versions too.
                    // 3rd option: 'wp_update_core'.

                    if (!is_wp_error($upgrade)) {
                        $response['status'] = true;
                        $response['message'] = 'Successfully updated WordPress core';
                    } else {
                        $response['status'] = false;
                        $response['message'] = 'Something went wrong.';
                    }
                    break;
                }
            }

            if (!isset($information['upgrade'])) {
                foreach ($core_updates as $core_update) {
                    if ('upgrade' === $core_update->response && version_compare($wp_version, $core_update->current, '<=')) {
                        // Upgrade!
                        $upgrade = false;
                        if (class_exists('\Core_Upgrader')) {
                            $current_version = $core_update->current;
                            $core    = new \Core_Upgrader();
                            $upgrade = $core->upgrade($core_update);
                        }
                        // If this does not work - add code from /wp-admin/includes/class-wp-upgrader.php in the newer versions
                        // So users can upgrade older versions too.
                        // 3rd option: 'wp_update_core'.
                        if (!is_wp_error($upgrade)) {
                            $response['status'] = true;
                            $response['message'] = 'Successfully updated WordPress core.';
                        } else {
                            $response['status'] = false;
                            $response['message'] = 'Something went wrong.';
                        }
                        break;
                    }
                }
            }
        } else {
            $response['status'] = false;
            $response['message'] = 'No response from WordPress.';
        }

        return $this->send_response($response['status'], $response['message'], ['current_version' => $current_version]);
    }

    public function plugin_block_endpoint_handler(WP_REST_Request $request)
    {
        $params = $request->get_params();

        $auth = $this->request_authentication($params);
        if ($auth) {
            return $auth;
        }

        $slug = sanitize_text_field(isset($params['slug']) ? $params['slug'] : '');
        $action = sanitize_text_field(isset($params['action']) ? $params['action'] : '');

        if (empty($slug) || empty($action)) {
            return $this->send_response(false, 'Bad request format.');
        }

        $local_block_data = get_option('pos_blocked_plugins_data', []);
        $local_block_list = get_option('pos_blocked_plugins_list', []);

        $status_1 = false;
        $status_2 = false;

        if ($action == 'block') {

            $pos_parent = get_option('pos-parent', false);
            $user = false;
            if ($pos_parent && !empty($pos_parent)) {
                $user = get_user_by('id', $pos_parent);
            }

            if (!$user) {
                $admin_email = get_bloginfo('admin_email');
                $user = get_user_by('email', $admin_email);
            }

            $new_data = [
                'slug' => $slug,
                'user_id' => $user->ID,
                'user_name' => $user->user_nicename,
            ];

            $local_block_data[$slug] = $new_data;

            $status_1 = update_option('pos_blocked_plugins_data', $local_block_data);

            $local_block_list[$slug] = 1;

            $status_2 = update_option('pos_blocked_plugins_list', $local_block_list);
        }

        if ($action == 'unblock') {

            // if (isset($local_block_data[$slug]) && $local_block_data[$slug]['user_name'] == $user->user_nicename) {
            unset($local_block_data[$slug]);

            $status_1 = update_option('pos_blocked_plugins_data', $local_block_data);

            unset($local_block_list[$slug]);

            $status_2 = update_option('pos_blocked_plugins_list', $local_block_list);
            // } else {
            //     return $this->send_response(false, "This is locked by {$local_block_data[$slug]['user_name']}. You can't unlock it.", ['lock_data' => $local_block_data, 'lock_list' => $local_block_list]);
            // }
        }

        return $this->send_response(true, 'Block infomation updated.', ['block_data' => $local_block_data, 'block_list' => $local_block_list]);

        // return $this->send_response(false, 'Lock information not updated.', ['lock_data' => $local_lock_data, 'lock_list' => $local_lock_list]);
    }

    public function plugin_lock_endpoint_handler(WP_REST_Request $request)
    {
        $params = $request->get_params();

        $auth = $this->request_authentication($params);
        if ($auth) {
            return $auth;
        }

        $slug = sanitize_text_field(isset($params['slug']) ? $params['slug'] : '');
        $action = sanitize_text_field(isset($params['action']) ? $params['action'] : '');

        if (empty($slug) || empty($action)) {
            return $this->send_response(false, 'Bad request format.');
        }

        $local_lock_data = get_option('pos_locked_plugins_data', []);
        $local_lock_list = get_option('pos_locked_plugins_list', []);

        $status_1 = false;
        $status_2 = false;

        if ($action == 'lock') {

            $pos_parent = get_option('pos-parent', false);
            $user = false;
            if ($pos_parent && !empty($pos_parent)) {
                $user = get_user_by('id', $pos_parent);
            }

            if (!$user) {
                $admin_email = get_bloginfo('admin_email');
                $user = get_user_by('email', $admin_email);
            }

            $new_data = [
                'slug' => $slug,
                'user_id' => $user->ID,
                'user_name' => $user->user_nicename,
            ];

            $local_lock_data[$slug] = $new_data;

            $status_1 = update_option('pos_locked_plugins_data', $local_lock_data);

            $local_lock_list[$slug] = 1;

            $status_2 = update_option('pos_locked_plugins_list', $local_lock_list);
        }

        if ($action == 'unlock') {

            // if (isset($local_lock_data[$slug]) && $local_lock_data[$slug]['user_name'] == $user->user_nicename) {
            unset($local_lock_data[$slug]);

            $status_1 = update_option('pos_locked_plugins_data', $local_lock_data);

            unset($local_lock_list[$slug]);

            $status_2 = update_option('pos_locked_plugins_list', $local_lock_list);
            // } else {
            //     return $this->send_response(false, "This is locked by {$local_lock_data[$slug]['user_name']}. You can't unlock it.", ['lock_data' => $local_lock_data, 'lock_list' => $local_lock_list]);
            // }
        }

        return $this->send_response(true, 'Lock infomation updated.', ['lock_data' => $local_lock_data, 'lock_list' => $local_lock_list]);

        // return $this->send_response(false, 'Lock information not updated.', ['lock_data' => $local_lock_data, 'lock_list' => $local_lock_list]);
    }

    public function plugin_vault_endpoint_handler(WP_REST_Request $request)
    {
        $params = $request->get_params();

        $auth = $this->request_authentication($params);
        if ($auth) {
            return $auth;
        }

        $slug = sanitize_text_field(isset($params['slug']) ? $params['slug'] : '');
        $version = sanitize_text_field(isset($params['version']) ? $params['version'] : '');
        $action = sanitize_text_field(isset($params['action']) ? $params['action'] : '');
        $storage_type = "r2";
        $zip_filename = '';

        if (empty($slug) || empty($version)) {
            return $this->send_response(false, 'Bad request format.');
        }

        if (!file_exists(WP_PLUGIN_DIR . '/' . $slug) && !is_dir(WP_PLUGIN_DIR . '/' . $slug)) {
            return $this->send_response(false, 'Plugin not found on the remote site.');
        }

        if ($action == 'delete-file') {
            $zip_filename = "{$slug}.zip";
            $status = false;
            if ($storage_type == "r2" && file_exists(WP_PLUGIN_DIR . "/" . $zip_filename)) {
                $status = unlink(WP_PLUGIN_DIR . "/" . $zip_filename);
            }
            return $this->send_response($status, ($status) ? 'File deleted.' : 'File not found.');
        }

        $zip_filename = pos_create_download_link($slug);
        $url =  WP_PLUGIN_URL . '/' . $zip_filename;

        if (empty($zip_filename)) {
            return $this->send_response(false, 'Unable to create zip.');
        }

        $data = [
            'plugin_slug' => $slug,
            'plugin_version' => $version,
            'storage_type' => $storage_type,
            'url' => $url
        ];

        return $this->send_response(true, 'Vault data to send.', $data);
    }

    public function site_wpuser_endpoint_handler(WP_REST_Request $request)
    {
        $params = $request->get_params();

        $auth = $this->request_authentication($params);
        if ($auth) {
            return $auth;
        }

        $action     = sanitize_text_field(isset($params['action']) ? $params['action'] : '');
        $wpuser_id  = sanitize_text_field(isset($params['user_data']['wpuser_id']) ? $params['user_data']['wpuser_id'] : '');
        $user_name  = sanitize_text_field(isset($params['user_data']['user_name']) ? $params['user_data']['user_name'] : '');
        $password   = sanitize_text_field(isset($params['user_data']['password']) ? $params['user_data']['password'] : '');
        $email      = sanitize_text_field(isset($params['user_data']['email']) ? $params['user_data']['email'] : '');
        $first_name = sanitize_text_field(isset($params['user_data']['first_name']) ? $params['user_data']['first_name'] : '');
        $last_name  = sanitize_text_field(isset($params['user_data']['last_name']) ? $params['user_data']['last_name'] : '');
        $websites   = sanitize_text_field(isset($params['user_data']['websites']) ? $params['user_data']['websites'] : '');
        $role       = sanitize_text_field(isset($params['user_data']['role']) ? $params['user_data']['role'] : '');

        // add user
        if ($action == 'add-user') {

            if (username_exists($user_name)) {
                return $this->send_response(false, 'Sorry, that username already exists!.');
            }

            if (email_exists($email)) {
                return $this->send_response(false, 'Sorry, that email already exists!.');
            }

            $userData = [
                'user_login'                => $user_name,
                'user_pass'                 => $password,
                'user_email'                => $email,
                'first_name'                => $first_name,
                'last_name'                 => $last_name,
                'user_url'                  => esc_url($websites),
                'role'                      => $role,
                'send_user_notification'    => 1
            ];

            // Create the user
            $user_id = wp_insert_user($userData);
            // Set user role
            if (!is_wp_error($user_id)) {
                $get_user = new WP_User($user_id);
                $user = [
                    'id'                => $user_id,
                    'user_name'         => $get_user->user_login,
                    'user_nicename'     => $get_user->user_nicename,
                    'display_name'      => $get_user->display_name,
                    'email'             => $get_user->user_email,
                    'first_name'        => $get_user->first_name,
                    'last_name'         => $get_user->last_name,
                    'user_registered'   => date("d F Y, H:i A", strtotime($get_user->user_registered)),
                    'user_status'       => $get_user->user_status,
                    'role'              => $get_user->roles[0],
                    'websites'          => $get_user->user_url,
                ];
                return $this->send_response(true, 'User created successfully.', $user);
            } else {
                return $this->send_response(false, 'Failed to create user.');
            }
        }

        // update user by id
        if ($action == 'update-user') {

            $current_user = get_userdata($wpuser_id);

            if (!$current_user) {
                return $this->send_response(false, 'User not found.', []);
            }

            $userData = [
                'ID'                        => $wpuser_id,
                'user_email'                => $email,
                'first_name'                => $first_name,
                'last_name'                 => $last_name,
                'user_url'                  => esc_url($websites),
                'role'                      => $role,
                'send_user_notification'    => 1
            ];

            if (!empty($password)) {
                $userData['user_pass'] = $password;
            }

            // Update the user
            $user_id = wp_update_user($userData);

            if (!is_wp_error($user_id)) {

                $get_user = new WP_User($user_id);

                $user = [
                    'id'                => $user_id,
                    'user_name'         => $get_user->user_login,
                    'user_nicename'     => $get_user->user_nicename,
                    'display_name'      => $get_user->display_name,
                    'email'             => $get_user->user_email,
                    'first_name'        => $get_user->first_name,
                    'last_name'         => $get_user->last_name,
                    'user_registered'   => date("d F Y, H:i A", strtotime($get_user->user_registered)),
                    'user_status'       => $get_user->user_status,
                    'role'              => $get_user->roles[0],
                    'websites'          => $get_user->user_url,
                ];

                return $this->send_response(true, 'User updated successfully.', $user);
            } else {
                return $this->send_response(false, 'Failed to update user.', []);
            }
        }

        //detete user
        if ($action == 'delete-user') {

            include_once ABSPATH . '/wp-admin/includes/user.php';

            $current_user = get_userdata($wpuser_id);

            if (!$current_user) {
                return $this->send_response(false, 'User not found.', []);
            }

            if ($current_user) {
                $delete_result = wp_delete_user($wpuser_id);
                if (!is_wp_error($delete_result)) {
                    return $this->send_response(true, 'User deleted successfully.', []);
                } else {
                    return $this->send_response(false, 'Failed to delete user.', []);
                }
            }
        }

        return $this->send_response(false, 'Invalid requiest.');
    }

    public function get_site_wpuser_endpoint_handler(WP_REST_Request $request)
    {
        $params = $request->get_params();

        $auth = $this->request_authentication($params);
        if ($auth) {
            return $auth;
        }

        $roles_obj = new WP_Roles();
        $get_roles = $roles_obj->get_names();
        $users = get_users();

        /*$roles = [];
        $wpusers = [];
        foreach ($get_roles as $role => $role_info) {

            $roles[] = $role;
            $users = get_users(array('role' => $role));

            foreach ($users as $user) {
                $wpusers[] = [
                    'id'                => $user->ID,
                    'user_name'         => $user->user_login,
                    'user_nicename'     => $user->user_nicename,
                    'display_name'      => $user->display_name,
                    'email'             => $user->user_email,
                    'first_name'        => $user->first_name,
                    'last_name'         => $user->last_name,
                    'user_registered'   => date("d F Y, H:i A", strtotime($user->user_registered)),
                    'user_status'       => $user->user_status,
                    'role'              => $user->roles[0],
                    'websites'          => $user->user_url,
                ];
            }
        }*/

        return $this->send_response(true, 'Get all users.', ['roles' => $get_roles, 'wpusers' => $users]);
    }

    public function get_site_wpsettings_endpoint_handler(WP_REST_Request $request)
    {
        $params = $request->get_params();

        $auth = $this->request_authentication($params);
        if ($auth) {
            return $auth;
        }

        $wpsettings = $this->get_epm_wpsettings();

        return $this->send_response( true, 'Get all settings.', $wpsettings);
    }

    public function update_site_wpsettings_endpoint_handler (WP_REST_Request $request) {
        $params = $request->get_params();

        $auth = $this->request_authentication($params);
        if ($auth) {
            return $auth;
        }

        $updateWPsettings = [];

        $wpsettings  = !empty($params['wpsettings']) ? $this->epm_sanitize_array_recursively($params['wpsettings']) : [];
        
        if ( !empty( $wpsettings ) ) {
            foreach( $wpsettings as $key => $val ) {
                update_option( $key, $val );
            }
            $updateWPsettings = $this->get_epm_wpsettings();
            return $this->send_response(true, 'Settings updated successfully.', $updateWPsettings);

        } else {
            return $this->send_response(false, 'Settings data not found.', []);
        }

    }

    private function get_epm_wpsettings () {
        require_once ABSPATH . 'wp-admin/includes/translation-install.php';

        $roles_obj = new WP_Roles();
        $get_roles = $roles_obj->get_names();
        $roles = [];
        foreach ($get_roles as $key => $value) {
            $roles[] = $key;
        }

        //timezone
        $current_offset = get_option('gmt_offset');
        $tzstring       = get_option('timezone_string');
        // Remove old Etc mappings. Fallback to gmt_offset.
        if (str_contains($tzstring, 'Etc/GMT')) {
            $tzstring = '';
        }

        if (empty($tzstring)) {
            if (0 == $current_offset) {
                $tzstring = 'UTC+0';
            } elseif ($current_offset < 0) {
                $tzstring = 'UTC' . $current_offset;
            } else {
                $tzstring = 'UTC+' . $current_offset;
            }
        }

        //date formates
        $dformats = array_unique(apply_filters('date_formats', array(__('F j, Y'), 'Y-m-d', 'm/d/Y', 'd/m/Y')));
        $date_formats = [];
        foreach ($dformats as $format) {
            $date_formats[] = [
                'formated_date' => date($format),
                'format'        => $format,
            ];
        }
        //time formates
        $tformats = array_unique(apply_filters('time_formats', array(__('g:i a'), 'g:i A', 'H:i')));
        $time_formats = [];
        foreach ($tformats as $format) {
            $time_formats[] = [
                'formated_time' => date($format),
                'format'        => $format,
            ];
        }
        //category
        $categories = get_terms(array(
            'taxonomy' => 'category',
            'hide_empty' => false,
        ));
        //post formates
        $post_formats = get_post_format_strings();
        $formats = [];
        $i=0;
        foreach ($post_formats as $key => $value) {
            $formats[] = [
                'id' => $i == 0 ? 0 : $key,
                'format' => $key,
            ];
            $i++;
        }

        //get pages
        $get_pages  = get_pages();
        $pages      = [];
        $i = 0;
        foreach ($get_pages as $key => $page) {
            if ($i==0) {
                $pages[] = [
                    'id'    => 0,
                    'title' => '__Select__',
                    'name'  => '__Select__',
                ];
            }
            $pages[] = [
                'id'    => $page->ID,
                'title' => $page->post_title,
                'name'  => $page->post_name,
            ];
            $i++;
        }

        //get time zones
        $timezones = $this->get_epm_time_zones();
        //get default avatars
        $default_avatars_list = $this->get_epm_pre_define_avatars_list();

        $wpsettings = [
            'general' => [
                'blogname'              => get_option('blogname', false),
                'blogdescription'       => get_option('blogdescription', false),
                'users_can_register'    => get_option('users_can_register', false),
                'default_role'          => get_option('default_role', false),
                'timezone_string'       => $tzstring,
                'date_format'           => get_option('date_format', false),
                'time_format'           => get_option('time_format', false),
                'start_of_week'         => get_option('start_of_week', false),
            ],
            'writing_settings' => [
                'default_category'      => get_option('default_category', false),
                'default_post_format'   => get_option('default_post_format', false),
            ],
            'reading_ettings' => [
                'show_on_front'         => get_option('show_on_front', false),
                'page_on_front'         => get_option('page_on_front', true),
                'page_for_posts'        => get_option('page_for_posts', true),
                'posts_per_page'        => get_option('posts_per_page', false),
                'posts_per_rss'         => get_option('posts_per_rss', false),
                'rss_use_excerpt'       => get_option('rss_use_excerpt', false),
                'blog_public'           => get_option('blog_public', false),
            ],
            'avatars_settings' => [
                'show_avatars'          => get_option('show_avatars', false),
                'avatar_rating'         => get_option('avatar_rating', false),
                'avatar_default'        => get_option('avatar_default', false),
            ],
            'media_settings' => [
                'thumbnail_size_w'              => get_option('thumbnail_size_w', false),
                'thumbnail_size_h'              => get_option('thumbnail_size_h', false),
                'thumbnail_crop'                => get_option('thumbnail_crop', false),
                'medium_size_w'                 => get_option('medium_size_w', false),
                'medium_size_h'                 => get_option('medium_size_h', false),
                'large_size_w'                  => get_option('large_size_w', false),
                'large_size_h'                  => get_option('large_size_h', false),
                'uploads_use_yearmonth_folders' => get_option('uploads_use_yearmonth_folders', false),
            ],
        ];

        return [
                'roles'         => $roles,
                'timezones'     => $timezones,
                'date_formats'  => $date_formats,
                'time_formats'  => $time_formats,
                'categories'    => $categories,
                'post_formats'  => $formats,
                'avatars_list'  => $default_avatars_list,
                'pages'         => $pages,
                'wpsettings'    => $wpsettings
            ];
    }

    //epm time zones
    private function get_epm_time_zones($locale = null)
    {
        static $mo_loaded = false, $locale_loaded = null;

        $continents = array('Africa', 'America', 'Antarctica', 'Arctic', 'Asia', 'Atlantic', 'Australia', 'Europe', 'Indian', 'Pacific');

        // Load translations for continents and cities.
        if (!$mo_loaded || $locale !== $locale_loaded) {
            $locale_loaded = $locale ? $locale : get_locale();
            $mofile        = WP_LANG_DIR . '/continents-cities-' . $locale_loaded . '.mo';
            unload_textdomain('continents-cities');
            load_textdomain('continents-cities', $mofile, $locale_loaded);
            $mo_loaded = true;
        }

        $tz_identifiers = timezone_identifiers_list();
        $zonen          = [];

        foreach ($tz_identifiers as $zone) {
            $zone = explode('/', $zone);
            if (!in_array($zone[0], $continents, true)) {
                continue;
            }

            // This determines what gets set and translated - we don't translate Etc/* strings here, they are done later.
            $exists    = array(
                0 => (isset($zone[0]) && $zone[0]),
                1 => (isset($zone[1]) && $zone[1]),
                2 => (isset($zone[2]) && $zone[2]),
            );
            $exists[3] = ($exists[0] && 'Etc' !== $zone[0]);
            $exists[4] = ($exists[1] && $exists[3]);
            $exists[5] = ($exists[2] && $exists[3]);

            // phpcs:disable WordPress.WP.I18n.LowLevelTranslationFunction,WordPress.WP.I18n.NonSingularStringLiteralText
            $zonen[] = array(
                'continent'   => ($exists[0] ? $zone[0] : ''),
                'city'        => ($exists[1] ? $zone[1] : ''),
                'subcity'     => ($exists[2] ? $zone[2] : ''),
                't_continent' => ($exists[3] ? translate(str_replace('_', ' ', $zone[0]), 'continents-cities') : ''),
                't_city'      => ($exists[4] ? translate(str_replace('_', ' ', $zone[1]), 'continents-cities') : ''),
                't_subcity'   => ($exists[5] ? translate(str_replace('_', ' ', $zone[2]), 'continents-cities') : ''),
            );
            // phpcs:enable
        }
        usort($zonen, [$this, 'emp_timezone_choice_usort_callback']);

        $structure = [];

        foreach ($zonen as $key => $zone) {
            // Build value in an array to join later.
            $value = array($zone['continent']);

            if (empty($zone['city'])) {
                // It's at the continent level (generally won't happen).
                $display = $zone['t_continent'];
            } else {
                // Add the city to the value.
                $value[] = $zone['city'];

                $display = $zone['t_city'];
                if (!empty($zone['subcity'])) {
                    // Add the subcity to the value.
                    $value[]  = $zone['subcity'];
                    $display .= ' - ' . $zone['t_subcity'];
                }
            }
            $value = implode('/', $value);
            // $structure[$value] = $display;
            $structure[] = [
                'offset_value' => $value,
                'offset_name' => $display,
            ];
        }

        $offset_range = [-12, -11.5, -11, -10.5, -10, -9.5, -9, -8.5, -8, -7.5, -7, -6.5, -6, -5.5, -5, -4.5, -4, -3.5, -3, -2.5, -2, -1.5, -1, -0.5, 0, 0.5, 1, 1.5, 2, 2.5, 3, 3.5, 4, 4.5, 5, 5.5, 5.75, 6, 6.5, 7, 7.5, 8, 8.5, 8.75, 9, 9.5, 10, 10.5, 11, 11.5, 12, 12.75, 13, 13.75, 14,];
        foreach ($offset_range as $offset) {
            if (0 <= $offset) {
                $offset_name = '+' . $offset;
            } else {
                $offset_name = (string) $offset;
            }

            $offset_value = $offset_name;
            $offset_name  = str_replace(array('.25', '.5', '.75'), array(':15', ':30', ':45'), $offset_name);
            $offset_name  = 'UTC' . $offset_name;
            $offset_value = 'UTC' . $offset_value;

            // $structure[$offset_value] = $offset_name;
            $structure[] = [
                'offset_value' => $offset_value,
                'offset_name' => $offset_name,
            ];
        }
        return $structure;
    }

    //epm time zons callback
    private function emp_timezone_choice_usort_callback($a, $b)
    {
        if ('Etc' === $a['continent'] && 'Etc' === $b['continent']) {
            // Make the order of these more like the old dropdown.
            if (str_starts_with($a['city'], 'GMT+') && str_starts_with($b['city'], 'GMT+')) {
                return -1 * (strnatcasecmp($a['city'], $b['city']));
            }
            if ('UTC' === $a['city']) {
                if (str_starts_with($b['city'], 'GMT+')) {
                    return 1;
                }
                return -1;
            }
            if ('UTC' === $b['city']) {
                if (str_starts_with($a['city'], 'GMT+')) {
                    return -1;
                }
                return 1;
            }
            return strnatcasecmp($a['city'], $b['city']);
        }
        if ($a['t_continent'] == $b['t_continent']) {
            if ($a['t_city'] == $b['t_city']) {
                return strnatcasecmp($a['t_subcity'], $b['t_subcity']);
            }
            return strnatcasecmp($a['t_city'], $b['t_city']);
        } else {
            // Force Etc to the bottom of the list.
            if ('Etc' === $a['continent']) {
                return 1;
            }
            if ('Etc' === $b['continent']) {
                return -1;
            }
            return strnatcasecmp($a['t_continent'], $b['t_continent']);
        }
    }

    // array sanitize
    private function epm_sanitize_array_recursively($array) {

        foreach ($array as $key => &$value) {
            if (is_array($value)) {
                $value = ha_sanitize_array_recursively($value);
            } else {
                $value = sanitize_text_field($value);
            }
        }
    
        return $array;
    }

    //get pre definen avatars list
    private function get_epm_pre_define_avatars_list () {
        $current_user   = wp_get_current_user();
        $user_email     = '';
        if ($current_user && $current_user->ID !== 0) {
            $user_email = $current_user->user_email;
        } 
        $avatar_defaults = array(
            'mystery'          => __( 'Mystery Person' ),
            'blank'            => __( 'Blank' ),
            'gravatar_default' => __( 'Gravatar Logo' ),
            'identicon'        => __( 'Identicon (Generated)' ),
            'wavatar'          => __( 'Wavatar (Generated)' ),
            'monsterid'        => __( 'MonsterID (Generated)' ),
            'retro'            => __( 'Retro (Generated)' ),
            'robohash'         => __( 'RoboHash (Generated)' ),
        );
        $avatar_defaults = apply_filters( 'avatar_defaults', $avatar_defaults );
        $avatar_list = [];
        foreach ( $avatar_defaults as $default_key => $default_name ) {
            $avatar_list[] = [
                // 'url' => get_avatar( $user_email, 32, $default_key, '', array( 'force_default' => true ) ),
                'url'           => get_avatar_url($user_email, array('default' => $default_key, 'force_default' => true)),
                'default_key'   => $default_key,
                'default_name'  => $default_name
            ];
        }
        return $avatar_list;
    }

    public function request_authentication($params, $case = '')
    {

        $auth_key = sanitize_text_field((isset($params['auth_key']) ? $params['auth_key'] : ''));

        $login_info = get_option('pos-sign', false);
        if (!is_array($login_info)) {
            return $this->send_response(false, 'You have to login in "Eazy Plugin Manager" from your WordPress dashboard.', ['case' => 'logged-out']);
        }

        $connection = get_option('eazywp_connection', false);
        if (!(is_array($connection) && $connection['status'])) {
            return $this->send_response(false, 'Site is not connected to a user from remote "Eazy Plugin Manager".', ['case' => 'disconnected']);
        }
        $local_remote_user_id = (isset($connection['remote_user_id']) ? $connection['remote_user_id'] : false);

        $connecting_info = get_option('eazywp_connecting_info', false);
        $local_site_url = (isset($connecting_info['site_url']) ? $connecting_info['site_url'] : '');
        $local_connection_key = (isset($connecting_info['connection_key']) ? $connecting_info['connection_key'] : '');

        if (!($auth_key == hash('whirlpool', $local_site_url . ":" . $local_connection_key . ":" . $local_remote_user_id))) {
            return $this->send_response(false, "Unauthorized request.", ['case' => 'unauthorized']);
        }

        return false;
    }

    public function send_response($status, $message, $data = [])
    {
        return [
            "status" => $status,
            "message" => $message,
            "data" => $data
        ];
    }

    private function check_core_updater_locked()
    {
        $lock_option = 'core_updater.lock';
        $lock_result = get_option($lock_option);
        // There isn't a lock, bail.
        if (!$lock_result) {
            return false;
        }

        $release_timeout = 15 * MINUTE_IN_SECONDS;
        // Check to see if the lock is still valid. If it is, bail.
        if ($lock_result > (time() - $release_timeout)) {
            return true;
        }
        return false;
    }

    public static function instance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
