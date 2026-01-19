<?php
class Latest_Service_Categories_List_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'zylo-service-categories', // Base ID of the widget
            __('LL Service Categories List', 'zylo-toolkit'), // Name of the widget
            array( 'description' => __( 'Displays a list of service categories', 'zylo' ) ) // Args
        );
    }

    // Frontend display of the widget
    public function widget($args, $instance) {
        extract($args);

        $title = apply_filters('widget_title', $instance['title']);
        $count = ! empty($instance['count']) ? $instance['count'] : 5;
        $posts_order = ! empty($instance['posts_order']) ? $instance['posts_order'] : 'ASC';

        echo $before_widget;

        // Widget Title
		
		if ( ! empty( $title ) ) {
			echo $before_title . apply_filters( 'widget_title', $title ) . $after_title;
		} 

        // Fetch service categories
        echo '<div class="widget_service_categories"><ul>';

        $terms = get_terms(array(
            'taxonomy' => 'service_categories', // Custom taxonomy slug
            'number' => $count,
            'orderby' => 'name',
            'order' => $posts_order,
        ));

        if (!empty($terms) && !is_wp_error($terms)) {

            foreach ($terms as $term) {
                echo '<li>';
                echo '<a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a>';
                echo '</li>'; 
            }
        } else {
            echo '<li>' . __('No categories found.', 'zylo') . '</li>';
        }

        echo '</div></ul>';
        echo $after_widget;
    }

    // Backend widget form
    public function form($instance) {
        $title = ! empty($instance['title']) ? $instance['title'] : __('Expertise', 'zylo');
        $count = ! empty($instance['count']) ? $instance['count'] : 5;
        $posts_order = ! empty($instance['posts_order']) ? $instance['posts_order'] : 'ASC';
    ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', 'zylo'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('count')); ?>"><?php _e('Number of categories to show:', 'zylo'); ?></label>
            <input type="number" class="widefat" id="<?php echo esc_attr($this->get_field_id('count')); ?>" name="<?php echo esc_attr($this->get_field_name('count')); ?>" value="<?php echo esc_attr($count); ?>" min="1">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('posts_order')); ?>"><?php _e('Order by:', 'zylo'); ?></label>
            <select class="widefat" id="<?php echo esc_attr($this->get_field_id('posts_order')); ?>" name="<?php echo esc_attr($this->get_field_name('posts_order')); ?>">
                <option value="ASC" <?php selected($posts_order, 'ASC'); ?>><?php _e('Ascending', 'zylo'); ?></option>
                <option value="DESC" <?php selected($posts_order, 'DESC'); ?>><?php _e('Descending', 'zylo'); ?></option>
            </select>
        </p>
    <?php
    }

    // Updating widget
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['count'] = intval($new_instance['count']);
        $instance['posts_order'] = sanitize_text_field($new_instance['posts_order']);
        return $instance;
    }
}

// Register widget
function register_latest_service_categories_list_widget() {
    register_widget('Latest_Service_Categories_List_Widget');
}
add_action('widgets_init', 'register_latest_service_categories_list_widget');
