<?php

/**
 * Plugin Name: Eazy Plugin Manager Helper
 * Description: Eazy Plugin Manager - Manage WordPress Plugins Like A Pro
 * Author URI:  https://eazyplugins.com/eazy-plugin-manager/
 * Plugin URI:  https://eazyplugins.com/plugins-on-steroids/
 * Version:     1.5.0
 * Author:      EazyPlugins
 * Text Domain: plugins-on-steroids
 * Domain Path: /i18n
 */

$active_plugins = get_option('active_plugins');
if(!in_array('plugins-on-steroids/plugins-on-steroids.php',$active_plugins)){
    return;
}

add_filter('option_active_plugins', 'pos_plugin_filter');
$blocked_pages = [];
$blocked_posts = [];
$blocked_urls = [];
function pos_plugin_filter($plugins) {
    if (is_admin()) {
        return $plugins;
    } else {

        $blocked_urls = get_option('pos-optimized-rules');

        $site_url = get_option('home');
        $host = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'];
        $sub_directory = ltrim(str_replace($host, '', $site_url), '/');
        $request_uri = trim($_SERVER['REQUEST_URI'], '/');
        $current_url = str_replace($sub_directory, '', $request_uri);

        $url_array = explode('/',$current_url);
        $absolute_slug = end($url_array);
        
        if ($current_url == '') {
            $absolute_slug = '__homepage__';
        }

        $productPermalinks = get_option('woocommerce_permalinks');
        $product_base = !empty($productPermalinks) && is_array($productPermalinks) && isset($productPermalinks['product_base']) ? trim($productPermalinks['product_base'], '/') : 'product';
        if ( strpos($current_url, $product_base) !== false ) {
            $absolute_slug = 'product';
        }

        if (is_array($blocked_urls) && count($blocked_urls) > 0) {
            if (isset($blocked_urls[$absolute_slug])) {
                foreach ($plugins as $index => $plugin) {
                    $parts = explode('/', $plugin);
                    $needle = $parts[0];
                    if (in_array($needle, $blocked_urls[$absolute_slug])) {
                        unset($plugins[$index]);
                    }
                }
            }
        }

    }
    
    return $plugins;
}
