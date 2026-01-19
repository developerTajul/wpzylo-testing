<?php
namespace ZyloElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Background;

/**
 * Zylo Elementor Widget.
 *
 * Elementor widget that inserts a text slider into the page.
 *
 * @since 1.0.0
 */
class ZyloTextSlide extends \Elementor\Widget_Base {

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
		return 'zylo-text-slider';
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
		return __( 'Text Slider', 'zylo-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Zylo Slider widget icon.
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
	 * Retrieve the list of categories the Zylo Slider widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'zylo-elementor' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'text-slider', 'carousel', 'zylo' ];
	}

	/**
	 * Get script dependencies.
	 *
	 * Ensure custom scripts are loaded for the slider.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Script dependencies.
	 */
	public function get_script_depends() {
		return [ 'zylo-elementor' ];
	}

	/**
	 * Get style dependencies.
	 *
	 * Ensure custom styles are loaded for the slider.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Style dependencies.
	 */
	public function get_style_depends() {
		return [ 'zylo-elementor' ];
	}

	/**
	 * Register widget controls.
	 *
	 * Add input fields to control the widget.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		// Content Section
		$this->start_controls_section(
			'brand_section',
			[
				'label' => esc_html__( 'Brand Slider Content', 'zylo-elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		// Slider Style Selection
		$this->add_control(
			'chose_style',
			[
				'label'   => esc_html__( 'Choose Style', 'zylo-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'brand-slider-style-1'         => esc_html__( 'Style 1', 'zylo-elementor' ),
					'brand-slider-style-2'         => esc_html__( 'Style 2', 'zylo-elementor' ),
					'brand-slider-style-2 style-3' => esc_html__( 'Style 3', 'zylo-elementor' ),
					'brand-slider-style-2 style-4' => esc_html__( 'Style 4', 'zylo-elementor' ),
				],
				'default' => 'brand-slider-style-1',
			]
		);

		// Scroll Direction
		$this->add_control(
			'scroll',
			[
				'label'   => esc_html__( 'Scroll Direction', 'zylo-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'scrollright' => esc_html__( 'Scroll Right', 'zylo-elementor' ),
					'scrollleft'  => esc_html__( 'Scroll Left', 'zylo-elementor' ),
				],
				'default' => 'scrollright',
			]
		);

		// Autoplay Toggle
		$this->add_control(
			'autoplay',
			[
				'label'     => esc_html__( 'Autoplay', 'zylo-elementor' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Yes', 'zylo-elementor' ),
				'label_off' => esc_html__( 'No', 'zylo-elementor' ),
				'default'   => 'yes',
			]
		);

		// Animation Speed
		$this->add_control(
			'animation_speed',
			[
				'label'     => esc_html__( 'Animation Speed (ms)', 'zylo-elementor' ),
				'type'      => Controls_Manager::NUMBER,
				'min'       => 1000,
				'max'       => 10000,
				'step'      => 100,
				'default'   => 5000,
				'condition' => [
					'autoplay' => 'yes',
				],
			]
		);

		// Repeater for Text Slides
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'list_title',
			[
				'label'       => esc_html__( 'Text Slide', 'zylo-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => esc_html__( 'Let’s Contact', 'zylo-elementor' ),
				'placeholder' => esc_html__( 'Enter slide text', 'zylo-elementor' ),
			]
		);

		$this->add_control(
			'list_items',
			[
				'label'       => esc_html__( 'Slide Items', 'zylo-elementor' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'list_title' => esc_html__( 'Let’s Contact', 'zylo-elementor' ),
					],
					[
						'list_title' => esc_html__( 'Get Started', 'zylo-elementor' ),
					],
					[
						'list_title' => esc_html__( 'Discover More', 'zylo-elementor' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();

		// Style Section
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Slider Style', 'zylo-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		// Text Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'text_typography',
				'label'    => esc_html__( 'Text Typography', 'zylo-elementor' ),
				'selector' => '{{WRAPPER}} .cmn-textslide span',
			]
		);

		// Text Color
		$this->add_control(
			'text_color',
			[
				'label'     => esc_html__( 'Text Color', 'zylo-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#787878',
				'selectors' => [
					'{{WRAPPER}} .brand-slider-style-1 .cmn-textslide span' => '-webkit-text-stroke: 2px {{VALUE}}; -webkit-text-fill-color: transparent;',
					'{{WRAPPER}} .brand-slider-style-2 .scrolling-wrap .comm .cmn-textslide span' => 'color: {{VALUE}};',
				],
			]
		);

		// Dots Color
		$this->add_control(
			'dots_color',
			[
				'label'     => esc_html__( 'Dots Color', 'zylo-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#000000',
				'selectors' => [
					'{{WRAPPER}} .brand-slider-style-1 .cmn-textslide .dots' => '-webkit-text-fill-color: {{VALUE}};',
					'{{WRAPPER}} .brand-slider-style-2 .cmn-textslide .dots' => 'color: {{VALUE}};',
				],
			]
		);

		// Background Control
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'slider_background',
				'label'    => esc_html__( 'Slider Background', 'zylo-elementor' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .brand-slider',
			]
		);

		// Border Control
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'slider_border',
				'selector' => '{{WRAPPER}} .brand-slider',
			]
		);

		// Box Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'slider_box_shadow',
				'selector' => '{{WRAPPER}} .brand-slider',
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render widget output on the frontend.
	 *
	 * Generate the final HTML for the slider.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function render() {
		$settings   = $this->get_settings_for_display();
		$list_items = $settings['list_items'];

		// Check if list_items is not empty
		if ( empty( $list_items ) ) {
			return;
		}

		// Dynamic data attributes for JS
		$data_attributes = [
			'autoplay' => $settings['autoplay'] === 'yes' ? 'true' : 'false',
			'speed'    => $settings['animation_speed'],
		];

		?>
		<div class="brand-slider fix" data-slider='<?php echo wp_json_encode( $data_attributes ); ?>'>
			<div class="<?php echo esc_attr( $settings['chose_style'] ); ?>">
				<div class="scrolling-wrap">
					<div class="comm <?php echo esc_attr( $settings['scroll'] ); ?>">
						<?php foreach ( $list_items as $item ) : ?>
							<?php if ( ! empty( $item['list_title'] ) ) : ?>
								<div class="cmn-textslide"><span><?php echo esc_html( $item['list_title'] ); ?></span></div>
								<div class="cmn-textslide"><span class="dots">•</span></div>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
					<div class="comm <?php echo esc_attr( $settings['scroll'] ); ?>">
						<?php foreach ( $list_items as $item ) : ?>
							<?php if ( ! empty( $item['list_title'] ) ) : ?>
								<div class="cmn-textslide"><span><?php echo esc_html( $item['list_title'] ); ?></span></div>
								<div class="cmn-textslide"><span class="dots">•</span></div>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}