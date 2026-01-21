<?php
namespace ZyloElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

/**
 * Zylo Work Process Widget.
 *
 * Elementor widget that inserts an embeddable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class ZyloWorkProcess extends \Elementor\Widget_Base {

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
		return 'zylo-work-process';
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
		return __( 'Work Process', 'zylo-elementor' );
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
		return 'eicon-post-info';
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
		return [ 'at-work-process-widget' ];
	}

	public function get_script_depends() {
		return [ 'zylo-elementor'];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_content_features',
			[
				'label' => esc_html__( 'Process', 'zylo-elementor' ),
			]	
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'zylo-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'process-style-1'  => esc_html__( 'Process Style 1', 'zylo-elementor' ),
					'process-style-2'  => esc_html__( 'Process Style 2', 'zylo-elementor' ),
				],
				'default'   => 'process-style-1',
			]
		);
		$this->add_control(
			'active',
			[
				'label'     => esc_html__( 'Chose Active', 'zylo-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'inactive'  => esc_html__( 'inactive', 'zylo-elementor' ),
					'active'  => esc_html__( 'active', 'zylo-elementor' ),
				],
				'default'   => 'inactive',
			]
		);

		$this->add_control(
			'icon_one',
			[
				'label'   => esc_html__( 'Dimond Image', 'zylo-elementor' ),
				'description' => esc_html__( 'Add Dimond Image', 'zylo-elementor' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'dynamic' => [ 'active' => true ],
			]
		);
		$this->add_control(
			'icon_2',
			[
				'label'   => esc_html__( 'Arrow Image', 'zylo-elementor' ),
				'description' => esc_html__( 'Add Arrow Image', 'zylo-elementor' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'dynamic' => [ 'active' => true ],
			]
		);
		
        $this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'zylo-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your heading', 'zylo-elementor' ),
				'default'     => __( 'Effective Retail Marketing Strategies', 'zylo-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'content',
			[
				'label'       => __( 'Content', 'zylo-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your content', 'zylo-elementor' ),
				'default'     => __( 'We take time and effort to accurately review everything about your business and your industry.' ),
				'label_block' => true,
			]
		);	
        
		$this->end_controls_section();



		/** Icon Style **/
		$this->start_controls_section(
			'process_icon_style',
				[
					'label' => esc_html__( 'Icon Style', 'zylo-elementor' ),
					'tab' => Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_responsive_control(
				'width_2',
				[
					'label' => __( 'Icon 1 Size', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'vw' ],
					'range' => [
						'px' => [ 'min' => 0, 'max' => 2000 ],
						'%'  => [ 'min' => 0, 'max' => 100 ],
						'vw' => [ 'min' => 0, 'max' => 100 ],
					],
					'selectors' => [
						'{{WRAPPER}} .service-style-3 .service-wrap .single-item-content.active .icon__1, {{WRAPPER}} .work-style-2 .singleitem.active .singleitem__icon img' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
                'custom_margin_1',
                [
                    'label' => esc_html__('Icon 1 Margin', 'zylo-elementor'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .service-style-3 .service-wrap .single-item-content .icon__1, {{WRAPPER}} .work-style-2 .singleitem.active .singleitem__icon img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

			$this->add_responsive_control(
				'width_3',
				[
					'label' => __( 'Icon 2 Size', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'condition' => [
						'chose_style' => 'process-style-1',
					],
					'size_units' => [ 'px', '%', 'vw' ],
					'range' => [
						'px' => [ 'min' => 0, 'max' => 2000 ],
						'%'  => [ 'min' => 0, 'max' => 100 ],
						'vw' => [ 'min' => 0, 'max' => 100 ],
					],
					'selectors' => [
						'{{WRAPPER}} .service-style-3 .service-wrap .single-item-content.active .icon__2' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
                'custom_margin_2',
                [
                    'label' => esc_html__('Icon 2 Margin', 'zylo-elementor'),
                    'type' => Controls_Manager::DIMENSIONS,
					'condition' => [
						'chose_style' => 'process-style-1',
					],
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .service-style-3 .service-wrap .single-item-content.active .icon__2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

		$this->end_controls_section();
		

		/** heading typography **/
		$this->start_controls_section(
			'process_heading_style',
				[
					'label' => esc_html__( 'Heading Style', 'zylo-elementor' ),
					'tab' => Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_control(
				'process_heading_font_color',
				[
					'label' => __( 'Title Color', 'zylo-elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .service-style-3 .service-wrap .single-item-content .box-content .title, {{WRAPPER}} .work-style-2 .singleitem__content .title' => 'color: {{VALUE}} !important',
					]
				]
			);
			$this->add_control(
				'process_heading_font_color_2',
				[
					'label' => __( 'Title Hover Color', 'zylo-elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .work-style-2 .singleitem__content .title:hover a' => 'color: {{VALUE}}',
					]
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'process_heading_typography',
					'selector' => '{{WRAPPER}} .service-style-3 .service-wrap .single-item-content .box-content .title, {{WRAPPER}} .work-style-2 .singleitem__content .title',
				]
			);

			$this->end_controls_section();

			$this->start_controls_section(
				'process_desc_style',
				[
					'label' => esc_html__( 'Description Style', 'zylo-elementor' ),
					'tab' => Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_control(
				'process_desc_font_color',
				[
					'label' => __( 'Description Color', 'zylo-elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .service-style-3 .service-wrap .single-item-content:hover .box-content p, {{WRAPPER}} .work-style-2 .singleitem__content p' => 'color: {{VALUE}};',
					]
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'process_desc_typography',
					'selector' => '{{WRAPPER}} .service-style-3 .service-wrap .single-item-content .box-content p',
				]
			);

			$this->add_responsive_control(
				'width_1',
				[
					'label' => __( 'Description Width', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'vw' ],
					'range' => [
						'px' => [ 'min' => 0, 'max' => 2000 ],
						'%'  => [ 'min' => 0, 'max' => 100 ],
						'vw' => [ 'min' => 0, 'max' => 100 ],
					],
					'selectors' => [
						'{{WRAPPER}} .service-style-3 .service-wrap .single-item-content .box-content p' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'process_quotation_style',
			[
				'label' => esc_html__( 'Quotation Style', 'zylo-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
            'process_quote_font_color',
            [
                'label' => __( 'Author Quote Color', 'zylo-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .process-info-card.style-1 .quote' => 'color: {{VALUE}};',
                ]
            ]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'process_quote_typography',
				'selector' => '{{WRAPPER}} .process-info-card.style-1 .quote',
			]
		);

		$this->add_responsive_control(
			'process_quote_bg_color',
			[
				'label' => esc_html__( 'Quote Background Color', 'zylo-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .process-info-card .process-info-content .quote::before' => 'background-color: {{VALUE}} !important',
				],
			]
		);

		$this->end_controls_section();

		/** Start Button **/
		$this->start_controls_section(
			'banner_btn_style',
			[
				'label' => esc_html__( 'Button Style', 'eyewell-elementor'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'textdomain' ),
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'banner_btn_typography',
				'selector' => '{{WRAPPER}} .theme-btn',
			]
		);

		$this->add_responsive_control(
			'banner_btn_text_color',
			[
				'label' => esc_html__( 'Text Color', 'eyewell-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .theme-btn' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_responsive_control(
			'banner_btn_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'eyewell-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .theme-btn' => 'background: {{VALUE}} !important',
				],
			]
		);

		$this->add_responsive_control(
			'banner_btn_margin',
			[
				'label' => esc_html__( 'Margin', 'eyewell-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .theme-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'banner_btn_padding',
			[
				'label' => esc_html__( 'Padding', 'eyewell-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .theme-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'banner_btn_border_border',
				'selector' => '{{WRAPPER}} .theme-btn',
			]
		);

		$this->add_responsive_control(
			'banner_btn_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'eyewell-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
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
				'label' => esc_html__( 'Hover', 'textdomain' ),
			]
		);

		$this->add_responsive_control(
			'banner_btn_hover_color',
			[
				'label' => esc_html__( 'Color', 'eyewell-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .theme-btn:hover' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_responsive_control(
			'banner_btn_bg_hover_color',
			[
				'label' => esc_html__( 'Background Color', 'eyewell-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .theme-btn:hover' => 'background: {{VALUE}} !important',
				],
			]
		);

		$this->add_responsive_control(
			'banner_btn_icon_hover_color',
			[
				'label' => esc_html__( 'Icon Color', 'eyewell-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .theme-btn:hover i' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_section();
	}

	public function render() {
		$settings = $this->get_settings_for_display();
		extract($settings);

		$this->add_render_attribute(
			[
				'link' => [
					'href' => !empty($settings['link']['url']) ? esc_url($settings['link']['url']) : '#',
					'target' => !empty($settings['link']['is_external']) ? '_blank' : '_self'
				]
			], '', '', true
		);

		if ($chose_style == 'process-style-1') :
			if (!empty($heading) || !empty($content) || !empty($icon_one['url']) || !empty($icon_2['url'])) : ?>
				<!-- latest -->
				<section class="service-area fix">
					<div class="service-style-3 my_p_0">
						<div class="container-fluid p-0">
							<div class="service-wrap bg-cover">
								<div class="row g-0">
									<div class="col">
										<div class="single-item-content active-hover <?php echo esc_attr($active); ?>">
											<?php if (!empty($icon_one['url']) || !empty($icon_2['url'])) : ?>
												<div class="icon">
													<?php if (!empty($icon_one['url'])) : ?>
														<img class="icon__1" src="<?php echo esc_url($icon_one['url']); ?>" alt="icon">
													<?php endif; ?>
													<?php if (!empty($icon_2['url'])) : ?>
														<img class="icon__2" src="<?php echo esc_url($icon_2['url']); ?>" alt="icon">
													<?php endif; ?>
												</div>
											<?php endif; ?>
											<div class="box-content">
												<?php if (!empty($heading)) : ?>
													<h2 class="title"><a <?php echo $this->get_render_attribute_string('link'); ?>><?php echo esc_html($heading); ?></a></h2>
												<?php endif; ?>
												<?php if (!empty($content)) : ?>
													<p><?php echo esc_html($content); ?></p>
												<?php endif; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- latest -->
			<?php 
			endif; 
		elseif ($chose_style == 'process-style-2') :
			if (!empty($heading) || !empty($content) || !empty($icon_one['url']) || !empty($icon_2['url'])) : ?>
				<section class="work-area fix">
					<div class="work-style-2 my_p_0">
						<div class="container-fluid p-0">
							<div class="wrapper">
								<div class="row gx-xl-0 gy-4 justify-content-xl-center">
									<div class="col">
										<div class="singleitem active-hover <?php echo esc_attr($active); ?>">
											<?php if (!empty($icon_2['url'])) : ?>
												<div class="singleitem__thumb">
													<img class="w-img" src="<?php echo esc_url($icon_2['url']); ?>" alt="img">
												</div>
											<?php endif; ?>
											<?php if (!empty($icon_one['url'])) : ?>
												<div class="singleitem__icon">
													<img src="<?php echo esc_url($icon_one['url']); ?>" alt="icon">
												</div>
											<?php endif; ?>
											<div class="singleitem__content">
												<?php if (!empty($heading)) : ?>
													<h2 class="title"> <a <?php echo $this->get_render_attribute_string('link'); ?>><?php echo esc_html($heading); ?></a></h2>
												<?php endif; ?>
												<?php if (!empty($content)) : ?>
													<p><?php echo esc_html($content); ?></p>
												<?php endif; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			<?php 
			endif; 
		endif; 
	}
}
