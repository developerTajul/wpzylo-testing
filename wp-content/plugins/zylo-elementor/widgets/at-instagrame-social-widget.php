<?php
namespace ZyloElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

/**
 * Zylo Instagram Social Widget.
 *
 * Elementor widget that displays Instagram social media images with links.
 *
 * @since 1.0.0
 */
class ZyloInstagrameSocial extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'zylo-instagram-social';
    }

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Instagram Social', 'zylo-elementor');
    }

    /**
     * Get widget icon.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-social-icons';
    }

    /**
     * Get widget categories.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['zylo-elementor'];
    }

    /**
     * Get widget keywords.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget keywords.
     */
    public function get_keywords()
    {
        return ['instagram', 'social', 'media', 'zylo'];
    }

    /**
     * Get script dependencies.
     *
     * @since 1.0.0
     * @access public
     * @return array Script dependencies.
     */
    public function get_script_depends()
    {
        return ['zylo-elementor'];
    }

    /**
     * Register widget controls.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {
        // Content Section
        $this->start_controls_section(
            'section_content_social',
            [
                'label' => esc_html__('Instagram Social Content', 'zylo-elementor'),
            ]
        );

        // Social Image 1
        $this->add_control(
            'social_thumb_1',
            [
                'label' => esc_html__('Social Image 1', 'zylo-elementor'),
                'description' => esc_html__('Upload the first Instagram image.', 'zylo-elementor'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => ['active' => true],
            ]
        );

        $this->add_control(
            'social_link_1',
            [
                'label' => esc_html__('Social Link 1', 'zylo-elementor'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('Enter the link for Social Image 1', 'zylo-elementor'),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'show_external' => true,
                'label_block' => true,
            ]
        );

        // Social Image 2
        $this->add_control(
            'social_thumb_2',
            [
                'label' => esc_html__('Social Image 2', 'zylo-elementor'),
                'description' => esc_html__('Upload the second Instagram image.', 'zylo-elementor'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => ['active' => true],
            ]
        );

        $this->add_control(
            'social_link_2',
            [
                'label' => esc_html__('Social Link 2', 'zylo-elementor'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('Enter the link for Social Image 2', 'zylo-elementor'),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'show_external' => true,
                'label_block' => true,
            ]
        );

        // Social Image 3
        $this->add_control(
            'social_thumb_3',
            [
                'label' => esc_html__('Social Image 3', 'zylo-elementor'),
                'description' => esc_html__('Upload the third Instagram image.', 'zylo-elementor'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => ['active' => true],
            ]
        );

        $this->add_control(
            'social_link_3',
            [
                'label' => esc_html__('Social Link 3', 'zylo-elementor'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('Enter the link for Social Image 3', 'zylo-elementor'),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'show_external' => true,
                'label_block' => true,
            ]
        );

        // Social Image 4
        $this->add_control(
            'social_thumb_4',
            [
                'label' => esc_html__('Social Image 4', 'zylo-elementor'),
                'description' => esc_html__('Upload the fourth Instagram image.', 'zylo-elementor'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => ['active' => true],
            ]
        );

        $this->add_control(
            'social_link_4',
            [
                'label' => esc_html__('Social Link 4', 'zylo-elementor'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('Enter the link for Social Image 4', 'zylo-elementor'),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'show_external' => true,
                'label_block' => true,
            ]
        );

        // Logo
        $this->add_control(
            'logo',
            [
                'label' => esc_html__('Logo Image', 'zylo-elementor'),
                'description' => esc_html__('Upload the Instagram logo image.', 'zylo-elementor'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => ['active' => true],
            ]
        );

        // Title
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'zylo-elementor'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('Enter the title', 'zylo-elementor'),
                'default' => esc_html__('Follow us on Instagram', 'zylo-elementor'),
                'label_block' => true,
            ]
        );

        // Follow Link
        $this->add_control(
            'follow_link',
            [
                'label' => esc_html__('Follow Link', 'zylo-elementor'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('Enter the Instagram follow link', 'zylo-elementor'),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'show_external' => true,
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
                'selectors' => [
                    '{{WRAPPER}} .section-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .section-title',
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__('Margin', 'zylo-elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Image Style Section
        $this->start_controls_section(
            'image_style',
            [
                'label' => esc_html__('Image Style', 'zylo-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => esc_html__('Border Radius', 'zylo-elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .single-item img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'image_box_shadow',
                'selector' => '{{WRAPPER}} .single-item img',
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
    public function render()
    {
        $settings = $this->get_settings_for_display();

        // Check if essential settings are empty
        if (empty($settings['social_thumb_1']['url']) && empty($settings['social_thumb_2']['url']) &&
            empty($settings['social_thumb_3']['url']) && empty($settings['social_thumb_4']['url']) &&
            empty($settings['logo']['url']) && empty($settings['title'])) {
            return;
        }

        ?>
        <section class="social-area fix">
            <div class="social-style-1 pb-20 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.3s">
                <div class="container-fluid">
                    <div class="social-thumb-wrap">
                        <div class="row gy-5 align-items-center">
                            <!-- Left Images -->
                            <div class="col-xl-4 col-md-8">
                                <div class="thumb1">
                                    <div class="row g-5 g-xl-3">
                                        <?php if (!empty($settings['social_thumb_1']['url'])) : ?>
                                            <div class="col-md-6">
                                                <div class="single-item wow img-custom-anim-left" data-wow-duration="1.5s" data-wow-delay="0.3s">
                                                    <a href="<?php echo esc_url($settings['social_link_1']['url']); ?>" 
                                                       <?php echo $settings['social_link_1']['is_external'] ? 'target="_blank"' : ''; ?>
                                                       <?php echo $settings['social_link_1']['nofollow'] ? 'rel="nofollow"' : ''; ?>>
                                                        <img class="w-img" src="<?php echo esc_url($settings['social_thumb_1']['url']); ?>" alt="<?php esc_attr_e('Social Image 1', 'zylo-elementor'); ?>">
                                                    </a>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($settings['social_thumb_2']['url'])) : ?>
                                            <div class="col-md-6">
                                                <div class="single-item wow img-custom-anim-left" data-wow-duration="1.5s" data-wow-delay="0.4s">
                                                    <a href="<?php echo esc_url($settings['social_link_2']['url']); ?>" 
                                                       <?php echo $settings['social_link_2']['is_external'] ? 'target="_blank"' : ''; ?>
                                                       <?php echo $settings['social_link_2']['nofollow'] ? 'rel="nofollow"' : ''; ?>>
                                                        <img class="w-img" src="<?php echo esc_url($settings['social_thumb_2']['url']); ?>" alt="<?php esc_attr_e('Social Image 2', 'zylo-elementor'); ?>">
                                                    </a>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Center Content -->
                            <div class="col-xl-4 col-md-4 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.3s">
                                <div class="single-item">
                                    <div class="content text-center">
                                        <?php if (!empty($settings['logo']['url'])) : ?>
                                            <div class="logo">
                                                <a href="<?php echo esc_url($settings['follow_link']['url']); ?>" 
                                                   <?php echo $settings['follow_link']['is_external'] ? 'target="_blank"' : ''; ?>
                                                   <?php echo $settings['follow_link']['nofollow'] ? 'rel="nofollow"' : ''; ?>>
                                                    <img src="<?php echo esc_url($settings['logo']['url']); ?>" alt="<?php esc_attr_e('Instagram Logo', 'zylo-elementor'); ?>">
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($settings['title'])) : ?>
                                            <h2 class="section-title pt-25">
                                                <a href="<?php echo esc_url($settings['follow_link']['url']); ?>" 
                                                   <?php echo $settings['follow_link']['is_external'] ? 'target="_blank"' : ''; ?>
                                                   <?php echo $settings['follow_link']['nofollow'] ? 'rel="nofollow"' : ''; ?>>
                                                    <?php echo wp_kses_post($settings['title']); ?>
                                                </a>
                                            </h2>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Right Images -->
                            <div class="col-xl-4 col-md-8">
                                <div class="thumb2">
                                    <div class="row g-5 g-xl-3">
                                        <?php if (!empty($settings['social_thumb_3']['url'])) : ?>
                                            <div class="col-md-6">
                                                <div class="single-item wow img-custom-anim-right" data-wow-duration="1.5s" data-wow-delay="0.4s">
                                                    <a href="<?php echo esc_url($settings['social_link_3']['url']); ?>" 
                                                       <?php echo $settings['social_link_3']['is_external'] ? 'target="_blank"' : ''; ?>
                                                       <?php echo $settings['social_link_3']['nofollow'] ? 'rel="nofollow"' : ''; ?>>
                                                        <img class="w-img" src="<?php echo esc_url($settings['social_thumb_3']['url']); ?>" alt="<?php esc_attr_e('Social Image 3', 'zylo-elementor'); ?>">
                                                    </a>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($settings['social_thumb_4']['url'])) : ?>
                                            <div class="col-md-6">
                                                <div class="single-item wow img-custom-anim-right" data-wow-duration="1.5s" data-wow-delay="0.3s">
                                                    <a href="<?php echo esc_url($settings['social_link_4']['url']); ?>" 
                                                       <?php echo $settings['social_link_4']['is_external'] ? 'target="_blank"' : ''; ?>
                                                       <?php echo $settings['social_link_4']['nofollow'] ? 'rel="nofollow"' : ''; ?>>
                                                        <img class="w-img" src="<?php echo esc_url($settings['social_thumb_4']['url']); ?>" alt="<?php esc_attr_e('Social Image 4', 'zylo-elementor'); ?>">
                                                    </a>
                                                </div>
                                            </div>
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
    }
}