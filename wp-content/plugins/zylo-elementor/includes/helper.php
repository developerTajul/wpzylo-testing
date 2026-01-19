<?php 
namespace ZyloElementor\Helper;

// BDT Position
function element_pack_position() {
    $position_options = [
        ''              => esc_html__('Default', 'zylo-elementor'),
        'top-left'      => esc_html__('Top Left', 'zylo-elementor') ,
        'top-center'    => esc_html__('Top Center', 'zylo-elementor') ,
        'top-right'     => esc_html__('Top Right', 'zylo-elementor') ,
        'center'        => esc_html__('Center', 'zylo-elementor') ,
        'center-left'   => esc_html__('Center Left', 'zylo-elementor') ,
        'center-right'  => esc_html__('Center Right', 'zylo-elementor') ,
        'bottom-left'   => esc_html__('Bottom Left', 'zylo-elementor') ,
        'bottom-center' => esc_html__('Bottom Center', 'zylo-elementor') ,
        'bottom-right'  => esc_html__('Bottom Right', 'zylo-elementor') ,
    ];

    return $position_options;
}