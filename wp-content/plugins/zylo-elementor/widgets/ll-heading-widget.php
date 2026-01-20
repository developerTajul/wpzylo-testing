<?php
namespace ZyloElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Background;

/**
 * Lexelife Heading Elementor Widget.
 *
 * Elementor widget that inserts a heading section with multiple styles.
 *
 * @since 1.0.0
 */
class LexelifeHeading extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Lexelife Heading widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'luxelife-heading';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Lexelife Heading widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'LL Heading', 'zylo-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Lexelife Heading widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-history';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Lexelife Heading widget belongs to.
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
		return [ 'heading', 'title', 'section' ];
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
	 * Get style dependencies.
	 *
	 * Ensure custom styles are loaded for the widget.
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
			'section_content_section',
			[
				'label' => esc_html__( 'Section', 'zylo-elementor' ),
			]
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'zylo-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'heading-style-1'  => esc_html__( 'Heading Style 1', 'zylo-elementor' ),
					'heading-style-2' => esc_html__( 'Heading Style 2', 'zylo-elementor' ),
					'heading-style-3' => esc_html__( 'Heading Style 3', 'zylo-elementor' ),
					'heading-style-4' => esc_html__( 'Heading Style 4', 'zylo-elementor' ),
				],
				'default'   => 'heading-style-1',
			]
		);

		$this->add_control(
			'sub_heading',
			[
				'label'       => __( 'Sub Heading', 'zylo-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your sub heading', 'zylo-elementor' ),
				'default'     => __( 'It is a sub heading', 'zylo-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'zylo-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your heading', 'zylo-elementor' ),
				'default'     => __( 'It is a heading', 'zylo-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'content',
			[
				'label'       => __( 'Content', 'zylo-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your content', 'zylo-elementor' ),
				'default'     => __( 'It is a description', 'zylo-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'btn_text',
			[
				'label'       => __( 'Button Text', 'zylo-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your text', 'zylo-elementor' ),
				'default'     => __( 'About The Company', 'zylo-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'btn_url',
			[
				'label'       => __( 'Button Url', 'zylo-elementor' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'Enter your url', 'zylo-elementor' ),
				'default'     => [
					'url' => '#',
				],
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		// Layout Section
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
				'default'      => 'left',
			]
		);

		$this->add_control(
			'show_sub_heading',
			[
				'label'   => esc_html__( 'Show Sub Heading', 'zylo-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_heading',
			[
				'label'   => esc_html__( 'Show Heading', 'zylo-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_content',
			[
				'label'   => esc_html__( 'Show Content', 'zylo-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_button',
			[
				'label'   => esc_html__( 'Show Button', 'zylo-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->end_controls_section();


		// Sub Heading Style
		$this->start_controls_section(
			'sub_heading_style',
				[
					'label' => esc_html__( 'Sub Heading Style', 'zylo-elementor' ),
					'tab' => Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_responsive_control(
				'sub_heading_color',
				[
					'label' => esc_html__( 'Sub Heading Color', 'zylo-elementor' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .section-content h6.subtitle, {{WRAPPER}} .section-title .short-title' => 'color: {{VALUE}} !important',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'sub_heading_typography',
					'selector' => '{{WRAPPER}} .section-content h6.subtitle, {{WRAPPER}} .section-title .short-title',
				]
			);

			$this->add_responsive_control(
				'sub_heading_margin',
				[
					'label'      => esc_html__( 'Margin', 'zylo-elementor' ),
					'type'       => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em', 'rem' ], 
					'selectors'  => [
						'{{WRAPPER}} .section-content h6.subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'default'    => [
						'top'      => '',
						'right'    => '',
						'bottom'   => '',
						'left'     => '',
						'unit'     => 'px',
						'isLinked' => false,
					],
				]
			);


			$this->add_responsive_control(
				'sub_heading_padding',
				[
					'label' => esc_html__( 'Padding', 'zylo-elementor' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
					'selectors' => [
						'{{WRAPPER}} .section-content h6.subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'default' => [
						'top' => '',
						'right' => '',
						'bottom' => '',
						'left' => '',
						'unit' => 'px',
						'isLinked' => false,
					],
				]
			);

			$this->add_responsive_control(
				'sub_heading_margin_2',
				[
					'label'      => esc_html__( 'Sub Title Margin', 'zylo-elementor' ),
					'type'       => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em', 'rem' ], 
					'selectors' => [
                        '{{WRAPPER}} .subtitle span, {{WRAPPER}} .slider-content .slider-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
					'default'    => [
						'top'      => '',
						'right'    => '',
						'bottom'   => '',
						'left'     => '',
						'unit'     => 'px',
						'isLinked' => false,
					],
				]
			);

		$this->end_controls_section();

		// Heading Style
		$this->start_controls_section(
			'heading_style',
				[
					'label' => esc_html__( 'Heading Style', 'zylo-elementor' ),
					'tab' => Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_responsive_control(
				'heading_color',
				[
					'label' => esc_html__( 'Heading Color', 'zylo-elementor' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .section-content h2.section-title' => 'color: {{VALUE}} !important',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'heading_typography',
					'selector' => '{{WRAPPER}} .section-content h2.section-title',
				]
			);

			$this->add_responsive_control(
				'heading_stroke_color',
				[
					'label' => esc_html__( 'Stroke Color', 'zylo-elementor' ),
					'type' => Controls_Manager::COLOR,
					'condition' => [
						'chose_style' => 'heading-style-1',
					],
					'selectors' => [
						'{{WRAPPER}} .section-content h2.section-title' => '-webkit-text-stroke: 2px {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'heading_fill_color',
				[
					'label' => esc_html__( 'Fill Color', 'zylo-elementor' ),
					'type' => Controls_Manager::COLOR,
					'condition' => [
						'chose_style' => 'heading-style-1',
					],
					'selectors' => [
						'{{WRAPPER}} .section-content h2.section-title' => '-webkit-text-fill-color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'heading_margin',
				[
					'label' => esc_html__( 'Margin', 'zylo-elementor' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
					'selectors' => [
						'{{WRAPPER}} .section-content h2.section-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'default' => [
						'top' => '',
						'right' => '',
						'bottom' => '',
						'left' => '',
						'unit' => 'px',
						'isLinked' => false,
					],
				]
			);

			$this->add_responsive_control(
				'heading_padding',
				[
					'label' => esc_html__( 'Padding', 'zylo-elementor' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
					'selectors' => [
						'{{WRAPPER}} .section-content h2.section-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'default' => [
						'top' => '',
						'right' => '',
						'bottom' => '',
						'left' => '',
						'unit' => 'px',
						'isLinked' => false,
					],
				]
			);

			$this->add_responsive_control(
                'title_width',
                [
                    'label' => __( 'Heading Width', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'vw' ],
                    'range' => [
                        'px' => [ 'min' => 0, 'max' => 2000 ],
                        '%'  => [ 'min' => 0, 'max' => 100 ],
                        'vw' => [ 'min' => 0, 'max' => 100 ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .section-content h2.section-title' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

		$this->end_controls_section();


		// Description Style
		$this->start_controls_section(
			'desc_style',
				[
					'label' => esc_html__( 'Description Style', 'zylo-elementor' ),
					'tab' => Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_responsive_control(
				'desc_color',
				[
					'label' => esc_html__( 'Description Text Color', 'zylo-elementor' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .section-content p' => 'color: {{VALUE}} !important',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'desc_typography',
					'selector' => '{{WRAPPER}} .section-content p',
				]
			);

			$this->add_responsive_control(
				'para_margin',
				[
					'label' => esc_html__( 'Margin', 'zylo-elementor' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
					'selectors' => [
						'{{WRAPPER}} .section-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'default' => [
						'top' => '',
						'right' => '',
						'bottom' => '',
						'left' => '',
						'unit' => 'px',
						'isLinked' => false,
					],
				]
			);

			$this->add_responsive_control(
				'para_padding',
				[
					'label' => esc_html__( 'Padding', 'zylo-elementor' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
					'selectors' => [
						'{{WRAPPER}} .section-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'default' => [
						'top' => '',
						'right' => '',
						'bottom' => '',
						'left' => '',
						'unit' => 'px',
						'isLinked' => false,
					],
				]
			);

		$this->end_controls_section();

		// Button Style
		$this->start_controls_section(
			'button_style',
			[
				'label' => esc_html__( 'Button Text Style', 'zylo-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
                        'chose_style' =>  [ 'heading-style-2', 'heading-style-3' ],
                ],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'service_btn_typography',
				'selector' => '{{WRAPPER}} .btn-box .theme-btn',
			]
		);

		$this->add_responsive_control(
			'btn_text_color',
			[
				'label' => esc_html__( 'Button Text Color', 'zylo-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .theme-btn' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'btn_text_hover_color',
			[
				'label' => esc_html__( 'Button Text Hover Color', 'zylo-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .theme-btn:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'btn_background',
				'label' => esc_html__( 'Button Background', 'zylo-elementor' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .theme-btn',
			]
		);

		$this->add_responsive_control(
			'btn_border_color',
			[
				'label' => __( 'Button Border Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .theme-btn' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'btn_padding',
			[
				'label' => esc_html__( 'Padding', 'zylo-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .section-content .btn-box .theme-btn, {{WRAPPER}} .section-content .btn-box .secandary-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
                'default' => [
                    'top' => '',
                    'right' => '',
                    'bottom' => '',
                    'left' => '',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render widget output on the frontend.
	 *
	 * Generate the final HTML for the heading section.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function render() {
    $settings = $this->get_settings_for_display();
    extract($settings);

    $btn_url = $settings['btn_url']['url'] ?? '#';

    if ($chose_style == 'heading-style-1') : ?>
        <div class="section-content <?php echo esc_attr($chose_style); ?>">
            <?php if (!empty($sub_heading) && $show_sub_heading) : ?>
                <h6 class="subtitle wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.3s" aria-label="<?php echo esc_attr($sub_heading); ?>"><span><i class="fa-regular fa-arrow-right-long"></i></span><?php echo wp_kses_post($sub_heading); ?></h6>
            <?php endif; ?>

            <?php if (!empty($heading) && $show_heading) : ?>
                <h2 class="section-title wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s" aria-label="<?php echo esc_attr($heading); ?>"><?php echo wp_kses_post($heading); ?></h2>
            <?php endif; ?>

            <?php if (!empty($content) && $show_content) : ?>
                <p class="wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s" aria-label="<?php echo esc_attr($content); ?>"><?php echo wp_kses_post($content); ?></p>
            <?php endif; ?>
        </div>
    <?php elseif ($chose_style == 'heading-style-2') : ?>
        <div class="row justify-content-between align-items-center <?php echo esc_attr($chose_style); ?>">
            <div class="col-xl-6 col-lg-6">
                <div class="section-content">
                    <?php if (!empty($sub_heading) && $show_sub_heading) : ?>
                        <h6 class="subtitle wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.3s" aria-label="<?php echo esc_attr($sub_heading); ?>"><span><i class="fa-regular fa-arrow-right-long"></i></span><?php echo wp_kses_post($sub_heading); ?></h6>
                    <?php endif; ?>

                    <?php if (!empty($heading) && $show_heading) : ?>
                        <h2 class="section-title wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s" aria-label="<?php echo esc_attr($heading); ?>"><?php echo wp_kses_post($heading); ?></h2>
                    <?php endif; ?>

                    <?php if (!empty($content) && $show_content) : ?>
                        <p class="wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s" aria-label="<?php echo esc_attr($content); ?>"><?php echo wp_kses_post($content); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <?php if (!empty($btn_text) && $show_button) : ?>
                    <div class="btn-box text-lg-end wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.3s">
                        <a class="theme-btn" href="<?php echo esc_url($btn_url); ?>" aria-label="<?php echo esc_attr($btn_text); ?>">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="16" viewBox="0 0 19 16" fill="none">
                                    <path d="M18.45 8.70711C18.8406 8.31658 18.8406 7.68342 18.45 7.29289L12.0861 0.928932C11.6955 0.538408 11.0624 0.538408 10.6719 0.928932C10.2813 1.31946 10.2813 1.95262 10.6719 2.34315L16.3287 8L10.6719 13.6569C10.2813 14.0474 10.2813 14.6805 10.6719 15.0711C11.0624 15.4616 11.6955 15.4616 12.0861 15.0711L18.45 8.70711ZM0.74292 9H17.7429V7H0.74292V9Z" fill="white"/>
                                </svg>
                            </span>
                            <?php echo esc_html($btn_text); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php elseif ($chose_style == 'heading-style-3') : ?>
        <div class="section-content <?php echo esc_attr($chose_style); ?>">
            <?php if (!empty($sub_heading) && $show_sub_heading) : ?>
                <h6 class="subtitle wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.3s" aria-label="<?php echo esc_attr($sub_heading); ?>"><span><i class="fa-regular fa-arrow-right-long"></i></span><?php echo wp_kses_post($sub_heading); ?></h6>
            <?php endif; ?>

            <?php if (!empty($heading) && $show_heading) : ?>
                <h2 class="section-title wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s" aria-label="<?php echo esc_attr($heading); ?>"><?php echo wp_kses_post($heading); ?></h2>
            <?php endif; ?>

            <?php if (!empty($content) && $show_content) : ?>
                <p class="wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s" aria-label="<?php echo esc_attr($content); ?>"><?php echo wp_kses_post($content); ?></p>
            <?php endif; ?>

            <?php if (!empty($btn_text) && $show_button) : ?>
                <div class="btn-box wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.6s">
                    <a class="secandary-btn" href="<?php echo esc_url($btn_url); ?>" aria-label="<?php echo esc_attr($btn_text); ?>">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="16" viewBox="0 0 36 16" fill="none">
                                <path d="M35.7071 8.70711C36.0976 8.31658 36.0976 7.68342 35.7071 7.29289L29.3431 0.928932C28.9526 0.538408 28.3195 0.538408 27.9289 0.928932C27.5384 1.31946 27.5384 1.95262 27.9289 2.34315L33.5858 8L27.9289 13.6569C27.5384 14.0474 27.5384 14.6805 27.9289 15.0711C28.3195 15.4616 28.9526 15.4616 29.3431 15.0711L35.7071 8.70711ZM0 9H35V7H0V9Z" fill="white"/>
                            </svg>
                        </span>
                        <?php echo esc_html($btn_text); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    <?php elseif ($chose_style == 'heading-style-4') : ?>
        <div class="row justify-content-between align-items-center heading-btn <?php echo esc_attr($chose_style); ?>">
            <div class="col-md-6 pe-0">
                <div class="section-content">
                    <?php if (!empty($sub_heading) && $show_sub_heading) : ?>
                        <h6 class="subtitle wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.3s" aria-label="<?php echo esc_attr($sub_heading); ?>"><span><i class="fa-regular fa-arrow-right-long"></i></span><?php echo wp_kses_post($sub_heading); ?></h6>
                    <?php endif; ?>
                    
                    <?php if (!empty($heading) && $show_heading) : ?>
                        <h2 class="section-title wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s" aria-label="<?php echo esc_attr($heading); ?>"><?php echo wp_kses_post($heading); ?></h2>
                    <?php endif; ?>

                    <?php if (!empty($content) && $show_content) : ?>
                        <p class="wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s" aria-label="<?php echo esc_attr($content); ?>"><?php echo wp_kses_post($content); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-6 ps-0">
                <?php if (!empty($btn_text) && $show_button) : ?>
                    <div class="btn-box wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.3s">
                        <a class="theme-btn" href="<?php echo esc_url($btn_url); ?>" aria-label="<?php echo esc_attr($btn_text); ?>">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="16" viewBox="0 0 19 16" fill="none">
                                    <path d="M18.45 8.70711C18.8406 8.31658 18.8406 7.68342 18.45 7.29289L12.0861 0.928932C11.6955 0.538408 11.0624 0.538408 10.6719 0.928932C10.2813 1.31946 10.2813 1.95262 10.6719 2.34315L16.3287 8L10.6719 13.6569C10.2813 14.0474 10.2813 14.6805 10.6719 15.0711C11.0624 15.4616 11.6955 15.4616 12.0861 15.0711L18.45 8.70711ZM0.74292 9H17.7429V7H0.74292V9Z" fill="white"/>
                                </svg>
                            </span>
                            <?php echo esc_html($btn_text); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
<?php
}

}
