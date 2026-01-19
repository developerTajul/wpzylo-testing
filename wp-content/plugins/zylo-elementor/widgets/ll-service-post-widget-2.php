<?php
namespace ZyloElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Text_Stroke;

/**
 * Luxelife Service Post Widget.
 *
 * Elementor widget that displays service posts with customizable styles and layouts.
 *
 * @since 1.0.0
 */
class LuxelifeServicePost2 extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'Zylo-service-post-2';
    }

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Luxelife Service Post 2', 'zylo-elementor');
    }

    /**
     * Get widget icon.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-post-list';
    }

    /**
     * Get widget categories.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories() {
        return ['zylo-elementor'];
    }

    /**
     * Get widget keywords.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget keywords.
     */
    public function get_keywords() {
        return ['service', 'post', 'luxelife', 'zylo'];
    }

    /**
     * Get script dependencies.
     *
     * @since 1.0.0
     * @access public
     * @return array Script dependencies.
     */
    public function get_script_depends() {
        return ['zylo-elementor'];
    }

    /**
     * Register widget controls.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls() {
        // Content Section
        $this->start_controls_section(
            'section_content_services',
            [
                'label' => esc_html__('Services Content', 'zylo-elementor'),
            ]
        );

        $this->add_control(
            'chose_style',
            [
                'label' => esc_html__('Service Style', 'zylo-elementor'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'service-style-1' => esc_html__('Style 1 (Grid with SVG)', 'zylo-elementor'),
                    'service-style-2' => esc_html__('Style 2 (Hover Effect)', 'zylo-elementor'),
                    'service-style-3' => esc_html__('Style 3 (Icon with Content)', 'zylo-elementor'),
                ],
                'default' => 'service-style-1',
            ]
        );

        $this->add_control(
            'service_grid',
            [
                'label' => esc_html__('Grid Layout', 'zylo-elementor'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'col-12' => esc_html__('1 Column (Full Width)', 'zylo-elementor'),
                    'col-md-12 col-xl-6' => esc_html__('2 Columns (Medium & Large)', 'zylo-elementor'),
                    'col-md-12 col-xl-4' => esc_html__('3 Columns (Medium & Large)', 'zylo-elementor'),
                ],
                'default' => 'col-12',
                'description' => esc_html__('Select the grid layout for services.', 'zylo-elementor'),
            ]
        );

        $this->add_control(
            'heading_word_count',
            [
                'label' => esc_html__('Heading Word Count', 'zylo-elementor'),
                'type' => Controls_Manager::NUMBER,
                'default' => 7,
                'min' => 1,
                'step' => 1,
                'placeholder' => esc_html__('Enter number of words for title', 'zylo-elementor'),
            ]
        );

        $this->add_control(
            'content_word_count',
            [
                'label' => esc_html__('Content Word Count', 'zylo-elementor'),
                'type' => Controls_Manager::NUMBER,
                'default' => 15,
                'min' => 1,
                'step' => 1,
                'placeholder' => esc_html__('Enter number of words for content', 'zylo-elementor'),
            ]
        );

        $this->add_control(
            'post_id_show',
            [
                'label' => esc_html__('Post ID', 'zylo-elementor'),
                'type'  => Controls_Manager::NUMBER, 
                'default' => '',
                'description' => esc_html__('Select Post ID', 'zylo-elementor'),
            ]
        );



        $this->add_control(
            'post_number',
            [
                'label' => esc_html__('Number of Posts', 'zylo-elementor'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => esc_html__('1', 'zylo-elementor'),
                    '2' => esc_html__('2', 'zylo-elementor'),
                    '3' => esc_html__('3', 'zylo-elementor'),
                    '4' => esc_html__('4', 'zylo-elementor'),
                    '5' => esc_html__('5', 'zylo-elementor'),
                    '6' => esc_html__('6', 'zylo-elementor'),
                    '7' => esc_html__('7', 'zylo-elementor'),
                    '8' => esc_html__('8', 'zylo-elementor'),
                    '9' => esc_html__('9', 'zylo-elementor'),
                    '10' => esc_html__('10', 'zylo-elementor'),
                    '-1' => esc_html__('Show All', 'zylo-elementor'),
                ],
                'default' => '3',
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label' => esc_html__('Order By', 'zylo-elementor'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'ID' => esc_html__('Post ID', 'zylo-elementor'),
                    'title' => esc_html__('Title', 'zylo-elementor'),
                    'date' => esc_html__('Date', 'zylo-elementor'),
                    'modified' => esc_html__('Last Modified Date', 'zylo-elementor'),
                    'rand' => esc_html__('Random Order', 'zylo-elementor'),
                    'comment_count' => esc_html__('Popular Post', 'zylo-elementor'),
                ],
                'default' => 'ID',
            ]
        );

        $this->add_control(
            'post_order',
            [
                'label' => esc_html__('Post Order', 'zylo-elementor'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'asc' => esc_html__('Ascending', 'zylo-elementor'),
                    'desc' => esc_html__('Descending', 'zylo-elementor'),
                ],
                'default' => 'desc',
            ]
        );

        $this->add_control(
            'cat',
            [
                'label' => esc_html__('Category Slug', 'zylo-elementor'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('Enter category slug', 'zylo-elementor'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'service_link_text',
            [
                'label' => esc_html__('Button Text', 'zylo-elementor'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'zylo-elementor'),
                'placeholder' => esc_html__('Enter button text', 'zylo-elementor'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'service_icon_name',
            [
                'label' => esc_html__('Button Icon Name', 'zylo-elementor'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('fa-solid fa-angle-right', 'zylo-elementor'),
                'placeholder' => esc_html__('Enter icon class (e.g., fa-solid fa-angle-right)', 'zylo-elementor'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'service_btn_on',
            [
                'label' => esc_html__('Show Button', 'zylo-elementor'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => esc_html__('Yes', 'zylo-elementor'),
                'label_off' => esc_html__('No', 'zylo-elementor'),
            ]
        );

        $this->add_control(
            'service_icon_on',
            [
                'label' => esc_html__('Show Button Icon', 'zylo-elementor'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => esc_html__('Yes', 'zylo-elementor'),
                'label_off' => esc_html__('No', 'zylo-elementor'),
                'condition' => [
                    'service_btn_on' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        // Layout Section
        $this->start_controls_section(
            'section_content_layout',
            [
                'label' => esc_html__('Layout Settings', 'zylo-elementor'),
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => esc_html__('Content Alignment', 'zylo-elementor'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'zylo-elementor'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'zylo-elementor'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'zylo-elementor'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__('Justified', 'zylo-elementor'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'prefix_class' => 'elementor%s-align-',
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .service__content, {{WRAPPER}} .content' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Title Style Section
        $this->start_controls_section(
            'title_style',
            [
                'label' => esc_html__('Title Style', 'zylo-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'zylo-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-md, {{WRAPPER}} .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .section-title-md, {{WRAPPER}} .title',
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__('Margin', 'zylo-elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title-md, {{WRAPPER}} .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Description Style Section
        $this->start_controls_section(
            'description_style',
            [
                'label' => esc_html__('Description Style', 'zylo-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Description Color', 'zylo-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service__content p, {{WRAPPER}} .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'selector' => '{{WRAPPER}} .service__content p, {{WRAPPER}} .content p',
            ]
        );

        $this->end_controls_section();

        // Button Style Section
        $this->start_controls_section(
            'button_style',
            [
                'label' => esc_html__('Button Style', 'zylo-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs('button_style_tabs');

        $this->start_controls_tab(
            'button_normal_tab',
            [
                'label' => esc_html__('Normal', 'zylo-elementor'),
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => esc_html__('Text Color', 'zylo-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .read-more a, {{WRAPPER}} .arrow a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .read-more a, {{WRAPPER}} .arrow a',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'button_hover_tab',
            [
                'label' => esc_html__('Hover', 'zylo-elementor'),
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => esc_html__('Text Color', 'zylo-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .read-more a:hover, {{WRAPPER}} .arrow a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }

    /**
     * Render widget output.
     *
     * @since 1.0.0
     * @access public
     */
    public function render() {
        $settings = $this->get_settings_for_display();
        $chose_style = $settings['chose_style'];
        $term_id = !empty($settings['cat']) ? get_term_by('slug', $settings['cat'], 'service_categories')->term_id : '';
        $post_id = intval( $settings['post_id_show'] );

        // WP_Query arguments
        $args = [
            'post_type' => 'zylo-service',
            'p'         => 3,
            'post_status'=> 'any',
            // 'orderby' => $settings['orderby'],
            // 'order' => $settings['post_order'],
        ];

        // if (!empty($term_id)) {
        //     $args['tax_query'] = [
        //         [
        //             'taxonomy' => 'service_categories',
        //             'field' => 'term_id',
        //             'terms' => $term_id,
        //             'operator' => 'IN',
        //         ],
        //     ];
        // }

        $q = new \WP_Query($args);

        //echo '<pre>'; print_r( $q->request ); echo '</pre>';

        //var_dump( $q->posts );
        var_dump( $settings['post_id_show'] );



        // Prevent rendering if no posts
        if (!$q->have_posts()) {
            return;
        }

        if ($chose_style === 'service-style-1') : ?>
            <!-- Service Area Start Style 1 -->
            <div class="service-area fix">
                <div class="service-style-1">
                    <div class="lines">
                        <span class="line line-1"></span>
                        <span class="line line-2"></span>
                        <span class="line line-3"></span>
                        <span class="line line-4"></span>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <?php while ($q->have_posts()) : $q->the_post();
                                $icon_thumb = get_post_meta(get_the_ID(), 'service_icon_image', true);
                                $tiny_content = get_post_meta(get_the_ID(), 'service_tiny_text', true);
                            ?>
                                <div class="<?php echo esc_attr($settings['service_grid']); ?>">
                                    <div class="service">
                                        <div class="service__content">
                                            <div class="bg-img">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="450" height="320" viewBox="0 0 450 320" fill="none">
                                                    <mask id="path-1-inside-1_4433_80" fill="white">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M321 30C321 13.4315 307.569 0 291 0H30C13.4315 0 0 13.4315 0 30V290C0 306.569 13.4315 320 30 320H420C436.569 320 450 306.569 450 290V159C450 142.431 436.569 129 420 129H351C334.431 129 321 115.569 321 99V30Z"/>
                                                    </mask>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M321 30C321 13.4315 307.569 0 291 0H30C13.4315 0 0 13.4315 0 30V290C0 306.569 13.4315 320 30 320H420C436.569 320 450 306.569 450 290V159C450 142.431 436.569 129 420 129H351C334.431 129 321 115.569 321 99V30Z" fill="white"/>
                                                    <path d="M30 1H291V-1H30V1ZM1 290V30H-1V290H1ZM420 319H30V321H420V319ZM449 159V290H451V159H449ZM420 128H351V130H420V128ZM322 99V30H320V99H322ZM351 128C334.984 128 322 115.016 322 99H320C320 116.121 333.879 130 351 130V128ZM451 159C451 141.879 437.121 128 420 128V130C436.016 130 449 142.984 449 159H451ZM420 321C437.121 321 451 307.121 451 290H449C449 306.016 436.016 319 420 319V321ZM-1 290C-1 307.121 12.8792 321 30 321V319C13.9837 319 1 306.016 1 290H-1ZM291 1C307.016 1 320 13.9837 320 30H322C322 12.8792 308.121 -1 291 -1V1ZM30 -1C12.8792 -1 -1 12.8792 -1 30H1C1 13.9837 13.9837 1 30 1V-1Z" fill="#C7C9CA" mask="url(#path-1-inside-1_4433_80)"/>
                                                </svg>
                                                <h3 class="section-title-md">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php echo esc_html(wp_trim_words(get_the_title(), $settings['heading_word_count'], '')); ?>
                                                    </a>
                                                </h3>
                                                    <p><?php echo esc_html(wp_trim_words(get_the_content(), $settings['content_word_count'], '')); ?></p>
                                                <?php if (!empty($icon_thumb)) : ?>
                                                    <div class="icon-box">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <img src="<?php echo esc_url($icon_thumb); ?>" alt="<?php esc_attr_e('Service Icon', 'zylo-elementor'); ?>">
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Service Area End Style 1 -->
        <?php elseif ($chose_style === 'service-style-2') : ?>
            <!-- Service Area Start Style 2 -->
            <section class="service-area fix">
                <div class="service-style-2 pb-140">
                    <div class="container-fluid">
                        <div class="main-item-box">
                            <?php while ($q->have_posts()) : $q->the_post();
                                $active_class = get_post_meta(get_the_ID(), 'service_active_class', true);
                                $tiny_content = get_post_meta(get_the_ID(), 'service_tiny_text', true);
                                $service_icon = get_post_meta(get_the_ID(), 'service_icon_class', true);
                            ?>
                                <div class="singleitem active-hover <?php echo esc_attr($active_class); ?> wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.3s">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="singleitem__thumb" data-background="<?php echo esc_url(get_the_post_thumbnail_url()); ?>"></div>
                                    <?php endif; ?>
                                    <div class="content">
                                        <h3 class="title">
                                            <?php echo esc_html(wp_trim_words(get_the_title(), $settings['heading_word_count'], '')); ?>
                                        </h3>
                                            <p><?php echo esc_html(wp_trim_words(get_the_content(), $settings['content_word_count'], '')); ?></p>
                                    </div>
                                    <?php if ($settings['service_btn_on'] === 'yes') : ?>
                                        <div class="arrow">
                                            <a href="<?php the_permalink(); ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="31" height="16" viewBox="0 0 31 16" fill="none">
                                                    <path d="M30.6214 8.70711C31.0119 8.31658 31.0119 7.68342 30.6214 7.29289L24.2575 0.928932C23.8669 0.538408 23.2338 0.538408 22.8432 0.928932C22.4527 1.31946 22.4527 1.95262 22.8432 2.34315L28.5001 8L22.8432 13.6569C22.4527 14.0474 22.4527 14.6805 22.8432 15.0711C23.2338 15.4616 23.8669 15.4616 24.2575 15.0711L30.6214 8.70711ZM0.914307 9H29.9143V7H0.914307V9Z" fill="#1C1A1D"/>
                                                </svg>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="icon-box">
                                        <a href="<?php the_permalink(); ?>"><i class="<?php echo esc_attr($service_icon); ?>"></i></a>
                                    </div>
                                </div>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Service Area End Style 2 -->
        <?php elseif ($chose_style === 'service-style-3') : ?>
            <!-- Service Area Start Style 3 -->
            <section class="service-area fix">
                <div class="service-style-4">
                    <div class="container-fluid p-0">
                        <div class="row g-5">
                            <?php while ($q->have_posts()) : $q->the_post();
                                $active_class = get_post_meta(get_the_ID(), 'service_active_class', true);
                                $tiny_content = get_post_meta(get_the_ID(), 'service_tiny_text', true);
                                $icon_thumb = get_post_meta(get_the_ID(), 'service_icon_image', true);
                            ?>
                                <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.3s">
                                    <div class="service">
                                        <?php if (!empty($icon_thumb)) : ?>
                                            <div class="service__icon">
                                                <span>
                                                    <img src="<?php echo esc_url($icon_thumb); ?>" alt="<?php esc_attr_e('Service Icon', 'zylo-elementor'); ?>">
                                                </span>
                                            </div>
                                        <?php endif; ?>
                                        <div class="service__content">
                                            <h2 class="title text-white">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php echo esc_html(wp_trim_words(get_the_title(), $settings['heading_word_count'], '')); ?>
                                                </a>
                                            </h2>
                                            <?php if (!empty($tiny_content)) : ?>
                                                <p class="text-white"><?php echo esc_html(wp_trim_words($tiny_content, $settings['content_word_count'], '')); ?></p>
                                            <?php endif; ?>
                                            <?php if ($settings['service_btn_on'] === 'yes') : ?>
                                                <div class="read-more">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php echo esc_html($settings['service_link_text']); ?>
                                                        <?php if ($settings['service_icon_on'] === 'yes' && !empty($settings['service_icon_name'])) : ?>
                                                            <i class="<?php echo esc_attr($settings['service_icon_name']); ?>"></i>
                                                        <?php endif; ?>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Service Area End Style 3 -->
        <?php endif; ?>
    <?php
    }
}