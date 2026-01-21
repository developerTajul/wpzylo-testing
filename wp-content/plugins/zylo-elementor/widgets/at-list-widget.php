<?php
namespace ZyloElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

/**
 * Zylo List Elementor Widget.
 *
 * Elementor widget that inserts a styled list with icons and links.
 *
 * @since 1.0.0
 */
class ZyloList extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Zylo List widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'zylo-list';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Zylo List widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'AT List', 'zylo-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Zylo List widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-post-info';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Zylo List widget belongs to.
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
		return [ 'at-list-widget', 'list', 'icon-list' ];
	}

	/**
	 * Get script dependencies.
	 *
	 * Ensure custom scripts are loaded for the widget.
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
			'section_content_features',
			[
				'label' => esc_html__( 'List', 'zylo-elementor' ),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'icon',
			[
				'label'       => esc_html__( 'Icon', 'zylo-elementor' ),
				'description' => esc_html__( 'Add Icon', 'zylo-elementor' ),
				'type'        => Controls_Manager::ICONS,
				'default'     => [
					'value'   => 'fas fa-check',
					'library' => 'fa-solid',
				],
			]
		);

		$repeater->add_control(
			'list_title_text',
			[
				'label'   => esc_html__( 'List Title', 'zylo-elementor' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Strategic Planning', 'zylo-elementor' ),
			]
		);

		$repeater->add_control(
			'list_url',
			[
				'label'       => esc_html__( 'List Link', 'zylo-elementor' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'zylo-elementor' ),
				'default'     => [
					'url' => '#',
				],
				'dynamic'     => [ 'active' => true ],
			]
		);

		$this->add_control(
			'list_items',
			[
				'label'       => esc_html__( 'List Items', 'zylo-elementor' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'prevent_empty' => false,
				'default'     => [
					[
						'list_title_text' => esc_html__( 'Strategic Planning', 'zylo-elementor' ),
						'list_url'        => ['url' => '#'],
						'icon'            => ['value' => 'fas fa-check', 'library' => 'fa-solid'],
					],
					[
						'list_title_text' => esc_html__( 'Team Collaboration', 'zylo-elementor' ),
						'list_url'        => ['url' => '#'],
						'icon'            => ['value' => 'fas fa-users', 'library' => 'fa-solid'],
					],
				],
				'title_field' => '{{{ list_title_text }}}',
			]
		);

		$this->add_responsive_control(
			'list_columns',
			[
				'label'   => esc_html__( 'Columns', 'zylo-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
				],
				'default' => '1',
				'tablet_default' => '1',
				'mobile_default' => '1',
			]
		);

		$this->end_controls_section();

		// Heading Style
		$this->start_controls_section(
			'list_heading_style',
			[
				'label' => esc_html__( 'Heading Style', 'zylo-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'list_heading_font_color',
			[
				'label'   => __( 'Color', 'zylo-elementor' ),
				'type'    => Controls_Manager::COLOR,
				'default' => '#333',
				'selectors' => [
					'{{WRAPPER}} .work-style-1 .work-content .meta-box ul li a' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'list_heading_typography',
				'selector' => '{{WRAPPER}} .work-style-1 .work-content .meta-box ul li a',
			]
		);

		$this->add_control(
			'background_color_1',
			[
				'label' => esc_html__('Title Border Color', 'zylo-elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .work-style-1 .work-content .meta-box ul li::after' => 'background: {{VALUE}};',
				],
			]
		);


		//  Icon Style Heading
		$this->add_control(
			'separator_heading_1',
			[
				'type' => \Elementor\Controls_Manager::HEADING,
				'label' => __( 'Icon Style Here', 'textdomain' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'color_1',
			[
				'label'   => __( 'Icon Color', 'zylo-elementor' ),
				'type'    => Controls_Manager::COLOR,
				'default' => '#333',
				'selectors' => [
					'{{WRAPPER}} .list-item .list-icon svg path' => 'fill: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'color_2',
			[
				'label'   => __( 'Icon Hover Color', 'zylo-elementor' ),
				'type'    => Controls_Manager::COLOR,
				'default' => '#333',
				'selectors' => [
					'{{WRAPPER}} .list-item:hover .list-icon svg path' => 'fill: {{VALUE}}',
				],
			]
		);



		$this->end_controls_section();

		// Description Style
		$this->start_controls_section(
			'list_desc_style',
			[
				'label' => esc_html__( 'Description Style', 'zylo-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'list_desc_font_color',
			[
				'label'   => __( 'Description Color', 'zylo-elementor' ),
				'type'    => Controls_Manager::COLOR,
				'default' => '#666',
				'selectors' => [
					'{{WRAPPER}} .el-section-title .el-desc' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'list_desc_typography',
				'selector' => '{{WRAPPER}} .el-section-title .el-desc',
			]
		);

		$this->end_controls_section();

		// Quotation Style
		$this->start_controls_section(
			'list_quotation_style',
			[
				'label' => esc_html__( 'Quotation Style', 'zylo-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'list_quote_font_color',
			[
				'label'   => __( 'Author Quote Color', 'zylo-elementor' ),
				'type'    => Controls_Manager::COLOR,
				'default' => '#999',
				'selectors' => [
					'{{WRAPPER}} .list-info-card.style-1 .quote' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'list_quote_typography',
				'selector' => '{{WRAPPER}} .list-info-card.style-1 .quote',
			]
		);

		$this->add_responsive_control(
			'list_quote_bg_color',
			[
				'label'   => esc_html__( 'Quote Background Color', 'zylo-elementor' ),
				'type'    => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .list-info-card .list-info-content .quote::before' => 'background-color: {{VALUE}} !important',
				],
			]
		);

		$this->end_controls_section();

		// Button Style
		$this->start_controls_section(
			'banner_btn_style',
			[
				'label' => esc_html__( 'Button Style', 'zylo-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'zylo-elementor' ),
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'banner_btn_typography',
				'selector' => '{{WRAPPER}} .theme-btn',
			]
		);

		$this->add_responsive_control(
			'banner_btn_text_color',
			[
				'label'   => esc_html__( 'Text Color', 'zylo-elementor' ),
				'type'    => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .theme-btn' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_responsive_control(
			'banner_btn_bg_color',
			[
				'label'   => esc_html__( 'Background Color', 'zylo-elementor' ),
				'type'    => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .theme-btn' => 'background: {{VALUE}} !important',
				],
			]
		);

		$this->add_responsive_control(
			'banner_btn_margin',
			[
				'label'   => esc_html__( 'Margin', 'zylo-elementor' ),
				'type'    => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .theme-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'banner_btn_padding',
			[
				'label'   => esc_html__( 'Padding', 'zylo-elementor' ),
				'type'    => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .theme-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'banner_btn_border',
				'selector' => '{{WRAPPER}} .theme-btn',
			]
		);

		$this->add_responsive_control(
			'banner_btn_border_radius',
			[
				'label'   => esc_html__( 'Border Radius', 'zylo-elementor' ),
				'type'    => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .theme-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'zylo-elementor' ),
			]
		);

		$this->add_responsive_control(
			'banner_btn_hover_color',
			[
				'label'   => esc_html__( 'Color', 'zylo-elementor' ),
				'type'    => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .theme-btn:hover' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_responsive_control(
			'banner_btn_bg_hover_color',
			[
				'label'   => esc_html__( 'Background Color', 'zylo-elementor' ),
				'type'    => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .theme-btn:hover' => 'background: {{VALUE}} !important',
				],
			]
		);

		$this->add_responsive_control(
			'banner_btn_icon_hover_color',
			[
				'label'   => esc_html__( 'Icon Color', 'zylo-elementor' ),
				'type'    => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .theme-btn:hover i' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	/**
	 * Render widget output on the frontend.
	 *
	 * Generate the final HTML for the list section.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function render() {
		$settings  = $this->get_settings_for_display();
		$list_items = $settings['list_items'];
		$columns   = $settings['list_columns'];

		$this->add_render_attribute(
			'wrapper',
			'class',
			[
				'zylo-list-wrapper',
				'columns-' . $columns,
			]
		);

		?>
		<section class="work-area fix">
			<div class="work-style-1">
				<div class="container">
					<div class="row g-4" <?php echo $this->get_render_attribute_string('wrapper'); ?>>
						<div class="col-12">
							<div class="work-content">
								<div class="meta-box">
									<ul class="list-info-card style-1">
										<?php foreach ($list_items as $index => $item) : ?>
											<li class="list-item wow fadeInUp" data-wow-delay="<?php echo ($index * 0.2); ?>s">
												<?php
												// Handle list_url as string or array
												$url = '#';
												$target = '_self';
												if (is_array($item['list_url']) && !empty($item['list_url']['url'])) {
													$url = esc_url($item['list_url']['url']);
													$target = $item['list_url']['is_external'] ? '_blank' : '_self';
												} elseif (is_string($item['list_url'])) {
													$url = esc_url($item['list_url']);
												}
												?>
												<a href="<?php echo $url; ?>" target="<?php echo $target; ?>" aria-label="<?php echo esc_attr($item['list_title_text']); ?>">
													<span class="list-icon">
														<?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true']); ?>
													</span>
													<span class="list-title"><?php echo esc_html($item['list_title_text']); ?></span>
												</a>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}