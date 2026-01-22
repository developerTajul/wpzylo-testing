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
class ZyloBlogPost extends \Elementor\Widget_Base {

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
		return 'zylo-blog-post';
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
		return __( 'Latest Blog Grid', 'zylo-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Crebiz Slider widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-posts-group';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Crebiz Slider widget belongs to.
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
		return [ 'blog-post' ];
	}

	public function get_script_depends() {
		return [ 'zylo-elementor'];
	}

    protected function register_controls()
    {

        $this->start_controls_section(
            'settings_section',
            [
                'label' => esc_html__('General Settings', 'zylo-toolkit'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $this->add_control('blog_grid', [
            'label' => esc_html__('Blog Grid', 'zylo-toolkit'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'col-lg-3' => esc_html__('col-lg-2', 'zylo-toolkit'),
                'col-lg-3' => esc_html__('col-lg-3', 'zylo-toolkit'),
                'col-lg-4' => esc_html__('col-lg-4', 'zylo-toolkit'),
                'col-lg-6' => esc_html__('col-lg-6', 'zylo-toolkit'),
                'col-lg-12' => esc_html__('col-lg-12', 'zylo-toolkit'),
            ),
            'default' => 'col-lg-4',
            'description' => esc_html__('Select Blog Grid', 'zylo-toolkit')
        ]);
        $this->add_control(
            'read_more',
            [
                'label' => esc_html__('Read More Show/Hide', 'zylo-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('show/hide description', 'zylo-toolkit'),
                'default' => 'yes',
            ]
        );
        $this->add_control('read-btn', [
            'label' => esc_html__('Read More', 'zylo-toolkit'),
            'type' => Controls_Manager::TEXT,
            'description' => esc_html__('enter read button text', 'zylo-toolkit'),
            'default' => esc_html__('Continue Reading', 'zylo-toolkit'),
            'condition' => ['read_more' => 'yes'],
        ]);
        $this->add_control(
            'read_more_arrow', [
                'label' => esc_html__('Read More Arrwo Image', 'zylo-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
                'description' => esc_html__('Upload Read More Arrwo Image', 'zylo-toolkit'),
            ]
        );
        $this->add_control('total', [
            'label' => esc_html__('Total Posts', 'zylo-toolkit'),
            'type' => Controls_Manager::TEXT,
            'default' => '-1',
            'description' => esc_html__('enter how many post you want in masonry , enter -1 for unlimited post.')
        ]);
        $this->add_control('order', [
            'label' => esc_html__('Order', 'zylo-toolkit'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'ASC' => esc_html__('Ascending', 'zylo-toolkit'),
                'DESC' => esc_html__('Descending', 'zylo-toolkit'),
            ),
            'default' => 'DESC',
            'description' => esc_html__('select order', 'zylo-toolkit')
        ]);
        $this->add_control('orderby', [
            'label' => esc_html__('OrderBy', 'zylo-toolkit'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'ID' => esc_html__('ID', 'zylo-toolkit'),
                'title' => esc_html__('Title', 'zylo-toolkit'),
                'date' => esc_html__('Date', 'zylo-toolkit'),
                'rand' => esc_html__('Random', 'zylo-toolkit'),
                'comment_count' => esc_html__('Most Comments', 'zylo-toolkit'),
            ),
            'default' => 'ID',
            'description' => esc_html__('select order', 'zylo-toolkit')
        ]);
        $this->add_control('excerpt_length', [
            'label' => esc_html__('Excerpt Length', 'zylo-toolkit'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                25 => esc_html__('Short', 'zylo-toolkit'),
                55 => esc_html__('Regular', 'zylo-toolkit'),
                100 => esc_html__('Long', 'zylo-toolkit'),
            ),
            'default' => 25,
            'description' => esc_html__('select excerpt length', 'zylo-toolkit')
        ]);
        
           $this->add_control(
            'image_thumb_display',
            [
                'label' => esc_html__('Image Display', 'zylo-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('show/hide description', 'zylo-toolkit'),
            ]
        );
        
        $this->add_control(
            'thumb_date',
            [
                'label' => esc_html__('Thumb Date Show/Hide', 'zylo-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('show/hide description', 'zylo-toolkit'),
            ]
        );
        $this->add_control(
            'details_date',
            [
                'label' => esc_html__('Details Date Show/Hide', 'zylo-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('show/hide description', 'zylo-toolkit'),
            ]
        );
        $this->add_control(
            'pagination',
            [
                'label' => esc_html__('Pagination', 'zylo-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes to show pagination.', 'zylo-toolkit'),
                'default' => 'yes'
            ]
        );
        
          $this->add_control(
            'category_display',
            [
                'label' => esc_html__('Category Display', 'zylo-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('Show  Or Hide Category.', 'zylo-toolkit'),
            ]
        );
        
        $this->add_control(
            'pagination_alignment',
            [
                'label' => esc_html__('Pagination Alignment', 'zylo-toolkit'),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'left' => esc_html__('Left Align', 'zylo-toolkit'),
                    'center' => esc_html__('Center Align', 'zylo-toolkit'),
                    'right' => esc_html__('Right Align', 'zylo-toolkit'),
                ),
                'description' => esc_html__('you can set pagination alignment.', 'zylo-toolkit'),
                'default' => 'left',
                'condition' => array('pagination' => 'yes')
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'author_styling_settings_section',
            [
                'label' => esc_html__('Author Style', 'zylo-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
				'separator_heading_1',
				[
					'type' => \Elementor\Controls_Manager::HEADING,
					'label' => __( 'Author Label Style', 'textdomain' ),
					'separator' => 'before',
				]
			);
        	$this->add_responsive_control(
				'color_5',
				[
					'label' => esc_html__( 'Author Label Color', 'eyewell-elementor' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .blog-style-1 .singleblog__meta span' => 'color: {{VALUE}} !important',
					],
				]
			);
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'typography_1',
                    'selector' => '{{WRAPPER}} .blog-style-1 .singleblog__meta span',
                ]
            );


            //  Atuhor Title Style

            $this->add_control(
				'separator_heading_2',
				[
					'type' => \Elementor\Controls_Manager::HEADING,
					'label' => __( 'Author Title Style', 'textdomain' ),
					'separator' => 'before',
				]
			);

        	$this->add_responsive_control(
				'color_2',
				[
					'label' => esc_html__( 'Author Title Color', 'eyewell-elementor' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .blog-style-1 .singleblog__meta span a' => 'color: {{VALUE}} !important',
					],
				]
			);
        	$this->add_responsive_control(
				'color_3',
				[
					'label' => esc_html__( 'Author Title Hover Color', 'eyewell-elementor' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .blog-style-1 .singleblog__meta span a:hover' => 'color: {{VALUE}} !important',
					],
				]
			);

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'typography_2',
                    'selector' => '{{WRAPPER}} .blog-style-1 .singleblog__meta span a',
                ]
            );

        $this->end_controls_section();



        //style tab start
        $this->start_controls_section(
            'title_styling_settings_section',
                [
                    'label' => esc_html__('Styling Settings', 'zylo-toolkit'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );
        $this->start_controls_tabs(
            'title_style_tabs'
        );

        $this->start_controls_tab(
            'title_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'zylo-toolkit'),
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'grid_item_border',
                'label' => esc_html__( 'Border', 'zylo-toolkit' ),
                'selector' => '{{WRAPPER}} .latest-blog-item',
            ]
        );
        
         $this->add_control('normal_post_wrapper_padding', [
            'label' => esc_html__('Grid Padding', 'zylo-toolkit'),
            'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'px', 'em', '%' ],
            'selectors' => [
                "{{WRAPPER}} .latest-blog-item" => "padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};",
            ]
        ]);
        
        $this->add_control(
            'image_height',
            [
                'label' => esc_html__('Image Height', 'zylo-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
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
                    '{{WRAPPER}} .latest-blog-item .latest-blog-item__thumb img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'image_radius',
            [
                'label' => esc_html__('Image Radius', 'zylo-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .latest-blog-item .latest-blog-item__thumb img' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control('normal_post_title_color', [
            'label' => esc_html__('Title Color', 'zylo-toolkit'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .blog-style-1 .singleblog__title" => "color: {{VALUE}}"
            ]
        ]);
         $this->add_control('normal_post_title_padding', [
            'label' => esc_html__('Title Padding', 'zylo-toolkit'),
            'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'px', 'em', '%' ],
            'selectors' => [
                "{{WRAPPER}} .latest-blog-item__content h6.latest-blog-item__title" => "padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};",
            ]
        ]);
        $this->add_control('normal_post_title_margin', [
            'label' => esc_html__('Title Margin', 'zylo-toolkit'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', 'em', '%' ],
            'selectors' => [
                "{{WRAPPER}} .latest-blog-item__content h6.latest-blog-item__title" =>  "margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};",
            ]
        ]);


        $this->add_control('normal_post_readmore_margin', [
            'label' => esc_html__('Read More Margin', 'zylo-toolkit'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', 'em', '%' ],
            'selectors' => [
                "{{WRAPPER}} .latest-blog-item__content a.latest-blog-item__btn" =>  "margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};",
            ]
        ]);


        $this->add_responsive_control(
            'content_padding',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__( 'Padding', 'zylo-toolkit' ),
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .latest-blog-item__content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'normal_post_content_padding',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__( 'content padding', 'zylo-toolkit' ),
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .latest-blog-item__content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'normal_post_content_margin',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__( 'content Margin', 'zylo-toolkit' ),
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .latest-blog-item__content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'title_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'zylo-toolkit'),
            ]
        );

        $this->add_control('hover_post_title_color', [
            'label' => esc_html__('Title Color', 'zylo-toolkit'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .latest-blog-item__content .text-inherit:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('normal_hover_background_color', [
            'label' => esc_html__('Background Color', 'zylo-toolkit'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .latest-blog-item" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();


        //Read More style
        $this->start_controls_section(
            'blog_readmore_styling_section',
                [
                    'label' => esc_html__('Read More Style', 'zylo-toolkit'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );

            //  Read More Style Start
            $this->add_control(
                'separator_heading_4',
                [
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'label' => __( 'Read More Icon Style', 'textdomain' ),
                    'separator' => 'before',
                ]
            );

        
            $this->add_responsive_control(
                'color_6',
                [
                    'label' => esc_html__( 'Icon Color', 'eyewell-elementor' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .singleblog__blogbtn a svg path' => 'fill: {{VALUE}} !important',
                    ],
                ]
            );
            $this->add_responsive_control(
                'color_7',
                [
                    'label' => esc_html__( 'Icon Hover Color', 'eyewell-elementor' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .singleblog__blogbtn:hover svg path' => 'fill: {{VALUE}} !important',
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
                        '{{WRAPPER}} .blog-style-1 .singleblog__blogbtn a svg' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );


            $this->add_control(
                'separator_heading_3',
                [
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'label' => __( 'Read More Title Style', 'textdomain' ),
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'typography_3',
                    'selector' => '{{WRAPPER}} .blog-style-1 .singleblog__blogbtn a',
                ]
            );

            $this->add_control(
                'normal_post_readmore_color', [
                'label' => esc_html__('Read More Color', 'zylo-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} .blog-style-1 .singleblog__blogbtn a" => "color: {{VALUE}}"
                ]
            ]);

            $this->add_control(
                'normal_post_readmore_color_2', [
                'label' => esc_html__('Read More Hover Color', 'zylo-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    "{{WRAPPER}} .blog-style-1 .singleblog__blogbtn a:hover" => "color: {{VALUE}}"
                ]
            ]);

            $this->add_responsive_control(
                'margin_1',
                [
                    'label' => esc_html__('Button Margin', 'zylo-elementor'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .singleblog__blogbtn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );


        $this->end_controls_section();



        //typography style
        $this->start_controls_section(
            'typography_settings_section',
            [
                'label' => esc_html__('Typography Settings', 'zylo-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'label' => esc_html__('Title Typography', 'zylo-toolkit'),
            'name' => 'post_meta_typography',
            'description' => esc_html__('select title typography', 'zylo-toolkit'),
            'selector' => "{{WRAPPER}} .latest-blog-item:hover .latest-blog-item__title"
        ]);
        $this->end_controls_section();

    }

    /**
     * Render Elementor widget output on the frontend.
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $rand_numb = rand(333, 999999999);
        //query settings
        $total_posts = $settings['total'];
        $order = $settings['order'];
        $orderby = $settings['orderby'];

        //other settings
        $pagination = $settings['pagination'] ? false : true;
        $pagination_alignment = $settings['pagination_alignment'];

        //setup query
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $total_posts,
            'order' => $order,
            'orderby' => $orderby,
            'post_status' => 'publish',
            'ignore_sticky_posts' => 1,
        );

        if (!empty($category)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => $category
                )
            );
        }
        $post_data = new \WP_Query($args);
        ?>
<section class="blog-area fix">
	<div class="blog-style-1">
		<div class="container-fluid">
            <div class="row">
                <?php while ($post_data->have_posts()):$post_data->the_post(); 
                    $featured_post_img = get_post_meta( get_the_ID(), 'featured_blog_image', true );
                    //image condition here
                    $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'zylo_grid_blog_12', false) : '';
                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                    $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                    $comments_count = get_comments_number(get_the_ID());
                    $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';
                    ?>                    

                    <div class="<?php echo esc_attr($settings['blog_grid']); ?> col-sm-6" data-delay="0.2">
						<div class="singleblog">

                        <?php
							if( $featured_post_img !== "" ): ?>
                                <div class="singleblog__thumb wow img-custom-anim-left" data-wow-duration="1.5s" data-wow-delay="0.4s">
								    <img class="w-img" src="<?php echo esc_url($featured_post_img); ?>" alt="img">
							    </div>
							<?php
							else: ?>
                                <div class="singleblog__thumb wow img-custom-anim-left" data-wow-duration="1.5s" data-wow-delay="0.4s">
								    <img class="w-img" src="<?php the_post_thumbnail_url('Zylo-featured-post-full'); ?>" alt="img">
							    </div>
							<?php
							endif; ?>

							<div class="singleblog__content">
								<div class="singleblog__meta">
									<span>By <?php the_author(); ?> .</span>
									<span><?php
                                        $category = get_the_category();
                                        if ( $category[0] ) {
                                            echo '<a href="' . get_category_link( $category[0]->term_id ) . '">' . $category[0]->cat_name . '</a>';
                                        }
                                    ?></span>
								</div>
								<h3 class="singleblog__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<div class="singleblog__blogbtn">
									<a href="<?php the_permalink(); ?>"><?php echo $settings['read-btn']; ?>
										<svg xmlns="http://www.w3.org/2000/svg" width="38" height="8" viewBox="0 0 38 8" fill="none">
											<path d="M37.3536 4.35355C37.5488 4.15829 37.5488 3.84171 37.3536 3.64645L34.1716 0.464466C33.9763 0.269204 33.6597 0.269204 33.4645 0.464466C33.2692 0.659728 33.2692 0.976311 33.4645 1.17157L36.2929 4L33.4645 6.82843C33.2692 7.02369 33.2692 7.34027 33.4645 7.53553C33.6597 7.7308 33.9763 7.7308 34.1716 7.53553L37.3536 4.35355ZM0 4.5H37V3.5H0V4.5Z" fill="#1C1A1D"/>
										</svg>
									</a>
								</div>
							</div>
						</div>
                    </div>

                <?php
                endwhile;
                wp_reset_query();
                ?>
            </div>
        </div>
    </div>
</section>
        <?php
    }
}