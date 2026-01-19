<?php
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Redux' ) ) {
	return;
}

$opt_name = 'zylo_options';

/** Start Core Options */
$theme = wp_get_theme();

$args = array(
	'opt_name'                  => $opt_name,
	'display_name' 				=> esc_html__( ucwords($theme->get( 'Name' )) . ' Options Panel', 'zylo-toolkit' ),
	'display_version'           => $theme->get( 'Version' ),
	'menu_type'                 => 'menu',
	'allow_sub_menu'            => true,
	'menu_title'                => esc_html__( 'Zylo Options', 'zylo-toolkit' ),
	'page_title'                => esc_html__( 'Zylo Options', 'zylo-toolkit' ),
	'disable_google_fonts_link' => false,
	'admin_bar'                 => true,
	'admin_bar_icon'            => 'dashicons-portfolio',
	'admin_bar_priority'        => 50,
	'global_variable'           => $opt_name,
	'dev_mode'                  => false,
	'customizer'                => true,
	'open_expanded'             => false,
	'disable_save_warn'         => false,
	'page_priority'             => 90,
	'page_parent'               => 'themes.php',
	'page_permissions'          => 'manage_options',
	'menu_icon'                 => '',
	'last_tab'                  => '',
	'page_icon'                 => 'icon-themes',
	'page_slug'                 => $opt_name,
	'save_defaults'             => true,
	'default_show'              => false,
	'default_mark'              => '*',
	'show_import_export'        => true,
	'transient_time'            => 60 * MINUTE_IN_SECONDS,
	'output'                    => true,
	'output_tag'                => true,
	'footer_credit'             => '',
	'use_cdn'                   => true,
	'admin_theme'               => 'wp',
	'flyout_submenus'           => true,
	'font_display'              => 'swap',
	'hints'                     => array(
		'icon'          => 'el el-question-sign',
		'icon_position' => 'right',
		'icon_color'    => 'lightgray',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color'   => 'red',
			'shadow'  => true,
			'rounded' => false,
			'style'   => '',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'click mouseleave',
			),
		),
	),
	'database'                  => '',
	'network_admin'             => true,
	'search'                    => false,
);

Redux::set_args( $opt_name, $args );

/** End Core Options */

/** START Header Fields */
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Header', 'zylo-toolkit' ),
		'id'               => 'header',
		'desc'             => esc_html__( 'All Header fields here!', 'zylo-toolkit' ),
		'customizer_width' => '450px',
		'icon'             => 'el el-home',
	)
);
Redux::set_section( $opt_name, array(
    'title'      => esc_html__( 'Preloader', 'zylo' ),
    'id'         => 'zylo_preloader_section',
    'desc'       => esc_html__( 'Control the page preloader animation that appears while the site is loading.', 'zylo' ),
    'icon'       => 'el el-hourglass',
    'fields'     => array(

        array(
            'id'       => 'preloader_enable',
            'type'     => 'switch',
            'title'    => esc_html__( 'Enable Preloader', 'zylo' ),
            'subtitle' => esc_html__( 'Turn on/off the preloader animation.', 'zylo' ),
            'default'  => false,
            'on'       => 'Enabled',
            'off'      => 'Disabled',
        ),

        array(
            'id'       => 'preloader_style',
            'type'     => 'select',
            'title'    => esc_html__( 'Preloader Style', 'zylo' ),
            'subtitle' => esc_html__( 'Choose the preloader animation style.', 'zylo' ),
            'options'  => array(
                'style-1' => esc_html__( 'Letter Animation + Slider (Recommended)', 'zylo' ),
                'style-2' => esc_html__( 'Simple Spinner Only', 'zylo' ),
                'style-3' => esc_html__( 'Custom Image Spinner', 'zylo' ),
            ),
            'default'  => 'style-1',
            'required' => array( 'preloader_enable', '=', true ),
        ),

        array(
            'id'       => 'preloader_text',
            'type'     => 'text',
            'title'    => esc_html__( 'Preloader Text', 'zylo' ),
            'subtitle' => esc_html__( 'Text shown below the animation. Leave empty to hide.', 'zylo' ),
            'default'  => 'Loading...',
            'required' => array( 'preloader_enable', '=', true ),
        ),

        array(
            'id'       => 'preloader_letters',
            'type'     => 'text',
            'title'    => esc_html__( 'Animated Letters', 'zylo' ),
            'subtitle' => esc_html__( 'Letters for typing animation (e.g., ZYLO). Only for Style 1.', 'zylo' ),
            'default'  => 'ZYLO',
            'required' => array( 'preloader_style', '=', 'style-1' ),
        ),

        array(
            'id'       => 'preloader_bg_color',
            'type'     => 'color',
            'title'    => esc_html__( 'Background Color', 'zylo' ),
            'subtitle' => esc_html__( 'Preloader overlay background color.', 'zylo' ),
            'default'  => '#ffffff',
            'transparent' => false,
            'required' => array( 'preloader_enable', '=', true ),
        ),

        array(
            'id'       => 'preloader_spinner_color',
            'type'     => 'color',
            'title'    => esc_html__( 'Spinner Color', 'zylo' ),
            'subtitle' => esc_html__( 'Color for spinner and text animation.', 'zylo' ),
            'default'  => '#B69974
',
            'transparent' => false,
            'required' => array( 'preloader_enable', '=', true ),
        ),

        array(
            'id'       => 'preloader_custom_image',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Custom Spinner Image/GIF', 'zylo' ),
            'subtitle' => esc_html__( 'Upload animated GIF or image for Style 3.', 'zylo' ),
            'required' => array( 'preloader_style', '=', 'style-3' ),
        ),

    )
) );
Redux::set_section(
    $opt_name,
    array(
        'title'            => esc_html__( 'Header Setting', 'zylo-toolkit' ),
        'id'               => 'header_setting',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'choose_default_header',
                'type'     => 'select',
                'title'    => esc_html__('Choose Header Style', 'zylo-toolkit'), 
                'options'  => array(
                    '1' => esc_html__( 'Header Style 1', 'zylo-toolkit' ),
                    '2' => esc_html__( 'Header Style 2', 'zylo-toolkit' ),
                ),
                'default'  => '1',
            ),
            array(
                'id'       => 'primary_logo',
                'type'     => 'media', 
                'url'      => false,
                'title'    => esc_html__('Header Logo', 'zylo-toolkit'),
                'default'  => array(
                    'url' => get_template_directory_uri() . '/img/logo/logo.png'
                ),
            ),
            array(
                'id'       => 'sticky_logo',
                'type'     => 'media', 
                'url'      => false,
                'title'    => esc_html__('Sticky Logo', 'zylo-toolkit'),
                'default'  => array(
                    'url' => get_template_directory_uri() . '/img/logo/sticky-logo.png'
                ),
            ),
            array(
                'id'       => 'show_header_sidebar',
                'type'     => 'switch', 
                'title'    => esc_html__('Show Sidebar', 'zylo-toolkit'),
                'default'  => false,
            ),
            array(
                'id'       => 'header_search_switch',
                'type'     => 'switch',
                'title'    => esc_html__('Show Search Button', 'zylo-toolkit'),
                'subtitle' => esc_html__('Enable or disable the search icon in header right area', 'zylo-toolkit'),
                'default'  => false,
                'on'       => esc_html__('Enabled', 'zylo-toolkit'),
                'off'      => esc_html__('Disabled', 'zylo-toolkit'),
            ),
        ),
    )
);
Redux::set_section(
    $opt_name,
    array(
        'title'            => esc_html__( 'Header Sidebar Area', 'zylo-toolkit' ),
        'id'               => 'header_notice',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'header_topbar_switch',
                'type'     => 'switch', 
                'title'    => esc_html__('Show Header Sidebar', 'zylo-toolkit'),
                'default'  => false,
            ),
            array(
                'id'       => 'sidebar_logo',
                'type'     => 'media', 
                'url'      => false,
                'title'    => esc_html__('Sidebar Logo', 'zylo-toolkit'),
                'required' => array('header_topbar_switch','=', 1),
                'default'  => array(
                    'url'=>get_template_directory_uri() . '/img/logo/logo.png'
                ),
            ),
            array(
                'id'       => 'sidebar_contact_info',
                'type'     => 'text',
                'title'    => esc_html__('Contact Info Text', 'zylo-toolkit'),
                'required' => array('header_topbar_switch','=', 1),
                'default'  => esc_html__('Contact Info', 'zylo-toolkit'),
            ),
            array(
                'id'       => 'sidebar_address',
                'type'     => 'text',
                'title'    => esc_html__('Address Info', 'zylo-toolkit'),
                'required' => array('header_topbar_switch','=', 1),
                'default'  => esc_html__('20, Bordeshi, New York, US', 'zylo-toolkit'),
            ),
            array(
                'id'       => 'sidebar_email_address',
                'type'     => 'text',
                'title'    => esc_html__('Email Address', 'zylo-toolkit'),
                'required' => array('header_topbar_switch','=', 1),
                'default'  => esc_html__('hello@zylo.com', 'zylo-toolkit'),
            ),
            array(
                'id'       => 'sidebar_mail_to',
                'type'     => 'text',
                'title'    => esc_html__('Add Email Address', 'zylo-toolkit'),
                'required' => array('header_topbar_switch','=', 1),
                'default'  => esc_html__('mailto:example@gmail.com', 'zylo-toolkit'),
            ),
            array(
                'id'       => 'sidebar_opening',
                'type'     => 'text',
                'title'    => esc_html__('Opening Time', 'zylo-toolkit'),
                'required' => array('header_topbar_switch','=', 1),
                'default'  => esc_html__('Mod-friday, 09am -05pm', 'zylo-toolkit'),
            ),
            array(
                'id'       => 'sidebar_phone_number',
                'type'     => 'text',
                'title'    => esc_html__('Phone Number', 'zylo-toolkit'),
                'required' => array('header_topbar_switch','=', 1),
                'default'  => esc_html__('(123) 456-7890', 'zylo-toolkit'),
            ),
            array(
                'id'       => 'sidebar_call_to',
                'type'     => 'text',
                'title'    => esc_html__('Add Phone Number', 'zylo-toolkit'),
                'required' => array('header_topbar_switch','=', 1),
                'default'  => esc_html__('tel:+(123)456-7890', 'zylo-toolkit'),
            ),
            array(
                'id'       => 'sidebar_btn_text',
                'type'     => 'text',
                'title'    => esc_html__('Button Text', 'zylo-toolkit'),
                'required' => array('header_topbar_switch','=', 1),
                'default'  => esc_html__('Get A Quote', 'zylo-toolkit'),
            ),
            array(
                'id'       => 'sidebar_btn_link',
                'type'     => 'text',
                'title'    => esc_html__('Button Link', 'zylo-toolkit'),
                'required' => array('header_topbar_switch','=', 1),
                'default'  => esc_html__('#', 'zylo-toolkit'),
            ),
            array(
                'id'       => 'sidebar_facebook_icon',
                'type'     => 'text',
                'title'    => esc_html__('Facebook Icon', 'zylo-toolkit'),
                'required' => array('header_topbar_switch','=', 1),
                'default'  => esc_html__('fab fa-facebook-f', 'zylo-toolkit'),
            ),
            array(
                'id'       => 'sidebar_facebook_icon_url',
                'type'     => 'text',
                'title'    => esc_html__('Facebook url', 'zylo-toolkit'),
                'required' => array('header_topbar_switch','=', 1),
                'default'  => esc_html__('#', 'zylo-toolkit'),
            ),
            array(
                'id'       => 'sidebar_twitter_icon',
                'type'     => 'text',
                'title'    => esc_html__('Twitter Icon', 'zylo-toolkit'),
                'required' => array('header_topbar_switch','=', 1),
                'default'  => esc_html__('fab fa-twitter', 'zylo-toolkit'),
            ),
            array(
                'id'       => 'sidebar_twitter_icon_url',
                'type'     => 'text',
                'title'    => esc_html__('Twitter url', 'zylo-toolkit'),
                'required' => array('header_topbar_switch','=', 1),
                'default'  => esc_html__('#', 'zylo-toolkit'),
            ),
            array(
                'id'       => 'sidebar_youtube_icon',
                'type'     => 'text',
                'title'    => esc_html__('Youtube Icon', 'zylo-toolkit'),
                'required' => array('header_topbar_switch','=', 1),
                'default'  => esc_html__('fab fa-youtube', 'zylo-toolkit'),
            ),
            array(
                'id'       => 'sidebar_youtube_icon_url',
                'type'     => 'text',
                'title'    => esc_html__('Youtube url', 'zylo-toolkit'),  
                'required' => array('header_topbar_switch','=', 1),
                'default'  => esc_html__('#', 'zylo-toolkit'),
            ),
            array(
                'id'       => 'sidebar_linkedin_icon',
                'type'     => 'text',
                'title'    => esc_html__('Linkedin Icon', 'zylo-toolkit'),  
                'required' => array('header_topbar_switch','=', 1),
                'default'  => esc_html__('fab fa-linkedin-in', 'zylo-toolkit'),
            ),
            array(
                'id'       => 'sidebar_linkedin_icon_url',
                'type'     => 'text',
                'title'    => esc_html__('Linkedin url', 'zylo-toolkit'),
                'required' => array('header_topbar_switch','=', 1),
                'default'  => esc_html__('#', 'zylo-toolkit'),
            ),
            
        ),
    )
);

Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Mobile Header Setting', 'zylo-toolkit' ),
		'id'               => 'mobile_header_setting',
		'subsection'       => true,
		'customizer_width' => '450px',
		'fields'           => array(
			array(
				'id'       => 'mobile_header_logo',
				'type'     => 'media', 
				'url'      => false,
				'title'    => esc_html__('Header Logo', 'zylo-toolkit'),
				'default'  => array(
					'url'=>get_template_directory_uri() . '/img/logo/logo.png'
				),
            ),
			array(
				'id'       => 'mobile_header_show_contact_info',
				'type'     => 'switch', 
				'title'    => esc_html__('Show Contact Info', 'zylo-toolkit'),
				'default'  => false,
			),
			array(
				'id'       => 'mobile_header_contact_info',
				'type'     => 'text',
				'title'    => esc_html__('Contact Info','zylo-toolkit'),
				'default' => esc_html__('Contact Info','zylo-toolkit'),
				'required' => array('mobile_header_show_contact_info','=', 1),
            ),
			array(
				'id'       => 'mobile_header_contact_address',
				'type'     => 'text',
				'title'    => esc_html__('Address','zylo-toolkit'),
				'default' => esc_html__('20, Bordeshi, New York, US','zylo-toolkit'),
				'required' => array('mobile_header_show_contact_info','=', 1),
            ),
			array(
				'id'       => 'mobile_header_contact_email',
				'type'     => 'text',
				'title'    => esc_html__('Email','zylo-toolkit'),
				'default' => esc_html__('hello@augmit.com','zylo-toolkit'),
				'required' => array('mobile_header_show_contact_info','=', 1),
            ),
			array(
				'id'       => 'mobile_header_contact_phone',
				'type'     => 'text',
				'title'    => esc_html__('Phone','zylo-toolkit'),
				'default' => esc_html__('+123-456-7890','zylo-toolkit'),
				'required' => array('mobile_header_show_contact_info','=', 1),
            ),
			array(
				'id'       => 'mobile_header_show_social_info',
				'type'     => 'switch', 
				'title'    => esc_html__('Show Social Info', 'zylo-toolkit'),
				'default'  => false,
			),
		),
	)
);

Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Menu Typography', 'zylo-toolkit' ),
		'id'               => 'header_typography',
		'subsection'       => true,
		'customizer_width' => '450px',
		'fields'           => array(
			array(
				'id'             => 'primary_menu_Typography',
				'type'           => 'typography',
				'title'          => esc_html__('Header Style 1 : Menu Typography', 'zylo-toolkit'),
				'google'         => true,
				'text-align'     => false,
				'text-transform' => true,
				'color'          => false,
				'line-height'    => true,
				'letter-spacing' => true,
				'all_styles'     => true,
				'preview'        => array('text'),
				'output'         => array('.header-area.style-1 .main-menu ul li a'),
				'compiler'       => array('.header-area.style-1 .main-menu ul li a'),
				'units'          => 'px',
				'default'        => array(
					'font-size'   => '',
					'font-family' => '',
					'text-transform' => '',
					'font-weight' => '',
					'line-height' => '',
					'google'      => true
				),
			),
			array(
				'id'       => 'menu_font_color',
				'type'     => 'color',
				'title'    => esc_html__('Normal Color', 'zylo-toolkit'), 
				'default'  => '',
				'output'   => array('.header-area.style-1 .main-menu ul li a, .header-area.style-1 .main-menu ul ul li a'),
				'transparent' => false,
			),
			array(
				'id'       => 'menu_font_hover_color',
				'type'     => 'color',
				'title'    => esc_html__('Hover Color', 'zylo-toolkit'), 
				'default'  => '',
				'output'   => array('.header-area.style-1 .main-menu ul li a:hover, .header-area.style-1 .main-menu ul ul li a:hover'),
				'transparent' => false,
			),
			array(
				'id'       => 'menu_font_active_color',
				'type'     => 'color',
				'title'    => esc_html__('Active Color', 'zylo-toolkit'), 
				'default'  => '',
				'output'   => array('.header-area.style-1 .main-menu ul li.active > a'),
				'transparent' => false,
			),
			array(
				'id'       => 'menu_backgound_color',
				'type'     => 'background',
				'title'    => esc_html__('Background Color', 'zylo-toolkit'), 
				'output'   => array('.header-area.style-1, .header-area.style-1 .header-menu-area'),
				'transparent' => false,
				'background-repeat' => false,
				'background-attachment' => false,
				'background-position' => false,
				'background-image' => false,
				'background-size' => false,
				'default'  => array(
					'background-color' => '',
				)
			),
			array(
				'id'       => 'sticky_menu_backgound_color',
				'type'     => 'background',
				'title'    => esc_html__('Sticky Background Color', 'zylo-toolkit'), 
				'output'   => array('.header-area.style-1.sticky_menu'),
				'transparent' => false,
				'background-repeat' => false,
				'background-attachment' => false,
				'background-position' => false,
				'background-image' => false,
				'background-size' => false,
				'default'  => array(
					'background-color' => '',
				)
			),
			// array(
			// 	'id'   =>'divider_1',
			// 	'type' => 'divide'
			// ),
			array(
				'id'             => 'secondary_menu_Typography',
				'type'           => 'typography',
				'title'          => esc_html__('Header Style 2 : Menu Typography', 'zylo-toolkit'),
				'google'         => true,
				'text-align'     => false,
				'text-transform' => true,
				'color'          => false,
				'line-height'    => true,
				'letter-spacing' => true,
				'all_styles'     => true,
				'preview'        => array('text'),
				'output'         => array('.header-area.style-2 .main-menu ul li a'),
				'compiler'       => array('.header-area.style-2 .main-menu ul li a'),
				'units'          => 'px',
				'default'        => array(
					'font-size'   => '',
					'font-family' => '',
					'text-transform' => '',
					'font-weight' => '',
					'line-height' => '',
					'google'      => true
				),
			),
			array(
				'id'       => 'secondary_menu_font_color',
				'type'     => 'color',
				'title'    => esc_html__('Normal Color', 'zylo-toolkit'), 
				'default'  => '',
				'output'   => array('.header-area.style-2 .main-menu ul li a, .header-area.style-2 .main-menu ul ul li a'),
				'transparent' => false,
			),
			array(
				'id'       => 'secondary_menu_font_hover_color',
				'type'     => 'color',
				'title'    => esc_html__('Hover Color', 'zylo-toolkit'), 
				'default'  => '',
				'output'   => array('.header-area.style-2 .main-menu ul li a:hover, .header-area.style-2 .main-menu ul ul li a:hover'),
				'transparent' => false,
			),
			array(
				'id'       => 'secondary_menu_font_active_color',
				'type'     => 'color',
				'title'    => esc_html__('Active Color', 'zylo-toolkit'), 
				'default'  => '',
				'output'   => array('.header-area.style-2 .main-menu ul li.active > a'),
				'transparent' => false,
			),
			array(
				'id'       => 'secondary_menu_backgound_color',
				'type'     => 'background',
				'title'    => esc_html__('Background Color', 'zylo-toolkit'), 
				'output'   => array('.header-area.style-2, .header-area.style-2 .header-menu-area'),
				'transparent' => false,
				'background-repeat' => false,
				'background-attachment' => false,
				'background-position' => false,
				'background-image' => false,
				'background-size' => false,
				'default'  => array(
					'background-color' => '',
				)
			),
			array(
				'id'       => 'secondary_sticky_menu_backgound_color',
				'type'     => 'background',
				'title'    => esc_html__('Sticky Background Color', 'zylo-toolkit'), 
				'output'   => array('.header-area.style-2.sticky_menu'),
				'transparent' => false,
				'background-repeat' => false,
				'background-attachment' => false,
				'background-position' => false,
				'background-image' => false,
				'background-size' => false,
				'default'  => array(
					'background-color' => '',
				)
			),
			// array(
			// 	'id'   =>'divider_2',
			// 	'type' => 'divide'
			// ),
			array(
				'id'             => 'third_menu_Typography',
				'type'           => 'typography',
				'title'          => esc_html__('Header Style 3 : Menu Typography', 'zylo-toolkit'),
				'google'         => true,
				'text-align'     => false,
				'text-transform' => true,
				'color'          => false,
				'line-height'    => true,
				'letter-spacing' => true,
				'all_styles'     => true,
				'preview'        => array('text'),
				'output'         => array('.header-area.style-3 .main-menu ul li a'),
				'compiler'       => array('.header-area.style-3 .main-menu ul li a'),
				'units'          => 'px',
				'default'        => array(
					'font-size'   => '',
					'font-family' => '',
					'text-transform' => '',
					'font-weight' => '',
					'line-height' => '',
					'google'      => true
				),
			),
			array(
				'id'       => 'third_menu_font_color',
				'type'     => 'color',
				'title'    => esc_html__('Normal Color', 'zylo-toolkit'), 
				'default'  => '',
				'output'   => array('.header-area.style-3 .main-menu ul li a, .header-area.style-3 .main-menu ul ul li a'),
				'transparent' => false,
			),
			array(
				'id'       => 'third_menu_font_hover_color',
				'type'     => 'color',
				'title'    => esc_html__('Hover Color', 'zylo-toolkit'), 
				'default'  => '',
				'output'   => array('.header-area.style-3 .main-menu ul li a:hover, .header-area.style-3 .main-menu ul ul li a:hover'),
				'transparent' => false,
			),
			array(
				'id'       => 'third_menu_font_active_color',
				'type'     => 'color',
				'title'    => esc_html__('Active Color', 'zylo-toolkit'), 
				'default'  => '',
				'output'   => array('.header-area.style-3 .main-menu ul li.active > a'),
				'transparent' => false,
			),
			array(
				'id'       => 'third_menu_backgound_color',
				'type'     => 'background',
				'title'    => esc_html__('Background Color', 'zylo-toolkit'), 
				'output'   => array('.header-area.style-3, .header-area.style-3 .header-menu-area'),
				'transparent' => false,
				'background-repeat' => false,
				'background-attachment' => false,
				'background-position' => false,
				'background-image' => false,
				'background-size' => false,
				'default'  => array(
					'background-color' => '',
				)
			),
			array(
				'id'       => 'third_sticky_menu_backgound_color',
				'type'     => 'background',
				'title'    => esc_html__('Sticky Background Color', 'zylo-toolkit'), 
				'output'   => array('.header-area.style-3.sticky_menu'),
				'transparent' => false,
				'background-repeat' => false,
				'background-attachment' => false,
				'background-position' => false,
				'background-image' => false,
				'background-size' => false,
				'default'  => array(
					'background-color' => '',
				)
			),
		),
	)
);

Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Breadcrumb Section', 'zylo-toolkit' ),
		'id'               => 'breadcrumb_section_setting',
		'desc'             => esc_html__( 'Breadcrumb Section here!', 'zylo-toolkit' ),
		'customizer_width' => '450px',
		'icon'             => 'el el-home',
	)
);

Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Breadcrumb Settings', 'zylo-toolkit' ),
		'id'               => 'breadcrumb_setting',
		'subsection'       => true,
		'customizer_width' => '450px',
		'fields'           => array(
			array(
				'id'       => 'choose_default_breadcrumb',
				'type'     => 'select',
				'title'    => esc_html__('Choose Breadcrumb Style', 'zylo-toolkit'), 
				'options'  => array(
					'1' => esc_html__( 'Breadcrumb Style 1', 'zylo-toolkit' ),
				),
				'default'  => '1',
			),
			array(
				'id'        => 'zylo_breadcrumb_bg__color',
				'type'      => 'color_rgba',
				'title'     => 'RGBA Color Picker',
				'default'   => array(
					'color'     => '',
					'alpha'     => ''
				),
				'options'       => array(
					'show_input'                => true,
					'show_initial'              => true,
					'show_alpha'                => true,
					'show_palette'              => true,
					'show_palette_only'         => false,
					'show_selection_palette'    => true,
					'max_palette_size'          => 10,
					'allow_empty'               => true,
					'clickout_fires_change'     => false,
					'choose_text'               => 'Choose',
					'cancel_text'               => 'Cancel',
					'show_buttons'              => true,
					'use_extended_classes'      => true,
					'palette'                   => null,  // show default
					'input_text'                => 'Select Color'
				),                        
			),
			array(
				'id'       => 'breadcrumb_bg_img',
				'type'     => 'media', 
				'url'      => false,
				'title'    => esc_html__('Breadcrumb Background Image', 'zylo-toolkit'),
            ),
		),
	)
);

Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Breadcrumb Content', 'zylo-toolkit' ),
		'id'               => 'breadcrumb_setting_content',
		'subsection'       => true,
		'customizer_width' => '450px',
		'fields'           => array(
			array(
				'id'       => 'breadcrumb_archive',
				'type'     => 'text',
				'title'    => esc_html__('Breadcrumb Archive','zylo-toolkit'),
				'default' => esc_html__('Archive for category','zylo-toolkit'),
            ),
			array(
				'id'       => 'breadcrumb_search',
				'type'     => 'text',
				'title'    => esc_html__('Breadcrumb Search','zylo-toolkit'),
				'default' => esc_html__('Search results for','zylo-toolkit'),
            ),
			array(
				'id'       => 'breadcrumb_post_tags',
				'type'     => 'text',
				'title'    => esc_html__('Breadcrumb tagged','zylo-toolkit'),
				'default' => esc_html__('Posts tagged','zylo-toolkit'),
            ),
			array(
				'id'       => 'breadcrumb_artitle_post_by',
				'type'     => 'text',
				'title'    => esc_html__('Breadcrumb posted by','zylo-toolkit'),
				'default' => esc_html__('Articles posted by','zylo-toolkit'),
            ),
			array(
				'id'       => 'breadcrumb_404',
				'type'     => 'text',
				'title'    => esc_html__('Breadcrumb Page Not Found','zylo-toolkit'),
				'default' => esc_html__('Page Not Found','zylo-toolkit'),
            ),
			array(
				'id'       => 'breadcrumb_page',
				'type'     => 'text',
				'title'    => esc_html__('Breadcrumb Page','zylo-toolkit'),
				'default' => esc_html__('Page','zylo-toolkit'),
            ),
			array(
				'id'       => 'breadcrumb_home',
				'type'     => 'text',
				'title'    => esc_html__('Breadcrumb Home','zylo-toolkit'),
				'default' => esc_html__('Home','zylo-toolkit'),
            )
		),
	)
);

Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Typography Setting', 'zylo-toolkit' ),
		'id'               => 'breadcrumb_setting_typography',
		'subsection'       => true,
		'customizer_width' => '450px',
		'fields'           => array(	
			array(
				'id'             => 'breadcrumb_page_title_typography',
				'type'           => 'typography',
				'title'          => esc_html__('Page Title Typography', 'zylo-toolkit'),
				'google'         => true,
				'text-align'     => false,
				'text-transform' => true,
				'color'          => true,
				'line-height'    => true,
				'letter-spacing' => true,
				'all_styles'     => true,
				'preview'        => array('text'),
				'output'         => array('.page-template .breadcrumb-wrapper .page-title'),
				'compiler'       => array('.page-template .breadcrumb-wrapper .page-title'),
				'units'          => 'px',
				'default'        => array(
					'google'      => true
				),
			),
			array(
				'id'             => 'breadcrumb_list_typography',
				'type'           => 'typography',
				'title'          => esc_html__('Breadcrumb List Typography', 'zylo-toolkit'),
				'google'         => true,
				'text-align'     => false,
				'text-transform' => true,
				'color'          => true,
				'line-height'    => true,
				'letter-spacing' => true,
				'all_styles'     => true,
				'preview'        => array('text'),
				'output'         => array('.page-template .breadcrumb-list ul li a'),
				'compiler'       => array('.page-template .breadcrumb-list ul li a'),
				'units'          => 'px',
				'default'        => array(
					'google'      => true
				),
			),
		),
	)
);

Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Blog Setting', 'zylo-toolkit' ),
		'id'               => 'blog_setting',
		'customizer_width' => '450px',
		'fields'           => array(
			array(
				'id'       => 'zylo_blog_btn_switch',
				'type'     => 'switch', 
				'title'    => esc_html__('Show Button', 'zylo-toolkit'),
				'default'  => false,
			),
			array(
				'id'       => 'zylo_blog_btn',
				'type'     => 'text',
				'title'    => esc_html__('Blog Button text','zylo-toolkit'),
				'default' => esc_html__('Read More','zylo-toolkit'),
				'required' => array('zylo_blog_btn_switch','=', 1),
            ),
			array(
				'id'       => 'zylo_blog_btn_icon_switch',
				'type'     => 'switch', 
				'title'    => esc_html__('Show Button Icon', 'zylo-toolkit'),
				'default'  => false,
				'required' => array('zylo_blog_btn_switch','=', 1),
			),

			array(
				'id'       => 'zylo_blog_btn_icon',
				'type'     => 'text',
				'title'    => esc_html__('Button Icon','zylo-toolkit'),
				'default' => esc_html__('fa-solid fa-angle-right','zylo-toolkit'),
				'required' => array('zylo_blog_btn_icon_switch','=', 1),
            ),
			array(
				'id'       => 'show_blog_social_share',
				'type'     => 'switch', 
				'title'    => esc_html__('Show Social Share', 'zylo-toolkit'),
				'default'  => false,
				'required' => array('zylo_blog_btn_switch','=', 1),
			),
			array(
				'id'             => 'zylo_blog_btn_Typography',
				'type'           => 'typography',
				'title'          => esc_html__('Button Typography', 'zylo-toolkit'),
				'google'         => true,
				'text-align'     => false,
				'text-transform' => true,
				'color'          => false,
				'line-height'    => true,
				'letter-spacing' => true,
				'all_styles'     => true,
				'preview'        => array('text'),
				'output'         => array('.blog-btn.theme-btn'),
				'compiler'       => array('.blog-btn.theme-btn'),
				'units'          => 'px',
				'default'        => array(
					'google'      => true
				),
				'required' => array('zylo_blog_btn_switch','=', 1),
			),
			array(
					'id'       => 'zylo_blog_btn_color',
					'type'     => 'color',
					'title'    => esc_html__('Button Normal Color', 'zylo-toolkit'), 
					'default'  => '',
					'output'   => array('.blog-btn.theme-btn'),
					'transparent' => false,
					'required' => array('zylo_blog_btn_switch','=', 1),
			),
			array(
				'id'       => 'zylo_blog_btn_hover_color',
				'type'     => 'color',
				'title'    => esc_html__('Button Hover Color', 'zylo-toolkit'), 
				'default'  => '',
				'output'   => array('.blog-btn.theme-btn:hover'),
				'transparent' => false,
				'required' => array('zylo_blog_btn_switch','=', 1),
			),
			array(
				'id'       => 'zylo_blog_btn_background_color',
				'type'     => 'background',
				'title'    => esc_html__('Button Background Color', 'zylo-toolkit'), 
				'output'   => array('.blog-btn.theme-btn'),
				'transparent' => false,
				'background-repeat' => false,
				'background-attachment' => false,
				'background-position' => false,
				'background-image' => false,
				'background-size' => false,
				'required' => array('zylo_blog_btn_switch','=', 1),
				'default'  => array(
					'background-color' => '',
				)
			),
			array(
				'id'       => 'zylo_blog_btn_background_hover_color',
				'type'     => 'background',
				'title'    => esc_html__('Button Background Hover Color', 'zylo-toolkit'), 
				'output'   => array('.blog-btn.theme-btn:hover'),
				'transparent' => false,
				'background-repeat' => false,
				'background-attachment' => false,
				'background-position' => false,
				'background-image' => false,
				'background-size' => false,
				'required' => array('zylo_blog_btn_switch','=', 1),
				'default'  => array(
					'background-color' => '',
				)
			),
            array(
                'id'       => 'zylo_blog_btn_padding',
                'type'     => 'spacing',
                'mode'     => 'padding',
                'title'    => esc_html__('Button Padding', 'zylo-toolkit'),
                'output'   => array('.blog-btn.theme-btn'),
                'units'    => 'px',
				'required' => array('zylo_blog_btn_switch','=', 1),
                'default'  => array(
                ),
            ),
			array(
				'id'       => 'breadcrumb_blog_title',
				'type'     => 'text',
				'title'    => esc_html__('Blog Title','zylo-toolkit'),
				'default' => esc_html__('Blog','zylo-toolkit'),
            ),
			array(
				'id'       => 'zylo_blog_show_category',
				'type'     => 'switch', 
				'title'    => esc_html__('Show Category', 'zylo-toolkit'),
				'default'  => true,
			),
			array(
				'id'       => 'zylo_blog_show_user',
				'type'     => 'switch', 
				'title'    => esc_html__('Show User', 'zylo-toolkit'),
				'default'  => true,
			),
			array(
				'id'       => 'zylo_blog_show_date',
				'type'     => 'switch', 
				'title'    => esc_html__('Show Date', 'zylo-toolkit'),
				'default'  => true,
			),
			array(
				'id'       => 'zylo_blog_show_comment',
				'type'     => 'switch', 
				'title'    => esc_html__('Show Comment', 'zylo-toolkit'),
				'default'  => false,
			),
		),
	)
);

Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Blog Details Setting', 'zylo-toolkit' ),
		'id'               => 'blog_details_setting',
		'customizer_width' => '450px',
		'fields'           => array(
			array(
				'id'       => 'breadcrumb_blog_title_details',
				'type'     => 'text',
				'title'    => esc_html__('Blog Breadcrumb Details Title','zylo-toolkit'),
				'default' => esc_html__('Blog Details','zylo-toolkit'),
            ),
			array(
				'id'       => 'zylo_bdetails_post_meta_show_user',
				'type'     => 'switch', 
				'title'    => esc_html__('Show User in Post Meta', 'zylo-toolkit'),
				'default'  => true,
			),
			array(
				'id'       => 'zylo_bdetails_post_meta_show_cat',
				'type'     => 'switch', 
				'title'    => esc_html__('Show Category in Post Meta', 'zylo-toolkit'),
				'default'  => false,
			),
			array(
				'id'       => 'zylo_bdetails_post_meta_show_date',
				'type'     => 'switch', 
				'title'    => esc_html__('Show Date in Post Meta', 'zylo-toolkit'),
				'default'  => true,
			),
			array(
				'id'       => 'zylo_bdetails_post_meta_show_comment',
				'type'     => 'switch', 
				'title'    => esc_html__('Show Comment in Post Meta', 'zylo-toolkit'),
				'default'  => true,
			),
			array(
				'id'       => 'zylo_bdetails_show_category',
				'type'     => 'switch', 
				'title'    => esc_html__('Show Category', 'zylo-toolkit'),
				'default'  => true,
			),
			array(
				'id'       => 'zylo_bdetails_show_tag',
				'type'     => 'switch', 
				'title'    => esc_html__('Show Tag', 'zylo-toolkit'),
				'default'  => true,
			),
			array(
				'id'       => 'zylo_bdetails_social_share',
				'type'     => 'switch', 
				'title'    => esc_html__('Show Social Share', 'zylo-toolkit'),
				'default'  => false,
			),
		),
	)
);



/**
 * Font Options Section
 * *******************************************************
 */
Redux::set_section($opt_name, array(
	'icon'   => 'el el-font',
	'title'  => esc_html__('Font Options', 'zylo-toolkit'),
	'desc'   => esc_html__('If you change value in this section, you must "Save & Generate CSS"', 'zylo-toolkit'),
	'fields' => array(
		array(
			'id'             => 'body_font',
			'type'           => 'typography',
			'title'          => esc_html__('Body Font', 'zylo-toolkit'),
			'subtitle'       => esc_html__('organizfy the body font properties.', 'zylo-toolkit'),
			'google'         => true,
			'text-align'     => false,
			'color'          => false,
			'letter-spacing' => false,
			'line-height'    => true,
			'all_styles'     => true,
			'output'         => array('p, p.desc'),
			'compiler'       => array('p, p.desc'),
			'units'          => 'px',
			'default'        => array(
				'google'      => true
			),
		),
		array(
			'id'             => 'h1_font',
			'type'           => 'typography',
			'title'          => esc_html__('H1 Font', 'zylo-toolkit'),
			'subtitle'       => esc_html__('organizfy the H1 font properties.', 'zylo-toolkit'),
			'google'         => true,
			'text-align'     => false,
			'line-height'    => true,
			'color'          => false,
			'letter-spacing' => false,
			'all_styles'     => true,
			'output'         => array('h1, h1.slider-title'),
			'compiler'       => array('h1, h1.slider-title'),
			'units'          => 'px',
			'default'        => array(

			),
		),
		array(
			'id'             => 'h2_font',
			'type'           => 'typography',
			'title'          => esc_html__('H2 Font', 'zylo-toolkit'),
			'subtitle'       => esc_html__('organizfy the H2 font properties.', 'zylo-toolkit'),
			'google'         => true,
			'line-height'    => true,
			'text-align'     => false,
			'color'          => false,
			'letter-spacing' => false,
			'all_styles'     => true,
			'output'         => array('h2, h2.title'),
			'compiler'       => array('h2, h2.title'),
			'units'          => 'px',
			'default'        => array(
			),
		),
		array(
			'id'             => 'h3_font',
			'type'           => 'typography',
			'title'          => esc_html__('H3 Font', 'zylo-toolkit'),
			'subtitle'       => esc_html__('organizfy the H3 font properties.', 'zylo-toolkit'),
			'google'         => true,
			'text-align'     => false,
			'line-height'    => false,
			'color'          => false,
			'letter-spacing' => false,
			'all_styles'     => true,
			'output'         => array('h3, h3. heading-three'),
			'compiler'       => array('h3, h3. heading-three'),
			'units'          => 'px',
			'default'        => array(
			),
		),
		array(
			'id'             => 'h4_font',
			'type'           => 'typography',
			'title'          => esc_html__('H4 Font', 'zylo-toolkit'),
			'subtitle'       => esc_html__('organizfy the H4 font properties.', 'zylo-toolkit'),
			'google'         => true,
			'text-align'     => false,
			'line-height'    => false,
			'color'          => false,
			'letter-spacing' => false,
			'all_styles'     => true,
			'output'         => array('h4, h4.heading-four'),
			'compiler'       => array('h4, h4.heading-four'),
			'units'          => 'px',
			'default'        => array(
			),
		),
		array(
			'id'             => 'h5_font',
			'type'           => 'typography',
			'title'          => esc_html__('H5 Font', 'zylo-toolkit'),
			'subtitle'       => esc_html__('organizfy the H5 font properties.', 'zylo-toolkit'),
			'google'         => true,
			'line-height'    => false,
			'text-align'     => false,
			'color'          => false,
			'letter-spacing' => false,
			'all_styles'     => true,
			'output'         => array('h5, h5.heading-five'),
			'compiler'       => array('h5, h5.heading-five'),
			'units'          => 'px',
			'default'        => array(
			),
		),
		array(
			'id'             => 'h6_font',
			'type'           => 'typography',
			'title'          => esc_html__('H6 Font', 'zylo-toolkit'),
			'subtitle'       => esc_html__('organizfy the H6 font properties.', 'zylo-toolkit'),
			'google'         => true,
			'line-height'    => false,
			'text-align'     => false,
			'color'          => false,
			'letter-spacing' => false,
			'all_styles'     => true,
			'output'         => array('h6, h6.heading-six'),
			'compiler'       => array('h6, h6.heading-six'),
			'units'          => 'px',
			'default'        => array(

			),
		),
	),
));



Redux::set_section(
	$opt_name,
	array(
		'title'            	=> esc_html__( '404 Setting', 'zylo-toolkit' ),
		'id'               	=> '404_setting',
		'customizer_width' 	=> '450px',
		'fields'           	=> array(
			array(
				'id'       	=> 'zylo_error_404_text',
				'type'     	=> 'text',
				'title'    	=> esc_html__('400 Text','zylo-toolkit'),
				'default' 	=> esc_html__('404','zylo-toolkit'),
            ),
			array(
				'id'       	=> 'zylo_error_title',
				'type'     	=> 'text',
				'title'    	=> esc_html__('Not Found Title','zylo-toolkit'),
				'default' 	=> esc_html__('Page not found','zylo-toolkit'),
            ),
			array(
				'id'       	=> 'zylo_error_desc',
				'type'     	=> 'textarea',
				'title'    	=> esc_html__('404 Description Text','zylo-toolkit'),
				'default' 	=> esc_html__('Oops! The page you are looking for does not exist. It might have been moved or deleted','zylo-toolkit'),
            ),
			array(
				'id'       	=> 'zylo_error_link_text',
				'type'     	=> 'text',
				'title'    	=> esc_html__('404 Link Text','zylo-toolkit'),
				'default' 	=> esc_html__('Back To Home','zylo-toolkit'),
            ),
			array(
                'id'       => 'zylo_error_404_section_padding',
                'type'     => 'spacing',
                'mode'     => 'padding',
                'title'    => esc_html__('Section Padding', 'zylo-toolkit'),
                'output'   => array('.error404 .blog-area'),
                'units'    => 'px',
                'default'  => array(

                ),
            ),
			array(
				'id'             => 'zylo_error_404_home_btn_Typography',
				'type'           => 'typography',
				'title'          => esc_html__('Button Typography', 'zylo-toolkit'),
				'google'         => true,
				'text-align'     => false,
				'text-transform' => true,
				'color'          => false,
				'line-height'    => true,
				'letter-spacing' => true,
				'all_styles'     => true,
				'preview'        => array('text'),
				'output'         => array('.error-btn.theme-btn'),
				'compiler'       => array('.error-btn.theme-btn'),
				'units'          => 'px',
				'default'        => array(
					'google'      => true
				),
			),
			array(
					'id'       => 'zylo_error_404_home_btn_color',
					'type'     => 'color',
					'title'    => esc_html__('Button Normal Color', 'zylo-toolkit'), 
					'default'  => '',
					'output'   => array('.error-btn.theme-btn'),
					'transparent' => false,
			),
			array(
				'id'       => 'zylo_error_404_home_btn_hover_color',
				'type'     => 'color',
				'title'    => esc_html__('Button Hover Color', 'zylo-toolkit'), 
				'default'  => '',
				'output'   => array('.error-btn.theme-btn:hover'),
				'transparent' => false,
			),
			array(
				'id'       => 'zylo_error_404_home_btn_background_color',
				'type'     => 'background',
				'title'    => esc_html__('Button Background Color', 'zylo-toolkit'), 
				'output'   => array('.error-btn.theme-btn'),
				'transparent' => false,
				'background-repeat' => false,
				'background-attachment' => false,
				'background-position' => false,
				'background-image' => false,
				'background-size' => false,
				'default'  => array(
					'background-color' => '',
				)
			),
			array(
				'id'       => 'zylo_error_404_home_btn_background_hover_color',
				'type'     => 'background',
				'title'    => esc_html__('Button Background Hover Color', 'zylo-toolkit'), 
				'output'   => array('.error-btn.theme-btn:hover'),
				'transparent' => false,
				'background-repeat' => false,
				'background-attachment' => false,
				'background-position' => false,
				'background-image' => false,
				'background-size' => false,
				'default'  => array(
					'background-color' => '#141F39',
				)
			),
            array(
                'id'       => 'zylo_error_404_home_btn_padding',
                'type'     => 'spacing',
                'mode'     => 'padding',
                'title'    => esc_html__('Button Padding', 'zylo-toolkit'),
                'output'   => array('.error-btn.theme-btn'),
                'units'    => 'px',
                'default'  => array(
                    'padding-top'    => '16px',
                    'padding-right'  => '40px',
                    'padding-bottom' => '16px',
                    'padding-left'   => '40px',
                ),
            ),
		),
	)
);

Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Footer', 'zylo-toolkit' ),
		'id'               => 'footer',
		'desc'             => esc_html__( 'All Footer fields here!', 'zylo-toolkit' ),
		'customizer_width' => '450px',
		'icon'             => 'el el-pencil',
	)
);

Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Footer Setting', 'zylo-toolkit' ),
		'id'               => 'zylo_footer_setting',
		'subsection'       => true,
		'customizer_width' => '450px',
		'fields'           => array(
			array(
				'id'       => 'choose_default_footer',
				'type'     => 'select',
				'title'    => esc_html__('Choose Footer Style', 'zylo-toolkit'), 
				'options'  => array(
					'1' => esc_html__( 'Footer Style 1', 'zylo-toolkit' ),
					'2' => esc_html__( 'Footer Style 2', 'zylo-toolkit' ),
				),
				'default'  => '1',
			),
			array(
				'id'       => 'footer_logo',
				'type'     => 'media', 
				'url'      => false,
				'title'    => esc_html__('Footer Logo', 'zylo-toolkit'),
				'default'  => array(
					'url'=>get_template_directory_uri() . '/img/logo/logo.png'
				),
            ),
			array(
				'id'      => 'zylo_copyright',
				'type'    => 'text',
				'title'   => esc_html__('Copy Right','zylo-toolkit'),
				'default' => esc_html__('Copyright &copy; 2025 Zylo. All Rights Reserved','zylo-toolkit'),
            ),
		),
	)
);

Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Footer Style 1 Setting', 'zylo-toolkit' ),
		'id'               => 'zylo_footer_1_setting',
		'subsection'       => true,
		'customizer_width' => '450px',
		'fields'           => array(
			array(
				'id'        => 'zylo_footer_bg_color',
				'type'      => 'color_rgba',
				'title'     => 'Background Color',
				'default'   => array(
					'color'     => '',
					'alpha'     => ''
				),
				'options'       => array(
					'show_input'                => true,
					'show_initial'              => true,
					'show_alpha'                => true,
					'show_palette'              => true,
					'show_palette_only'         => false,
					'show_selection_palette'    => true,
					'max_palette_size'          => 10,
					'allow_empty'               => true,
					'clickout_fires_change'     => false,
					'choose_text'               => 'Choose',
					'cancel_text'               => 'Cancel',
					'show_buttons'              => true,
					'use_extended_classes'      => true,
					'palette'                   => null,  // show default
					'input_text'                => 'Select Color'
				),                        
			), 
			array(
				'id'       => 'zylo_footer_bg',
				'type'     => 'media', 
				'url'      => false,
				'title'    => esc_html__('Footer Background Image', 'zylo-toolkit'),
            ),
		),
	)
);

Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Footer Style 2 Setting', 'zylo-toolkit' ),
		'id'               => 'zylo_footer_3_setting',
		'subsection'       => true,
		'customizer_width' => '450px',
		'fields'           => array(
			array(
				'id'        => 'zylo_footer_style_3_bg_color',
				'type'      => 'color_rgba',
				'title'     => 'RGBA Color Picker',
				'default'   => array(
					'color'     => '',
					'alpha'     => ''
				),
				'options'       => array(
					'show_input'                => true,
					'show_initial'              => true,
					'show_alpha'                => true,
					'show_palette'              => true,
					'show_palette_only'         => false,
					'show_selection_palette'    => true,
					'max_palette_size'          => 10,
					'allow_empty'               => true,
					'clickout_fires_change'     => false,
					'choose_text'               => 'Choose',
					'cancel_text'               => 'Cancel',
					'show_buttons'              => true,
					'use_extended_classes'      => true,
					'palette'                   => null,  
					'input_text'                => 'Select Color'
				),                        
			),	
			array(
				'id'       => 'zylo_footer_style_3_bg',
				'type'     => 'media', 
				'url'      => false,
				'title'    => esc_html__('Background Image', 'zylo-toolkit'),
            ),
		),
	)
);


Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Footer Typography', 'zylo-toolkit' ),
		'id'               => 'footer_typography',
		'subsection'       => true,
		'customizer_width' => '450px',
		'fields'           => array(
			array(
				'id'             => 'footer_title_typography',
				'type'           => 'typography',
				'title'          => esc_html__('Title Typography', 'zylo-toolkit'),
				'google'         => true,
				'text-align'     => false,
				'text-transform' => true,
				'color'          => false,
				'line-height'    => true,
				'letter-spacing' => true,
				'all_styles'     => true,
				'preview'        => array('text'),
				'output'         => array('.footer-widget-title'),
				'compiler'       => array('.footer-widget-title'),
				'units'          => 'px',
				'default'        => array(
					'google'      => true
				),
			),
			array(
				'id'       => 'footer_title_color',
				'type'     => 'color',
				'title'    => esc_html__('Title Color', 'zylo-toolkit'), 
				'default'  => '',
				'output'   => array('.footer-widget-title'),
				'transparent' => false,
			),
			array(
				'id'       => 'footer_title_hover_color',
				'type'     => 'color',
				'title'    => esc_html__('Title Hover Color', 'zylo-toolkit'), 
				'default'  => '',
				'output'   => array('.footer-widget-title:hover'),
				'transparent' => false,
			),
			array(
				'id'             => 'footer_des_typography',
				'type'           => 'typography',
				'title'          => esc_html__('Description Typography', 'zylo-toolkit'),
				'google'         => true,
				'text-align'     => false,
				'text-transform' => true,
				'color'          => true,
				'line-height'    => true,
				'letter-spacing' => true,
				'all_styles'     => true,
				'preview'        => array('text'),
				'output'         => array('.footer-widget .desc'),
				'compiler'       => array('.footer-widget .desc'),
				'units'          => 'px',
				'default'        => array(
					'google'      => true
				),
			),
		),
	)
);

Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Footer Bottom Typography', 'zylo-toolkit' ),
		'id'               => 'footer_bottom_typography',
		'subsection'       => true,
		'customizer_width' => '450px',
		'fields'           => array(
			array(
				'id'             => 'footer_copyright_text_typography',
				'type'           => 'typography',
				'title'          => esc_html__('Copyright Typography', 'zylo-toolkit'),
				'google'         => true,
				'text-align'     => false,
				'text-transform' => true,
				'color'          => true,
				'line-height'    => true,
				'letter-spacing' => true,
				'all_styles'     => true,
				'preview'        => array('text'),
				'output'         => array('.footer-bottom-area .copyright-text p'),
				'compiler'       => array('.footer-bottom-area .copyright-text p'),
				'units'          => 'px',
				'default'        => array(
					'google'      => true
				),
			),
			array(
				'id'             => 'footer_botttom_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__('Bottom Menu Typography', 'zylo-toolkit'),
				'google'         => true,
				'text-align'     => false,
				'text-transform' => true,
				'color'          => false,
				'line-height'    => true,
				'letter-spacing' => true,
				'all_styles'     => true,
				'preview'        => array('text'),
				'output'         => array('.footer-bottom-menu ul li a'),
				'compiler'       => array('.footer-bottom-menu ul li a'),
				'units'          => 'px',
				'default'        => array(
					'google'      => true
				),
			),
			array(
				'id'       => 'footer_botttom_menu_color',
				'type'     => 'color',
				'title'    => esc_html__('Menu Color', 'zylo-toolkit'), 
				'default'  => '',
				'output'   => array('.footer-bottom-menu ul li a'),
				'transparent' => false,
			),
			array(
				'id'       => 'footer_botttom_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__('Menu Hover Color', 'zylo-toolkit'), 
				'default'  => '',
				'output'   => array('.footer-bottom-menu ul li a:hover'),
				'transparent' => false,
			),
		),
	)
);