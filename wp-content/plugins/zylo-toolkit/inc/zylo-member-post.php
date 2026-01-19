<?php 
class ZyloMemberPost 
{
	function __construct() {
		add_action( 'init', array( $this, 'register_custom_post_type' ) );
		add_action( 'init', array( $this, 'create_cat' ) );
		add_filter( 'cmb2_meta_boxes', array( $this, 'add_meta' ) );
		add_filter( 'cmb2_admin_init', array( $this, 'add_left_skills_meta' ) );
		add_filter( 'cmb2_admin_init', array( $this, 'add_right_skills_meta' ) );
		add_filter( 'cmb2_admin_init', array( $this, 'add_social_profiles_meta' ) );
		add_filter( 'template_include', array( $this, 'member_template_include' ) );
	}
	
	public function member_template_include( $template ) {
		if ( is_singular( 'zylo-member' ) ) {
			return $this->get_template( 'single-zylo-member.php');
		}
		return $template;
	}
	
	public function get_template( $template ) {
		if ( $theme_file = locate_template( array( $template ) ) ) {
			$file = $theme_file;
		} 
		else {
			$file = ZYLO_TOOLKIT_DIR . '/template/'. $template;
		}
		return apply_filters( __FUNCTION__, $file, $template );
	}
	
	
	public function register_custom_post_type() {

		$labels = array(
			'name'               => __( 'Member', 'Post Type General Name', 'zylo-toolkit'),
			'singular_name'      => __( 'Member', 'Post Type Singular Name', 'zylo-toolkit'),
			'menu_name'          => __( 'Member', 'zylo-toolkit'),
			'parent_item_colon'  => __( 'Parent member', 'zylo-toolkit'),
			'all_items'          => __( 'All  Members', 'zylo-toolkit'),
			'view_item'          => __( 'View  Member', 'zylo-toolkit'),
			'add_new_item'       => __( 'Add New  member', 'zylo-toolkit'),
			'add_new'            => __( 'Add New  member', 'zylo-toolkit'),
			'edit_item'          => __( 'Edit  Member', 'zylo-toolkit'),
			'update_item'        => __( 'Update  Member', 'zylo-toolkit'),
			'search_items'       => __( 'Search  Member', 'zylo-toolkit'),
			'not_found'          => __( 'Not found', 'zylo-toolkit'),
			'not_found_in_trash' => __( 'Not found in Trash', 'zylo-toolkit'),
		);

		$args   = array(
			'label'               => __( 'Member', 'zylo-toolkit'),
			'description'         => __( 'Create and manage all bdevs member', 'zylo-toolkit'),
			'labels'              => $labels,
			'supports'            => array( 'title','thumbnail', 'editor'),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 14,
			'rewrite'             =>  array( 'slug' => 'member', 'with_front' => false ),
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'menu_icon'           => 'dashicons-id-alt',
		);

		register_post_type( 'zylo-member', $args );
	}
	
	public function create_cat() {

		$name = 'Member';

		$labels = array(
			'name'              => esc_html($name),
			'singular_name'     => esc_html($name),
			'search_items'      => sprintf(esc_html__( 'Search %s:', 'zylo-toolkit' ),$name),
			'all_items'      	=> sprintf(esc_html__( 'All %s:', 'zylo-toolkit' ),$name),
			'parent_item'      	=> sprintf(esc_html__( 'Parent  %s:', 'zylo-toolkit' ),$name),
			'parent_item_colon' => sprintf(esc_html__( 'Parent  %s:', 'zylo-toolkit' ),$name),
			'edit_item'     	=> sprintf(esc_html__( 'Edit  %s:', 'zylo-toolkit' ),$name),
			'update_item'     	=> sprintf(esc_html__( 'Update %s:', 'zylo-toolkit' ),$name),
			'add_new_item'      => sprintf(esc_html__( 'Add New %s:', 'zylo-toolkit' ),$name),
			'new_item_name'     => sprintf(esc_html__( 'New  %s Name:', 'zylo-toolkit' ),$name),
			'menu_name'      	=> esc_html($name),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'member_cat' ),
		);

		register_taxonomy('member_categories','zylo-member', $args );
	}

	public function add_meta(array $zylo) {

		$zylo[] = array(
			'id'           => 'zylo-member-section',
			'title'        => esc_html__( 'Member Details Info', 'zylo-toolkit' ),
			'object_types' => array( 'zylo-member'),
			'fields'       => array(	      	
		      	array(
			        'name' => esc_html__('Member Image ','zylo-toolkit'),
			        'type' => 'file',
			        'id' => 'member_single_img'
		      	),
				array(
			        'name' => esc_html__('Designation','zylo-toolkit'),
			        'type' => 'text',
			        'id' => 'member_designation'
		      	),
		      	array(
			        'name' => esc_html__('Short Description ','zylo-toolkit'),
			        'type' => 'textarea',
			        'id' => 'member_short_desc'
		      	),
				array(
			        'name' => esc_html__('Skill Title ','zylo-toolkit'),
			        'type' => 'text',
			        'id' => 'skill_title'
		      	),
				array(
			        'name' => esc_html__('Experience Title ','zylo-toolkit'),
			        'type' => 'text',
			        'id' => 'experience_title'
		      	),				
			)
		);
		
		return $zylo;
	}





	public function add_left_skills_meta() {

		$left_skills = new_cmb2_box( array(
			'title'   => 'Skill Section',
			'id'    => 'left-skill-section',
			'object_types'  => array('zylo-member')
		));
		

		$group_field_id = $left_skills->add_field( array(
			'id'          => 'left_skills_repeat_group',
			'type'        => 'group',
			'description' => __( 'Skill Item', 'zylo-toolkit' ),
			'repeatable'  => true, // use false if you want non-repeatable group
			'options'     => array(
			'group_title'   => __( 'First Single Tab Info', 'zylo-toolkit' ), // since version 1.1.4, {#} gets replaced by row number
			'add_button'    => __( 'Add Another Entry', 'zylo-toolkit' ),
			'remove_button' => __( 'Remove Entry', 'zylo-toolkit' ),
			'sortable'      => true, // beta
			'closed'     => false, // true to have the groups closed by default
		),
		) );

		// your icon
		$left_skills->add_group_field( $group_field_id, array(
			'name' => esc_html__('Number','zylo-toolkit'),
			'type' => 'text',
			'id' => 'left_skill_number'
		) );

		// your title
		$left_skills->add_group_field( $group_field_id, array(
			'name' => esc_html__('Title','zylo-toolkit'),
			'type' => 'textarea_small',
			'id' => 'left_skill_title'
		) );


	}


	public function add_right_skills_meta() {

		$right_skills = new_cmb2_box( array(
			'title'   => 'Experirence Section',
			'id'    => 'right-skill-section',
			'object_types'  => array('zylo-member')
		));
		

		$group_field_id = $right_skills->add_field( array(
			'id'          => 'right_skills_repeat_group',
			'type'        => 'group',
			'description' => __( 'Experience Item', 'zylo-toolkit' ),
			'repeatable'  => true, // use false if you want non-repeatable group
			'options'     => array(
			'group_title'   => __( 'Career Info', 'zylo-toolkit' ), // since version 1.1.4, {#} gets replaced by row number
			'add_button'    => __( 'Add Another Entry', 'zylo-toolkit' ),
			'remove_button' => __( 'Remove Entry', 'zylo-toolkit' ),
			'sortable'      => true, // beta
			'closed'     => false, // true to have the groups closed by default
		),
		) );
		// your title
		$right_skills->add_group_field( $group_field_id, array(
			'name' => esc_html__('Title One','zylo-toolkit'),
			'type' => 'text',
			'id' => 'right_skill_label_1'
		) );
		// your list
		$right_skills->add_group_field( $group_field_id, array(
			'name' => esc_html__('List','zylo-toolkit'),
			'type' => 'text',
			'id' => 'right_skill_content_1'
		) );
		$right_skills->add_group_field( $group_field_id, array(
			'name' => esc_html__('Link','zylo-toolkit'),
			'type' => 'text',
			'id' => 'right_skill_link_1'
		) );
		$right_skills->add_group_field( $group_field_id, array(
			'name' => esc_html__('List','zylo-toolkit'),
			'type' => 'text',
			'id' => 'right_skill_content_2'
		) );
		$right_skills->add_group_field( $group_field_id, array(
			'name' => esc_html__('Link','zylo-toolkit'),
			'type' => 'text',
			'id' => 'right_skill_link_2'
		) );

		// your title
		$right_skills->add_group_field( $group_field_id, array(
			'name' => esc_html__('Title Two','zylo-toolkit'),
			'type' => 'text',
			'id' => 'right_skill_label_2'
		) );
		// your list
		$right_skills->add_group_field( $group_field_id, array(
			'name' => esc_html__('List','zylo-toolkit'),
			'type' => 'text',
			'id' => 'right_skill_content_3'
		) );
		$right_skills->add_group_field( $group_field_id, array(
			'name' => esc_html__('Link','zylo-toolkit'),
			'type' => 'text',
			'id' => 'right_skill_link_3'
		) );
		$right_skills->add_group_field( $group_field_id, array(
			'name' => esc_html__('List','zylo-toolkit'),
			'type' => 'text',
			'id' => 'right_skill_content_4'
		) );
		$right_skills->add_group_field( $group_field_id, array(
			'name' => esc_html__('Link','zylo-toolkit'),
			'type' => 'text',
			'id' => 'right_skill_link_4'
		) );

		// your title
		$right_skills->add_group_field( $group_field_id, array(
			'name' => esc_html__('Title Three','zylo-toolkit'),
			'type' => 'text',
			'id' => 'right_skill_label_3'
		) );
		// your list
		$right_skills->add_group_field( $group_field_id, array(
			'name' => esc_html__('List','zylo-toolkit'),
			'type' => 'text',
			'id' => 'right_skill_content_5'
		) );
		$right_skills->add_group_field( $group_field_id, array(
			'name' => esc_html__('Link','zylo-toolkit'),
			'type' => 'text',
			'id' => 'right_skill_link_5'
		) );
		$right_skills->add_group_field( $group_field_id, array(
			'name' => esc_html__('List','zylo-toolkit'),
			'type' => 'text',
			'id' => 'right_skill_content_6'
		) );
		$right_skills->add_group_field( $group_field_id, array(
			'name' => esc_html__('Link','zylo-toolkit'),
			'type' => 'text',
			'id' => 'right_skill_link_6'
		) );

		// your title
		$right_skills->add_group_field( $group_field_id, array(
			'name' => esc_html__('Title Four','zylo-toolkit'),
			'type' => 'text',
			'id' => 'right_skill_label_4'
		) );
		// your list
		$right_skills->add_group_field( $group_field_id, array(
			'name' => esc_html__('List','zylo-toolkit'),
			'type' => 'text',
			'id' => 'right_skill_content_7'
		) );
		$right_skills->add_group_field( $group_field_id, array(
			'name' => esc_html__('Link','zylo-toolkit'),
			'type' => 'text',
			'id' => 'right_skill_link_7'
		) );
		$right_skills->add_group_field( $group_field_id, array(
			'name' => esc_html__('List','zylo-toolkit'),
			'type' => 'text',
			'id' => 'right_skill_content_8'
		) );
		$right_skills->add_group_field( $group_field_id, array(
			'name' => esc_html__('Link','zylo-toolkit'),
			'type' => 'text',
			'id' => 'right_skill_link_8'
		) );
		// your list
		$right_skills->add_group_field( $group_field_id, array(
			'name' => esc_html__('List','zylo-toolkit'),
			'type' => 'text',
			'id' => 'right_skill_content_9'
		) );
		$right_skills->add_group_field( $group_field_id, array(
			'name' => esc_html__('Link','zylo-toolkit'),
			'type' => 'text',
			'id' => 'right_skill_link_9'
		) );
		$right_skills->add_group_field( $group_field_id, array(
			'name' => esc_html__('List','zylo-toolkit'),
			'type' => 'text',
			'id' => 'right_skill_content_10'
		) );
		$right_skills->add_group_field( $group_field_id, array(
			'name' => esc_html__('Link','zylo-toolkit'),
			'type' => 'text',
			'id' => 'right_skill_link_10'
		) );
		$right_skills->add_group_field( $group_field_id, array(
			'name' => esc_html__('Button Text','zylo-toolkit'),
			'type' => 'text',
			'id' => 'right_skill_button_text'
		) );
		$right_skills->add_group_field( $group_field_id, array(
			'name' => esc_html__('Button Url','zylo-toolkit'),
			'type' => 'text',
			'id' => 'right_skill_button_url'
		) );

	}

	public function add_social_profiles_meta() {

		$right_skills = new_cmb2_box( array(
			'title'   => 'Social Profiles Section',
			'id'    => 'social-profiles-section',
			'object_types'  => array('zylo-member')
		));
		

		$group_field_id = $right_skills->add_field( array(
			'id'          => 'social_profiles_repeat_group',
			'type'        => 'group',
			'description' => __( 'Social Profile Item', 'zylo-toolkit' ),
			'repeatable'  => true, // use false if you want non-repeatable group
			'options'     => array(
			'group_title'   => __( 'Social Profile Info', 'zylo-toolkit' ), // since version 1.1.4, {#} gets replaced by row number
			'add_button'    => __( 'Add Another Entry', 'zylo-toolkit' ),
			'remove_button' => __( 'Remove Entry', 'zylo-toolkit' ),
			'sortable'      => true, // beta
			'closed'     => false, // true to have the groups closed by default
		),
		) );

		// your status
		$right_skills->add_group_field( $group_field_id, array(
			'name' => esc_html__('Icon','zylo-toolkit'),
			'type' => 'text',
			'id' => 'social_profile_icon'
		) );

		// your picture
		$right_skills->add_group_field( $group_field_id, array(
			'name' => esc_html__('Link','zylo-toolkit'),
			'type' => 'text',
			'id' => 'social_profile_link'
		) );

	}

}

new ZyloMemberPost();
