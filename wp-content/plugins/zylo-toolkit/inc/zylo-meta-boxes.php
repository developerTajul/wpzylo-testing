<?php 
/** 
 * [custom_post_metabox description]
 * @return [type] [description]
 */
function custom_post_metabox() {
  
  $page = new_cmb2_box(array(
    'id'  => 'zylo-toolkit',
    'title' =>  esc_html__( 'Page Info', 'zylo-toolkit' ),
    'object_types'  => array('page'),
    'fields'       => array (

        array (
            'name' => esc_html__( 'Breadcrumb Style', 'zylo-toolkit' ),
            'id' => 'zylo_choice_breadcrumb_style',
            'type' => 'select',
            'show_option_none' => false,
            'options' => array(
                'default' => esc_html__( 'Default', 'zylo-toolkit' ),
                'breadcrumb-style-1' => esc_html__( 'Breadcrumb Style 1', 'zylo-toolkit' )
            ),
        ),
        array(
          'name' => esc_html__( 'Is it invisible breadcrumb?', 'zylo-toolkit'),
          'id'   => 'zylo_invisible_breadcrumb',
          'type' => 'checkbox',
        ),
        array(
          'name' => esc_html__( 'Body Background Color', 'zylo-toolkit'),
          'id'   => 'breadcrumb_bg_color_img_from_page',
          'type' => 'colorpicker',
          'desc'    => 'Choose Color From Here',
          'options' => array(
            'alpha' => true, // 0-100
            'palettes' => true, // array of hex color codes
            'defaultColor' => '#ffffff',
            'selectors' => array(
              'body' => 'background-color: {{VALUE}};',
            )
          ),
        ),
        array(
            'name' => esc_html__( 'Breadcrumb Background', 'zylo-toolkit'),
            'id'   => 'breadcrumb_bg_img_from_page',
            'type' => 'file',
            'desc'    => 'Upload an image or enter an URL.',
        ),
        array(
          'name' => esc_html__( 'Logo', 'donik-toolkit'),
          'id'   => 'logo_from_page',
          'type' => 'file',
          'desc'    => 'Upload an image or enter an URL.',
      ),
      array(
          'name' => esc_html__( 'Sticky Logo', 'donik-toolkit'),
          'id'   => 'sticky_logo_from_page',
          'type' => 'file',
          'desc'    => 'Upload an image or enter an URL.',
      ),
        array (
            'name' => esc_html__( 'Header Style', 'zylo-toolkit' ),
            'id' => 'zylo_choice_header_style',
            'type' => 'select',
            'show_option_none' => false,
            'options' => array(
                'default' => esc_html__( 'Default', 'zylo-toolkit' ),
                'header-style-1' => esc_html__( 'Header Style 1', 'zylo-toolkit' ),
                'header-style-2' => esc_html__( 'Header Style 2', 'zylo-toolkit' ),
            ),
        ),
        array (
            'name' => esc_html__( 'Footer Style', 'zylo-toolkit' ),
            'id' => 'zylo_choice_footer_style',
            'type' => 'select',
            'show_option_none' => false,
            'options' => array(
                'default' => esc_html__( 'Default', 'zylo-toolkit' ),
                'footer-style-1' => esc_html__( 'Footer Style 1', 'zylo-toolkit' ),
                'footer-style-2' => esc_html__( 'Footer Style 2', 'zylo-toolkit' ),
            ),
        ),
        array(
            'name' => esc_html__( 'Footer Background', 'zylo-toolkit'),
            'id'   => 'zylo_footer_bg',
            'type' => 'file',
            'desc'    => 'Upload an image or enter an URL.',
        ),
        array(
            'name' => esc_html__( 'Footer Background Color', 'zylo-toolkit'),
            'id'   => 'zylo_footer_bg_color',
            'type' => 'colorpicker',
            'desc'    => 'Choose Color From Here',
            'options' => array(
            	'alpha' => true, // 0-100
            	'palettes' => true, // array of hex color codes
              'defaultColor' => '#ffffff',
              'selectors' => array(
                'body' => 'background-color: {{VALUE}};',
              )
            ),
          ),

    ) 
  ));

}

add_action('cmb2_admin_init', 'custom_post_metabox');


/**
 * [zylo_profile_metabox description]
 * @param  array  $review [description]
 * @return [type]         [description]
 */
function zylo_profile_metabox(array $profile) {

  $profile[] = array(
    'id'           => 'profile-edit',
    'title'        => esc_html__( 'Profile Media links', 'zylo-toolkit' ),
    'object_types' => array( 'user'),
    'fields'       => array (
      array(
        'name' => esc_html__( 'Facebook Url', 'zylo-toolkit'),
        'id'   => 'profile_fb_url',
        'type' => 'text_url',
      ),
      array(
        'name' => esc_html__( 'Twitter Url', 'zylo-toolkit'),
        'id'   => 'profile_twitter_url',
        'type' => 'text_url',
      ),
      array(
        'name' => esc_html__( 'Youtube Url', 'zylo-toolkit'),
        'id'   => 'profile_youtube_url',
        'type' => 'text_url',
      ),
      array(
        'name' => esc_html__( 'Linkedin Url', 'zylo-toolkit'),
        'id'   => 'profile_linkedin_url',
        'type' => 'text_url',
      )

    )
  );

  return $profile;
}

add_filter('cmb2_meta_boxes','zylo_profile_metabox');




function zylo_metabox_for_blog(){


  $section = new_cmb2_box(array(
    'title'     => 'Fields According to Post Format',
    'object_types'  => array('post'),
    'id'      => 'fields-for-posts'
  ));


  $section->add_field(array(
    'name'  => 'Video URL',
    'id'  => '_video-url',
    'type'  => 'oembed'
  ));

  $section->add_field(array(
    'name'  => 'Audio URL',
    'id'  => '_audio-url',
    'type'  => 'oembed'
  ));

  $section->add_field(array(
    'name'  => 'Gallery Images',
    'id'  => '_gallery-images',
    'type'  => 'file_list'
  ));

}
add_action('cmb2_admin_init', 'zylo_metabox_for_blog');



function zylo_metabox_for_massionary_blog(){


  $section = new_cmb2_box(array(
    'title'     => 'Massionary blog',
    'object_types'  => array('post'),
    'id'      => 'fields-for-massionary-blog-posts'
  ));


  $section->add_field(array(
    'name'  => 'Full Featured Image',
    'id'  => 'featured_blog_image',
    'type'  => 'file'
  ));

}
add_action('cmb2_admin_init', 'zylo_metabox_for_massionary_blog');

function zylo_metabox_for_post_read_time(){


  $section = new_cmb2_box(array(
    'title'     => 'Post Read Time',
    'object_types'  => array('post'),
    'id'      => 'fields-for-post-read-time'
  ));


  $section->add_field(array(
    'name'  => 'Read Time',
    'id'  => 'post_read_time',
    'type'  => 'text'
  ));

}
add_action('cmb2_admin_init', 'zylo_metabox_for_post_read_time');


