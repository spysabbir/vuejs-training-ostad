<?php

namespace Engramium\Optimator\App;

// If this file is called directly, abort.
defined('ABSPATH') || exit;

/**
 * All assets register class
 *
 * @author sayedulsayem
 * @since 1.0.0
 */
class RegisterAssets {
    use \Engramium\Optimator\Traits\Singleton;

    public function init() {
        if (is_admin()) {
            add_action('admin_enqueue_scripts', [$this, 'register'], 5);
        } else {
            add_action('wp_enqueue_scripts', [$this, 'register'], 5);
        }
    }

    /**
     * Register our app scripts and styles
     *
     * @return void
     * @since 1.0.0
     */
    public function register() {
        $this->register_scripts($this->get_scripts());
        $this->register_styles($this->get_styles());
    }

    /**
     * Register scripts
     *
     * @param  array $scripts
     *
     * @return void
     * @since 1.0.0
     */
    private function register_scripts($scripts) {
        foreach ($scripts as $handle => $script) {
            $deps      = isset($script['deps']) ? $script['deps'] : false;
            $in_footer = isset($script['in_footer']) ? $script['in_footer'] : false;
            $version   = isset($script['version']) ? $script['version'] : OPTIMATOR_VERSION;

            wp_register_script($handle, $script['src'], $deps, $version, $in_footer);
        }
    }

    /**
     * Register styles
     *
     * @param  array $styles
     *
     * @return void
     * @since 1.0.0
     */
    public function register_styles($styles) {
        foreach ($styles as $handle => $style) {
            $deps = isset($style['deps']) ? $style['deps'] : false;

            wp_register_style($handle, $style['src'], $deps, OPTIMATOR_VERSION);
        }
    }

    /**
     * Get all registered scripts
     *
     * @return array
     * @since 1.0.0
     */
    public function get_scripts() {
        $env = Helper::instance()->read_env_file();

        if (!empty($env)) {
            // $this->add_script_to_auto_reload($env);
            $port = intval(isset($env['VITE_PORT']) ? $env['VITE_PORT'] : 4000);
            $main_src = "//localhost:{$port}/src/main.js";
            $version = time();
        } else {
            $main_src = OPTIMATOR_URL . 'dist/assets/index.js';
            $version = OPTIMATOR_VERSION;
        }

        $scripts = [
            'optimator-dashboard' => [
                'src'       => $main_src,
                'deps'      => ['jquery', 'wp-i18n'],
                'version'   => $version,
                'in_footer' => true
            ]
        ];

        return $scripts;
    }

    /**
     * Get registered styles
     *
     * @return array
     * @since 1.0.0
     */
    public function get_styles() {
        $env = Helper::instance()->read_env_file();
        if (!empty($env)) return [];

        $styles = [
            'optimator-dashboard' => [
                'src' =>  OPTIMATOR_URL . 'dist/assets/index.css'
            ],
        ];

        return $styles;
    }

    /**
     * Vite hmr enable function, it won't run or inject in production
     *
     * @return void
     * @since 1.0.0
     */
    public function add_script_to_auto_reload() {
        $port = intval(isset($env['VITE_PORT']) ? $env['VITE_PORT'] : 4000);
        $dev_src = "//localhost:{$port}";
        $script = "import RefreshRuntime from '{$dev_src}/@react-refresh';";
        $script .= ' RefreshRuntime.injectIntoGlobalHook(window);';
        $script .= ' window.$RefreshReg$ = () => {};';
        $script .= ' window.$RefreshSig$ = () => (type) => type;';
        $script .= ' window.__vite_plugin_react_preamble_installed__ = true';

        echo "<script type='module'>{$script}</script>";
    }
}
