<?php

namespace Engramium\Optimator\Dashboard;

// If this file is called directly, abort.
defined('ABSPATH') || exit;

/**
 * Dashboard base class
 *
 * @author sayedulsayem
 * @since 1.0.0
 */
class Settings {

    use \Engramium\Optimator\Traits\Singleton;

    public $settings_key = "optimator_settings";

    public function get_quick_toggles() {
        $defaults = $this->get_default_quick_toggles();
        $quick_toggles = get_option("{$this->settings_key}__quick_toggles", []);
        return array_replace_recursive($defaults, $quick_toggles);
    }

    public function update_quick_toggles($data) {
        $data = $this->sanitize_inputs($data);
        $quick_toggles = update_option("{$this->settings_key}__quick_toggles", $data, true);
        return $quick_toggles;
    }

    public function sanitize_inputs($inputs) {
        foreach ($inputs as $key => &$value) {
            if (is_array($value) || is_object($value)) {
                $value = $this->sanitize_inputs($value);
            } else {
                if ("disable_rest_api" == $key) {
                    $value = sanitize_text_field($value);
                } else if ("disable_heartbeat" == $key) {
                    $value = sanitize_text_field($value);
                } else if ("heartbeat_frequency" == $key) {
                    $value = sanitize_text_field($value);
                } else if ("limit_post_revisions" == $key) {
                    $value = sanitize_text_field($value);
                } else if ("autosave_interval" == $key) {
                    $value = sanitize_text_field($value);
                } else {
                    $value = filter_var($value, FILTER_VALIDATE_BOOLEAN);
                }
            }
        }
        return $inputs;
    }

    public function get_default_quick_toggles() {
        return [
            'generals' => [
                'disable_emojis' => false,
                'disable_embeds' => false,
                'disable_dashicons' => false,
                'disable_xml_rpc' => false,
                'remove_jquery_migrate' => false,
                'hide_wp_version' => false,
                'remove_wlwmanifest_link' => false,
                'remove_rsd_link' => false,
                'remove_shortlink' => false,
                'disable_rss_feeds' => false,
                'remove_rss_feed_links' => false,
                'disable_self_pingbacks' => false,
                'disable_rest_api' => 'default',
                'remove_rest_api_links' => false,
                'disable_google_maps' => false,
                'disable_password_strength_meter' => false,
                'disable_comments' => false,
                'disable_comments_url' => false,
                'add_blank_favicon' => false,
                // 'disable_google_fonts' => false,
                'disable_global_styles' => false,
                'disable_heartbeat' => 'default',
                'heartbeat_frequency' => 'seconds_60',
                'limit_post_revisions' => 'default',
                'autosave_interval' => 'minutes_1',
            ],
            'medias' => [
                'disable_thumbnail' => false,
                'disable_medium' => false,
                'disable_medium_large' => false,
                'disable_large' => false,
                'disable_1536' => false,
                'disable_2048' => false,
            ],
        ];
    }
}
