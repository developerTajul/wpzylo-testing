<?php
namespace ZyloElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

/**
 * Luxelife Banner Widget.
 *
 * Elementor widget that displays a customizable banner with two styles: slider or static.
 *
 * @since 1.0.0
 */
class LuxelifeBanner extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'zylo-banner';
    }

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Zylo Banner', 'zylo-elementor');
    }

    /**
     * Get widget icon.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-banner';
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
        return ['banner', 'slider', 'carousel', 'luxelife'];
    }

    /**
     * Get script dependencies.
     *
     * @since 1.0.0
     * @access public
     * @return array Script dependencies.
     */
    public function get_script_depends() {
        return ['zylo-elementor', 'swiper'];
    }

    /**
     * Register widget controls.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls() {
        // Banner Style Selection
        $this->start_controls_section(
            'section_content_banner',
            [
                'label' => esc_html__('Banner Settings', 'zylo-elementor'),
            ]
        );

        $this->add_control(
            'chose_style',
            [
                'label' => esc_html__('Banner Style', 'zylo-elementor'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'banner-style-1' => esc_html__('Slider Banner', 'zylo-elementor'),
                    'banner-style-2' => esc_html__('Static Banner', 'zylo-elementor'),
                ],
                'default' => 'banner-style-1',
            ]
        );

        $this->end_controls_section();

        // Slider Banner  Content
        $this->start_controls_section(
            'section_slider_items',
            [
                'label' => esc_html__('Slider Items', 'zylo-elementor'),
                'condition' => [
                    'chose_style' => 'banner-style-1',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'banner_bg',
            [
                'label' => esc_html__('Background Image', 'zylo-elementor'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => ['active' => true],
            ]
        );
        $repeater->add_control(
            'shape_one',
            [
                'label' => esc_html__('Shape Image 1', 'zylo-elementor'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => ['active' => true],
            ]
        );
        $repeater->add_control(
            'shape_two',
            [
                'label' => esc_html__('Shape Image 2', 'zylo-elementor'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => ['active' => true],
            ]
        );
        $repeater->add_control(
            'banner_title',
            [
                'label' => esc_html__('Title', 'zylo-elementor'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Inspire', 'zylo-elementor'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'banner_subtitle',
            [
                'label' => esc_html__('Subtitle', 'zylo-elementor'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Progress', 'zylo-elementor'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'banner_btn_text',
            [
                'label' => esc_html__('Button Text', 'zylo-elementor'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('About The Company', 'zylo-elementor'),
                'label_block' => true,
            ]
        );
       $repeater->add_control(
            'banner_btn_url',
            [
                'label'       => esc_html__('Button Link', 'zylo-elementor'),
                'type'        => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'zylo-elementor'),
                'options'     => [ 'url', 'is_external', 'nofollow', 'custom_attributes' ],
                'default'     => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
                'dynamic'     => [
                    'active' => true, 
                ],
            ]
        );

        $this->add_control(
            'banner3_items',
            [
                'label' => esc_html__('Slider Items', 'zylo-elementor'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'banner_title' => esc_html__('Inspire', 'zylo-elementor'),
                        'banner_subtitle' => esc_html__('Progress', 'zylo-elementor'),
                        'banner_btn_text' => esc_html__('About The Company', 'zylo-elementor'),
                        'banner_btn_url' => ['url' => '#'],
                    ],
                ],
                'title_field' => '{{{ banner_title }}}',
            ]
        );

        $this->end_controls_section();

        // Slider Navigation (Style 1)
        $this->start_controls_section(
            'section_slider_nav',
            [
                'label' => esc_html__('Slider Navigation (Style 1)', 'zylo-elementor'),
                'condition' => [
                    'chose_style' => 'banner-style-1',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'banner_nav_number',
            [
                'label' => esc_html__('Navigation Number', 'zylo-elementor'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('1. / 3', 'zylo-elementor'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'banner_nav_text',
            [
                'label' => esc_html__('Navigation Text', 'zylo-elementor'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Analyze the available', 'zylo-elementor'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'banner_nav_items',
            [
                'label' => esc_html__('Navigation Items', 'zylo-elementor'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'banner_nav_number' => esc_html__('1. / 3', 'zylo-elementor'),
                        'banner_nav_text' => esc_html__('Analyze the available', 'zylo-elementor'),
                    ],
                ],
                'title_field' => '{{{ banner_nav_number }}}',
            ]
        );

        $this->end_controls_section();

        // Static Banner (Style 2) Content
        $this->start_controls_section(
            'section_static_banner',
            [
                'label' => esc_html__('Static Banner (Style 2)', 'zylo-elementor'),
                'condition' => [
                    'chose_style' => 'banner-style-2',
                ],
            ]
        );

        $this->add_control(
            'banner_bg',
            [
                'label' => esc_html__('Background Image', 'zylo-elementor'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => ['active' => true],
            ]
        );

        $this->add_control(
            'banner_2_title_one',
            [
                'label' => esc_html__('Title One', 'zylo-elementor'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('Type Title Here...', 'zylo-elementor'),
                'default' => esc_html__('Inspire', 'zylo-elementor'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'banner_2_title_two',
            [
                'label' => esc_html__('Title Two', 'zylo-elementor'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('Type Title Here...', 'zylo-elementor'),
                'default' => esc_html__('Progress', 'zylo-elementor'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'banner_2_btn_text',
            [
                'label' => esc_html__('Button Text', 'zylo-elementor'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Contact', 'zylo-elementor'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'banner_2_btn_url',
            [
                'label' => esc_html__('Button URL', 'zylo-elementor'),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'show_external' => true,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'banner_2_info_content_number',
            [
                'label' => esc_html__('Info Number', 'zylo-elementor'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('Type Info Number Here...', 'zylo-elementor'),
                'default' => esc_html__('14k+', 'zylo-elementor'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'banner_2_info_content_title',
            [
                'label' => esc_html__('Info Title', 'zylo-elementor'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('Type Info Title Here...', 'zylo-elementor'),
                'default' => esc_html__('Project Success', 'zylo-elementor'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'banner_2_info_content_one',
            [
                'label' => esc_html__('Info Content Line 1', 'zylo-elementor'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('Type Info Here...', 'zylo-elementor'),
                'default' => esc_html__('Effort to accurately review everything about', 'zylo-elementor'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'banner_2_info_content_two',
            [
                'label' => esc_html__('Info Content Line 2', 'zylo-elementor'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('Type Info Here...', 'zylo-elementor'),
                'default' => esc_html__('your business and your industry.', 'zylo-elementor'),
                'label_block' => true,
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
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .hero-content .title, {{WRAPPER}} .slider-content .slider-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .hero-content .title, {{WRAPPER}} .slider-content .slider-title',
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__('Margin', 'zylo-elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .hero-content .title, {{WRAPPER}} .slider-content .slider-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_width',
            [
                'label' => esc_html__( 'Title Width', 'kindaid' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ '%', 'px', 'vw' ],
                'range' => [
                    '%' => [ 'min' => 10, 'max' => 100 ],
                    'px' => [ 'min' => 50, 'max' => 1000 ],
                    'vw' => [ 'min' => 10, 'max' => 100 ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero-content .title' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();





        // Sub Title Style Section
        $this->start_controls_section(
            'subtitle_style',
                [
                    'label' => esc_html__('Sub Title Style', 'zylo-elementor'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'subtitle_color',
                [
                    'label' => esc_html__('Subtitle Color', 'zylo-elementor'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .hero-content .title span, {{WRAPPER}} .slider-content .slider-title' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'subtitle_typography',
                    'selector' => '{{WRAPPER}} .hero-content .title span, {{WRAPPER}} .slider-content .slider-title',
                ]
            );

            $this->add_responsive_control(
                'subtitle_margin',
                [
                    'label' => esc_html__('Margin', 'zylo-elementor'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .hero-content .title span, {{WRAPPER}} .slider-content .slider-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'subtitle_width',
                [
                    'label' => esc_html__( 'Subtitle Width', 'kindaid' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ '%', 'px', 'vw' ],
                    'range' => [
                        '%' => [ 'min' => 10, 'max' => 100 ],
                        'px' => [ 'min' => 50, 'max' => 1000 ],
                        'vw' => [ 'min' => 10, 'max' => 100 ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .hero-content .title span' => 'max-width: {{SIZE}}{{UNIT}};',
                    ],
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

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .secandary-btn, {{WRAPPER}} .contact-btn a',
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => esc_html__('Text Color', 'zylo-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secandary-btn, {{WRAPPER}} .contact-btn a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => esc_html__('Background Color', 'zylo-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secandary-btn, {{WRAPPER}} .contact-btn a' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => esc_html__('Padding', 'zylo-elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .secandary-btn, {{WRAPPER}} .contact-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .secandary-btn, {{WRAPPER}} .contact-btn a',
            ]
        );

        $this->add_responsive_control(
            'button_border_radius',
            [
                'label' => esc_html__('Border Radius', 'zylo-elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .secandary-btn, {{WRAPPER}} .contact-btn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
                    '{{WRAPPER}} .secandary-btn:hover, {{WRAPPER}} .contact-btn a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_hover_color',
            [
                'label' => esc_html__('Background Color', 'zylo-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secandary-btn:hover, {{WRAPPER}} .contact-btn a:hover' => 'background: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_tab();
        $this->end_controls_tabs();

            $this->add_control(
                'divider_011',
                [
                    'type' => \Elementor\Controls_Manager::DIVIDER,
                ]
            );


            $this->add_responsive_control(
                'custom_width',
                [
                    'label' => __( 'Icon Border Width', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'vw' ],
                    'range' => [
                        'px' => [ 'min' => 0, 'max' => 2000 ],
                        '%'  => [ 'min' => 0, 'max' => 100 ],
                        'vw' => [ 'min' => 0, 'max' => 100 ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .btn-box .secandary-btn span' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'custom_height',
                [
                    'label' => __( 'Icon Border Height', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'vh' ],
                    'range' => [
                        'px' => [ 'min' => 0, 'max' => 2000 ],
                        '%'  => [ 'min' => 0, 'max' => 100 ],
                        'vh' => [ 'min' => 0, 'max' => 100 ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .btn-box .secandary-btn span' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'custom_line_height',
                [
                    'label' => __( 'Icon Line Height', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'vh' ],
                    'range' => [
                        'px' => [ 'min' => 0, 'max' => 2000 ],
                        '%'  => [ 'min' => 0, 'max' => 100 ],
                        'vh' => [ 'min' => 0, 'max' => 100 ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .btn-box .secandary-btn span' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'divider_0111',
                [
                    'type' => \Elementor\Controls_Manager::DIVIDER,
                ]
            );

            $this->add_responsive_control(
                'custom_icon_width',
                [
                    'label' => __( 'SVG Icon Width', 'textdomain' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'vw' ],
                    'range' => [
                        'px' => [ 'min' => 0, 'max' => 2000 ],
                        '%'  => [ 'min' => 0, 'max' => 100 ],
                        'vw' => [ 'min' => 0, 'max' => 100 ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .btn-box .secandary-btn span svg' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'custom_icon_margin',
                [
                    'label' => esc_html__('Margin', 'zylo-elementor'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .btn-box .secandary-btn span svg, {{WRAPPER}} .slider-content .slider-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );



        $this->end_controls_section();


        $this->start_controls_section(
            'slider_navigation_style',
                [
                    'label' => esc_html__('Slider Nav Style', 'zylo-elementor'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'subtitle_color_22',
                [
                    'label' => esc_html__('Nav Number Color', 'zylo-elementor'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .swiper-slide .slider-thumnails span, {{WRAPPER}} .contact-btn a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'subtitle_padding_22',
                [
                    'label' => esc_html__('Padding', 'zylo-elementor'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .swiper-slide .slider-thumnails span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'divider_01111',
                [
                    'type' => \Elementor\Controls_Manager::DIVIDER,
                ]
            );

            $this->add_control(
                'title_color_22',
                [
                    'label' => esc_html__('Nav Title Color', 'zylo-elementor'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .swiper-slide .slider-thumnails h5, {{WRAPPER}} .contact-btn a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'title_padding_22',
                [
                    'label' => esc_html__('Padding', 'zylo-elementor'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .swiper-slide .slider-thumnails h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'title_margin_22',
                [
                    'label' => esc_html__('Margin', 'zylo-elementor'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .swiper-slide .slider-thumnails h5, {{WRAPPER}} .slider-content .slider-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'divider_011111',
                [
                    'type' => \Elementor\Controls_Manager::DIVIDER,
                ]
            );

            $this->add_control(
                'icon_color_22',
                [
                    'label' => esc_html__('Icon Color', 'zylo-elementor'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .hero-thumbs-slider-wrapper .swiper-slide .slider-thumnails i, {{WRAPPER}} .contact-btn a:hover' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'icon_padding_22',
                [
                    'label' => esc_html__('Padding', 'zylo-elementor'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .hero-thumbs-slider-wrapper .swiper-slide .slider-thumnails i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'icon_margin_22',
                [
                    'label' => esc_html__('Margin', 'zylo-elementor'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .hero-thumbs-slider-wrapper .swiper-slide .slider-thumnails i, {{WRAPPER}} .slider-content .slider-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

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
        $banner3_items = $settings['banner3_items'];
        $banner_nav_items = $settings['banner_nav_items'];

        // Prevent rendering if no content is provided
        if ($chose_style === 'banner-style-1' && empty($banner3_items)) {
            return;
        }
        if ($chose_style === 'banner-style-2' && empty($settings['banner_2_title_one']) && empty($settings['banner_2_title_two'])) {
            return;
        }

        if ($chose_style === 'banner-style-1') : ?>
            <!-- Hero Section Start Style-1 -->
            <section class="hero-area p-relative fix">
                <div class="hero-slider-wrapper">
                    <div class="swiper-container hero-slider-active">
                        <div class="swiper-wrapper">
                            <?php foreach ($banner3_items as $item) : ?>
                                <?php if (!empty($item['banner_bg']['url'])) : ?>
                                    <div class="swiper-slide">
                                        <div class="thumb" data-background="<?php echo esc_url($item['banner_bg']['url']); ?>"></div>
                                        <div class="shape">
                                            <?php if (!empty($item['shape_one']['url'])) : ?>
                                                <img class="p-absolute shape__1" src="<?php echo esc_url($item['shape_one']['url']); ?>" alt="<?php esc_attr_e('Shape 1', 'zylo-elementor'); ?>">
                                            <?php endif; ?>
                                            <?php if (!empty($item['shape_two']['url'])) : ?>
                                                <img class="p-absolute shape__2" src="<?php echo esc_url($item['shape_two']['url']); ?>" alt="<?php esc_attr_e('Shape 2', 'zylo-elementor'); ?>">
                                            <?php endif; ?>
                                        </div>
                                        <div class="container-fluid">
                                            <div class="row justify-content-sm-center">
                                                <div class="col-xl-8">
                                                    <div class="hero-content">
                                                        <?php if (!empty($item['banner_title']) || !empty($item['banner_subtitle'])) : ?>
                                                            <h1 class="title">
                                                                <?php echo wp_kses_post($item['banner_title']); ?>
                                                                <?php if (!empty($item['banner_subtitle'])) : ?>
                                                                    <span><?php echo wp_kses_post($item['banner_subtitle']); ?></span>
                                                                <?php endif; ?>
                                                            </h1>
                                                        <?php endif; ?>
                                                        <?php if (!empty($item['banner_btn_text']) && !empty($item['banner_btn_url']['url'])) : ?>
                                                            <?php
                                                            $btn_link = $item['banner_btn_url'];
                                                            $target   = !empty($btn_link['is_external']) ? ' target="_blank"' : '';
                                                            $nofollow = !empty($btn_link['nofollow']) ? ' rel="nofollow"' : '';
                                                            $url      = esc_url($btn_link['url']);
                                                            ?>
                                                            <div class="btn-box">
                                                                <a class="secandary-btn" href="<?php echo $url; ?>"<?php echo $target . $nofollow; ?>>
                                                                    <span>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="16" viewBox="0 0 36 16" fill="none">
                                                                            <path d="M35.7071 8.70711C36.0976 8.31658 36.0976 7.68342 35.7071 7.29289L29.3431 0.928932C28.9526 0.538408 28.3195 0.538408 27.9289 0.928932C27.5384 1.31946 27.5384 1.95262 27.9289 2.34315L33.5858 8L27.9289 13.6569C27.5384 14.0474 27.5384 14.6805 27.9289 15.0711C28.3195 15.4616 28.9526 15.4616 29.3431 15.0711L35.7071 8.70711ZM0 9H35V7H0V9Z" fill="white"/>
                                                                        </svg>
                                                                    </span>
                                                                    <?php echo esc_html($item['banner_btn_text']); ?>
                                                                </a>
                                                            </div>
                                                        <?php endif; ?> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php if (!empty($banner_nav_items)) : ?>
                    <div class="hero-thumbs-slider-wrapper">
                        <div class="swiper hero-thumb-active">
                            <div class="swiper-wrapper">
                                <?php foreach ($banner_nav_items as $item) : ?>
                                    <div class="swiper-slide">
                                        <div class="slider-thumnails">
                                            <?php if (!empty($item['banner_nav_number'])) : ?>
                                                <span><?php echo esc_html($item['banner_nav_number']); ?></span>
                                            <?php endif; ?>
                                            <i></i>
                                            <?php if (!empty($item['banner_nav_text'])) : ?>
                                                <h5><?php echo esc_html($item['banner_nav_text']); ?></h5>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </section>
            <!-- Hero Section End Style-1 -->
        <?php elseif ($chose_style === 'banner-style-2') : ?>
            <!-- Static Banner Section Start -->
            <section class="hero-area">
                <div class="hero-style-1">
                    <?php if (!empty($settings['banner_bg']['url'])) : ?>
                        <div class="shape-img">
                            <img class="w-img float-bob-y" src="<?php echo esc_url($settings['banner_bg']['url']); ?>" alt="<?php esc_attr_e('Background Image', 'zylo-elementor'); ?>">
                        </div>
                    <?php endif; ?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-6 p-0">
                                <div class="hero-content-left">
                                    <?php if (!empty($settings['banner_2_title_one'])) : ?>
                                        <h1 class="title wow img-custom-anim-left" data-wow-duration="2s" data-wow-delay="0.3s">
                                            <?php echo wp_kses_post($settings['banner_2_title_one']); ?>
                                        </h1>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['banner_2_title_two'])) : ?>
                                        <div class="title2">
                                            <h3><span class="wow img-custom-anim-right" data-wow-duration="1.5s" data-wow-delay="0.3s">
                                                <?php echo wp_kses_post($settings['banner_2_title_two']); ?>
                                            </span></h3>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="hero-content-right">
                                    <?php if (!empty($settings['banner_2_btn_text']) && !empty($settings['banner_2_btn_url']['url'])) : ?>
                                        <div class="contact-btn" data-wow-duration="2s" data-wow-delay="0.4s">
                                            <a href="<?php echo esc_url($settings['banner_2_btn_url']['url']); ?>" 
                                               <?php echo $settings['banner_2_btn_url']['is_external'] ? 'target="_blank"' : ''; ?>
                                               <?php echo $settings['banner_2_btn_url']['nofollow'] ? 'rel="nofollow"' : ''; ?>>
                                                <?php echo esc_html($settings['banner_2_btn_text']); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['banner_2_info_content_number']) || !empty($settings['banner_2_info_content_title'])) : ?>
                                        <div class="info-content">
                                            <h2>
                                                <?php echo esc_html($settings['banner_2_info_content_number']); ?>
                                                <?php if (!empty($settings['banner_2_info_content_title'])) : ?>
                                                    <span><?php echo esc_html($settings['banner_2_info_content_title']); ?></span>
                                                <?php endif; ?>
                                            </h2>
                                            <?php if (!empty($settings['banner_2_info_content_one']) || !empty($settings['banner_2_info_content_two'])) : ?>
                                                <p>
                                                    <?php echo esc_html($settings['banner_2_info_content_one']); ?>
                                                    <?php if (!empty($settings['banner_2_info_content_two'])) : ?>
                                                        <span><?php echo esc_html($settings['banner_2_info_content_two']); ?></span>
                                                    <?php endif; ?>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Static Banner Section End -->
        <?php endif; ?>
    <?php
    }
}