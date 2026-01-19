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
class ZyloPortfolio extends \Elementor\Widget_Base {

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
		return 'zylo-portfolio-post';
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
		return __( 'Portfolio', 'zylo-elementor' );
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
		return 'eicon-posts-grid';
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
		return [ 'portfolio' ];
	}

	public function get_script_depends() {
		return [ 'zylo-elementor'];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_content_portfolio_post',
			[
				'label' => esc_html__( 'Portfolio Post', 'zylo-elementor' ),
			]
		);

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
				'placeholder' => __( 'Type Content Words Number', 'zylo-elementor' ),
				'default'   => 30,				
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
			'service_link_text',
			[
				'label'       => esc_html__( 'Service Button Text', 'zylo-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Read More ', 'zylo-elementor' ),
				'placeholder' => esc_html__( 'Link Text', 'zylo-elementor' ),
				'label_block' => true
			]
		);		

		$this->add_control(
			'service_icon_name',
			[
				'label'       => esc_html__( 'Service btn Icon Name', 'zylo-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'fa-solid fa-angle-right', 'zylo-elementor' ),
				'placeholder' => esc_html__( 'icon name here', 'zylo-elementor' ),
				'label_block' => true
			]
		);

		$this->add_control(
			'service_btn_on',
			[
				'label'   => esc_html__( 'Service BTN Switch', 'zylo-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'service_icon_on',
			[
				'label'   => esc_html__( 'Service icon Switch', 'zylo-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'condition' => [
					'service_btn_on' => 'yes'
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

		/** Heading typography **/
		$this->start_controls_section(
			'portfolio_heading_style',
			[
				'label' => esc_html__( 'Heading Style', 'zylo-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_heading_typography',
				'selector' => '{{WRAPPER}} .item-link ul li a',
			]
		);
		
		$this->add_control(
			'portfolio_heading_color',
			[
				'label' => __( 'Color', 'zylo-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .item-link ul li a' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'portfolio_heading_hover_color',
			[
				'label' => __( 'Hover Color', 'zylo-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .item-link ul li a:hover' => 'color: {{VALUE}};',
				]
			]
		);

		$this->end_controls_section();
		/** Icon Color **/
		$this->start_controls_section(
			'portfolio_icon_bg_style',
			[
				'label' => esc_html__( 'Icon Background Style', 'zylo-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'portfolios_bg_icon_color',
			[
				'label' => __( 'Icon Bg Color', 'zylo-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .portfolio-style-1 .thumb a' => 'background-color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'portfolios_icon_bg_hover_color',
			[
				'label' => __( 'Icon Bg Hover Color', 'zylo-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .portfolio-style-1 .thumb a:hover' => 'background-color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'portfolios_icon_color',
			[
				'label' => __( 'Icon Color', 'zylo-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .portfolio-style-1 .thumb a svg path' => 'fill: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'portfolios_icon_hover_color',
			[
				'label' => __( 'Icon Hover Color', 'zylo-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .portfolio-style-1 .thumb a:hover svg path' => 'fill: {{VALUE}};',
				]
			]
		);

		$this->end_controls_section();

		/** content typography **/
		$this->start_controls_section(
			'portfolio_big_content_style',
			[
				'label' => esc_html__( 'Big Content Style', 'zylo-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_big_content_typography',
				'selector' => '{{WRAPPER}} .portfolio-style-1 .big-title',
			]
		);


		$this->add_control(
			'portfolio_big_content_color',
			[
				'label' => __( 'Color', 'zylo-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .portfolio-style-1 .big-title' => 'color: {{VALUE}};',
				]
			]
		);

		$this->end_controls_section();

		/** icon typography **/
		$this->start_controls_section(
			'portfolio_icon_style',
			[
				'label' => esc_html__( 'Icon Style', 'zylo-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'portfolio_link_style_tabs'
		);

		$this->start_controls_tab(
			'portfolio_link_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'textdomain' ),
			]
		);

		$this->add_responsive_control(
			'portfolio_icon_size',
			[
				'label' => __( 'Size', 'zylo-elementor' ),
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
					'{{WRAPPER}} .all-portfolios .portfolio-card-main-wrapper .portfolio-wrapper .portfolio-card .btn-wrapper a' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'portfolio_icon_color',
			[
				'label' => __( 'Color', 'zylo-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .all-portfolios .portfolio-card-main-wrapper .portfolio-wrapper .portfolio-card .btn-wrapper a' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'portfolio_icon_border_style',
				'selector' => '{{WRAPPER}} .all-portfolios .portfolio-card-main-wrapper .portfolio-wrapper .portfolio-card .btn-wrapper a',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'portfolio_icon_background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .all-portfolios .portfolio-card-main-wrapper .portfolio-wrapper .portfolio-card .btn-wrapper a',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'textdomain' ),
			]
		);

		$this->add_control(
			'portfolio_icon_hover_color',
			[
				'label' => __( 'Color', 'zylo-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .all-portfolios .portfolio-card-main-wrapper .portfolio-wrapper .portfolio-card:hover .btn-wrapper a' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'portfolio_icon_hover_border_style',
				'selector' => '{{WRAPPER}} .all-portfolios .portfolio-card-main-wrapper .portfolio-wrapper .portfolio-card:hover .btn-wrapper a',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'portfolio_icon_hover_background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .all-portfolios .portfolio-card-main-wrapper .portfolio-wrapper .portfolio-card:hover .btn-wrapper a',
			]
		);



		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();


	}

	public function render() {

		$settings  = $this->get_settings_for_display(); 
		extract( $settings );
		?>


			<section class="portfolio-area fix">
                <div class="portfolio-style-1">
				<?php 
				if( !empty($cat->term_id) ){
					$q = new \WP_Query(array(
						'post_type'     => 'zylo-portfolio',
						'posts_per_page'=> $post_number,
						'cat'=> $cat,
						'orderby' 		=> 'menu_order '.$orderby,
						'order'			=> $post_order,
						'tax_query' => array(
							array(
								'taxonomy' => 'portfolio_categories',
								'field'    => 'term_id',
								'terms'    => array( $term_id ),
								'operator' => 'IN',
							),
						),
					));
				
				}else{
					$q = new \WP_Query(array(
						'post_type'     => 'zylo-portfolio',
						'posts_per_page'=> $post_number,
						'cat'=> $cat,
						'orderby' 		=> 'menu_order '.$orderby,
						'order'			=> $post_order,
					));
				}
					
				if($q->have_posts()):
					$number = 1;
					while($q->have_posts()): $q->the_post(); 
					$featured_post_img = get_post_meta( get_the_ID(), 'portfolio_single_img', true );
					$tiny_content = get_post_meta(get_the_ID(), 'portfolio_tiny_content', true);
					$label_name = get_post_meta(get_the_ID(), 'portfolio_service_name_label', true);
					$active_class = $number == 1 ? 'active': '';
					global $post;
					$post_args = array(
							'post_type' => 'zylo-portfolio',
							'post_status' => 'publish'
							);
					$protfolio_posts = get_posts($post_args);   
					?>
                    <div class="container-fluid p-0">
                        <div class="row justify-content-between align-items-end">
                            <div class="col-xl-3 col-lg-3">
                                <div class="item-link wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.3s">
                                    <ul>
									
									<?php foreach ($protfolio_posts as $single_post): ?>
    									<li><a href="<?php echo get_permalink($single_post->ID); ?>" class="<?php if($single_post->ID == $post->ID ) echo 'wdm-current-post'; ?>"><?php echo $single_post->post_title; ?></a></li>
										<?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9">
                                <div class="thumb wow img-custom-anim-right" data-wow-duration="1.5s" data-wow-delay="0.3s">
										<img class="w-img" src="<?php the_post_thumbnail_url(); ?>" alt="img">
                                    <div class="icon-1 p-absolute">
                                        <a href="<?php the_permalink(); ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38" fill="none">
                                                <path d="M1.8125 18.9996C0.95 18.9996 0.25 19.6996 0.25 20.5621V36.1871C0.25 36.1902 0.25 36.1902 0.25 36.1934C0.25 36.3965 0.290625 36.5965 0.36875 36.784C0.44375 36.9684 0.55625 37.134 0.69375 37.2746C0.7 37.2809 0.7 37.2871 0.70625 37.2934C0.709375 37.2965 0.715625 37.2965 0.71875 37.3027C0.859375 37.4402 1.02813 37.5559 1.2125 37.6309C1.40625 37.709 1.60938 37.7496 1.8125 37.7496H17.4375C18.3 37.7496 19 37.0496 19 36.1871C19 35.3246 18.3 34.6246 17.4375 34.6246H5.58438L37.2938 2.91836C37.9031 2.30898 37.9031 1.31836 37.2938 0.708984C36.6844 0.0996094 35.6938 0.0996094 35.0844 0.708984L3.375 32.4152V20.5621C3.375 19.6996 2.675 18.9996 1.8125 18.9996Z" fill="#1C1A1D"/>
                                            </svg>
                                        </a>
                                    </div> 
                                    <div class="icon-2 p-absolute">
                                        <a href="<?php the_permalink(); ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38" fill="none">
                                                <path d="M36.1875 18.9996C37.05 18.9996 37.75 19.6996 37.75 20.5621V36.1871C37.75 36.1902 37.75 36.1902 37.75 36.1934C37.75 36.3965 37.7094 36.5965 37.6312 36.784C37.5562 36.9684 37.4438 37.134 37.3063 37.2746C37.3 37.2809 37.3 37.2871 37.2938 37.2934C37.2906 37.2965 37.2844 37.2965 37.2812 37.3027C37.1406 37.4402 36.9719 37.5559 36.7875 37.6309C36.5937 37.709 36.3906 37.7496 36.1875 37.7496H20.5625C19.7 37.7496 19 37.0496 19 36.1871C19 35.3246 19.7 34.6246 20.5625 34.6246H32.4156L0.70625 2.91836C0.0968747 2.30898 0.0968747 1.31836 0.70625 0.708984C1.31562 0.0996094 2.30625 0.0996094 2.91562 0.708984L34.625 32.4152V20.5621C34.625 19.6996 35.325 18.9996 36.1875 18.9996Z" fill="#1C1A1D"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.5s">
                            <div class="big-content">
                                <h2 class="big-title"><?php echo esc_html( $label_name ); ?></h2>
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
            </section>



	<?php
	}

}