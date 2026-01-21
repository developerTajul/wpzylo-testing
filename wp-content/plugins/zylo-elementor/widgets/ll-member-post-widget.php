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
class LuxelifeMemberPost extends \Elementor\Widget_Base {

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
		return 'zylo-member-post';
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
		return __( 'Post Members', 'zylo-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Luxelife Member widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-post-content';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Luxelife Member widget belongs to.
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
		return [ 'member-post' ];
	}

	public function get_script_depends() {
		return [ 'zylo-elementor'];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_content_heading',
			[
				'label' => esc_html__( 'Members Section', 'zylo-elementor' ),
			]
		);


		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'zylo-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'member-style-1'  => esc_html__( 'Member Style 1', 'zylo-elementor' ),
					'member-style-2' => esc_html__( 'Member Style 2', 'zylo-elementor' ),
					'member-style-3' => esc_html__( 'Member Style 3', 'zylo-elementor' ),
				],
				'default'   => 'member-style-1',
			]
		);
		$this->add_control('member_grid', [
            'label' => esc_html__('Member Grid', 'zylo-elementor'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'col-lg-3' => esc_html__('col-lg-2', 'zylo-elementor'),
                'col-lg-3' => esc_html__('col-lg-3', 'zylo-elementor'),
                'col-lg-4' => esc_html__('col-lg-4', 'zylo-elementor'),
                'col-lg-6' => esc_html__('col-lg-6', 'zylo-elementor'),
            ),
            'default' => 'col-lg-4',
            'description' => esc_html__('Select Case Study Grid', 'zylo-elementor')
        ]);
		$this->add_control(
			'heading_word_count',
			[
				'label'       => __( 'Heading Word Count', 'zylo-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type Heading Words Number', 'zylo-elementor' ),
				'default'   => 7,				
			]
		);

		$this->add_control(
			'content_word_count',
			[
				'label'       => __( 'Content Word Count', 'zylo-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type Heading Words Number', 'zylo-elementor' ),
				'default'   => 15,				
			]
		);

		$this->add_control(
			'post_number',
			[
				'label'     => esc_html__( 'Post Count', 'zylo-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'1'  => esc_html__( '1', 'zylo-elementor' ),
					'2'  => esc_html__( '2', 'zylo-elementor' ),
					'3'  => esc_html__( '3', 'zylo-elementor' ),
					'4'  => esc_html__( '4', 'zylo-elementor' ),
					'5'  => esc_html__( '5', 'zylo-elementor' ),
					'6' => esc_html__( '6', 'zylo-elementor' ),
					'7' => esc_html__( '7', 'zylo-elementor' ),
					'8' => esc_html__( '8', 'zylo-elementor' ),
					'9' => esc_html__( '9', 'zylo-elementor' ),
					'10' => esc_html__( '10', 'zylo-elementor' ),
					'-1' => esc_html__( 'Show All', 'zylo-elementor' ),
				],
				'default'   => '3',
			]
		);

		$this->add_control(
			'orderby',
			[
				'label'     => esc_html__( 'Order By', 'zylo-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'ID'  => esc_html__( 'Post ID', 'zylo-elementor' ),
					'title'  => esc_html__( 'Title', 'zylo-elementor' ),
					'date' => esc_html__( 'Date', 'zylo-elementor' ),
					'modified' => esc_html__( 'Last Modified Date', 'zylo-elementor' ),
					'rand' => esc_html__( 'Random Order', 'zylo-elementor' ),
					'comment_count' => esc_html__( 'Popular Post', 'zylo-elementor' ),
				],
				'default'   => 'ID',
			]
		);
		
		$this->add_control(
			'post_order',
			[
				'label'     => esc_html__( 'Post Order', 'zylo-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'asc'  => esc_html__( 'ASC', 'zylo-elementor' ),
					'desc' => esc_html__( 'DESC', 'zylo-elementor' ),
				],
				'default'   => 'desc',
			]
		);

		$this->add_control(
			'cat',
			[
				'label'       => __( 'Category Slug', 'zylo-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Category Slug', 'zylo-elementor' ),
				'label_block' => true,				
			]
		);

		$this->add_control(
			'member_link_text',
			[
				'label'       => esc_html__( 'Member Button Text', 'zylo-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Read More ', 'zylo-elementor' ),
				'placeholder' => esc_html__( 'Link Text', 'zylo-elementor' ),
				'label_block' => true
			]
		);		

		$this->add_control(
			'member_icon_name',
			[
				'label'       => esc_html__( 'Member btn Icon Name', 'zylo-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'fa-solid fa-angle-right', 'zylo-elementor' ),
				'placeholder' => esc_html__( 'icon name here', 'zylo-elementor' ),
				'label_block' => true
			]
		);

		$this->add_control(
			'member_btn_on',
			[
				'label'   => esc_html__( 'Member BTN Switch', 'zylo-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'member_icon_on',
			[
				'label'   => esc_html__( 'Member icon Switch', 'zylo-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'condition' => [
					'member_btn_on' => 'yes'
				],
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

	
		$this->end_controls_section();
		
		/** Icon Section Start **/
		$this->start_controls_section(
			'member_icon_style',
				[
					'label' => esc_html__( 'Icon Style', 'zylo-elementor' ),
					'tab' => Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_responsive_control(
				'color_1',
				[
					'label' => esc_html__( 'Icon Color', 'zylo-elementor' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .singleitem__iconbox svg path' => 'stroke: {{VALUE}}',
					],
				]
			);
			$this->add_responsive_control(
				'color_2',
				[
					'label' => esc_html__( 'Icon Hover Color', 'zylo-elementor' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .singleitem__iconbox a:hover svg path' => 'stroke: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control(
                'width_2',
                [
                    'label' => __( 'Icon Size', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'vw' ],
                    'range' => [
                        'px' => [ 'min' => 0, 'max' => 2000 ],
                        '%'  => [ 'min' => 0, 'max' => 100 ],
                        'vw' => [ 'min' => 0, 'max' => 100 ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .singleitem__iconbox svg' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

			$this->add_responsive_control(
				'top_offset_1',
				[
					'label' => __( 'Top Offset', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [ 'min' => -200, 'max' => 200 ],
						'%'  => [ 'min' => -100, 'max' => 100 ],
					],
					'selectors' => [
						'{{WRAPPER}} .team-style-1 .singleitem__iconbox' => 'top: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'right_offset_1',
				[
					'label' => __( 'Right Offset', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [ 'min' => -200, 'max' => 200 ],
						'%'  => [ 'min' => -100, 'max' => 100 ],
					],
					'selectors' => [
						'{{WRAPPER}} .team-style-1 .singleitem__iconbox' => 'right: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
                'width_1',
                [
                    'label' => __( 'Icon Width', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'vw' ],
                    'range' => [
                        'px' => [ 'min' => 0, 'max' => 2000 ],
                        '%'  => [ 'min' => 0, 'max' => 100 ],
                        'vw' => [ 'min' => 0, 'max' => 100 ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .team-style-1 .singleitem__iconbox a' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
			$this->add_responsive_control(
                'height_1',
                [
                    'label' => __( 'Icon Height', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'vw' ],
                    'range' => [
                        'px' => [ 'min' => 0, 'max' => 2000 ],
                        '%'  => [ 'min' => 0, 'max' => 100 ],
                        'vw' => [ 'min' => 0, 'max' => 100 ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .team-style-1 .singleitem__iconbox a' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

			$this->add_responsive_control(
				'border_color_1',
				[
					'label' => __( 'Icon Border Color', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .team-style-1 .singleitem__iconbox a' => 'border-color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'background_1',
				[
					'label' => esc_html__( 'Icon Background Color', 'zylo-elementor' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .team-style-1 .singleitem__iconbox a' => 'background-color: {{VALUE}} !important',
					],
				]
			);

		$this->end_controls_section();


		/** Heading Style **/
		$this->start_controls_section(
			'member_style_heading',
				[
					'label' => esc_html__( 'Member Heading Style', 'zylo-elementor' ),
					'tab' => Controls_Manager::TAB_STYLE,
				]
			);

	
			$this->add_control(
				'member_post_heading_font_color',
				[
					'label' => __( 'Heading Color', 'zylo-elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .team-style-1 .singleitem .singleitem__content .title a' => 'color: {{VALUE}};',
					]
				]
			);
			$this->add_control(
				'member_post_heading_font_color_2',
				[
					'label' => __( 'Heading Hover Color', 'zylo-elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .team-style-1 .singleitem:hover .singleitem__content .title a' => 'color: {{VALUE}};',
					]
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'heading_typography',
					'selector' => '{{WRAPPER}} .team-style-1 .singleitem__content .title',
				]
			);

		$this->end_controls_section();


		

			
	
		$this->start_controls_section(
			'member_style_desc',
				[
					'label' => esc_html__( 'Member Designation', 'zylo-elementor' ),
					'tab' => Controls_Manager::TAB_STYLE,
				]
			);

		$this->add_control(
			'member_desc_font_color',
			[
				'label' => __( 'Designation Color', 'zylo-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .team-style-1 .singleitem__content span' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'member_desc_font_color_2',
			[
				'label' => __( 'Designation Hover Color', 'zylo-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .team-style-1 .singleitem:hover .singleitem__content span' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'member_desc_typography',
				'selector' => '{{WRAPPER}} .team-style-1 .singleitem__content span',
			]
		);

		$this->end_controls_section();

		
		//  Team Member Social Info Style
		$this->start_controls_section(
			'member_social_info',
				[
					'label' => esc_html__( 'Member Social Info', 'zylo-elementor' ),
					'tab' => Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_1',
					'selector' => '{{WRAPPER}} .team-style-1 .singleitem__social a',
				]
			);

			$this->add_control(
				'color_3',
				[
					'label' => __( 'Sicial Icon Color', 'zylo-elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .team-style-1 .singleitem__social a' => 'color: {{VALUE}};',
					]
				]
			);

			$this->add_responsive_control(
				'background_2',
				[
					'label' => esc_html__( 'Icon Background Color', 'zylo-elementor' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .team-style-1 .singleitem__social a' => 'background-color: {{VALUE}} !important',
					],
				]
			);

			$this->add_responsive_control(
                'width_3',
                [
                    'label' => __( 'Social Icon Width', 'textdomain' ),
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
			$this->add_responsive_control(
                'height_3',
                [
                    'label' => __( 'Social Icon Height', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'vw' ],
                    'range' => [
                        'px' => [ 'min' => 0, 'max' => 2000 ],
                        '%'  => [ 'min' => 0, 'max' => 100 ],
                        'vw' => [ 'min' => 0, 'max' => 100 ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .team-style-1 .singleitem__social a' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
			$this->add_responsive_control(
                'line_height_3',
                [
                    'label' => __( 'Social Icon Line Height', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'vw' ],
                    'range' => [
                        'px' => [ 'min' => 0, 'max' => 2000 ],
                        '%'  => [ 'min' => 0, 'max' => 100 ],
                        'vw' => [ 'min' => 0, 'max' => 100 ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .team-style-1 .singleitem__social a' => 'line-height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

			$this->add_responsive_control(
                'margin_1',
                [
                    'label' => esc_html__('Margin', 'zylo-elementor'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .team-style-1 .singleitem__social a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

		$this->end_controls_section();



		$this->start_controls_section(
			'member_style_link',
			[
				'label' => esc_html__( 'Member Link', 'zylo-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'member_desc_link_color',
			[
				'label' => __( 'Link Color', 'zylo-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .info-card.style-2 .read-more a' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'member_link_typography',
				'selector' => '{{WRAPPER}} .info-card.style-2 .read-more a',
			]
		);

		$this->end_controls_section();



	}

	public function render() {

		$settings  = $this->get_settings_for_display(); 
		extract( $settings );
		

		$cat = get_term_by('name', $cat, 'member_categories');
		if( !empty($cat->term_id) ){
			$term_id = $cat->term_id;
		}
 
		if( $chose_style == 'member-style-1' ): 
		?>





<section class="team-area fix">
    <div class="team-style-1">
		<div class="lines">
			<span class="line line-1"></span>
			<span class="line line-2"></span>
			<span class="line line-3"></span>
			<span class="line line-4"></span>
		</div>
		<div class="container-fluid">
	        <div class="row">
		<?php 
		if( !empty($cat->term_id) ){
			$q = new \WP_Query(array(
				'post_type'     => 'zylo-member',
				'posts_per_page'=> $post_number,
				'orderby' 		=> 'menu_order '.$orderby,
				'order'			=> $post_order,
				'tax_query' => array(
					array(
						'taxonomy' => 'member_categories',
						'field'    => 'term_id',
						'terms'    => array( $term_id ),
						'operator' => 'IN',
					),
				),
			));
		
		}else{
			$q = new \WP_Query(array(
				'post_type'     => 'zylo-member',
				'posts_per_page'=> $post_number,
				'orderby' 		=> 'menu_order '.$orderby,
				'order'			=> $post_order,
			));
		}
			
		if($q->have_posts()):
			$number = 1;
			while($q->have_posts()): $q->the_post(); 
				$featured_post_img = get_post_meta( get_the_ID(), 'member_single_img', true );
				$icon_thumb = get_post_meta(get_the_ID(), 'member_icon_image', true);
				$member_designation = get_post_meta( get_the_ID(), 'member_designation', true );
				$tiny_content = get_post_meta(get_the_ID(), 'member_tiny_text', true);
				$social_icons = get_post_meta(get_the_ID(), 'social_profiles_repeat_group', true);
			?>
			

			

			 <div class="col-xl-4 col-md-6 wow fadeInUp"  data-wow-duration="1.5s" data-wow-delay="0.3s">
				<div class="singleitem active-hover">
					<div class="singleitem__bg">
						<?php
							if( $featured_post_img !== "" ): ?>
							<div class="singleitem__thumb">
								<img src="<?php echo esc_url($featured_post_img); ?>" alt="img">
							</div>
								<?php
								else: ?>
							<div class="singleitem__thumb">
								<img src="<?php the_post_thumbnail_url(); ?>" alt="img">
							</div>
							<?php
							endif; ?>
						<div class="singleitem__social">
						<a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f"></i></a>
						<a href="https://x.com/?lang=en&mx=2"><i class="fa-brands fa-twitter"></i></a>
						<a href="https://www.linkedin.com/"><i class="fa-brands fa-linkedin-in"></i></a>
						<a href="https://www.pinterest.com/"><i class="fa-brands fa-pinterest-p"></i></a>
						</div>
						<svg xmlns="http://www.w3.org/2000/svg" width="450" height="423" viewBox="0 0 450 423" fill="none">
							<mask id="path-1-inside-1_4546_41" fill="white">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M321 30C321 13.4315 307.569 0 291 0H30C13.4315 0 0 13.4314 0 30V393C0 409.569 13.4315 423 30 423H420C436.569 423 450 409.569 450 393V159C450 142.431 436.569 129 420 129H351C334.431 129 321 115.569 321 99V30Z"/>
							</mask>
							<path fill-rule="evenodd" clip-rule="evenodd" d="M321 30C321 13.4315 307.569 0 291 0H30C13.4315 0 0 13.4314 0 30V393C0 409.569 13.4315 423 30 423H420C436.569 423 450 409.569 450 393V159C450 142.431 436.569 129 420 129H351C334.431 129 321 115.569 321 99V30Z" fill="white"/>
							<path d="M30 1H291V-1H30V1ZM1 393V30H-1V393H1ZM420 422H30V424H420V422ZM449 159V393H451V159H449ZM420 128H351V130H420V128ZM322 99V30H320V99H322ZM351 128C334.984 128 322 115.016 322 99H320C320 116.121 333.879 130 351 130V128ZM451 159C451 141.879 437.121 128 420 128V130C436.016 130 449 142.984 449 159H451ZM420 424C437.121 424 451 410.121 451 393H449C449 409.016 436.016 422 420 422V424ZM-1 393C-1 410.121 12.8792 424 30 424V422C13.9837 422 1 409.016 1 393H-1ZM291 1C307.016 1 320 13.9837 320 30H322C322 12.8792 308.121 -1 291 -1V1ZM30 -1C12.8792 -1 -1 12.8792 -1 30H1C1 13.9837 13.9837 1 30 1V-1Z" fill="#C7C9CA" mask="url(#path-1-inside-1_4546_41)"/>
						</svg>
						<div class="singleitem__content">
							<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<span><?php echo $member_designation; ?></span>
						</div>
					</div>
					<div class="singleitem__iconbox">
						<a href="<?php the_permalink(); ?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="66" height="51" viewBox="0 0 66 51" fill="none">
								<path d="M50.7755 24.7694L51.0879 23.6034L50.0425 24.2069L6.19287 49.5236L1.29936 41.0478L45.149 15.7311L46.1944 15.1276L45.0284 14.8152L27.356 10.0799L29.889 0.626365L64.8656 9.9983L55.4937 44.9749L46.0402 42.4419L50.7755 24.7694Z" stroke="#C7C9CA"/>
							</svg>
						</a>
					</div>
				</div>
			</div>
			  <!-- new -->
			<?php 
			$number++;
			endwhile; 
			wp_reset_postdata(); 
		endif; 
		?>
		</div>
	  </div>
	</div>
  </section>
  <!-- Feature Area End !-->





        <?php 
		elseif( $chose_style == 'member-style-2' ): ?>
		<section class="team-area  fix">
			<div class="team-style-1 team-style-2 bg__color2">
				<div class="container-fluid">
					<div class="row g-5">
					<?php 
						if( !empty($cat->term_id) ){
							$q = new \WP_Query(array(
								'post_type'     => 'zylo-member',
								'posts_per_page'=> $post_number,
								'orderby' 		=> 'menu_order '.$orderby,
								'order'			=> $post_order,
								'tax_query' => array(
									array(
										'taxonomy' => 'member_categories',
										'field'    => 'term_id',
										'terms'    => array( $term_id ),
										'operator' => 'IN',
									),
								),
							));
						
						}else{
							$q = new \WP_Query(array(
								'post_type'     => 'zylo-member',
								'posts_per_page'=> $post_number,
								'orderby' 		=> 'menu_order '.$orderby,
								'order'			=> $post_order,
							));
						}
							
						if($q->have_posts()):
							$number = 1;
							while($q->have_posts()): $q->the_post(); 
								$featured_post_img = get_post_meta( get_the_ID(), 'member_single_img', true );
								$icon_thumb = get_post_meta(get_the_ID(), 'member_icon_image', true);
								$member_designation = get_post_meta( get_the_ID(), 'member_designation', true );
								$tiny_content = get_post_meta(get_the_ID(), 'member_tiny_text', true);
								$social_icons = get_post_meta(get_the_ID(), 'social_profile_icon', true);
							?>
						<div class="col-xl-4 col-md-6 wow fadeInUp"  data-wow-duration="1.5s" data-wow-delay="0.3s">
							<div class="singleitems active-hover">
								<div class="singleitems__bg">
									<?php
									if( $featured_post_img !== "" ): ?>
									<div class="singleitems__thumb">
										<img src="<?php echo esc_url($featured_post_img); ?>" alt="img">
									</div>
										<?php
										else: ?>
									<div class="singleitem__thumb">
										<img src="<?php the_post_thumbnail_url(); ?>" alt="img">
									</div>
									<?php
									endif; ?>
									<div class="singleitems__social">
										<a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f"></i></a>
										<a href="https://x.com/?lang=en&mx=2"><i class="fa-brands fa-twitter"></i></a>
										<a href="https://www.linkedin.com/"><i class="fa-brands fa-linkedin-in"></i></a>
										<a href="https://www.pinterest.com/"><i class="fa-brands fa-pinterest-p"></i></a>
									</div>
									<svg xmlns="http://www.w3.org/2000/svg" width="450" height="423" viewBox="0 0 450 423" fill="none">
										<mask id="path-1-inside-1_4586_3941" fill="white">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M321 30C321 13.4315 307.569 0 291 0H30C13.4315 0 0 13.4314 0 30V393C0 409.569 13.4315 423 30 423H420C436.569 423 450 409.569 450 393V159C450 142.431 436.569 129 420 129H351C334.431 129 321 115.569 321 99V30Z"/>
										</mask>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M321 30C321 13.4315 307.569 0 291 0H30C13.4315 0 0 13.4314 0 30V393C0 409.569 13.4315 423 30 423H420C436.569 423 450 409.569 450 393V159C450 142.431 436.569 129 420 129H351C334.431 129 321 115.569 321 99V30Z" fill="#292829"/>
										<path d="M30 1H291V-1H30V1ZM1 393V30H-1V393H1ZM420 422H30V424H420V422ZM449 159V393H451V159H449ZM420 128H351V130H420V128ZM322 99V30H320V99H322ZM351 128C334.984 128 322 115.016 322 99H320C320 116.121 333.879 130 351 130V128ZM451 159C451 141.879 437.121 128 420 128V130C436.016 130 449 142.984 449 159H451ZM420 424C437.121 424 451 410.121 451 393H449C449 409.016 436.016 422 420 422V424ZM-1 393C-1 410.121 12.8792 424 30 424V422C13.9837 422 1 409.016 1 393H-1ZM291 1C307.016 1 320 13.9837 320 30H322C322 12.8792 308.121 -1 291 -1V1ZM30 -1C12.8792 -1 -1 12.8792 -1 30H1C1 13.9837 13.9837 1 30 1V-1Z" fill="#C7C9CA" fill-opacity="0.1" mask="url(#path-1-inside-1_4586_3941)"/>
									</svg>
									<div class="singleitems__content">
										<h3 class="title text-white"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										<span><?php echo $member_designation; ?></span>
									</div>
								</div>
								<div class="singleitems__iconbox">
									<a href="team-details.html">
										<svg xmlns="http://www.w3.org/2000/svg" width="66" height="51" viewBox="0 0 66 51" fill="none">
											<path d="M50.7755 24.7694L51.0879 23.6034L50.0425 24.2069L6.19287 49.5236L1.29936 41.0478L45.149 15.7311L46.1944 15.1276L45.0284 14.8152L27.356 10.0799L29.889 0.626365L64.8656 9.9983L55.4937 44.9749L46.0402 42.4419L50.7755 24.7694Z" stroke="#C7C9CA"/>
										</svg>
									</a>
								</div>
							</div>
						</div>
						<?php 
							$number++;
							endwhile; 
							wp_reset_postdata(); 
						endif; 
						?>
					</div>
				</div>
			</div>
		</section>
		
        <?php 
		elseif( $chose_style == 'member-style-3' ): ?>

		<?php 
		endif; ?>	
	<?php
	}
}