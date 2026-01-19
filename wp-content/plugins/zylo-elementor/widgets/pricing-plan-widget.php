<?php
namespace LaundreElementor\Widget;

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
class LaundrePricingPlan extends \Elementor\Widget_Base {

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
		return 'laundre-pricing-plan';
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
		return __( 'Pricing Plan', 'zylo-elementor' );
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
		return [ 'about images' ];
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
					'about-style-3'  => esc_html__( 'About Style 3', 'zylo-elementor' ),
					'about-style-4'  => esc_html__( 'About Style 4', 'zylo-elementor' ),
				],
				'default'   => 'about-style-1',
			]
		);

		$this->add_control(
			'top_image',
			[
				'label'   => esc_html__( 'Top Image', 'zylo-elementor' ),
				'description' => esc_html__( 'Add Your Shape Image', 'zylo-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'dynamic' => [ 'active' => true ],
			]
		);

		$this->add_control(
			'right_image',
			[
				'label'   => esc_html__( 'Bottom Right Image', 'zylo-elementor' ),
				'description' => esc_html__( 'Add Your Bottom Image', 'zylo-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'dynamic' => [ 'active' => true ],
			]
		);

		$this->add_control(
			'shape_image',
			[
				'label'   => esc_html__( 'Shape Image', 'zylo-elementor' ),
				'description' => esc_html__( 'Add Your Shape Image', 'zylo-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'dynamic' => [ 'active' => true ],
				'condition' => [
					'chose_style' => ['about-style-4']
				],
			]
		);


		$this->end_controls_section();

			
		/** 
		*	award section 
		**/
		$this->start_controls_section(
			'section_award_layout',
			[
				'label' => esc_html__( 'Award Layout', 'zylo-elementor' ),
				'condition' => [
					'chose_style' => ['about-style-4']
				],
			]
		);
		$this->add_control(
			'icon_img',
			[
				'label'   => esc_html__( 'Icon Image', 'zylo-elementor' ),
				'description' => esc_html__( 'Add Your Icon Image', 'zylo-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'dynamic' => [ 'active' => true ],
			]
		);

        $this->add_control(
			'icon',
			[
				'label'       => __( 'Icon', 'zylo-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your number suffix', 'zylo-elementor' ),
				'default'     => __( 'fa-solid fa-mug-saucer', 'zylo-elementor' ),
				'label_block' => true
			]
		);

		$this->add_control(
			'number',
			[
				'label'       => __( 'Number', 'zylo-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your number', 'zylo-elementor' ),
				'default'     => __( '10', 'zylo-elementor' ),
				'label_block' => true
			]
		);

		$this->add_control(
			'number_suffix',
			[
				'label'       => __( 'Number Suffix', 'zylo-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your number suffix', 'zylo-elementor' ),
				'default'     => __( 'K+', 'zylo-elementor' ),
				'label_block' => true
			]
		);

		$this->add_control(
			'desc',
			[
				'label'       => __( 'Description', 'zylo-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your description', 'zylo-elementor' ),
				'default'     => __( 'It is Description', 'zylo-elementor' ),
				'label_block' => true
			]
		);

        
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


		$this->add_control(
			'show_icon_img',
			[
				'label'   => esc_html__( 'Show Icon Image', 'zylo-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);	

		$this->add_control(
			'show_icon',
			[
				'label'   => esc_html__( 'Show Icon', 'zylo-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => ''
			]
		);	

		$this->add_control(
			'show_number',
			[
				'label'   => esc_html__( 'Show Number', 'zylo-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);	
		$this->add_control(
			'show_number_suffix',
			[
				'label'   => esc_html__( 'Show Number Suffix', 'zylo-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);	

		$this->add_control(
			'show_desc',
			[
				'label'   => esc_html__( 'Show Description', 'zylo-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

		/** typography **/
		$this->start_controls_section(
			'feature_style',
			[
				'label' => esc_html__( 'Style', 'zylo-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
            'about_sub_heading_font_color',
            [
                'label' => __( 'Sub Heading Color', 'zylo-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .about-info-card .section-title .short-title' => 'color: {{VALUE}};',
                ]
            ]
        );

		$this->add_control(
			'about_sub_heading_font_size',
			[
				'label' => __( 'Sub Heading Font Size', 'zylo-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .about-info-card .section-title .short-title' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'about_sub_heading_line_height',
			[
				'label' => __( 'Sub Heading Line Height', 'zylo-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .about-info-card .section-title .short-title' => 'line-height: {{SIZE}};',
				],
			]
		);


		$this->add_control(
			'divider-104654',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
            'about_heading_font_color',
            [
                'label' => __( 'Heading Color', 'zylo-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .about-info-card .section-title .title' => 'color: {{VALUE}};',
                ]
            ]
        );
		$this->add_control(
            'about_heading_font_highlight_color',
            [
                'label' => __( 'Heading Highlight Color', 'zylo-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .about-info-card .section-title .title span' => 'color: {{VALUE}};',
                ]
            ]
        );

		$this->add_control(
			'about_heading_font_size',
			[
				'label' => __( 'Heading Font Size', 'zylo-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .about-info-card .section-title .title' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'about_heading_line_height',
			[
				'label' => __( 'Heading Line Height', 'zylo-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .about-info-card .section-title .title' => 'line-height: {{SIZE}};',
				],
			]
		);

		$this->add_control(
			'divider-5555',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
            'about_heading_tag_font_color',
            [
                'label' => __( 'Heading Bottom Text Color', 'zylo-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .about-info-card .sub-title p' => 'color: {{VALUE}};',
                ]
            ]
        );

		$this->add_control(
			'about_heading_tag_font_size',
			[
				'label' => __( 'Heading Bottom Text Font Size', 'zylo-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .about-info-card .sub-title p' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'about_heading_tag_line_height',
			[
				'label' => __( 'Heading Bottom Text Line Height', 'zylo-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .about-info-card .sub-title p' => 'line-height: {{SIZE}};',
				],
			]
		);

		$this->add_control(
			'divider-6598214',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
            'about_desc_font_color',
            [
                'label' => __( 'Description Color', 'zylo-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .about-info-card .text p.desc' => 'color: {{VALUE}};',
                ]
            ]
        );

		$this->add_control(
			'about_desc_font_size',
			[
				'label' => __( 'Description Font Size', 'zylo-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .about-info-card .text p.desc' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'about_desc_line_height',
			[
				'label' => __( 'Description Line Height', 'zylo-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .about-info-card .text p.desc' => 'line-height: {{SIZE}};',
				],
			]
		);

		$this->add_control(
			'divider-656598214',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
            'about_quote_font_color',
            [
                'label' => __( 'Author Quote Color', 'zylo-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .about-info-card .quote-text p' => 'color: {{VALUE}};',
                ]
            ]
        );

		$this->add_control(
			'about_quote_font_size',
			[
				'label' => __( 'Author Quote Font Size', 'zylo-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .about-info-card .quote-text p' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'about_quote_line_height',
			[
				'label' => __( 'Author Quote Line Height', 'zylo-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .about-info-card .quote-text p' => 'line-height: {{SIZE}};',
				],
			]
		);

		$this->add_control(
			'divider-65656598214',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
            'about_quote_name__font_color',
            [
                'label' => __( 'Author name Color', 'zylo-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .about-info-card .quote-text .quote-text-meta .name' => 'color: {{VALUE}};',
                ]
            ]
        );

		$this->add_control(
			'about_quote_name_font_size',
			[
				'label' => __( 'Author name Font Size', 'zylo-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .about-info-card .quote-text .quote-text-meta .name' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'about_quote_name_line_height',
			[
				'label' => __( 'Author name Line Height', 'zylo-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .about-info-card .quote-text .quote-text-meta .name' => 'line-height: {{SIZE}};',
				],
			]
		);

		$this->add_control(
			'divider-6655982141',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
            'about_quote_designation_font_color',
            [
                'label' => __( 'Designation Color', 'zylo-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .about-info-card .quote-text .quote-text-meta .designation' => 'color: {{VALUE}};',
                ]
            ]
        );

		$this->add_control(
			'about_quote_designation_font_size',
			[
				'label' => __( 'Designation Font Size', 'zylo-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .about-info-card .quote-text .quote-text-meta .designation' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'about_quote_designation_line_height',
			[
				'label' => __( 'Designation Line Height', 'zylo-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .about-info-card .quote-text .quote-text-meta .designation' => 'line-height: {{SIZE}};',
				],
			]
		);

		$this->add_control(
			'divider-6565698214',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
            'about_read_more_font_color',
            [
                'label' => __( 'Button Font Color', 'zylo-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .about-info-card .btn-wrapper a.theme-btn' => 'color: {{VALUE}};',
                ]
            ]
        );

		$this->add_control(
			'about_read_more_font_size',
			[
				'label' => __( 'Button Font Size', 'zylo-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .about-info-card .btn-wrapper a.theme-btn' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'about_read_more_line_height',
			[
				'label' => __( 'Button Line Height', 'zylo-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .about-info-card .btn-wrapper a.theme-btn' => 'line-height: {{SIZE}};',
				],
			]
		);

		$this->add_control(
			'divider-65656198214',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
            'about_icon_card_title_color',
            [
                'label' => __( 'Icon Card Title Color', 'zylo-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .about-info-content .icon-card-wrapper .icon-card .content .title' => 'color: {{VALUE}};',
                ]
            ]
        );

		$this->add_control(
			'about_icon_card_title_size',
			[
				'label' => __( 'Icon Card Title Font Size', 'zylo-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .about-info-content .icon-card-wrapper .icon-card .content .title' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'about_icon_card_title_line_height',
			[
				'label' => __( 'Icon Card Title Line Height', 'zylo-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .about-info-content .icon-card-wrapper .icon-card .content .title' => 'line-height: {{SIZE}};',
				],
			]
		);

		$this->add_control(
			'divider-656156198214',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
            'about_icon_card_des_color',
            [
                'label' => __( 'Icon Card Description Color', 'zylo-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .about-info-content .icon-card-wrapper .icon-card .content .desc' => 'color: {{VALUE}};',
                ]
            ]
        );

		$this->add_control(
			'about_icon_card_des_size',
			[
				'label' => __( 'Icon Card Description Font Size', 'zylo-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .about-info-content .icon-card-wrapper .icon-card .content .desc' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'about_icon_card_des_line_height',
			[
				'label' => __( 'Icon Card Description Line Height', 'zylo-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .about-info-content .icon-card-wrapper .icon-card .content .desc' => 'line-height: {{SIZE}};',
				],
			]
		);

		$this->add_control(
			'divider-65612356198214',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
            'about_progressbar_text_color',
            [
                'label' => __( 'Progressbar Text Color', 'zylo-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .about-info-content .skill-progressbar-wrapper .skill-title' => 'color: {{VALUE}};',
                ]
            ]
        );

		$this->add_control(
			'about_progressbar_text_size',
			[
				'label' => __( 'Progressbar Text Font Size', 'zylo-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .about-info-content .skill-progressbar-wrapper .skill-title' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'about_progressbar_text_line_height',
			[
				'label' => __( 'Progressbar Text Line Height', 'zylo-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .about-info-content .skill-progressbar-wrapper .skill-title' => 'line-height: {{SIZE}};',
				],
			]
		);

		$this->add_control(
			'divider-61561235126198214',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
            'about_promotional_phone_color',
            [
                'label' => __( 'Phone Font Color', 'zylo-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .promotional-bananer-content .content .text a' => 'color: {{VALUE}};',
                ]
            ]
        );

		$this->add_control(
			'about_promotional_phone_size',
			[
				'label' => __( 'Phone Font Size', 'zylo-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .promotional-bananer-content .content .text a' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'about_promotional_phone_line_height',
			[
				'label' => __( 'Phone Font Line Height', 'zylo-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .promotional-bananer-content .content .text a' => 'line-height: {{SIZE}};',
				],
			]
		);

		$this->add_control(
			'divider-61561275126198214',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
            'about_promotional_phone_info_color',
            [
                'label' => __( 'Phone Info Color', 'zylo-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .promotional-bananer-content .content span' => 'color: {{VALUE}};',
                ]
            ]
        );

		$this->add_control(
			'about_promotional_phone_info_size',
			[
				'label' => __( 'Phone Info Size', 'zylo-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .promotional-bananer-content .content span' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'about_promotional_phone_info_line_height',
			[
				'label' => __( 'Phone Info Line Height', 'zylo-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .promotional-bananer-content .content span' => 'line-height: {{SIZE}};',
				],
			]
		);

		$this->end_controls_section();

	}

	public function render() {
		$settings  = $this->get_settings_for_display();
		extract($settings);





		if( $chose_style == 'about-style-1' ): ?>

			<div class="main-img-inner">
				<?php 
				if ( '' !== $settings['top_image']['url'] )  : 
					$thumbnail_top_image_src = wp_get_attachment_image_src( $settings['top_image']['id'], 'full' );
					$thumbnail_top_image_url = $thumbnail_top_image_src ? $thumbnail_top_image_src[0] : ''; 
					?>
					<img class="tilt-animate" src="<?php echo esc_url($thumbnail_top_image_url); ?>" alt="about top img">
				<?php 
				endif; ?>
				<div class="top-image">
					<?php 
					if ( '' !== $settings['right_image']['url'] )  : 
						$thumbnail_right_image_src = wp_get_attachment_image_src( $settings['right_image']['id'], 'full' );
						$thumbnail_right_image_url = $thumbnail_right_image_src ? $thumbnail_right_image_src[0] : ''; 
						?>
						<img class="tilt-animate" src="<?php echo esc_url($thumbnail_right_image_url); ?>" alt="about card img">
					<?php 
					endif; ?>
				</div>
			</div>





		<?php 
		elseif( $chose_style == 'about-style-2' ): ?>
		
			<div class="about-image-card style-5">
				<div class="main-img-wrapper">
					<div class="main-img-inner box">
						<?php 
						if ( '' !== $settings['top_image']['url'] )  : 
							$thumbnail_top_image_src = wp_get_attachment_image_src( $settings['top_image']['id'], 'full' );
							$thumbnail_top_image_url = $thumbnail_top_image_src ? $thumbnail_top_image_src[0] : ''; 
							?>
							<img  src="<?php echo esc_url($thumbnail_top_image_url); ?>" alt="about top img">
						<?php 
						endif; ?>

						<div class="review-card">
							<div class="card-text">
								<span class="number"><span class="counter">25</span>+</span>
								<p class="number-text">Services we provide</p>
							</div>
						</div>
					</div>
				</div>
			</div>

		<?php 
		elseif( $chose_style == 'about-style-3' ): ?>	
			<div class="about-image-card style-3">
				<div class="main-img-wrapper">
					<div class="main-img-inner">
						<?php 
						if ( '' !== $settings['top_image']['url'] )  : 
							$thumbnail_top_image_src = wp_get_attachment_image_src( $settings['top_image']['id'], 'full' );
							$thumbnail_top_image_url = $thumbnail_top_image_src ? $thumbnail_top_image_src[0] : ''; 
							?>
							<img class="tilt-animate" src="<?php echo esc_url($thumbnail_top_image_url); ?>" alt="about top img">
						<?php 
						endif; ?>

						<div class="top-image">
							<?php 
							if ( '' !== $settings['right_image']['url'] )  : 
								$thumbnail_right_image_src = wp_get_attachment_image_src( $settings['right_image']['id'], 'full' );
								$thumbnail_right_image_url = $thumbnail_right_image_src ? $thumbnail_right_image_src[0] : ''; 
								?>
								<img src="<?php echo esc_url($thumbnail_right_image_url); ?>" alt="about card img">
							<?php 
							endif; ?>
						</div>
					</div>
				</div>
			</div>

			<?php 
			elseif( $chose_style == 'about-style-4' ): ?>

			<div class="about-image-card style-4">
                    <div class="main-img-wrapper">
                        <div class="main-img-inner">
							<?php 
							if ( '' !== $settings['right_image']['url'] )  : 
								$thumbnail_right_image_src = wp_get_attachment_image_src( $settings['right_image']['id'], 'full' );
								$thumbnail_right_image_url = $thumbnail_right_image_src ? $thumbnail_right_image_src[0] : ''; 
								?>
								<img src="<?php echo esc_url($thumbnail_right_image_url); ?>" alt="about card img">
							<?php 
							endif; ?>
                        </div>
                        <div class="top-img-wrapper box">

                            <div class="review-card">
                                <div class="icon-wrapper">
									<?php 
									if ( '' !== $icon_img['url'] && '' !== $show_icon_img)  : 
										$icon_image_src = wp_get_attachment_image_src( $settings['icon_img']['id'], 'full' );
										$icon_image_url = $icon_image_src ? $icon_image_src[0] : ''; 
										?>
										<div class="icon">
											<img src="<?php echo esc_url($icon_image_url); ?>" alt="image">
										</div>
									<?php 
									endif; ?>

									<?php
									if( '' !== $icon && '' !== $show_icon ): ?>
										<div class="icon">
											<i class="<?php echo esc_attr( $icon ); ?>"></i>
										</div>
									<?php
									endif; ?>

									<?php 
									if (( '' !== $number ) && ( $show_number )) : ?>
										<h2><?php echo wp_kses_post( $number ); ?>
											<?php
											if( '' !== $number_suffix && '' !== $show_number_suffix ): 
												echo wp_kses_post( $number_suffix ); 
											endif; ?>
										</h2>
									<?php 
									endif; ?>
                                </div>
                                <div class="card-text">
									<?php 
									if (( '' !== $desc ) && ( $show_desc )) : ?>
										<span><?php echo wp_kses_post( $desc ); ?></span>
									<?php
									endif; ?>
                                </div>
                            </div>

                            <div class="top-image">
								<?php 
								if ( '' !== $settings['top_image']['url'] )  : 
									$thumbnail_top_image_src = wp_get_attachment_image_src( $settings['top_image']['id'], 'full' );
									$thumbnail_top_image_url = $thumbnail_top_image_src ? $thumbnail_top_image_src[0] : ''; 
									?>
									<img src="<?php echo esc_url($thumbnail_top_image_url); ?>" alt="about top img">
								<?php 
								endif; ?>


                            </div>
                            <div class="top-image">
								<?php 
								if ( '' !== $settings['top_image']['url'] )  : 
									$thumbnail_top_image_src = wp_get_attachment_image_src( $settings['top_image']['id'], 'full' );
									$thumbnail_top_image_url = $thumbnail_top_image_src ? $thumbnail_top_image_src[0] : ''; 
									?>
									<img src="<?php echo esc_url($thumbnail_top_image_url); ?>" alt="about top img">
								<?php 
								endif; ?>


                            </div>
                        </div>
                        
                    </div>
                </div>
		<?php 
		endif; ?>	
	<?php
	}
}