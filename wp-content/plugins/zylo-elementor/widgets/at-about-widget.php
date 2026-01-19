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
class ZyloAbout extends \Elementor\Widget_Base {

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
		return 'zylo-about';
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
		return __( 'AT About', 'zylo-elementor' );
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
		return [ 'at-about-widget' ];
	}

	public function get_script_depends() {
		return [ 'zylo-elementor'];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_content_features',
			[
				'label' => esc_html__( 'About', 'zylo-elementor' ),
			]	
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'zylo-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'about-style-1'  => esc_html__( 'About Style 1', 'zylo-elementor' ),
					'about-style-2'  => esc_html__( 'About Style 2', 'zylo-elementor' ),
				],
				'default'   => 'about-style-1',
			]
		);

		$this->add_control(
			'shape',
			[
				'label'   => esc_html__( 'Shape Image', 'zylo-elementor' ),
				'description' => esc_html__( 'Add Shape Image', 'zylo-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'dynamic' => [ 'active' => true ],
				'condition' => [
					'chose_style' => ['about-style-1']
				],
			]
		);
		$this->add_control(
			'thumbnail',
			[
				'label'   => esc_html__( 'Thumbnail Image', 'zylo-elementor' ),
				'description' => esc_html__( 'Add Thumbnail Image', 'zylo-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'dynamic' => [ 'active' => true ],
				'condition' => [
					'chose_style' => ['about-style-1']
				],
			]
		);
		
		$this->add_control(
			'sub_heading',
			[
				'label'       => __( 'Sub Heading', 'zylo-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your sub heading', 'zylo-elementor' ),
				'default'     => __( 'Best Services', 'zylo-elementor' ),
				'label_block' => true,
				'condition' => [
					'chose_style' => ['about-style-1']
				],
			]
		);	
        $this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'zylo-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your heading', 'zylo-elementor' ),
				'default'     => __( 'We Provide Best Business Solution in Town', 'zylo-elementor' ),
				'label_block' => true,
				'condition' => [
					'chose_style' => ['about-style-1']
				],
			]
		);

		$this->add_control(
			'content',
			[
				'label'       => __( 'Content', 'zylo-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your content', 'zylo-elementor' ),
				'default'     => __( 'Company Anage, a leading provider of innovative tech solutions, seeks a complete redesign of its primary landing page. The goal is to enhance user experience, improve engagement, and increase conversion rates.', 'zylo-elementor' ),
				'label_block' => true,
				'condition' => [
					'chose_style' => ['about-style-1']
				],
			]
		);	
        
			
        
        $this->add_control(
			'btn_link',
			[
				'label'       => __( 'Button Link', 'zylo-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your button link', 'zylo-elementor' ),
				'default'     => __( '#', 'zylo-elementor' ),
				'label_block' => true,
				'dynamic' => [ 'active' => true ],
				'condition' => [
					'chose_style' => ['about-style-1']
				],
			]
			
		);
        $this->add_control(
			'btn_text',
			[
				'label'       => __( 'Button Text', 'zylo-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your button link', 'zylo-elementor' ),
				'default'     => __( ' About The Company', 'zylo-elementor' ),
				'label_block' => true,
				'dynamic' => [ 'active' => true ],
				'condition' => [
					'chose_style' => ['about-style-1']
				],
			]
		);

		$this->add_control(
			'thumb_2',
			[
				'label'   => esc_html__( 'Thumbnail Image 2', 'zylo-elementor' ),
				'description' => esc_html__( 'Add Your Thumbnail Image', 'zylo-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'dynamic' => [ 'active' => true ],
				'condition' => [
					'chose_style' => ['about-style-1']
				],
			]
		);
		$repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'list_title',
            [
                'label' => esc_html__('List Title', 'zylo-elementor'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Strategic Planning', 'zylo-elementor'),
            ]
        );
        $repeater->add_control(
            'list_link',
            [
                'label' => esc_html__('List Link', 'zylo-elementor'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('#', 'zylo-elementor'),
            ]
        );
		$repeater->add_control(
			'icon',
			[
				'label'   => esc_html__( 'Icon', 'zylo-elementor' ),
				'description' => esc_html__( 'Add Icon', 'zylo-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				
			]
		);
		$repeater->add_control(
            'list_title_text',
            [
                'label' => esc_html__('List Title', 'zylo-elementor'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Strategic Planning', 'zylo-elementor'),
            ]
        );
        $repeater->add_control(
            'list_url',
            [
                'label' => esc_html__('List Link', 'zylo-elementor'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('#', 'zylo-elementor'),
				'dynamic' => [ 'active' => true ],
				
            ]
        );
		$this->add_control('list_items', [
            'label' => esc_html__('List Item', 'zylo-elementor'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
        ]);


		$this->end_controls_section();


	
		/** 
		*	Layout section 
		**/
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
		
		/** subheading typography **/
		$this->start_controls_section(
			'about_sub_heading_style',
			[
				'label' => esc_html__( 'Sub Heading Style', 'zylo-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'chose_style' => ['about-style-2']
				],
			]
		);


		$this->add_control(
            'about_sub_heading_font_color',
            [
                'label' => __( 'Color', 'zylo-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .el-section-title .el-sub-heading' => 'color: {{VALUE}} !important',
                ]
            ]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'client_heading_typography',
				'selector' => '{{WRAPPER}} .el-section-title .el-sub-heading',
			]
		);

		$this->end_controls_section();

		/** heading typography **/
		$this->start_controls_section(
			'about_heading_style',
			[
				'label' => esc_html__( 'Heading Style', 'zylo-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_control(
            'about_heading_font_color',
            [
                'label' => __( 'Color', 'zylo-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .section-title' => 'color: {{VALUE}} !important',
                ]
            ]
        );
		// $this->add_group_control(
		// 	\Elementor\Group_Control_Typography::get_type(),
		// 	[
		// 		'name' => 'about_heading_typography',
		// 		'selector' => '{{WRAPPER}} .section-title',
		// 	]
		// );

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'about_heading_typography',
				'selector' => '{{WRAPPER}} .section-title',
			]
		);



		$this->end_controls_section();


		$this->start_controls_section(
			'about_desc_style',
			[
				'label' => esc_html__( 'Description Style', 'zylo-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
            'about_desc_font_color',
            [
                'label' => __( 'Description Color', 'zylo-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .white' => 'color: {{VALUE}};',
                ]
            ]
        );


		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'about_desc_typography',
				'selector' => '{{WRAPPER}} .white',
			]
		);

		$this->add_responsive_control(
			'banner_des_margin',
			[
				'label' => esc_html__( 'Margin', 'eyewell-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .white' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		

		$this->end_controls_section();


		$this->start_controls_section(
			'about_quotation_style',
			[
				'label' => esc_html__( 'Quotation Style', 'zylo-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		); 

		
		$this->add_control(
            'about_quote_font_color',
            [
                'label' => __( 'Author Quote Color', 'zylo-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .about-info-card.style-1 .quote' => 'color: {{VALUE}};',
                ]
            ]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'about_quote_typography',
				'selector' => '{{WRAPPER}} .about-info-card.style-1 .quote',
			]
		);

		$this->add_responsive_control(
			'about_quote_bg_color',
			[
				'label' => esc_html__( 'Quote Background Color', 'zylo-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about-info-card .about-info-content .quote::before' => 'background-color: {{VALUE}} !important',
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
				'{{WRAPPER}} .secandary-btn' => 'background: {{VALUE}} !important',
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




	}

	public function render() {
		$settings  = $this->get_settings_for_display();
		$list_items = $settings['list_items'];
		extract($settings);

		$this->add_render_attribute(
			[
				'link' => [
					'href'   => !empty($settings['link']['url']) ? esc_url($settings['link']['url']) : '#',
					'target' => !empty($settings['link']['is_external']) ? '_blank' : '_self'
				]
			], '', '', true
		);

		if( $chose_style == 'about-style-1' ): ?>

		<section class="about-area fix">
			<div class="about-style-1">
				<div class="shape">
					<div class="shape__1">
						<img src="<?php echo $settings['shape']['url']; ?>" alt="">
					</div>
				</div>
				<div class="container">
					<div class="about-content">
						<div class="row justify-content-between align-items-center">
							<div class="col-xl-3 col-lg-6">
								<div class="thumb wow img-custom-anim-left" data-wow-duration="1.5s" data-wow-delay="0.3s">
									<img class="w-img" src="<?php echo $settings['thumbnail']['url']; ?>" alt="img">
								</div>
							</div>
							<div class="col-xl-6 col-lg-6">
								<div class="section-content">
									<h6 class="subtitle wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.3s"><span><i class="fa-regular fa-arrow-right-long black"></i> </span><?php echo $settings['sub_heading']; ?></h6>
									<h2 class="section-title text-white wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s"><?php echo $settings['heading']; ?></h2>
									<p class="white wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.5s"><?php echo $settings['content']; ?></p>
									<div class="planning-list wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.6s">
										<ul>
										<?php foreach ($list_items as $item): ?>
											<li>
												<a class="d-flex" href="<?php echo $item['list_link']; ?>">
													<span>
														<svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
															<path d="M9.23033 18.2247C9.17727 18.2247 9.1248 18.2137 9.07619 18.1924C9.02759 18.1712 8.98391 18.1401 8.9479 18.1011L1.33302 9.86399C1.28226 9.80907 1.2486 9.74055 1.23618 9.6668C1.22376 9.59306 1.2331 9.51729 1.26307 9.44878C1.29304 9.38026 1.34233 9.32197 1.40491 9.28103C1.4675 9.2401 1.54066 9.2183 1.61544 9.21829H5.28083C5.33586 9.2183 5.39025 9.23011 5.44033 9.25293C5.49041 9.27575 5.53502 9.30904 5.57113 9.35056L8.11606 12.2784C8.3911 11.6905 8.92352 10.7116 9.85783 9.51872C11.2391 7.75526 13.8082 5.16176 18.2038 2.82052C18.2887 2.77528 18.3875 2.76354 18.4807 2.78762C18.5739 2.81169 18.6547 2.86984 18.7071 2.95057C18.7595 3.0313 18.7798 3.12875 18.7638 3.22368C18.7479 3.3186 18.697 3.4041 18.6211 3.46329C18.6043 3.47641 16.9095 4.81102 14.9591 7.2556C13.164 9.50522 10.7778 13.1837 9.60356 17.9325C9.58293 18.016 9.53496 18.0901 9.46729 18.1431C9.39962 18.196 9.31615 18.2248 9.23021 18.2248L9.23033 18.2247Z" fill="#C2A74E"/>
														</svg>
													</span>
													<?php echo $item['list_title']; ?>
												</a>
											</li>
										<?php endforeach; ?>
										</ul>
									</div>
									<div class="btn-box  wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.8s">
										<a class="secandary-btn" href="<?php echo $settings['btn_link']; ?>">
											<span>
												<svg xmlns="http://www.w3.org/2000/svg" width="36" height="16" viewBox="0 0 36 16" fill="none">
													<path d="M35.7071 8.70711C36.0976 8.31658 36.0976 7.68342 35.7071 7.29289L29.3431 0.928932C28.9526 0.538408 28.3195 0.538408 27.9289 0.928932C27.5384 1.31946 27.5384 1.95262 27.9289 2.34315L33.5858 8L27.9289 13.6569C27.5384 14.0474 27.5384 14.6805 27.9289 15.0711C28.3195 15.4616 28.9526 15.4616 29.3431 15.0711L35.7071 8.70711ZM0 9H35V7H0V9Z" fill="white"/>
												</svg>
											</span>
											<?php echo $settings['btn_text']; ?> 
										</a>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-6">
								<div class="thumb2">
									<img class="w-img" src="<?php echo $settings['thumb_2']['url']; ?>" alt="img">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php 
		elseif( $chose_style == 'about-style-2' ): ?>
			<div class="meta-box">
				<ul>
				<?php foreach ($list_items as $item): ?>
					<li>
						<a href="<?php echo $item['list_url']; ?>">
							<span>
								<img src="<?php echo $item['icon']['url']; ?>" alt="">
							</span>
							<?php echo $item['list_title_text']; ?>
						</a>
					</li>
				<?php endforeach; ?>
				</ul>
			</div>
		<?php 
		endif; ?>	
	<?php
	}
}