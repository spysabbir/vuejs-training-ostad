<?php
/*
Plugin Name: WordPress VueJS
Plugin URI: http://spysabbir.com
Description: A simple VueJS plugin for WordPress
Version: 1.0
Author: Spy Sabbir
Author URI: http://spysabbir.com
License: GPL2
*/


add_action('admin_menu', 'admin_menu');
function admin_menu() {
    global $submenu;

    $capability = 'manage_options';

    $hook = add_menu_page(
        __('Wordpress Vuejs', 'plugin-name'),
        __('Wordpress Vuejs', 'plugin-name'),
        'manage_options',
        'wordpress-vuejs',
        'render_page',
        'dashicons-admin-generic',
        30
    );

    if (current_user_can($capability)) {
        $submenu['wordpress-vuejs'][] = array(__('Welcome', 'plugin-name'), $capability, 'admin.php?page=wordpress-vuejs#/');
        $submenu['wordpress-vuejs'][] = array(__('Settings', 'plugin-name'), $capability, 'admin.php?page=wordpress-vuejs#/settings');
    }
}

function render_page() {
    echo '<div class="wrap"><div id="wordpress-vuejs-dashboard-app"></div></div>';
}

add_action('admin_enqueue_scripts', 'enqueue_scripts');
function enqueue_scripts() {
    $screen = get_current_screen();
    if ($screen->id !== 'toplevel_page_wordpress-vuejs') {
        return;
    }

    $js_src = '//localhost:5173/src/main.js';
    // $js_src = plugin_dir_url(__FILE__) . 'dist/assets/index.js';

    wp_enqueue_script('wordpress-vuejs', $js_src, array('jquery'), '1.0', true);
    wp_localize_script('wordpress-vuejs', 'wordpress_vuejs', array(
        'plugin_url' => plugin_dir_url(__FILE__),
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('ajax_nonce'),
    ));
    // wp_enqueue_style('wordpress-vuejs', plugin_dir_url(__FILE__) . 'dist/assets/index.css');
}

add_action('script_loader_tag', 'add_type_attribute', 10, 3);
function add_type_attribute($tag, $handle, $src) {
    if ('wordpress-vuejs' === $handle) {
        $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
    }
    return $tag;
}

add_action('wp_ajax_vuejs_data', 'vuejs_data');
add_action('wp_ajax_nopriv_vuejs_data', 'vuejs_data');
function vuejs_data() {
    $nonce = isset($_REQUEST['nonce']) ? $_REQUEST['nonce'] : '';

    if (!wp_verify_nonce($nonce, 'ajax_nonce')) {
        exit('Unauthorized request');
    }

    $data = [
        'status' => true,
        'welcome' => [
            'title' => "Welcome to WordPress VueJS",
            'content' => "This is a simple VueJS plugin for WordPress. You can use this plugin to create a VueJS application in WordPress admin panel.",
        ],
        'settings' => [
            'title' => "Settings",
            'content' => "You can configure your settings here.",
        ],
    ];

    wp_send_json($data);
}