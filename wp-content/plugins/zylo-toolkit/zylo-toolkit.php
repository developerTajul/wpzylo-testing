<?php
/*
Plugin Name: Zylo Toolkit
Plugin URI: https://themeforest.net/user/softcrafty
Description: Required plugin for Zylo Theme - Adds custom post types, widgets, and metaboxes
Version: 1.0.0
Author: SoftCrafty
Author URI: https://themeforest.net/user/softcrafty
Text Domain: zylo-toolkit
Domain Path: /languages
Tested up to: 6.4
Requires PHP: 7.4
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/


if (!defined('ABSPATH')) exit;

// Constants
define('ZYLO_TOOLKIT_VER', '1.0.1');
define('ZYLO_TOOLKIT_DIR', plugin_dir_path(__FILE__));
define('ZYLO_TOOLKIT_URL', plugin_dir_url(__FILE__));
define('ZYLO_TOOLKIT_METABOX_ACTIVED', in_array('cmb2/init.php', apply_filters('active_plugins', get_option('active_plugins'))));

// Load translation
add_action('plugins_loaded', function() {
    load_plugin_textdomain('zylo-toolkit', false, dirname(plugin_basename(__FILE__)) . '/languages');
});

final class Zylo_Toolkit {

    private static $instance;

    public static function instance() {
        if (!isset(self::$instance) && !(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct() {
        add_action('init', array($this, 'includes'), 5);
        add_action('widgets_init', array($this, 'register_widgets'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_filter('template_include', array($this, '_service_template_include'));
        add_filter('excerpt_length', array($this, 'custom_post_excerpt'));
        add_filter('excerpt_more', array($this, 'custom_new_excerpt_more'));
        add_action('after_setup_theme', array($this, 'add_image_sizes'));
        add_action('admin_notices', array($this, 'cmb2_notice'));
    }

    public function includes() {
        require_once ZYLO_TOOLKIT_DIR . 'inc/zylo-member-post.php';
        require_once ZYLO_TOOLKIT_DIR . 'inc/zylo-service-post.php';
        require_once ZYLO_TOOLKIT_DIR . 'inc/zylo-portfolios.php';
        
        if (ZYLO_TOOLKIT_METABOX_ACTIVED) {
            require_once ZYLO_TOOLKIT_DIR . 'inc/zylo-meta-boxes.php';
        }
        
        require_once ZYLO_TOOLKIT_DIR . 'inc/zylo-option-framework.php';
    }

    public function register_widgets() {
        $widgets = array(
            'zylo-about-widget.php' => 'Zylo_About_Info_Widget',
            'zylo-company-contact-info-widget.php' => 'zylo_Company_Contact_Info_Widget',
            'zylo-adddress-info-widget.php' => 'zylo_Address_Info_Widget',
            'zylo-company-adddress-top-widget.php' => 'zylo_company_Address_top_Widget',
            'zylo-latest-posts-sidebar.php' => 'Latest_posts_sidebar_Widget',
            'zylo-latest-posts-footer.php' => 'Latest_Posts_Footer_Widget',
            'zylo-subscriber-widget.php' => 'Augmit_Subscriber_Widget',
            'zylo-social-profiles-widget.php' => 'Social_Profiles_Widget',
            'zylo-service-cats-widget.php' => 'Latest_Service_Categories_List_Widget',
            'zylo-downloads-widget.php' => 'zylo_Downloads_Widget',
        );

        foreach ($widgets as $file => $class) {
            $widget_file = ZYLO_TOOLKIT_DIR . 'widgets/' . $file;
            if (file_exists($widget_file)) {
                require_once $widget_file;
                if (class_exists($class)) {
                    register_widget($class);
                }
            }
        }
    }

    public function enqueue_scripts() {
        wp_enqueue_style('zylo-toolkit-styles', ZYLO_TOOLKIT_URL . 'assets/css/style.css', array(), ZYLO_TOOLKIT_VER);
    }

    public function add_image_sizes() {
        add_image_size('zylo_widget_thumbnail', 75, 85, true);
        add_image_size('zylo_service_thumb', 520, 305, true);
        add_image_size('zylo_portfolio_thumb', 520, 305, true);
        add_image_size('zylo_member_thumb', 370, 450, true);
    }

    public function _service_template_include($template) {
        if (is_singular('zylo-service')) {
            return $this->_get_service_template('single-zylo-service.php');
        }
        return $template;
    }

    public function _get_service_template($template) {
        if ($theme_file = locate_template(array($template))) {
            $file = $theme_file;
        } else {
            $file = ZYLO_TOOLKIT_DIR . 'template/' . $template;
        }
        return apply_filters(__FUNCTION__, $file, $template);
    }

    public function custom_post_excerpt($length) {
        global $post;
        if ($post && $post->post_type === 'zylo-service') {
            return 15;
        }
        return $length;
    }

    public function custom_new_excerpt_more($more) {
        global $post;
        if ($post && $post->post_type === 'zylo-service') {
            return '';
        }
        return $more;
    }
    
    public function cmb2_notice() {
        if (!ZYLO_TOOLKIT_METABOX_ACTIVED) {
            ?>
            <div class="notice notice-warning is-dismissible">
                <p><strong><?php esc_html_e('Zylo Toolkit:', 'zylo-toolkit'); ?></strong> <?php esc_html_e('CMB2 plugin is required for metaboxes. Please install and activate it.', 'zylo-toolkit'); ?></p>
            </div>
            <?php
        }
    }
}

// Initialize
add_action('plugins_loaded', function() {
    Zylo_Toolkit::instance();
});
