<?php
/**
 * Zylo Social Widget
 *
 * @author 		Nilartstudio
 * @category 	Widgets
 * @package 	zylo/Widgets
 * @version 	1.0.0
 * @extends 	WP_Widget
 */
add_action('widgets_init', 'social_profiles_widget');
function social_profiles_widget() {
    register_widget('Social_Profiles_Widget');
}

class Social_Profiles_Widget extends WP_Widget {
	
	public function __construct() {
		parent::__construct('social_profiles_widget', esc_html__('Zylo Social Profile', 'zylo-toolkit'), array(
			'description' => esc_html__('Social Profile Widget by Zylo', 'zylo-toolkit'),
		));
	}
	
	public function widget($args, $instance) {
		// Extract args
		extract($args);
		
		// Set default values with fallback
		$title = !empty($instance['title']) ? apply_filters('widget_title', $instance['title']) : 'Follow Us';
		$facebook = !empty($instance['facebook']) ? esc_url($instance['facebook']) : '';
		$twitter = !empty($instance['twitter']) ? esc_url($instance['twitter']) : '';
		$linkedin = !empty($instance['linkedin']) ? esc_url($instance['linkedin']) : '';
		$instagram = !empty($instance['instagram']) ? esc_url($instance['instagram']) : '';
		$facebook_icon = !empty($instance['facebook_icon']) ? esc_attr($instance['facebook_icon']) : 'fa-brands fa-facebook-f';
		$twitter_icon = !empty($instance['twitter_icon']) ? esc_attr($instance['twitter_icon']) : 'fa-brands fa-twitter';
		$linkedin_icon = !empty($instance['linkedin_icon']) ? esc_attr($instance['linkedin_icon']) : 'fa-brands fa-linkedin-in';
		$instagram_icon = !empty($instance['instagram_icon']) ? esc_attr($instance['instagram_icon']) : 'fa-brands fa-instagram';
		
		// Output widget
		echo $before_widget;
		
		if (!empty($title)) {
			echo $before_title . $title . $after_title;
		}
		?>
		<div class="widget widget_social_profile">
			<div class="widget-title-box">
				<!-- Title is handled by $before_title and $after_title above -->
			</div>
			<div class="social-profile">
				<?php if ($facebook): ?>
					<a class="facebook" href="<?php echo $facebook; ?>"><i class="<?php echo $facebook_icon; ?>"></i></a>
				<?php endif; ?>
				
				<?php if ($twitter): ?>
					<a class="twitter" href="<?php echo $twitter; ?>"><i class="<?php echo $twitter_icon; ?>"></i></a>
				<?php endif; ?>
				
				<?php if ($linkedin): ?>
					<a class="linkedin" href="<?php echo $linkedin; ?>"><i class="<?php echo $linkedin_icon; ?>"></i></a>
				<?php endif; ?>
				
				<?php if ($instagram): ?>
					<a class="instagram" href="<?php echo $instagram; ?>"><i class="<?php echo $instagram_icon; ?>"></i></a>
				<?php endif; ?>
				
				<?php if (!$facebook && !$twitter && !$linkedin && !$instagram): ?>
					<p style="color: #999; font-size: 12px;">No social links added yet.</p>
				<?php endif; ?>
			</div>
		</div>
		<?php
		echo $after_widget;
	}
	
	public function form($instance) {
		$title = !empty($instance['title']) ? esc_attr($instance['title']) : 'Follow Us';
		$facebook = !empty($instance['facebook']) ? esc_attr($instance['facebook']) : '';
		$twitter = !empty($instance['twitter']) ? esc_attr($instance['twitter']) : '';
		$linkedin = !empty($instance['linkedin']) ? esc_attr($instance['linkedin']) : '';
		$instagram = !empty($instance['instagram']) ? esc_attr($instance['instagram']) : '';
		$facebook_icon = !empty($instance['facebook_icon']) ? esc_attr($instance['facebook_icon']) : 'fa-brands fa-facebook-f';
		$twitter_icon = !empty($instance['twitter_icon']) ? esc_attr($instance['twitter_icon']) : 'fa-brands fa-twitter';
		$linkedin_icon = !empty($instance['linkedin_icon']) ? esc_attr($instance['linkedin_icon']) : 'fa-brands fa-linkedin-in';
		$instagram_icon = !empty($instance['instagram_icon']) ? esc_attr($instance['instagram_icon']) : 'fa-brands fa-instagram';
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:', 'zylo-toolkit'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" class="widefat" value="<?php echo $title; ?>">
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('facebook'); ?>"><?php esc_html_e('Facebook:', 'zylo-toolkit'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" class="widefat" value="<?php echo $facebook; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('facebook_icon'); ?>"><?php esc_html_e('Facebook Icon Class:', 'zylo-toolkit'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('facebook_icon'); ?>" name="<?php echo $this->get_field_name('facebook_icon'); ?>" class="widefat" value="<?php echo $facebook_icon; ?>" placeholder="e.g., fa-brands fa-facebook-f">
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('twitter'); ?>"><?php esc_html_e('Twitter:', 'zylo-toolkit'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" class="widefat" value="<?php echo $twitter; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('twitter_icon'); ?>"><?php esc_html_e('Twitter Icon Class:', 'zylo-toolkit'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('twitter_icon'); ?>" name="<?php echo $this->get_field_name('twitter_icon'); ?>" class="widefat" value="<?php echo $twitter_icon; ?>" placeholder="e.g., fa-brands fa-twitter">
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php esc_html_e('LinkedIn:', 'zylo-toolkit'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" class="widefat" value="<?php echo $linkedin; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('linkedin_icon'); ?>"><?php esc_html_e('LinkedIn Icon Class:', 'zylo-toolkit'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('linkedin_icon'); ?>" name="<?php echo $this->get_field_name('linkedin_icon'); ?>" class="widefat" value="<?php echo $linkedin_icon; ?>" placeholder="e.g., fa-brands fa-linkedin-in">
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('instagram'); ?>"><?php esc_html_e('Instagram:', 'zylo-toolkit'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" class="widefat" value="<?php echo $instagram; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('instagram_icon'); ?>"><?php esc_html_e('Instagram Icon Class:', 'zylo-toolkit'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('instagram_icon'); ?>" name="<?php echo $this->get_field_name('instagram_icon'); ?>" class="widefat" value="<?php echo $instagram_icon; ?>" placeholder="e.g., fa-brands fa-instagram">
		</p>
		<?php
	}
	
	public function update($new_instance, $old_instance) {
		$instance = array();
		$instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
		$instance['facebook'] = (!empty($new_instance['facebook'])) ? esc_url_raw($new_instance['facebook']) : '';
		$instance['twitter'] = (!empty($new_instance['twitter'])) ? esc_url_raw($new_instance['twitter']) : '';
		$instance['linkedin'] = (!empty($new_instance['linkedin'])) ? esc_url_raw($new_instance['linkedin']) : '';
		$instance['instagram'] = (!empty($new_instance['instagram'])) ? esc_url_raw($new_instance['instagram']) : '';
		$instance['facebook_icon'] = (!empty($new_instance['facebook_icon'])) ? sanitize_text_field($new_instance['facebook_icon']) : 'fa-brands fa-facebook-f';
		$instance['twitter_icon'] = (!empty($new_instance['twitter_icon'])) ? sanitize_text_field($new_instance['twitter_icon']) : 'fa-brands fa-twitter';
		$instance['linkedin_icon'] = (!empty($new_instance['linkedin_icon'])) ? sanitize_text_field($new_instance['linkedin_icon']) : 'fa-brands fa-linkedin-in';
		$instance['instagram_icon'] = (!empty($new_instance['instagram_icon'])) ? sanitize_text_field($new_instance['instagram_icon']) : 'fa-brands fa-instagram';
		return $instance;
	}
}