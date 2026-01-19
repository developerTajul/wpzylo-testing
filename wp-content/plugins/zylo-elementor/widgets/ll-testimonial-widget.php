<?php
namespace ZyloElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

if (!defined('ABSPATH')) exit;

class LuxelifeTestimonials extends Widget_Base {

    public function get_name() { return 'luxelife-testimonials'; }
    public function get_title() { return __('LL Testimonials', 'zylo-elementor'); }
    public function get_icon() { return 'eicon-testimonial'; }
    public function get_categories() { return ['zylo-elementor']; }
    public function get_keywords() { return ['testimonial', 'client', 'review']; }

    public function get_script_depends() {
        return ['swiper', 'zylo-elementor'];
    }

    public function get_style_depends() {
        return ['zylo-elementor'];
    }

    protected function register_controls() {

        $this->start_controls_section('section_testimonials', [
            'label' => __('Testimonials', 'zylo-elementor'),
        ]);

        $repeater = new \Elementor\Repeater();

        $repeater->add_control('tab_image', [
            'label' => __('Author Image', 'zylo-elementor'),
            'type' => Controls_Manager::MEDIA,
            'default' => ['url' => \Elementor\Utils::get_placeholder_image_src()],
        ]);

        $repeater->add_control('tab_name', [
            'label' => __('Name', 'zylo-elementor'),
            'type' => Controls_Manager::TEXT,
            'default' => 'Esther Howard',
        ]);

        $repeater->add_control('designation_name', [
            'label' => __('Designation', 'zylo-elementor'),
            'type' => Controls_Manager::TEXT,
            'default' => 'Founder - CEO',
        ]);

        $repeater->add_control('tab_desc', [
            'label' => __('Testimonial Text', 'zylo-elementor'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => 'Being a prominent retail digital marketing company, we offer a variety of services to retail brands...',
        ]);

        $this->add_control('tabs', [
            'label' => __('Testimonial Items', 'zylo-elementor'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                ['tab_name' => 'Esther Howard', 'designation_name' => 'Founder - CEO'],
                ['tab_name' => 'John Doe', 'designation_name' => 'Marketing Head'],
            ],
            'title_field' => '{{{ tab_name }}}',
        ]);

        $this->end_controls_section();

        // Slider Settings
        $this->start_controls_section('slider_settings', [
            'label' => __('Slider Settings', 'zylo-elementor'),
        ]);

        $this->add_control('autoplay', [
            'label' => __('Autoplay', 'zylo-elementor'),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
        ]);

        $this->add_control('autoplay_speed', [
            'label' => __('Autoplay Speed (ms)', 'zylo-elementor'),
            'type' => Controls_Manager::NUMBER,
            'default' => 3000,
            'condition' => ['autoplay' => 'yes'],
        ]);

        $this->add_control('pause_on_hover', [
            'label' => __('Pause on Hover', 'zylo-elementor'),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
        ]);

        $this->add_control('loop', [
            'label' => __('Loop', 'zylo-elementor'),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
        ]);

        $this->add_control('speed', [
            'label' => __('Slide Speed (ms)', 'zylo-elementor'),
            'type' => Controls_Manager::NUMBER,
            'default' => 600,
        ]);

        $this->add_control('arrows', [
            'label' => __('Show Arrows', 'zylo-elementor'),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
        ]);

        $this->add_control('dots', [
            'label' => __('Show Dots', 'zylo-elementor'),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
        ]);

        $this->end_controls_section();

        // Display Options
        $this->start_controls_section('display_options', [
            'label' => __('Display Options', 'zylo-elementor'),
        ]);

        $this->add_control('show_image', ['label' => __('Show Image', 'zylo-elementor'), 'type' => Controls_Manager::SWITCHER, 'default' => 'yes']);
        $this->add_control('show_name', ['label' => __('Show Name', 'zylo-elementor'), 'type' => Controls_Manager::SWITCHER, 'default' => 'yes']);
        $this->add_control('show_designation', ['label' => __('Show Designation', 'zylo-elementor'), 'type' => Controls_Manager::SWITCHER, 'default' => 'yes']);
        $this->add_control('show_desc', ['label' => __('Show Description', 'zylo-elementor'), 'type' => Controls_Manager::SWITCHER, 'default' => 'yes']);

        $this->end_controls_section();

        // Style: Name
        $this->start_controls_section('style_name', ['label' => __('Name', 'zylo-elementor'), 'tab' => Controls_Manager::TAB_STYLE]);
        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), ['name' => 'name_typo', 'selector' => '{{WRAPPER}} .author-name']);
        $this->add_control('name_color', ['label' => __('Color', 'zylo-elementor'), 'type' => Controls_Manager::COLOR, 'selectors' => ['{{WRAPPER}} .author-name' => 'color: {{VALUE}};']]);
        $this->end_controls_section();

        // Style: Designation
        $this->start_controls_section('style_designation', ['label' => __('Designation', 'zylo-elementor'), 'tab' => Controls_Manager::TAB_STYLE]);
        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), ['name' => 'desig_typo', 'selector' => '{{WRAPPER}} .author span']);
        $this->add_control('desig_color', ['label' => __('Color', 'zylo-elementor'), 'type' => Controls_Manager::COLOR, 'selectors' => ['{{WRAPPER}} .author span' => 'color: {{VALUE}};']]);
        $this->end_controls_section();

        // Style: Description
        $this->start_controls_section('style_desc', ['label' => __('Description', 'zylo-elementor'), 'tab' => Controls_Manager::TAB_STYLE]);
        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), ['name' => 'desc_typo', 'selector' => '{{WRAPPER}} .testimonial-content p']);
        $this->add_control('desc_color', ['label' => __('Color', 'zylo-elementor'), 'type' => Controls_Manager::COLOR, 'selectors' => ['{{WRAPPER}} .testimonial-content p' => 'color: {{VALUE}};']]);
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Slider attributes
        $this->add_render_attribute('swiper', [
            'class' => 'swiper testimonial-active',
            'data-autoplay' => $settings['autoplay'] === 'yes' ? 'true' : 'false',
            'data-autoplay-speed' => $settings['autoplay_speed'],
            'data-speed' => $settings['speed'],
            'data-loop' => $settings['loop'] === 'yes' ? 'true' : 'false',
            'data-pause-on-hover' => $settings['pause_on_hover'] === 'yes' ? 'true' : 'false',
        ]);
        ?>

        <section class="testimonial-area fix">
            <div class="testimonial-style-1">
                <div class="testimonial-slider-wrap wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.6s">

                    <!-- Swiper Container -->
                    <div <?php echo $this->get_render_attribute_string('swiper'); ?>>
                        <div class="swiper-wrapper">

                            <?php foreach ($settings['tabs'] as $item) : ?>
                                <div class="swiper-slide">
                                    <div class="slider-item">

                                        <!-- Author Info -->
                                        <div class="author">
                                            <?php if ($settings['show_image'] === 'yes' && !empty($item['tab_image']['url'])) : ?>
                                                <div class="img">
                                                    <img src="<?php echo esc_url($item['tab_image']['url']); ?>" alt="<?php echo esc_attr($item['tab_name']); ?>">
                                                </div>
                                            <?php endif; ?>

                                            <div class="content">
                                                <?php if ($settings['show_name'] === 'yes') : ?>
                                                    <h4 class="author-name"><?php echo wp_kses_post($item['tab_name']); ?></h4>
                                                <?php endif; ?>

                                                <?php if ($settings['show_designation'] === 'yes') : ?>
                                                    <span><?php echo wp_kses_post($item['designation_name']); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <!-- Testimonial Text -->
                                        <?php if ($settings['show_desc'] === 'yes') : ?>
                                            <div class="testimonial-content">
                                                <p><?php echo wp_kses_post($item['tab_desc']); ?></p>
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>

                    <!-- Navigation Arrows -->
                    <?php if ($settings['arrows'] === 'yes') : ?>
                        <div class="slider-btn">
                            <div class="testimonial-swiper-button-prev swiper__btn">
                                <i class="fa-regular fa-arrow-left-long"></i>
                            </div>
                            <div class="testimonial-swiper-button-next swiper__btn">
                                <i class="fa-regular fa-arrow-right-long"></i>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Pagination Dots -->
                    <?php if ($settings['dots'] === 'yes') : ?>
                        <div class="swiper-pagination"></div>
                    <?php endif; ?>

                </div>
            </div>
        </section>

        <?php
    }
}