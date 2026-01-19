<?php
/**
 * zylo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package zylo
 */

/**
 * Theme setup function
 */
if (!function_exists('zylo_setup')) :
    function zylo_setup() {
        // Make theme available for translation
        load_theme_textdomain('zylo', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head
        add_theme_support('automatic-feed-links');

        // Let WordPress manage the document title
        add_theme_support('title-tag');

        // Enable support for Post Thumbnails
        add_theme_support('post-thumbnails');

        // Register navigation menus
        register_nav_menus(array(
            'main-menu' => esc_html__('Main Menu', 'zylo'),
            'footer-menu' => esc_html__('Footer Menu', 'zylo'),
            'copyright-menu' => esc_html__('Copyright Menu', 'zylo'),
        ));

        // Switch default core markup to output valid HTML5
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up custom background
        add_theme_support('custom-background', apply_filters('zylo_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets
        add_theme_support('customize-selective-refresh-widgets');

        // Enable custom header
        add_theme_support('custom-header');

        // Add support for custom logo
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));

        // Enable support for Post Formats
        add_theme_support('post-formats', array(
            'image',
            'audio',
            'video',
            'gallery',
            'quote',
        ));

        // Add support for Block Styles
        add_theme_support('wp-block-styles');

        // Add support for full and wide align images
        add_theme_support('align-wide');

        // Add support for editor styles
        add_theme_support('editor-styles');

        // Add support for responsive embedded content
        add_theme_support('responsive-embeds');

        // Explicitly add oEmbed support
        add_theme_support('oembed');

        // Editor style CSS
        add_editor_style('css/theme-editor-style.css');

    }
endif;
add_action('after_setup_theme', 'zylo_setup');

/**
 * Set the content width
 */
function zylo_content_width() {
    $GLOBALS['content_width'] = apply_filters('zylo_content_width', 640);
}
add_action('after_setup_theme', 'zylo_content_width', 0);

/**
 * Define constants
 */
define('ZYLO_THEME_DIR', get_template_directory());
define('ZYLO_THEME_URI', get_template_directory_uri());
define('ZYLO_THEME_CSS_DIR', ZYLO_THEME_URI . '/css/');
define('ZYLO_THEME_JS_DIR', ZYLO_THEME_URI . '/js/');
define('ZYLO_THEME_INC', ZYLO_THEME_DIR . '/inc/');

/**
 * Include required files
 */
require_once ZYLO_THEME_INC . 'zylo_navwalker.php';
require_once ZYLO_THEME_INC . 'custom-header.php';
require_once ZYLO_THEME_INC . 'template-functions.php';
require_once ZYLO_THEME_INC . 'template-helper.php';
require_once ZYLO_THEME_INC . 'class-tgm-plugin-activation.php';
require_once ZYLO_THEME_INC . 'zylo_add_plugin.php';
if (defined('JETPACK__VERSION')) {
    require ZYLO_THEME_INC . 'jetpack.php';
}

/**
 * Register widgets
 */
if (!function_exists('zylo_widgets_init')) :
    function zylo_widgets_init() {
        // Right Sidebar
        register_sidebar(array(
            'name' => esc_html__('Right Sidebar', 'zylo'),
            'id' => 'right-sidebar',
            'description' => esc_html__('Add widgets here.', 'zylo'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="widget-title-box"><h4 class="wp-block-heading">',
            'after_title' => '</h4></div>',
        ));

        // Footer Top Widget
        register_sidebar(array(
            'name' => esc_html__('Footer Top Widget', 'zylo'),
            'id' => 'footer-top-widget',
            'description' => esc_html__('Footer Top Widget by zylo', 'zylo'),
            'before_widget' => '<div id="%1$s" class="footer-top-wrapper %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="title-wrapper"><h2 class="title">',
            'after_title' => '</h2></div>',
        ));

        // Footer Widget Style 1
        register_sidebar(array(
            'name' => esc_html__('Footer Widget Style 1 : First Widget', 'zylo'),
            'id' => 'fws-1-er-1st-widget',
            'description' => esc_html__('1st Widget of Footer Widget Style 1', 'zylo'),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="title title-space">',
            'after_title' => '</h3>',
        ));

        register_sidebar(array(
            'name' => esc_html__('Footer Widget Style 1 : Second Widget', 'zylo'),
            'id' => 'fws-1-er-2nd-widget',
            'description' => esc_html__('2nd Widget of Footer Widget Style 1', 'zylo'),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="title title-space">',
            'after_title' => '</h3>',
        ));

        register_sidebar(array(
            'name' => esc_html__('Footer Widget Style 1 : Third Widget', 'zylo'),
            'id' => 'fws-1-er-3rd-widget',
            'description' => esc_html__('3rd Widget of Footer Widget Style 1', 'zylo'),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="title title-space">',
            'after_title' => '</h3>',
        ));

        register_sidebar(array(
            'name' => esc_html__('Footer Widget Style 1 : Fourth Widget', 'zylo'),
            'id' => 'fws-1-er-4th-widget',
            'description' => esc_html__('4th Widget of Footer Widget Style 1', 'zylo'),
            'before_widget' => '<div id="%1$s" class="footer-widget mb-30 %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="title title-space">',
            'after_title' => '</h3>',
        ));

        // Service Widgets
        register_sidebar(array(
            'name' => esc_html__('Single Service Page Widgets', 'zylo'),
            'id' => 'zylo-service-widget',
            'description' => esc_html__('Service Single Page Widgets Here', 'zylo'),
            'before_widget' => '<div id="%1$s" class="service-widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="sidebar__title">',
            'after_title' => '</h3>',
        ));

        register_sidebar(array(
            'name' => esc_html__('Single Service Page Call Widgets', 'zylo'),
            'id' => 'zylo-service-widget-2',
            'description' => esc_html__('Service Single Page Widgets Here', 'zylo'),
            'before_widget' => '<div id="%1$s" class="service-widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="sidebar__info-title">',
            'after_title' => '</h4>',
        ));

        // Project Widget
        register_sidebar(array(
            'name' => esc_html__('Single Project Page Widgets', 'zylo'),
            'id' => 'zylo-project-widget',
            'description' => esc_html__('Project Single Page Widgets Here', 'zylo'),
            'before_widget' => '<div id="%1$s" class="service-widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="sidebar__info-title">',
            'after_title' => '</h4>',
        ));

    }
endif;
add_action('widgets_init', 'zylo_widgets_init', 30);

/**
 * Enqueue scripts and styles
 */
if (!function_exists('zylo_scripts')) {
    function zylo_scripts() {
        wp_enqueue_style('zylo-fonts', zylo_fonts_url(), array(), '1.0.0');
        wp_enqueue_style('bootstrap', ZYLO_THEME_CSS_DIR . 'bootstrap.min.css', array(), '5.2.3');
        wp_enqueue_style('fontawesome', ZYLO_THEME_CSS_DIR . 'fontawesome.min.css', array(), '6.4.0');
        wp_enqueue_style('magnific-popup', ZYLO_THEME_CSS_DIR . 'magnific-popup.min.css', array(), '1.0.0');
        wp_enqueue_style('slick', ZYLO_THEME_CSS_DIR . 'slick.min.css', array(), '1.0.0');
        wp_enqueue_style('meanmenu', ZYLO_THEME_CSS_DIR . 'meanmenu.min.css', array(), '2.0');
        wp_enqueue_style('nice-select', ZYLO_THEME_CSS_DIR . 'nice-select.min.css', array());
        wp_enqueue_style('animate', ZYLO_THEME_CSS_DIR . 'animate.min.css', array());
        wp_enqueue_style('swiper-bundle', ZYLO_THEME_CSS_DIR . 'swiper-bundle.min.css', array(), '2.07');
        wp_enqueue_style('odomitter', ZYLO_THEME_CSS_DIR . 'odomitter.css', array(), '1.07');
        wp_enqueue_style('zylo-common', ZYLO_THEME_CSS_DIR . 'common.min.css', array(), time());
        wp_enqueue_style('main', ZYLO_THEME_CSS_DIR . 'main.css', array(), time());
        wp_enqueue_style('zylo-custom', ZYLO_THEME_CSS_DIR . 'custom.css', array(), time());
        wp_enqueue_style('zylo-style', get_stylesheet_uri());

        // Enqueue Scripts
        wp_enqueue_script('bootstrap', ZYLO_THEME_JS_DIR . 'bootstrap.min.js', array('jquery'), '', true);
        wp_enqueue_script('jquery.nice-select', ZYLO_THEME_JS_DIR . 'jquery.nice-select.min.js', array('jquery'), false, true);
        wp_enqueue_script('slick', ZYLO_THEME_JS_DIR . 'slick.min.js', array('jquery', 'imagesloaded'), false, true);
        wp_enqueue_script('jquery.counterup', ZYLO_THEME_JS_DIR . 'jquery.counterup.min.js', array('jquery'), false, true);
        wp_enqueue_script('waypoints', ZYLO_THEME_JS_DIR . 'waypoints.min.js', array('jquery'), false, true);
        wp_enqueue_script('jquery.meanmenu', ZYLO_THEME_JS_DIR . 'jquery.meanmenu.min.js', array('jquery'), false, true);
        wp_enqueue_script('jquery.magnific-popup', ZYLO_THEME_JS_DIR . 'jquery.magnific-popup.min.js', array('jquery'), false, true);
        wp_enqueue_script('inview', ZYLO_THEME_JS_DIR . 'inview.min.js', array('jquery'), false, true);
        wp_enqueue_script('wow', ZYLO_THEME_JS_DIR . 'wow.min.js', array('jquery'), '', true);
        wp_enqueue_script('tilt.jquery', ZYLO_THEME_JS_DIR . 'tilt.jquery.min.js', array('jquery'), '', true);
        wp_enqueue_script('isotope', ZYLO_THEME_JS_DIR . 'isotope.min.js', array('jquery'), '', true);
        wp_enqueue_script('zylo-plugins', ZYLO_THEME_JS_DIR . 'plugins.js', array('jquery'), false, true);
        wp_enqueue_script('odomitter', ZYLO_THEME_JS_DIR . 'odomitter.min.js', array(), false, true);
        wp_enqueue_script('swiper-bundle', ZYLO_THEME_JS_DIR . 'swiper-bundle.min.js', array(), false, true);
        wp_enqueue_script('zylo-main', ZYLO_THEME_JS_DIR . 'custom.js', array('jquery'), time(), true);

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }
}
add_action('wp_enqueue_scripts', 'zylo_scripts', 20);

/**
 * Register Fonts
 */
if (!function_exists('zylo_fonts_url')) {
    function zylo_fonts_url() {
        $font_url = '';
        if ('off' !== _x('on', 'Google font: on or off', 'zylo')) {
            $font_url = add_query_arg('family', urlencode('Cormorant:300,400,500,600,700|Plus Jakarta Sans:300,400,500,600,700|Rajdhani:400,500,600,700|Rubik:400,500,600,700'), "//fonts.googleapis.com/css");
        }
        return $font_url;
    }
}

/**
 * Demo Import Setup
 */
function zylo_import_files() {
    return array(
        array(
            'import_file_name'           => esc_html__('Zylo Demo Data', 'zylo'),
            'categories'                 => array( esc_html__('Main Demo', 'zylo') ),
            'import_file_url'            => 'https://wp.softcrafty.com/demo-data/zylo/zylo-content.xml', 
            'import_widget_file_url'     => 'https://wp.softcrafty.com/demo-data/zylo/zylo-widgets.wie',  
            'import_preview_image_url'   => 'https://wp.softcrafty.com/demo-data/zylo/screenshot.png',
            'import_notice'              => esc_html__('Please wait 2-5 minutes. Do not close the window.', 'zylo'),
            'preview_url'                => 'https://wp.softcrafty.com/wpzoly/',
            'local_import_redux'         => array(
                array(
                    'file_path'   => trailingslashit(get_template_directory()) . 'inc/zylo_customizer_redux_options.json',
                    'option_name' => 'zylo_options',
                ),
            ),
        ),
    );
}
add_filter('ocdi/import_files', 'zylo_import_files');


/**
 * After Demo Import Setup
 */
add_action('ocdi/after_import', function () {

    // Assign menus to their locations.
    $locations = get_theme_mod( 'nav_menu_locations', array() );

    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
    if ( $main_menu && ! is_wp_error( $main_menu ) ) {
        $locations['main-menu'] = $main_menu->term_id;
    }

    $footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
    if ( $footer_menu && ! is_wp_error( $footer_menu ) ) {
        $locations['footer-menu'] = $footer_menu->term_id;
    }

    $copyright_menu = get_term_by( 'name', 'Copyright', 'nav_menu' );
    if ( $copyright_menu && ! is_wp_error( $copyright_menu ) ) {
        $locations['copyright-menu'] = $copyright_menu->term_id;
    }

    set_theme_mod( 'nav_menu_locations', $locations );


    // Assign front page and posts page (blog page).
    $front_page = get_posts( array(
        'post_type'      => 'page',
        'post_status'    => 'publish',
        'title'          => 'Home',
        'posts_per_page' => 1,
        'fields'         => 'ids',
    ) );

    $blog_page = get_posts( array(
        'post_type'      => 'page',
        'post_status'    => 'publish',
        'title'          => 'Blog List',
        'posts_per_page' => 1,
        'fields'         => 'ids',
    ) );

    if ( ! empty( $front_page ) ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page[0] );
    }

    if ( ! empty( $blog_page ) ) {
        update_option( 'page_for_posts', $blog_page[0] );
    }

    // Elementor CPT/Options
    update_option('elementor_cpt_support', array('post','page','e-landing-page','zylo-service','zylo-portfolio','zylo-member'));
    update_option('elementor_disable_color_schemes','yes');
    update_option('elementor_disable_typography_schemes','yes');


    // Posts per page & Permalinks
    update_option('posts_per_page', 4);
    update_option( 'permalink_structure', '/%postname%/' );
    add_action( 'init', function () {
        flush_rewrite_rules();
    });

    // Elementor CSS cache clear
    if (class_exists('\Elementor\Plugin')) {
        \Elementor\Plugin::instance()->files_manager->clear_cache();
    }
});

/**
 * Add pingback URL
 */
function zylo_pingback_header() {
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'zylo_pingback_header');
/**
 * Comment form customization
 */
add_filter('comment_form_default_fields', 'zylo_comment_form_default_fields_func');
function zylo_comment_form_default_fields_func($default) {
    
    // Name and Email fields in a Bootstrap row
    $default['author'] = '<div class="row">
        <div class="col-xl-6">
            <div class="contacts-name">
                <label>' . esc_html__('Your name *', 'zylo') . '</label>
                <input type="text" name="author" required>
            </div>
        </div>';
    
    $default['email'] = '<div class="col-xl-6">
        <div class="contacts-email">
            <label>' . esc_html__('Your email *', 'zylo') . '</label>
            <input type="text" name="email" required>
        </div>
    </div></div>'; // row closed here
    
    // Hide website field
    $default['url'] = '';
    
    // Remove any custom unwanted fields
    unset($default['clients_commnet']);
    
    // Remove the "Save my name, email..." checkbox completely
    $default['cookies'] = '';
    
    return $default;
}

add_filter('comment_form_defaults', 'zylo_comment_form_defaults_func');
function zylo_comment_form_defaults_func($info) {
    
    // Comment textarea - full width, placed BEFORE name/email fields
    $comment_field = '<div class="row">
        <div class="col-xl-12">
            <div class="comments-textarea contacts-message contact-icon">
                <label>' . esc_html__('Comments *', 'zylo') . '</label>
                <textarea id="comment" name="comment" cols="30" rows="10" required></textarea>
            </div>
        </div>
    </div>';
    
    // For both logged-in and non-logged-in users
    $info['comment_field'] = $comment_field;
    
    // Submit button
    $info['submit_button'] = '<button class="x-btn theme-btn" type="submit">' . esc_html__('Post Comment', 'zylo') . '</button>';
    $info['submit_field'] = '<div class="row"><div class="col-xl-12">%1$s %2$s</div></div>';
    
    // Title
    $info['title_reply_before'] = '<div class="post-comments-title"><h2>';
    $info['title_reply_after'] = '</h2></div>';
    
    // Remove all default notes (including cookie consent note that appears even if cookies field is empty)
    $info['comment_notes_before'] = '';
    $info['comment_notes_after']  = '';
    
    return $info;
}

if (!function_exists('zylo_comment')) {
    function zylo_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        extract($args, EXTR_SKIP);
        $args['reply_text'] = '<i class="fas fa-reply-all"></i> Reply';
        $replayClass = 'comment-depth-' . esc_attr($depth);
        ?>
            <li id="comment-<?php comment_ID(); ?>" <?php comment_class($replayClass); ?>>
                <div class="comments-box">
                    <div class="comments-avatar">
                        <?php print get_avatar($comment, 102, null, null, array('class' => array())); ?>
                    </div>
                    <div class="comments-text">
                        <div class="avatar-name">
                            <h5><?php print get_comment_author_link(); ?></h5>
                            <span><?php comment_time(get_option('date_format')); ?></span>
                            <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                        </div>
                        <?php comment_text(); ?>
                    </div>
                </div>
        <?php
    }
}
/**
 * Shortcode cleanup
 */
add_filter('the_content', 'zylo_shortcode_extra_content_remove');
function zylo_shortcode_extra_content_remove($content) {
    $array = array(
        '<p>[' => '[',
        ']</p>' => ']',
        ']<br />' => ']'
    );
    return strtr($content, $array);
}

/**
 * Search form customization
 */
if (!function_exists('zylo_search_filter_form')) {
    function zylo_search_filter_form($form) {
        $form = sprintf(
            '<div class="sidebar-form"><form class="search-form" action="%s" method="get">
                <input type="text" value="%s" required name="s" placeholder="%s">
                <button type="submit"> <i class="fas fa-search"></i> </button>
            </form></div>',
            esc_url(home_url('/')),
            esc_attr(get_search_query()),
            esc_html__('Search', 'zylo')
        );
        return $form;
    }
}
add_filter('get_search_form', 'zylo_search_filter_form');

add_action('pre_get_posts', 'zylo_custom_search_query');
function zylo_custom_search_query($query) {
    if (!is_admin() && $query->is_search() && $query->is_main_query()) {
        $query->set('post_type', array('post', 'page')); // Add 'page' and other custom post types if needed
    }
}
/**
 * HTML markup render
 */
function _html_markup_render($markup) {
    return $markup;
}

/**
 * Admin custom scripts
 */
add_action('admin_enqueue_scripts', 'zylo_admin_custom_scripts');
function zylo_admin_custom_scripts($hook) {
    if ('widgets.php' != $hook) {
        return;
    }
    wp_enqueue_media();
    wp_register_script('zylo-admin-custom', ZYLO_THEME_JS_DIR . 'admin_custom.js', array('jquery'), '', true);
    wp_enqueue_script('zylo-admin-custom');
}


/**
 * Sanitize Audio URL Meta
 */
add_filter('pre_update_option', 'zylo_sanitize_audio_url', 10, 3);
function zylo_sanitize_audio_url($value, $option, $old_value) {
    if ($option === '_audio-url') {
        $value = filter_var($value, FILTER_SANITIZE_URL);
        $value = preg_replace('/\s+/', '', $value); 
        $value = preg_replace('/data-dashlane-frameid=\d+/', '', $value); 
        if (strpos($value, 'w.soundcloud.com/player/') !== false) {
            parse_str(parse_url($value, PHP_URL_QUERY), $params);
            $value = isset($params['url']) ? $params['url'] : $value;
        }
    }
    return $value;
}

// Hook into the One Click Demo Import before content import
add_action('ocdi/before_content_import', 'conditionally_reset_before_demo_import');
function conditionally_reset_before_demo_import() {
    // Call the functions to reset posts, pages, and widgets
    reset_all_posts();
    reset_all_pages();
    reset_all_widgets();
}

function reset_all_posts() {
    // Get all posts
    $all_posts = get_posts(array(
        'numberposts' => -1,
        'post_type' => 'post',
        'post_status' => 'any'
    ));

    // Delete each post
    foreach ($all_posts as $post) {
        wp_delete_post($post->ID, true);
    }
}

function reset_all_pages() {
    // Get all pages
    $all_pages = get_posts(array(
        'numberposts' => -1,
        'post_type' => 'page',
        'post_status' => 'any'
    ));

    // Delete each page
    foreach ($all_pages as $page) {
        wp_delete_post($page->ID, true);
    }
}

function reset_all_widgets() {
    global $wpdb;

    // Delete all widgets
    $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE 'widget_%'");

    // Optionally reset widget sidebars too
    delete_option('sidebars_widgets');

    // Optionally reset customizer settings related to widgets
    delete_option('theme_mods_' . get_option('stylesheet'));

    // Clear the widgets cache
    wp_cache_delete('alloptions', 'options');
}