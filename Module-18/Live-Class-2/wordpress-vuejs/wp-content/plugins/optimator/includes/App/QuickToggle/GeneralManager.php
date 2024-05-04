<?php

namespace Engramium\Optimator\App\QuickToggle;

use Engramium\Optimator\Dashboard\Settings;

// If this file is called directly, abort.
defined('ABSPATH') || exit;

/**
 * Application base class
 *
 * @author sayedulsayem
 * @since 1.0.0
 */
class GeneralManager {

    use \Engramium\Optimator\Traits\Singleton;

    public $generals;

    public function init() {
        $settings = Settings::instance()->get_quick_toggles();
        $this->generals = isset($settings['generals']) ? $settings['generals'] : [];
        add_action('init', [$this, 'disable_emojis']);
        add_action('init', [$this, 'disable_embeds'], PHP_INT_MAX);
        // add_action('wp_enqueue_scripts', [$this, 'disable_dashicons']);
        add_action('wp_enqueue_scripts', [$this, 'modify_scripts_registration'], PHP_INT_MAX);
        $this->disable_xml_rpc();
        add_filter('wp_default_scripts', [$this, 'remove_jquery_migrate']);
        $this->hide_wp_version();
        $this->remove_wlwmanifest_link();
        $this->remove_rsd_link();
        $this->remove_shortlink();
        add_action('template_redirect', [$this, 'disable_rss_feeds'], 1);
        $this->remove_rss_feed_links();
        add_action('pre_ping', [$this, 'disable_self_pingbacks']);
        add_filter('rest_authentication_errors', [$this, 'disable_rest_api'], 20);
        $this->remove_rest_api_links();
        add_action('wp_print_scripts', [$this, 'disable_password_strength_meter'], 100);
        $this->disable_comments();
        $this->disable_comments_url();
        add_action('wp_head', [$this, 'add_blank_favicon']);
        $this->disable_global_styles();
        add_action('init', [$this, 'disable_heartbeat'], 1);
        add_filter('heartbeat_settings', [$this, 'heartbeat_frequency']);
        $this->limit_post_revisions();
        $this->autosave_interval();
    }

    public function disable_emojis() {
        if ((!empty($this->generals['disable_emojis'])) && (true === $this->generals['disable_emojis'])) {
            remove_action('wp_head', 'print_emoji_detection_script', 7);
            remove_action('admin_print_scripts', 'print_emoji_detection_script');
            remove_action('wp_print_styles', 'print_emoji_styles');
            remove_action('admin_print_styles', 'print_emoji_styles');
            remove_filter('the_content_feed', 'wp_staticize_emoji');
            remove_filter('comment_text_rss', 'wp_staticize_emoji');
            remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
            add_filter('tiny_mce_plugins', [$this, 'disable_emojis_tinymce']);
            add_filter('emoji_svg_url', '__return_false');
        }
    }

    public function disable_emojis_tinymce($plugins) {
        if (is_array($plugins)) {
            return array_diff($plugins, array('wpemoji'));
        } else {
            return array();
        }
    }

    public function disable_embeds() {
        if ((!empty($this->generals['disable_emojis'])) && (true === $this->generals['disable_emojis'])) {
            global $wp;
            $wp->public_query_vars = array_diff($wp->public_query_vars, array('embed'));
            add_filter('embed_oembed_discover', '__return_false');
            remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
            remove_action('wp_head', 'wp_oembed_add_discovery_links');
            remove_action('wp_head', 'wp_oembed_add_host_js');
            add_filter('tiny_mce_plugins', [$this, 'disable_embeds_tiny_mce_plugin']);
            add_filter('rewrite_rules_array', [$this, 'disable_embeds_rewrites']);
            remove_filter('pre_oembed_result', 'wp_filter_pre_oembed_result', 10);
        }
    }

    function disable_embeds_tiny_mce_plugin($plugins) {
        return array_diff($plugins, array('wpembed'));
    }

    function disable_embeds_rewrites($rules) {
        foreach ($rules as $rule => $rewrite) {
            if (is_string($rewrite) && false !== strpos($rewrite, 'embed=true')) {
                unset($rules[$rule]);
            }
        }
        return $rules;
    }

    public function modify_scripts_registration() {
        if ((!empty($this->generals['disable_dashicons'])) && (true === $this->generals['disable_dashicons'])) {
            $this->disable_dashicons();
        }
        if ((!empty($this->generals['disable_google_maps'])) && (true === $this->generals['disable_google_maps'])) {
            $this->disable_google_maps();
        }
    }

    public function disable_dashicons() {
        if (!is_user_logged_in()) {
            wp_dequeue_style('dashicons');
            wp_deregister_style('dashicons');
        }
    }

    public function disable_xml_rpc() {
        if ((!empty($this->generals['disable_xml_rpc'])) && (true === $this->generals['disable_xml_rpc'])) {
            add_filter('xmlrpc_enabled', '__return_false');
            add_filter('wp_headers', [$this, 'remove_x_pingback']);
            add_filter('pings_open', '__return_false', 9999);
            add_filter('pre_update_option_enable_xmlrpc', '__return_false');
            add_filter('pre_option_enable_xmlrpc', '__return_zero');
            add_filter('optimator_output_buffer_template_redirect', [$this, 'remove_pingback_links'], 2);
            add_action('init', [$this, 'intercept_xmlrpc_header']);
        }
    }

    public function remove_x_pingback($headers) {
        unset($headers['X-Pingback'], $headers['x-pingback']);
        return $headers;
    }

    public function remove_pingback_links($html) {
        preg_match_all('#<link[^>]+rel=["\']pingback["\'][^>]+?\/?>#is', $html, $links, PREG_SET_ORDER);
        if (!empty($links)) {
            foreach ($links as $link) {
                $html = str_replace($link[0], "", $html);
            }
        }
        return $html;
    }

    public function intercept_xmlrpc_header() {
        if (!isset($_SERVER['SCRIPT_FILENAME'])) {
            return;
        }

        //direct requests only
        if ('xmlrpc.php' !== basename($_SERVER['SCRIPT_FILENAME'])) {
            return;
        }

        $header = 'HTTP/1.1 403 Forbidden';
        header($header);
        echo $header;
        die();
    }

    public function remove_jquery_migrate(&$scripts) {
        if (!is_admin()) {
            $scripts->remove('jquery');
            $scripts->add('jquery', false, array('jquery-core'), '1.12.4');
        }
    }

    public function hide_wp_version() {
        if ((!empty($this->generals['hide_wp_version'])) && (true === $this->generals['hide_wp_version'])) {
            remove_action('wp_head', 'wp_generator');
            add_filter('the_generator', [$this, 'optimator_hide_wp_version']);
        }
    }

    public function optimator_hide_wp_version() {
        return '';
    }

    public function remove_wlwmanifest_link() {
        if ((!empty($this->generals['remove_wlwmanifest_link'])) && (true === $this->generals['remove_wlwmanifest_link'])) {
            remove_action('wp_head', 'wlwmanifest_link');
        }
    }

    public function remove_rsd_link() {
        if ((!empty($this->generals['remove_rsd_link'])) && (true === $this->generals['remove_rsd_link'])) {
            remove_action('wp_head', 'rsd_link');
        }
    }

    public function remove_shortlink() {
        if ((!empty($this->generals['remove_shortlink'])) && (true === $this->generals['remove_shortlink'])) {
            remove_action('wp_head', 'wp_shortlink_wp_head');
            remove_action('template_redirect', 'wp_shortlink_header', 11, 0);
        }
    }

    public function disable_rss_feeds() {
        if ((!empty($this->generals['disable_rss_feeds'])) && (true === $this->generals['disable_rss_feeds'])) {
            if (!is_feed() || is_404()) {
                return;
            }

            global $wp_rewrite;
            global $wp_query;

            if (isset($_GET['feed'])) {
                wp_redirect(esc_url_raw(remove_query_arg('feed')), 301);
                exit;
            }

            if (get_query_var('feed') !== 'old') {
                set_query_var('feed', '');
            }

            redirect_canonical();

            wp_die(sprintf(__("No feed available, please visit the <a href='%s'>homepage</a>!"), esc_url(home_url('/'))));
        }
    }

    public function remove_rss_feed_links() {
        if ((!empty($this->generals['remove_rss_feed_links'])) && (true === $this->generals['remove_rss_feed_links'])) {
            remove_action('wp_head', 'feed_links', 2);
            remove_action('wp_head', 'feed_links_extra', 3);
        }
    }

    public function disable_self_pingbacks(&$links) {
        if ((!empty($this->generals['disable_self_pingbacks'])) && (true === $this->generals['disable_self_pingbacks'])) {
            $home = get_option('home');
            foreach ($links as $l => $link) {
                if (strpos($link, $home) === 0) {
                    unset($links[$l]);
                }
            }
        }
    }

    public function disable_rest_api($result) {
        if (!empty($result)) {
            return $result;
        } else {
            $disabled = false;
            $rest_route = $GLOBALS['wp']->query_vars['rest_route'];

            $exceptions = apply_filters('optimator_rest_api_exceptions', [
                'optimator',
                'contact-form-7',
                'wordfence',
                'elementor'
            ]);

            foreach ($exceptions as $exception) {
                if (strpos($rest_route, $exception) !== false) {
                    return;
                }
            }

            if ((!empty($this->generals['disable_rest_api'])) && ('disable_for_non_admins' === $this->generals['disable_rest_api']) && (!current_user_can('manage_options'))) {
                $disabled = true;
            } else if ((!empty($this->generals['disable_rest_api'])) && ('disable_when_logged_out' === $this->generals['disable_rest_api']) && (!is_user_logged_in())) {
                $disabled = true;
            }
        }
        if ($disabled) {
            return new \WP_Error('rest_authentication_error', __('Sorry, you do not have permission to make REST API requests.', 'optimator'), array('status' => 401));
        }
        return $result;
    }

    public function remove_rest_api_links() {
        if ((!empty($this->generals['remove_rest_api_links'])) && (true === $this->generals['remove_rest_api_links'])) {
            remove_action('xmlrpc_rsd_apis', 'rest_output_rsd');
            remove_action('wp_head', 'rest_output_link_wp_head');
            remove_action('template_redirect', 'rest_output_link_header', 11, 0);
        }
    }

    public function disable_google_maps() {
        $wp_scripts = wp_scripts();
        $wp_styles  = wp_styles();
        foreach ($wp_scripts->queue as $handle) {
            $src = $wp_scripts->registered[$handle]->src;

            if (($src && (strpos($src, 'maps.google.com') !== false || strpos($src, 'maps.googleapis.com') !== false || strpos($src, 'maps.gstatic.com') !== false))) {
                wp_dequeue_script($handle);
            }
            if (($handle && (strpos($handle, 'maps.google.com') !== false || strpos($handle, 'maps.googleapis.com') !== false || strpos($handle, 'maps.gstatic.com') !== false))) {
                wp_dequeue_script($handle);
            }
        }
        foreach ($wp_styles->queue as $handle) {
            $src = $wp_styles->registered[$handle]->src;
            if (($src && (strpos($src, 'maps.google.com') !== false || strpos($src, 'maps.googleapis.com') !== false || strpos($src, 'maps.gstatic.com') !== false))) {
                wp_dequeue_script($handle);
            }
            if (($handle && (strpos($handle, 'maps.google.com') !== false || strpos($handle, 'maps.googleapis.com') !== false || strpos($handle, 'maps.gstatic.com') !== false))) {
                wp_dequeue_script($handle);
            }
        }
    }

    public function disable_password_strength_meter() {
        if ((!empty($this->generals['disable_password_strength_meter'])) && (true === $this->generals['disable_password_strength_meter'])) {
            if (is_admin()) {
                return;
            }

            if ((isset($GLOBALS['pagenow']) && $GLOBALS['pagenow'] === 'wp-login.php') || (isset($_GET['action']) && in_array($_GET['action'], ['rp', 'lostpassword', 'register']))) {
                return;
            }

            if (class_exists('WooCommerce') && (is_cart() || is_checkout() || is_account_page())) {
                return;
            }

            wp_dequeue_script('zxcvbn-async');
            wp_deregister_script('zxcvbn-async');

            wp_dequeue_script('password-strength-meter');
            wp_deregister_script('password-strength-meter');

            wp_dequeue_script('wc-password-strength-meter');
            wp_deregister_script('wc-password-strength-meter');
        }
    }

    public function disable_comments() {
        if ((!empty($this->generals['disable_comments'])) && (true === $this->generals['disable_comments'])) {
            //Disable Built-in Recent Comments Widget
            add_action('widgets_init', [$this, 'disable_recent_comments_widget']);

            //Check for XML-RPC
            if (empty($this->generals['disable_xml_rpc'])) {
                add_filter('wp_headers', [$this, 'remove_x_pingback']);
            }

            //Check for Feed Links
            if (empty($this->generals['remove_rss_feed_links'])) {
                remove_action('wp_head', 'feed_links_extra', 3);
            }

            //Disable Comment Feed Requests
            add_action('template_redirect', [$this, 'disable_recent_comments_widget'], 9);

            //Remove Comment Links from the Admin Bar
            add_action('template_redirect', [$this, 'disable_recent_comments_widget']);
            add_action('admin_init', [$this, 'remove_admin_bar_comment_links']);

            //Finish Disabling Comments
            add_action('wp_loaded', [$this, 'wp_loaded_disable_comments']);
        }
    }

    public function disable_recent_comments_widget() {
        unregister_widget('WP_Widget_Recent_Comments');
        add_filter('show_recent_comments_widget_style', '__return_false');
    }

    public function disable_comment_feed_requests() {
        if (is_comment_feed()) {
            wp_die(__('Comments are disabled.', 'optimator'), '', array('response' => 403));
        }
    }

    public function remove_admin_bar_comment_links() {
        if (is_admin_bar_showing()) {
            remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
            if (is_multisite()) {
                add_action('admin_bar_menu', 'admin_menu_remove_comments', 500);
            }
        }
    }

    public function admin_menu_remove_comments() {

        global $pagenow;

        remove_menu_page('edit-comments.php');
        remove_submenu_page('options-general.php', 'options-discussion.php');

        if ($pagenow == 'comment.php' || $pagenow == 'edit-comments.php') {
            wp_die(__('Comments are disabled.', 'optimator'), '', array('response' => 403));
        }

        if ($pagenow == 'options-discussion.php') {
            wp_die(__('Comments are disabled.', 'optimator'), '', array('response' => 403));
        }
    }

    public function wp_loaded_disable_comments() {

        $post_types = get_post_types(array('public' => true), 'names');
        if (!empty($post_types)) {
            foreach ($post_types as $post_type) {
                if (post_type_supports($post_type, 'comments')) {
                    remove_post_type_support($post_type, 'comments');
                    remove_post_type_support($post_type, 'trackbacks');
                }
            }
        }

        add_filter('comments_array', function () {
            return array();
        }, 20, 2);
        add_filter('comments_open', function () {
            return false;
        }, 20, 2);
        add_filter('pings_open', function () {
            return false;
        }, 20, 2);

        if (is_admin()) {

            add_action('admin_menu', [$this, 'admin_menu_remove_comments'], PHP_INT_MAX);

            add_action('admin_print_styles-index.php', function () {
                echo "<style>
                    #dashboard_right_now .comment-count, #dashboard_right_now .comment-mod-count, #latest-comments, #welcome-panel .welcome-comments {
                        display: none !important;
                    }
                </style>";
            });

            add_action('admin_print_styles-profile.php', function () {
                echo "<style>
                    .user-comment-shortcuts-wrap {
                        display: none !important;
                    }
                </style>";
            });

            add_action('wp_dashboard_setup', function () {
                remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
            });

            add_filter('pre_option_default_pingback_flag', '__return_zero');
        } else {
            add_filter('comments_template', function () {
                return dirname(__FILE__) . '/blank-template.php';
            }, 20);

            wp_deregister_script('comment-reply');

            add_filter('feed_links_show_comments_feed', '__return_false');
        }
    }

    public function disable_comments_url() {
        if ((!empty($this->generals['disable_comments_url'])) && (true === $this->generals['disable_comments_url'])) {
            add_filter('get_comment_author_link', function ($return, $author, $comment_ID) {
                return $author;
            }, 10, 3);
            add_filter('get_comment_author_url', function () {
                return false;
            });
            add_filter('comment_form_default_fields', function ($fields) {
                unset($fields['url']);
                return $fields;
            }, PHP_INT_MAX);
        }
    }

    public function add_blank_favicon() {
        if ((!empty($this->generals['add_blank_favicon'])) && (true === $this->generals['add_blank_favicon'])) {
            echo '<link href="data:image/x-icon;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQEAYAAABPYyMiAAAABmJLR0T///////8JWPfcAAAACXBIWXMAAABIAAAASABGyWs+AAAAF0lEQVRIx2NgGAWjYBSMglEwCkbBSAcACBAAAeaR9cIAAAAASUVORK5CYII=" rel="icon" type="image/x-icon" />';
        }
    }

    public function disable_global_styles() {
        if ((!empty($this->generals['disable_global_styles'])) && (true === $this->generals['disable_global_styles'])) {
            add_action('after_setup_theme', function () {
                remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
                remove_action('wp_footer', 'wp_enqueue_global_styles', 1);
                remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');
                remove_action('in_admin_header', 'wp_global_styles_render_svg_filters');
            });
        }
    }

    public function disable_heartbeat() {
        if ((!empty($this->generals['disable_heartbeat'])) && ('default' !== $this->generals['disable_heartbeat'])) {
            if (is_admin()) {
                global $pagenow;
                if (!empty($pagenow)) {
                    if ($pagenow == 'admin.php') {
                        if (!empty($_GET['page'])) {
                            $exceptions = array(
                                'gf_edit_forms',
                                'gf_entries',
                                'gf_settings'
                            );
                            if (in_array($_GET['page'], $exceptions)) {
                                return;
                            }
                        }
                    }
                    if ($pagenow == 'site-health.php') {
                        return;
                    }
                }
            }

            $disable = false;

            if ($this->generals['disable_heartbeat'] == 'disable_everywhere') {
                $disable = true;
            } elseif ($this->generals['disable_heartbeat'] == 'only_allow_when_editing') {
                global $pagenow;
                if ($pagenow != 'post.php' && $pagenow != 'post-new.php') {
                    $disable = true;
                }
            }

            if ($disable) {
                wp_deregister_script('heartbeat');
            }
        }
    }

    public function heartbeat_frequency($settings) {
        if ((!empty($this->generals['heartbeat_frequency'])) && ('default' !== $this->generals['heartbeat_frequency'])) {
            $frequency = $this->generals['heartbeat_frequency'];
            $split_arr = explode('_', $frequency);
            $settings['interval'] = isset($split_arr[1]) ? $split_arr[1] : 60;
            $settings['minimalInterval'] = isset($split_arr[1]) ? $split_arr[1] : 60;
        }
        return $settings;
    }

    public function limit_post_revisions() {
        if ((!empty($this->generals['limit_post_revisions'])) && ('default' !== $this->generals['limit_post_revisions'])) {
            $revision = $this->generals['limit_post_revisions'];
            if ($revision == 'disable') {
                $split_arr = ['', false];
            } else {
                $split_arr = explode('_', $revision);
            }
            if (defined('WP_POST_REVISIONS')) {
                add_action('admin_notices', function () {
                    echo "<div class='notice notice-error'>";
                    echo "<p>";
                    echo "<strong>" . __('Optimator Warning', 'optimator') . ":</strong> ";
                    echo __('WP_POST_REVISIONS is already enabled somewhere else on your site. We suggest only enabling this feature in one place.', 'optimator');
                    echo "</p>";
                    echo "</div>";
                });
            } else {
                define('WP_POST_REVISIONS', isset($split_arr[1]) ? $split_arr[1] : true);
            }
        }
    }

    public function autosave_interval() {
        if (!empty($this->generals['autosave_interval']) && is_string($this->generals['autosave_interval'])) {
            $revision = $this->generals['autosave_interval'];
            $split_arr = explode('_', $revision);
            if (defined('AUTOSAVE_INTERVAL')) {
                add_action('admin_notices', function () {
                    echo "<div class='notice notice-error'>";
                    echo "<p>";
                    echo "<strong>" . __('Optimator Warning', 'optimator') . ":</strong> ";
                    echo __('AUTOSAVE_INTERVAL is already enabled somewhere else on your site. We suggest only enabling this feature in one place.', 'optimator');
                    echo "</p>";
                    echo "</div>";
                });
            } else {
                define('AUTOSAVE_INTERVAL', isset($split_arr[1]) ? $split_arr[1] : 1);
            }
        }
    }
}
