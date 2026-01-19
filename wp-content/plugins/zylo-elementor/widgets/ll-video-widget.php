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
class LuxelifeVideo extends \Elementor\Widget_Base {

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
		return 'luxelife-video';
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
		return __( 'LL Video Popup', 'zylo-elementor' );
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
		return 'eicon-video-playlist';
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
		return [ 'video' ];
	}

	public function get_script_depends() {
		return [ 'zylo-elementor'];
	}
	protected function register_controls() {

		$this->start_controls_section(
			'section_content_video',
			[
				'label' => esc_html__( 'Section Video', 'zylo-elementor' ),
			]
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'zylo-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'video-style-1'  => esc_html__( 'Video Style 1', 'zylo-elementor' ),
					'video-style-2' => esc_html__( 'Video Style 2', 'zylo-elementor' ),
				],
				'default'   => 'video-style-1',
			]
		);


		$this->add_control(
			'thumbnail',
			[
				'label'   => esc_html__( 'Video Thumbnail Image', 'zylo-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add Your About Image', 'zylo-elementor' ),
				'condition' => [
					'chose_style' => ['video-style-1']
				],
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'zylo-elementor' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'zylo-elementor' ),
				'show_external' => true,
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
				'label_block' => true,
			]
		);

		$this->end_controls_section();


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
			'show_thumbnail',
			[
				'label'   => esc_html__( 'Show Video Thumbnail', 'zylo-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);	

		$this->add_control(
			'show_heading',
			[
				'label'   => esc_html__( 'Show Link', 'zylo-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);		

		$this->add_control(
			'show_link',
			[
				'label'   => esc_html__( 'Show Link', 'zylo-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);	

		$this->add_control(
			'show_shape',
			[
				'label'   => esc_html__( 'Show Shape', 'zylo-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);		

		$this->end_controls_section();

		/** typography **/
		$this->start_controls_section(
			'heading_style',
			[
				'label' => esc_html__( 'Heading Style', 'zylo-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
            'heading_color',
            [
                'label' => __( 'Color', 'zylo-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .comment-respond.style-2 .comment-respond-wrapper .form-title' => 'color: {{VALUE}};',
                ]
            ]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'selector' => '{{WRAPPER}} .comment-respond.style-2 .comment-respond-wrapper .form-title',
			]
		);
		$this->end_controls_section();


		/** Start Button **/
	$this->start_controls_section(
		'banner_btn_style',
		[
			'label' => esc_html__( 'Button Style', 'zylo-elementor'),
			'tab' => Controls_Manager::TAB_STYLE,
			
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
			'name' => 'banner_btn_typography',
			'selector' => '{{WRAPPER}} .video-popup-area .video-popup-wrapper .comment-respond.style-2 .comment-respond-wrapper .single-input-field .btn',
		]
	);
	

	$this->add_responsive_control(
		'banner_btn_text_color',
		[
			'label' => esc_html__( 'Text Color', 'zylo-elementor' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .video-popup-area .video-popup-wrapper .comment-respond.style-2 .comment-respond-wrapper .single-input-field .btn' => 'color: {{VALUE}} !important',
			],
		]
	);
	
	$this->add_responsive_control(
		'banner_btn_bg_color',
		[
			'label' => esc_html__( 'Background Color', 'zylo-elementor' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .video-popup-area .video-popup-wrapper .comment-respond.style-2 .comment-respond-wrapper .single-input-field .btn' => 'background: {{VALUE}} !important',
			],
		]
	);
	
	$this->add_responsive_control(
		'banner_btn_margin',
		[
			'label' => esc_html__( 'Margin', 'zylo-elementor' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
			'selectors' => [
				'{{WRAPPER}} .video-popup-area .video-popup-wrapper .comment-respond.style-2 .comment-respond-wrapper .single-input-field .btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);
	
	$this->add_responsive_control(
		'banner_btn_padding',
		[
			'label' => esc_html__( 'Padding', 'zylo-elementor' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
			'selectors' => [
				'{{WRAPPER}} .video-popup-area .video-popup-wrapper .comment-respond.style-2 .comment-respond-wrapper .single-input-field .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);
	
	$this->add_group_control(
		Group_Control_Border::get_type(),
		[
			'name' => 'banner_btn_border_border',
			'selector' => '{{WRAPPER}} .video-popup-area .video-popup-wrapper .comment-respond.style-2 .comment-respond-wrapper .single-input-field .btn',
		]
	);
	
	$this->add_responsive_control(
		'banner_btn_border_radius',
		[
			'label' => esc_html__( 'Border Radius', 'zylo-elementor' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
			'selectors' => [
				'{{WRAPPER}} .video-popup-area .video-popup-wrapper .comment-respond.style-2 .comment-respond-wrapper .single-input-field .btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'label' => esc_html__( 'Color', 'zylo-elementor' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .video-popup-area .video-popup-wrapper .comment-respond.style-2 .comment-respond-wrapper .single-input-field .btn:hover' => 'color: {{VALUE}} !important',
			],
		]
	);

	$this->add_responsive_control(
		'banner_btn_bg_hover_color',
		[
			'label' => esc_html__( 'Background Color', 'zylo-elementor' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .video-popup-area .video-popup-wrapper .comment-respond.style-2 .comment-respond-wrapper .single-input-field .btn:hover' => 'background: {{VALUE}} !important',
			],
		]
	);



	$this->end_controls_tab();

	$this->end_controls_section();



	}

	public function render() {
		$settings  = $this->get_settings_for_display(); 
		extract($settings);
		
		$this->add_render_attribute(
			[
				'link' => [
					'href'   => $settings['link']['url'] ? esc_url($settings['link']['url']) : '#',
					'target' => $settings['link']['is_external'] ? '_blank' : '_self'
				]
			], '', '', true
		);

		if( $chose_style == 'video-style-1' ): ?>

		
		 <!-- my -->
		 <section class="work-area fix">
                <div class="work-style-1">
                    <div class="container-fluid 0">
                        <div class="row g-5">
                            <div class="col">
								<?php 
									if ( '' !== $settings['thumbnail']['url'] && ( $show_thumbnail ))  : 
									$thumbnail_image_src = wp_get_attachment_image_src( $settings['thumbnail']['id'], 'full' );
									$thumbnail_image = $thumbnail_image_src ? $thumbnail_image_src[0] : ''; 
								?>
                                <div class="thumb text-end wow img-custom-anim-left" data-wow-duration="1.5s" data-wow-delay="0.3s">
                                    <img class="w-img" src="<?php echo esc_url( $thumbnail_image ); ?>" alt="img">
									<?php 
									endif; ?>
									<?php 
									if (( '' !== $link['url'] ) && ( $show_link )) : ?>
                                    <div class="video-box">
                                        <a <?php echo $this->get_render_attribute_string( 'link' ); ?> class="video-icon video-popup">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="42" viewBox="0 0 21 42" fill="none">
                                                <path d="M19.3389 17.3121L3.67549 0.483309C3.6616 0.468044 3.64772 0.454046 3.63314 0.441314C2.14531 -0.857373 0.354011 1.11308 0.354004 4.1546V37.6311C0.354004 40.7293 2.19467 42.664 3.67549 41.3024C3.67549 41.3024 19.3104 24.5043 19.3389 24.4737C20.8051 22.8984 20.8022 18.8825 19.3389 17.3121Z" fill="#1C1A1D"/>
                                            </svg>
                                        </a>
                                    </div>
									<?php
									endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
		 <!-- my -->

        <?php 
        elseif ($chose_style == 'video-style-2'): ?>

        <?php 
    	endif; ?>
	<?php
	}

}