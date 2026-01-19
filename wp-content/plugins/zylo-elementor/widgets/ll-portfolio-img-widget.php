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
class ZyloPortfolio_Img extends \Elementor\Widget_Base {

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
		return 'zylo-portfolio-img-post';
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
		return __( 'Portfolio Image', 'Zylo-elementor' );
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
		return [ 'Zylo-elementor' ];
	}

	public function get_keywords() {
		return [ 'portfolio' ];
	}

	public function get_script_depends() {
		return [ 'Zylo-elementor'];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_content_portfolio_post',
			[
				'label' => esc_html__( 'Portfolio Post', 'Zylo-elementor' ),
			]
		);

		$this->add_control(
			'heading_word_count',
			[
				'label'       => __( 'Heading Word Count', 'Zylo-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type Heading Words Number', 'Zylo-elementor' ),
				'default'   => 7,				
			]
		);

		$this->add_control(
			'content_word_count',
			[
				'label'       => __( 'Content Word Count', 'Zylo-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type Content Words Number', 'Zylo-elementor' ),
				'default'   => 30,				
			]
		);

		$this->add_control(
			'post_number',
			[
				'label'     => esc_html__( 'Post Count', 'Zylo-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'1'  => esc_html__( '1', 'Zylo-elementor' ),
					'2'  => esc_html__( '2', 'Zylo-elementor' ),
					'3'  => esc_html__( '3', 'Zylo-elementor' ),
					'4'  => esc_html__( '4', 'Zylo-elementor' ),
					'5'  => esc_html__( '5', 'Zylo-elementor' ),
					'6' => esc_html__( '6', 'Zylo-elementor' ),
					'7' => esc_html__( '7', 'Zylo-elementor' ),
					'8' => esc_html__( '8', 'Zylo-elementor' ),
					'9' => esc_html__( '9', 'Zylo-elementor' ),
					'10' => esc_html__( '10', 'Zylo-elementor' ),
					'-1' => esc_html__( 'Show All', 'Zylo-elementor' ),
				],
				'default'   => '3',
			]
		);

		$this->add_control(
			'orderby',
			[
				'label'     => esc_html__( 'Order By', 'Zylo-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'ID'  => esc_html__( 'Post ID', 'Zylo-elementor' ),
					'title'  => esc_html__( 'Title', 'Zylo-elementor' ),
					'date' => esc_html__( 'Date', 'Zylo-elementor' ),
					'modified' => esc_html__( 'Last Modified Date', 'Zylo-elementor' ),
					'rand' => esc_html__( 'Random Order', 'Zylo-elementor' ),
					'comment_count' => esc_html__( 'Popular Post', 'Zylo-elementor' ),
				],
				'default'   => 'ID',
			]
		);
		
		$this->add_control(
			'post_order',
			[
				'label'     => esc_html__( 'Post Order', 'Zylo-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'asc'  => esc_html__( 'ASC', 'Zylo-elementor' ),
					'desc' => esc_html__( 'DESC', 'Zylo-elementor' ),
				],
				'default'   => 'desc',
			]
		);

		$this->add_control(
			'cat',
			[
				'label'       => __( 'Category Slug', 'Zylo-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Category Slug', 'Zylo-elementor' ),
				'label_block' => true,				
			]
		);

		$this->add_control(
			'service_link_text',
			[
				'label'       => esc_html__( 'Service Button Text', 'Zylo-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Read More ', 'Zylo-elementor' ),
				'placeholder' => esc_html__( 'Link Text', 'Zylo-elementor' ),
				'label_block' => true
			]
		);		

		$this->add_control(
			'service_icon_name',
			[
				'label'       => esc_html__( 'Service btn Icon Name', 'Zylo-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'fa-solid fa-angle-right', 'Zylo-elementor' ),
				'placeholder' => esc_html__( 'icon name here', 'Zylo-elementor' ),
				'label_block' => true
			]
		);

		$this->add_control(
			'service_btn_on',
			[
				'label'   => esc_html__( 'Service BTN Switch', 'Zylo-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'service_icon_on',
			[
				'label'   => esc_html__( 'Service icon Switch', 'Zylo-elementor' ),
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
				'label' => esc_html__( 'Layout', 'Zylo-elementor' ),
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label'   => esc_html__( 'Alignment', 'Zylo-elementor' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'Zylo-elementor' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'Zylo-elementor' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'Zylo-elementor' ),
						'icon'  => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'Zylo-elementor' ),
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
				'label' => esc_html__( 'Heading Style', 'Zylo-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_heading_typography',
				'selector' => '{{WRAPPER}} .all-portfolios .portfolio-card-main-wrapper .portfolio-wrapper .portfolio-card .title',
			]
		);


		$this->add_control(
			'portfolio_heading_color',
			[
				'label' => __( 'Color', 'Zylo-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .all-portfolios .portfolio-card-main-wrapper .portfolio-wrapper .portfolio-card .title' => 'color: {{VALUE}};',
				]
			]
		);

		$this->end_controls_section();

		/** content typography **/
		$this->start_controls_section(
			'portfolio_content_style',
			[
				'label' => esc_html__( 'Content Style', 'Zylo-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_content_typography',
				'selector' => '{{WRAPPER}} .all-portfolios .portfolio-card-main-wrapper .portfolio-wrapper .portfolio-card .short-title',
			]
		);


		$this->add_control(
			'portfolio_content_color',
			[
				'label' => __( 'Color', 'Zylo-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .all-portfolios .portfolio-card-main-wrapper .portfolio-wrapper .portfolio-card .short-title' => 'color: {{VALUE}};',
				]
			]
		);

		$this->end_controls_section();

		/** icon typography **/
		$this->start_controls_section(
			'portfolio_icon_style',
			[
				'label' => esc_html__( 'Icon Style', 'Zylo-elementor' ),
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
				'label' => __( 'Size', 'Zylo-elementor' ),
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
				'label' => __( 'Color', 'Zylo-elementor' ),
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



		<section class="portfolio-area">
			<div class="portfolio-style-3">
				<div class="container-fluid p-0">
					<div class="row g-5">
				<?php 
				if( !empty($cat->term_id) ){
					$q = new \WP_Query(array(
						'post_type'     => 'Zylo-portfolio',
						'posts_per_page'=> $post_number,
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
						'post_type'     => 'Zylo-portfolio',
						'posts_per_page'=> $post_number,
						'orderby' 		=> 'menu_order '.$orderby,
						'order'			=> $post_order,
					));
				}
					
				if($q->have_posts()):
					$number = 1;
					while($q->have_posts()): $q->the_post(); 
					$portfolio_page_img = get_post_meta( get_the_ID(), 'portfolio_page_img', true );
					$active_class = $number == 1 ? 'active': '';
					global $post;
					$post_args = array(
							'post_type' => 'Zylo-portfolio',
							'post_status' => 'publish'
							);
					$protfolio_posts = get_posts($post_args);   
					?>
                    

					<!-- portfolio area start -->
                        
                            <div class="col-xl-4 col-sm-6">
                                <div class="thumb">
                                    <img src="<?php echo esc_url($portfolio_page_img); ?>" alt="img">
                                    <div class="icon">
                                        <a href="<?php the_permalink(); ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="82" height="82" viewBox="0 0 82 82" fill="none">
                                                <path d="M43.5625 10.25V38.4375H71.75V43.5625H43.5625V71.75H38.4375V43.5625H10.25V38.4375H38.4375V10.25H43.5625Z" fill="white"/>
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

            <!-- banner area start -->



	<?php
	}

}