<?php
namespace ZyloElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

/**
 * Zylo Elementor Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class LuxelifeBrands extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Zylo Elementor Widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'zylo-brand';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Zylo Elementor Widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'LL Brands', 'zylo-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Luxelife Slider widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-carousel-loop';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Luxelife Slider widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'zylo-elementor' ];
	}

	public function get_keywords() {
		return [ 'brand' ];
	}

	public function get_script_depends() {
		return [ 'zylo-elementor'];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'brand_section',
			[
				'label' => esc_html__( 'Brand Section', 'zylo-elementor' ),
			]
		);


		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Brand Items', 'zylo-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_icon'   => esc_html__( 'Brand #1', 'zylo-elementor' ),
					],
				],
				'fields' => [	
					[
						'name'    => 'tab_icon',
						'label'   => esc_html__( 'Brand Image', 'zylo-elementor' ),
						'type' => \Elementor\Controls_Manager::MEDIA,
						'default' => [
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						],
						'dynamic' => [ 'active' => true ],
					]
				],
			]
		);

		$this->end_controls_section();


		/** Start Brands Slider Settings **/
		$this->start_controls_section(
			'slider_widget_settings',
			[
				'label' => __( 'Slider Settings', 'boomdevs-elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'slider_widget_autoplay',
			[
				'label'   => __('Autoplay', 'boomdevs-elementor'),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'slider_widget_autoplay_speed',
			[
				'label'     => esc_html__('Autoplay Speed', 'boomdevs-elementor'),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 3000,
				'condition' => [
					'slider_widget_autoplay' => 'yes',
				],
			]
		);

		$this->add_control(
			'slider_widget_pause_hover',
			[
				'label'   => __('Pause on Hover', 'boomdevs-elementor'),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'slider_widget_loop',
			[
				'label'   => __('Loop', 'boomdevs-elementor'),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'slider_widget_slide_animation_speed',
			[
				'label'     => esc_html__('Animation Speed (ms)', 'boomdevs-elementor'),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 1500,
			]
		);

		$this->add_control(
			'slider_widget_slides_show_desktop',
			[
				'label'     => esc_html__('Slides to display desktop', 'boomdevs-elementor'),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 5,
			]
		);

		$this->add_control(
			'slider_widget_slides_show_tablet',
			[
				'label'     => esc_html__('Slides to display tablet', 'boomdevs-elementor'),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 4,
			]
		);

		$this->add_control(
			'slider_widget_slides_show_mobile',
			[
				'label'     => esc_html__('Slides to display mobile', 'boomdevs-elementor'),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 2,
			]
		);

		$this->add_control(
			'slider_widget_slides_scroll',
			[
				'label'     => esc_html__('Number of slides to scroll', 'boomdevs-elementor'),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 1,
			]
		);

		$this->add_control(
			'slider_widget_dots',
			[
				'label'   => __('Dots', 'boomdevs-elementor'),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'slider_widget_arrows',
			[
				'label'   => __('Arrows', 'boomdevs-elementor'),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'no',
			]
		);

		$this->add_control(
			'slider_widget_swipe_slide',
			[
				'label'   => __('swipeToSlide', 'boomdevs-elementor'),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

		/** End Carousel Settings **/


		$this->start_controls_section(
			'section_content_layout',
			[
				'label' => esc_html__( 'Layout', 'zylo-elementor' ),
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label'   => esc_html__( 'Alignment', 'zylo-elementor' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'zylo-elementor' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'zylo-elementor' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'zylo-elementor' ),
						'icon'  => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'zylo-elementor' ),
						'icon'  => 'eicon-text-align-justify',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'description'  => 'Use align to match position',
				'default'      => 'center',
			]
		);


		$this->end_controls_section();

		/** typography **/
		$this->start_controls_section(
			'brand_style',
			[
				'label' => esc_html__( 'Style', 'zylo-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);




		$this->add_control(
            'brand_devider_bg_color',
            [
                'label' => __( 'Divider Background Color', 'zylo-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
						'step' => 1,
                    '{{WRAPPER}} .brand-area .section-title .divider' => 'background-color: {{VALUE}};',
                ]
            ]
        );

		$this->end_controls_section();

	}

	public function render() {
		$settings  = $this->get_settings_for_display(); 
		extract($settings);
        $autoplay 				= $settings['slider_widget_autoplay'] === 'yes' ? 'true' : 'false';
		$loop 					= $settings['slider_widget_loop'] === 'yes' ? 'true' : 'false';
		$dots 					= $settings['slider_widget_dots'] === 'yes' ? 'true' : 'false';
		$arrows 				= $settings['slider_widget_arrows'] === 'yes' ? 'true' : 'false';
		$swipe_slide 			= $settings['slider_widget_swipe_slide'] === 'yes' ? 'true' : 'false';
		$pause_hover 			= $settings['slider_widget_pause_hover'] === 'yes' ? 'true' : 'false';
		$slide_speed 			= $settings['slider_widget_slide_animation_speed'];
		$autoplay_speed 		= $settings['slider_widget_autoplay_speed'];
		$slides_show_desktop 	= $settings['slider_widget_slides_show_desktop'];
		$slides_show_tablet 	= $settings['slider_widget_slides_show_tablet'];
		$slides_show_mobile 	= $settings['slider_widget_slides_show_mobile'];
		$slides_scroll 			= $settings['slider_widget_slides_scroll'];

		$this->add_render_attribute(
			'slider_options',
			[
				'id' => 'slider-carousel-' . $this->get_id(),
				'autoplay' 					=> $autoplay,
				'data-autoplay-speed' 		=> $autoplay_speed,
				'data-slide-speed' 			=> $slide_speed,
				'data-slides-show-desktop' 	=> $slides_show_desktop,
				'data-slides-show-tablet' 	=> $slides_show_tablet,
				'data-slides-show-mobile' 	=> $slides_show_mobile,
				'data-slides-scroll' 		=> $slides_scroll,
				'data-loop' 				=> $loop,
				'data-dots' 				=> $dots,
				'data-arrows' 				=> $arrows,
				'data-swipe-slide' 			=> $swipe_slide,
				'data-pause-hover' 			=> $pause_hover,
			]
		);
		?>

		

		<div class="brand-slider-wrappper">
			<div class="swiper brand-slider-active">
				<div class="swiper-wrapper">
				<?php 
					foreach ( $settings['tabs'] as $item ) : 
						extract($item);
						?>
					<div class="swiper-slide" <?php echo $this->get_render_attribute_string( 'slider_options' ); ?>>
						<div class="brand-img">
						<?php
							if ( '' !== $tab_icon['id'] )  :  
								$image_src = wp_get_attachment_image_src( $tab_icon['id'], 'full' );
								$image_url = $image_src ? $image_src[0] : '';
							?>                        	
								<img src="<?php print esc_url($image_url); ?>" alt="Brand Logo">
							<?php 
							endif; ?>
						</div>
					</div>
					<?php
					endforeach;
					?>
				</div>
			</div>
		</div>
	<?php
	}
}