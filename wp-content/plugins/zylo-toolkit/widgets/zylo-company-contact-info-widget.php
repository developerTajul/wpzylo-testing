<?php
// zylo Company Contact Info Widget

class zylo_Company_Contact_Info_Widget extends WP_Widget {

    // Setup widget name and description
    public function __construct() {
        parent::__construct(
            'zylo_company_contact_info_widget',
            __('LL Office Info', 'zylo'),
            array( 'description' => __('Displays company info', 'zylo') )
        );
    }

    // Create the widget output on the front-end
    public function widget($args, $instance) {
        echo $args['before_widget'];

        // Output widget title
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        // Display company contact information dynamically
        $address = !empty($instance['address']) ? $instance['address'] : '';
        $phone = !empty($instance['phone']) ? $instance['phone'] : '';
        $opening_hours = !empty($instance['opening_hours']) ? $instance['opening_hours'] : '';

        // Output the contact details
        ?>


        <div class="footer-widget-info">
			<div class="footer-widget-contact">
				<?php if ($address) : ?>
					<p><?php echo nl2br(esc_html($address)); ?></p>
				<?php endif; ?>
				<?php if ($phone) : ?>
					<p>Call us: <strong><a href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html($phone); ?></a></strong></p>
				<?php endif; ?>
				<?php if ($opening_hours) : ?>
					<p><?php echo nl2br(esc_html($opening_hours)); ?></p>
				<?php endif; ?>
			</div>
        </div>
        <?php

        echo $args['after_widget'];
    }

    // Create the admin form for the widget
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('Contact Us', 'zylo');
        $address = !empty($instance['address']) ? $instance['address'] : '';
        $phone = !empty($instance['phone']) ? $instance['phone'] : '';
        $opening_hours = !empty($instance['opening_hours']) ? $instance['opening_hours'] : '';
        ?>

        <!-- Title -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title:', 'zylo'); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>



        <!-- Address -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_attr_e('Address:', 'zylo'); ?></label> 
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>"><?php echo esc_textarea($address); ?></textarea>
        </p>

        <!-- Phone -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_attr_e('Phone:', 'zylo'); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" value="<?php echo esc_attr($phone); ?>">
        </p>

        <!-- Opening Hours -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('opening_hours')); ?>"><?php esc_attr_e('Opening Hours:', 'zylo'); ?></label> 
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('opening_hours')); ?>" name="<?php echo esc_attr($this->get_field_name('opening_hours')); ?>"><?php echo esc_textarea($opening_hours); ?></textarea>
        </p>
        <?php 
    }

    // Save widget settings
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['address'] = (!empty($new_instance['address'])) ? strip_tags($new_instance['address']) : '';
        $instance['phone'] = (!empty($new_instance['phone'])) ? strip_tags($new_instance['phone']) : '';
        $instance['opening_hours'] = (!empty($new_instance['opening_hours'])) ? strip_tags($new_instance['opening_hours']) : '';

        return $instance;
    }
}

// Register the widget
function register_zylo_company_contact_info_widget() {
    register_widget('zylo_Company_Contact_Info_Widget');
}
add_action('widgets_init', 'register_zylo_company_contact_info_widget');
