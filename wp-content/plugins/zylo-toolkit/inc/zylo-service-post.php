<?php 
class ZyloServicePost {
    
    function __construct() {
        add_action('init', array($this, 'register_custom_post_type'));
        add_action('init', array($this, 'create_cat'));
        add_filter('cmb2_meta_boxes', array($this, 'add_meta'));
        add_filter('cmb2_admin_init', array($this, 'add_list_item_meta'));
        add_filter('template_include', array($this, 'service_template_include'));
    }
    
    public function service_template_include($template) {
        if (is_singular('zylo-service')) {
            return $this->get_template('single-zylo-service.php');
        }
        return $template;
    }
    
    public function get_template($template) {
        if ($theme_file = locate_template(array($template))) {
            $file = $theme_file;
        } else {
            $file = ZYLO_TOOLKIT_DIR . '/template/' . $template;
        }
        return apply_filters(__FUNCTION__, $file, $template);
    }
    
    public function register_custom_post_type() {
        $labels = array(
            'name'               => esc_html__('Services', 'zylo-toolkit'),
            'singular_name'      => esc_html__('Service', 'zylo-toolkit'),
            'menu_name'          => esc_html__('Services', 'zylo-toolkit'),
            'parent_item_colon'  => esc_html__('Parent Service', 'zylo-toolkit'),
            'all_items'          => esc_html__('All Services', 'zylo-toolkit'),
            'view_item'          => esc_html__('View Service', 'zylo-toolkit'),
            'add_new_item'       => esc_html__('Add New Service', 'zylo-toolkit'),
            'add_new'            => esc_html__('Add New', 'zylo-toolkit'),
            'edit_item'          => esc_html__('Edit Service', 'zylo-toolkit'),
            'update_item'        => esc_html__('Update Service', 'zylo-toolkit'),
            'search_items'       => esc_html__('Search Service', 'zylo-toolkit'),
            'not_found'          => esc_html__('Not found', 'zylo-toolkit'),
            'not_found_in_trash' => esc_html__('Not found in Trash', 'zylo-toolkit'),
        );

        $args = array(
            'label'               => esc_html__('Services', 'zylo-toolkit'),
            'description'         => esc_html__('Create and manage services', 'zylo-toolkit'),
            'labels'              => $labels,
            'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'revisions'),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 14,
            'menu_icon'           => 'dashicons-admin-tools',
            'rewrite'             => array('slug' => 'services', 'with_front' => false),
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'show_in_rest'        => true, // ✅ Elementor + Gutenberg support
        );

        register_post_type('zylo-service', $args);
    }
    
    public function create_cat() {
        $labels = array(
            'name'              => esc_html__('Service Categories', 'zylo-toolkit'),
            'singular_name'     => esc_html__('Service Category', 'zylo-toolkit'),
            'search_items'      => esc_html__('Search Categories', 'zylo-toolkit'),
            'all_items'         => esc_html__('All Categories', 'zylo-toolkit'),
            'parent_item'       => esc_html__('Parent Category', 'zylo-toolkit'),
            'parent_item_colon' => esc_html__('Parent Category:', 'zylo-toolkit'),
            'edit_item'         => esc_html__('Edit Category', 'zylo-toolkit'),
            'update_item'       => esc_html__('Update Category', 'zylo-toolkit'),
            'add_new_item'      => esc_html__('Add New Category', 'zylo-toolkit'),
            'new_item_name'     => esc_html__('New Category Name', 'zylo-toolkit'),
            'menu_name'         => esc_html__('Categories', 'zylo-toolkit'),
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array('slug' => 'service-category'),
            'show_in_rest'      => true, // ✅ REST API support
        );

        register_taxonomy('service_categories', 'zylo-service', $args);
    }

    public function add_meta(array $zylo) {
        $zylo[] = array(
            'id'           => 'zylo-service-meta',
            'title'        => esc_html__('Service Details Info', 'zylo-toolkit'),
            'object_types' => array('zylo-service'),
            'fields'       => array(
                array(
                    'name' => esc_html__('Service Single Page Thumbnail', 'zylo-toolkit'),
                    'desc' => esc_html__('Upload service thumbnail image', 'zylo-toolkit'),
                    'type' => 'file',
                    'id'   => 'service_single_thumb_img',
                ),
                array(
                    'name' => esc_html__('Service Icon Image', 'zylo-toolkit'),
                    'desc' => esc_html__('Upload image (64x55px recommended)', 'zylo-toolkit'),
                    'type' => 'file',
                    'id'   => 'service_icon_image',
                ),
                array(
                    'name' => esc_html__('Service Icon Class', 'zylo-toolkit'),
                    'desc' => esc_html__('e.g., fas fa-laptop-code', 'zylo-toolkit'),
                    'type' => 'text',
                    'id'   => 'service_icon_class',
                ),
                array(
                    'name' => esc_html__('Service Active Class', 'zylo-toolkit'),
                    'type' => 'text',
                    'id'   => 'service_active_class',
                ),
                array(
                    'name' => esc_html__('Service Single Left Image', 'zylo-toolkit'),
                    'type' => 'file',
                    'id'   => 'service_single_left_thumb_img',
                ),
                array(
                    'name' => esc_html__('Service Single Right Image', 'zylo-toolkit'),
                    'type' => 'file',
                    'id'   => 'service_single_right_thumb_img',
                ),
                array(
                    'name' => esc_html__('Service Gallery Images', 'zylo-toolkit'),
                    'desc' => esc_html__('Upload images (425x562px recommended)', 'zylo-toolkit'),
                    'type' => 'file_list',
                    'id'   => 'service_gallery_images',
                ),
                array(
                    'name'    => esc_html__('Service Content', 'zylo-toolkit'),
                    'desc'    => esc_html__('Additional service content', 'zylo-toolkit'),
                    'id'      => 'service_tiny_text',
                    'type'    => 'wysiwyg',
                    'options' => array(
                        'textarea_rows' => 10,
                        'media_buttons' => true,
                    ),
                ),
            )
        );
        return $zylo;
    }

    public function add_list_item_meta() {
        $list_items = new_cmb2_box(array(
            'id'           => 'service-list-meta',
            'title'        => esc_html__('Service List', 'zylo-toolkit'),
            'object_types' => array('zylo-service'),
        ));

        $group_field_id = $list_items->add_field(array(
            'id'          => 'service_list_repeat_group',
            'type'        => 'group',
            'description' => esc_html__('Add service list items', 'zylo-toolkit'),
            'repeatable'  => true,
            'options'     => array(
                'group_title'   => esc_html__('Service List Item {#}', 'zylo-toolkit'),
                'add_button'    => esc_html__('Add Another Entry', 'zylo-toolkit'),
                'remove_button' => esc_html__('Remove Entry', 'zylo-toolkit'),
                'sortable'      => true,
                'closed'        => false,
            ),
        ));

        $list_items->add_group_field($group_field_id, array(
            'name' => esc_html__('List Left', 'zylo-toolkit'),
            'type' => 'text',
            'id'   => 'service_list_item',
        ));

        $list_items->add_group_field($group_field_id, array(
            'name' => esc_html__('List Right', 'zylo-toolkit'),
            'type' => 'text',
            'id'   => 'service_list_item_right',
        ));
    }
}

new ZyloServicePost();
