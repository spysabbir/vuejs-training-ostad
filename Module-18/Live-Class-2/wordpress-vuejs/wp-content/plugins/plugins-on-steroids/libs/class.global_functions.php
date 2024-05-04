<?php

function pos_get_plugins() {
    wp_update_plugins();
    global $status, $plugins, $totals, $page, $orderby, $order, $s;
    $s = '';

    include_once ABSPATH . '/wp-admin/includes/template.php';
    include_once ABSPATH . '/wp-admin/includes/update.php';
    include_once ABSPATH . '/wp-admin/includes/misc.php';
    include_once ABSPATH . '/wp-admin/includes/class-wp-screen.php';
    include_once ABSPATH . '/wp-admin/includes/class-wp-list-table.php';

    include_once ABSPATH . '/wp-admin/includes/class-wp-plugins-list-table.php';

    $plugin_list_table = new WP_Plugins_List_Table();
    $plugin_list_table->prepare_items();

    return $plugins['all'];
}

function pos_get_themes() {
    $themes = [];
    $obj_themes = wp_get_themes();
    foreach ($obj_themes as $slug => $obj) {
        $themes[$slug] = [
            "Name" => $obj->get('Name'),
            "ThemeURI" => $obj->get('ThemeURI'),
            "Version" => $obj->get('Version'),
            "Description" => $obj->get('Description'),
            "Author" => $obj->get('Author'),
            "AuthorURI" => $obj->get('AuthorURI'),
            "TextDomain" => $obj->get('TextDomain'),
            "DomainPath" => $obj->get('DomainPath'),
            "Network" => $obj->get('Network'),
            "RequiresWP" => $obj->get('RequiresWP'),
            "RequiresPHP" => $obj->get('RequiresPHP'),
            "UpdateURI" => $obj->get('UpdateURI'),
            "Title" => $obj->get('Name'),
            "AuthorName" => $obj->get('Author')
        ];
    }
    return $themes;
    // include_once ABSPATH . '/wp-admin/includes/theme.php';
    // return wp_prepare_themes_for_js();
}

function pos_get_update_themes() {
    wp_update_themes();
    $updates = get_theme_updates();
    return (count($updates) > 0) ? $updates : false;
}

function pos_get_update_plugins() {
    wp_update_plugins();
    $updates = get_plugin_updates();
    return (count($updates) > 0) ? $updates : false;
}

function pos_get_core_update() {
    wp_version_check();
    $update_info = get_core_updates();
    return isset($update_info[0]) ? $update_info[0] : 0;
}

function pos_get_posts($post_type = 'post') {
    $args = [
        'post_type'   => $post_type,
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'orderby' => 'title',
        'order' => 'ASC',
    ];

    $publish_posts = get_posts($args);
    $posts = [];
    if (!empty($publish_posts)) {
        foreach ($publish_posts as $key => $value) {
            $posts[] = [
                'id' => (string)$value->ID,
                'title' => $value->post_title,
                'slug' => $value->post_name
            ];
            // error_log( print_r( $posts , 1 ) );
            // break;
        }
    }
    return $posts;
}

function pos_get_active_plugins($plugins) {
    if (!$plugins) {
        return $plugins;
    }
    $slugs = [];
    foreach ($plugins as $key => $value) {
        if (strrpos($value, 'plugins-on-steroids')) {
            continue;
        }
        $pos = stripos($value, '/');
        $slugs[] = substr($value, 0, $pos);
    }
    return $slugs;
}

function pos_process_optimization_rules() {
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
}

function pos_create_download_link($slug) {
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
        pos_delete_temp_folder($folder_path);
    }
    // Download Zip
    $zip_file = $folder_path . '.zip';
    if (file_exists($zip_file)) {
        return basename($zip_file);
    }
    return false;
}

function pos_delete_temp_folder($path) {
    if (is_dir($path) === true) {
        $files = array_diff(scandir($path), array('.', '..'));
        foreach ($files as $file) {
            pos_delete_temp_folder(realpath($path) . '/' . $file);
        }
        return rmdir($path);
    } elseif (is_file($path) === true) {
        return unlink($path);
    }
    return false;
}

function pos_null_to_empty_string_for_optimizations_rules($data) {

    foreach ($data as $key => $value) {
        foreach ($value['rules'] as $rule_key => $rule_value) {
            if ($rule_value['type'] == 'special' && $rule_value['specials']) {
                foreach ($rule_value['specials'] as $special_key => $special_value) {
                    if (empty($special_value)) {
                        $data[$key]['rules'][$rule_key]['specials'][$special_key] = '';
                        break;
                    }
                }
                foreach ($rule_value['slugs'] as $slug_key => $slug_value) {
                    if (empty($slug_value)) {
                        $data[$key]['rules'][$rule_key]['slugs'][$slug_key] = '';
                        break;
                    }
                }
                break;
            }
        }
    }
    return $data;
}

function pos_whitelisted_option_keys() {
    return [
        'pos_login_notice_dismissed',
        'pos_plugin_frozen',
        'pos_plugin_frozen_by',
        'pos_plugin_frozen',
        'pos_plugin_image',
        'pos-x16',
        'pos-sign',
        'pos-parent',
        'eazywp_connecting_info',
        'pos_439001',
        'pos-optimization-rules',
        'pos_vul_count',
        'eazywp_connection'
    ];
}
