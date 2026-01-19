<?php 
/**
 * Portfolio Custom Post Type
 * 
 * @package Zylo Toolkit
 * @since 1.0.0
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class ZyloProject {
    
    function __construct() {
        add_action('init', array($this, 'register_custom_post_type'));
        add_action('init', array($this, 'create_cat'));
        add_filter('cmb2_meta_boxes', array($this, 'add_meta'));
        add_filter('cmb2_admin_init', array($this, 'add_list_item_meta'));
        add_filter('template_include', array($this, 'portfolio_template_include'));
    }
    
    /**
     * Portfolio Template Include
     */
    public function portfolio_template_include($template) {
        if (is_singular('zylo-portfolio')) {
            return $this->get_template('single-zylo-portfolio.php');
        }
        return $template;
    }
    
    /**
     * Get Template Path
     */
    public function get_template($template) {
        if ($theme_file = locate_template(array($template))) {
            $file = $theme_file;
        } else {
            $file = ZYLO_TOOLKIT_DIR . 'template/' . $template;
        }
        return apply_filters(__FUNCTION__, $file, $template);
    }
    
    /**
     * Register Portfolio Post Type
     */
    public function register_custom_post_type() {
        $labels = array(
            'name'               => esc_html__('Projects', 'zylo-toolkit'),
            'singular_name'      => esc_html__('Project', 'zylo-toolkit'),
            'menu_name'          => esc_html__('Projects', 'zylo-toolkit'),
            'parent_item_colon'  => esc_html__('Parent Project', 'zylo-toolkit'),
            'all_items'          => esc_html__('All Projects', 'zylo-toolkit'),
            'view_item'          => esc_html__('View Project', 'zylo-toolkit'),
            'add_new_item'       => esc_html__('Add New Project', 'zylo-toolkit'),
            'add_new'            => esc_html__('Add New', 'zylo-toolkit'),
            'edit_item'          => esc_html__('Edit Project', 'zylo-toolkit'),
            'update_item'        => esc_html__('Update Project', 'zylo-toolkit'),
            'search_items'       => esc_html__('Search Projects', 'zylo-toolkit'),
            'not_found'          => esc_html__('Not found', 'zylo-toolkit'),
            'not_found_in_trash' => esc_html__('Not found in Trash', 'zylo-toolkit'),
        );

        $args = array(
            'label'               => esc_html__('Projects', 'zylo-toolkit'),
            'description'         => esc_html__('Create and manage portfolio projects', 'zylo-toolkit'),
            'labels'              => $labels,
            'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'revisions'),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 15,
            'menu_icon'           => 'dashicons-portfolio',
            'rewrite'             => array('slug' => 'projects', 'with_front' => false),
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'show_in_rest'        => true, // ✅ Elementor support
        );

        register_post_type('zylo-portfolio', $args);
    }
    
    /**
     * Register Portfolio Category Taxonomy
     */
    public function create_cat() {
        $labels = array(
            'name'              => esc_html__('Project Categories', 'zylo-toolkit'),
            'singular_name'     => esc_html__('Project Category', 'zylo-toolkit'),
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
            'rewrite'           => array('slug' => 'project-category'),
            'show_in_rest'      => true, // ✅ Elementor support
        );

        register_taxonomy('portfolio_categories', 'zylo-portfolio', $args);
    }

    /**
     * Add Portfolio Meta Fields
     */
    public function add_meta(array $zylo) {
        $zylo[] = array(
            'id'           => 'zylo-portfolio-meta',
            'title'        => esc_html__('Portfolio Info', 'zylo-toolkit'),
            'object_types' => array('zylo-portfolio'),
            'fields'       => array(
                array(
                    'name' => esc_html__('Large Image', 'zylo-toolkit'),
                    'desc' => esc_html__('Upload image (854x466px recommended)', 'zylo-toolkit'),
                    'type' => 'file',
                    'id'   => 'portfolio_single_img',
                ),
                array(
                    'name' => esc_html__('Thumbnail Image', 'zylo-toolkit'),
                    'desc' => esc_html__('Upload image (520x305px recommended)', 'zylo-toolkit'),
                    'type' => 'file',
                    'id'   => 'portfolio_thumbnail_img',
                ),
                array(
                    'name' => esc_html__('Portfolio Page Image', 'zylo-toolkit'),
                    'desc' => esc_html__('Upload image (520x305px recommended)', 'zylo-toolkit'),
                    'type' => 'file',
                    'id'   => 'portfolio_page_img',
                ),
                array(
                    'name'    => esc_html__('Project Content', 'zylo-toolkit'),
                    'desc'    => esc_html__('Additional project content', 'zylo-toolkit'),
                    'id'      => 'portfolio_tiny_content',
                    'type'    => 'wysiwyg',
                    'options' => array(
                        'wpautop'       => true,
                        'media_buttons' => true,
                        'textarea_rows' => 10,
                        'teeny'         => false,
                        'tinymce'       => true,
                        'quicktags'     => true,
                    ),
                ),
                array(
                    'name' => esc_html__('Project Name Label', 'zylo-toolkit'),
                    'id'   => 'portfolio_project_name_label',
                    'type' => 'text',
                ),
                array(
                    'name' => esc_html__('Project Name', 'zylo-toolkit'),
                    'id'   => 'portfolio_project_name',
                    'type' => 'text',
                ),
                array(
                    'name' => esc_html__('Portfolio Left Thumbnail', 'zylo-toolkit'),
                    'id'   => 'portfolio_left_thumb',
                    'type' => 'file',
                ),
                array(
                    'name' => esc_html__('Portfolio Right Thumbnail', 'zylo-toolkit'),
                    'id'   => 'portfolio_right_thumb',
                    'type' => 'file',
                ),
            )
        );
        
        return $zylo;
    }

    /**
     * Add Portfolio List Meta (Repeater)
     */
    public function add_list_item_meta() {
        $list_items = new_cmb2_box(array(
            'id'           => 'portfolio-list-meta',
            'title'        => esc_html__('Portfolio List', 'zylo-toolkit'),
            'object_types' => array('zylo-portfolio'),
        ));

        $group_field_id = $list_items->add_field(array(
            'id'          => 'portfolio_list_repeat_group',
            'type'        => 'group',
            'description' => esc_html__('Portfolio List Item', 'zylo-toolkit'),
            'repeatable'  => true,
            'options'     => array(
                'group_title'   => esc_html__('Portfolio List Item {#}', 'zylo-toolkit'),
                'add_button'    => esc_html__('Add Another Entry', 'zylo-toolkit'),
                'remove_button' => esc_html__('Remove Entry', 'zylo-toolkit'),
                'sortable'      => true,
                'closed'        => false,
            ),
        ));

        // List Left
        $list_items->add_group_field($group_field_id, array(
            'name' => esc_html__('List Left', 'zylo-toolkit'),
            'type' => 'text',
            'id'   => 'portfolio_list_item',
        ));

        // List Right
        $list_items->add_group_field($group_field_id, array(
            'name' => esc_html__('List Right', 'zylo-toolkit'),
            'type' => 'text',
            'id'   => 'portfolio_list_item_right',
        ));
    }
}

new ZyloProject();
