<?php
/**
 * Plugin Name: Zylo Elementor
 * Description: Create unlimited widgets with Elementor Page Builder.
 * Plugin URI:  http://softcrafty/plugins/softcrafty/
 * Version:     1.0.0
 * Author:      SoftCrafty
 * Author URI:  https://facebook.com/softcrafty
 * Text Domain: zylo-elementor
 * Domain Path: /languages/
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Zylo Elementor Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class ZyloElementor {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.2';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var ZyloElementor The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return ZyloElementor An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {

		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function i18n() {

		load_plugin_textdomain( 'zylo-elementor' );

	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		add_action( 'elementor/init', [ $this, 'add_elementor_category' ], 1 );

		// Add Plugin actions
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'register_frontend_scripts' ], 10 );

		// Register Widget Styles
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'register_frontend_styles' ] );

		add_action( 'elementor/widgets/register', [ $this, 'init_widgets' ] );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'zylo-elementor' ),
			'<strong>' . esc_html__( 'Zylo Elementor', 'zylo-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'zylo-elementor' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'zylo-elementor' ),
			'<strong>' . esc_html__( 'Zylo Elementor', 'zylo-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'zylo-elementor' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'zylo-elementor' ),
			'<strong>' . esc_html__( 'Zylo Elementor', 'zylo-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'zylo-elementor' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Add Elementor category.
	 */
	public function add_elementor_category() {
    	\Elementor\Plugin::instance()->elements_manager->add_category('zylo-elementor',
	      	array(
					'title' => __( 'Zylo Elementor', 'zylo-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	}

	/**
	* Register Frontend Scripts
	*
	*/
	public function register_frontend_scripts() {
		wp_register_script( 'zylo-elementor', plugin_dir_url( __FILE__ ) . 'assets/js/zylo-elementor.js', array( 'jquery' ), self::VERSION );
	}

	/**
	* Register Frontend styles
	*
	*/
	public function register_frontend_styles() {
		wp_register_style( 'zylo-elementor', plugin_dir_url( __FILE__ ) . 'assets/css/zylo-elementor.css', self::VERSION );
	}




	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets($widgets_manager) {

		// Include Widget files
		require_once plugin_dir_path( __FILE__ ) . 'widgets/ll-heading-widget.php'; 
		require_once plugin_dir_path( __FILE__ ) . 'widgets/at-about-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/at-list-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/work-process-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/at-instagrame-social-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/ll-text-slider-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/ll-service-post-widget.php'; 
		require_once plugin_dir_path( __FILE__ ) . 'widgets/ll-service-post-widget-2.php'; 
		require_once plugin_dir_path( __FILE__ ) . 'widgets/ll-video-widget.php'; 
		require_once plugin_dir_path( __FILE__ ) . 'widgets/ll-portfolio-widget.php'; 
		require_once plugin_dir_path( __FILE__ ) . 'widgets/ll-testimonial-widget.php'; 
		require_once plugin_dir_path( __FILE__ ) . 'widgets/ll-portfolio-img-widget.php'; 
		require_once plugin_dir_path( __FILE__ ) . 'widgets/ll-blog-post-widget.php'; 
		require_once plugin_dir_path( __FILE__ ) . 'widgets/ll-member-post-widget.php'; 
		require_once plugin_dir_path( __FILE__ ) . 'widgets/ll-brands-widget.php'; 
		require_once plugin_dir_path( __FILE__ ) . 'widgets/ll-banner-widget.php'; 


		// Register widget
		$widgets_manager->register( new \ZyloElementor\Widget\LexelifeHeading() ); 
		$widgets_manager->register( new \ZyloElementor\Widget\ZyloAbout() ); 
		$widgets_manager->register( new \ZyloElementor\Widget\ZyloWorkProcess() ); 
		$widgets_manager->register( new \ZyloElementor\Widget\ZyloInstagrameSocial() ); 
		$widgets_manager->register( new \ZyloElementor\Widget\ZyloTextSlide() ); 
		$widgets_manager->register( new \ZyloElementor\Widget\ZyloList() ); 
		$widgets_manager->register( new \ZyloElementor\Widget\LuxelifeServicePost() ); 
		$widgets_manager->register( new \ZyloElementor\Widget\LuxelifeServicePost2() ); 
		$widgets_manager->register( new \ZyloElementor\Widget\LuxelifeVideo() ); 
		$widgets_manager->register( new \ZyloElementor\Widget\ZyloPortfolio() );
		$widgets_manager->register( new \ZyloElementor\Widget\ZyloPortfolio_Img() );
		$widgets_manager->register( new \ZyloElementor\Widget\LuxelifeTestimonials() ); 
		$widgets_manager->register( new \ZyloElementor\Widget\ZyloBlogPost() );
		$widgets_manager->register( new \ZyloElementor\Widget\LuxelifeMemberPost() );
		$widgets_manager->register( new \ZyloElementor\Widget\LuxelifeBrands() ); 
		$widgets_manager->register( new \ZyloElementor\Widget\LuxelifeBanner() );

	}

	/** 
	 * register_controls description
	 * @return [type] [description]
	 */
	public function register_controls() {

		$controls_manager = \Elementor\Plugin::$instance->controls_manager;
		$controls_manager->register_control( 'slider-widget', new Test_Control1() );
	
	}

	/**
	 * Prints the Elementor Page content.
	 */
	public static function get_content( $id = 0 ) {
		if ( class_exists( '\ElementorPro\Plugin' ) ) {
			echo do_shortcode( '[elementor-template id="' . $id . '"]' );
		} else {
			echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $id );
		}
	}

}

ZyloElementor::instance();
