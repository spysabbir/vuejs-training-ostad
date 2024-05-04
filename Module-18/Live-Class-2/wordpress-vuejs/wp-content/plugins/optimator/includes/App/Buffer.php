<?php

namespace Engramium\Optimator\App;

// If this file is called directly, abort.
defined( 'ABSPATH' ) || exit;

class Buffer {
    use \Engramium\Optimator\Traits\Singleton;

    public function init() {
        add_action('wp', [$this, 'queue']);
    }

    public function queue() {

        add_action('template_redirect', [$this, 'start'], -9999);
    }

    public function start() {
        if (has_filter('optimator_output_buffer_template_redirect')) {

            if (is_embed() || is_feed() || is_preview() || is_customize_preview()) {
                return;
            }

            if (function_exists('is_amp_endpoint') && is_amp_endpoint()) {
                return;
            }

            ob_start(function ($html) {
                if (!$this->is_valid_buffer($html)) {
                    return $html;
                }
                $html = (string) apply_filters('optimator_output_buffer_template_redirect', $html);
                return $html;
            });
        }
    }

    private function is_valid_buffer($html) {

        if (stripos($html, '<html') === false || stripos($html, '</body>') === false || stripos($html, '<xsl:stylesheet') !== false) {
            return false;
        }

        $current_url = home_url($_SERVER['REQUEST_URI']);
        $matches = apply_filters('optimator_buffer_excluded_extensions', array('.xml', '.txt', '.php'));
        foreach ($matches as $match) {
            if (stripos($current_url, $match) !== false) {
                return false;
            }
        }

        return true;
    }
}
