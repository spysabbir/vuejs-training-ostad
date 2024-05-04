<?php

namespace Engramium\Optimator\Dashboard;

// If this file is called directly, abort.
defined('ABSPATH') || exit;

/**
 * Dashboard related assets manager class
 *
 * @author sayedulsayem
 * @since 1.0.0
 */
class Assets {

    use \Engramium\Optimator\Traits\Singleton;

    /**
     * initialization function
     *
     * @return void
     * @since 1.0.0
     */
    public function init() {
        add_action('admin_enqueue_scripts', [$this, 'enqueue_scripts']);
        add_filter('script_loader_tag', [$this, 'load_script_as_module'], 10, 3);
    }

    /**
     * enqueue scripts function
     *
     * @return void
     * @since 1.0.0
     */
    public function enqueue_scripts() {
        $screen = get_current_screen();
        if ('toplevel_page_optimator-settings' != $screen->id) return;
        wp_enqueue_style('optimator-dashboard');
        wp_enqueue_script('optimator-dashboard');
        wp_localize_script('optimator-dashboard', 'optimator', [
            'plugin_url' => OPTIMATOR_URL,
            'plugin_path' => OPTIMATOR_PATH,
            'plugin_version' => OPTIMATOR_VERSION,
            'admin_ajax' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('optimator_nonce'),
        ]);
    }

    /**
     * Script as module function
     *
     * @param string $tag
     * @param string $handle
     * @param string $src
     *
     * @return void
     * @since 1.0.0
     */
    public function load_script_as_module($tag, $handle, $src) {
        if ('optimator-dashboard' === $handle) {
            $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
            return $tag;
        }
        return $tag;
    }
}
