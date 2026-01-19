<?php
class Zylo_About_Info_Widget extends WP_Widget {

    // Constructor
    public function __construct() {
        parent::__construct(
            'zylo_about_info_widget',
            __('zylo About Info Widget', 'text_domain'),
            array('description' => __('A widget to display an about section with logo', 'text_domain'))
        );
    }

// Widget form
public function form($instance) {
	$title  = isset($instance['title'])? $instance['title']:'';
    $logo = !empty($instance['logo']) ? $instance['logo'] : '';
    $description = !empty($instance['description']) ? $instance['description'] : '';
	$facebook_icon  = isset($instance['facebook_icon'])? $instance['facebook_icon']:'';
	$facebook_url  = isset($instance['facebook_url'])? $instance['facebook_url']:'';
	$twitter_icon  = isset($instance['twitter_icon'])? $instance['twitter_icon']:'';
	$twitter_url  = isset($instance['twitter_url'])? $instance['twitter_url']:'';
	$instagram_icon  = isset($instance['instagram_icon'])? $instance['instagram_icon']:'';
	$instagram_url  = isset($instance['instagram_url'])? $instance['instagram_url']:'';
	$pinterest_icon  = isset($instance['pinterest_icon'])? $instance['pinterest_icon']:'';
	$pinterest_url  = isset($instance['pinterest_url'])? $instance['pinterest_url']:'';
    ?>
	<p>
		<label for="title"><?php esc_html_e('Title:','zylo-toolkit'); ?></label>
	</p>
	<input class="widefat" type="text" id="<?php print esc_attr($this->get_field_id('title')); ?>"  name="<?php print esc_attr($this->get_field_name('title')); ?>" value="<?php print esc_attr($title); ?>">

    <p>
        <label for="<?php echo $this->get_field_id('logo'); ?>"><?php _e('Logo:'); ?></label>
        <input class="widefat logo_url" id="<?php echo $this->get_field_id('logo'); ?>" name="<?php echo $this->get_field_name('logo'); ?>" type="text" value="<?php echo esc_attr($logo); ?>" />
        <button type="button" class="button button-primary upload_logo_button"><?php _e('Upload Image', 'text_domain'); ?></button>
    </p>
    <div class="logo_preview">
        <?php if (!empty($logo)) : ?>
            <img src="<?php echo esc_url($logo); ?>" alt="<?php _e('Logo Preview', 'text_domain'); ?>" style="max-width: 100%; height: auto;" />
        <?php endif; ?>
    </div>
    <p>
        <label for="<?php echo $this->get_field_id('description'); ?>"><?php _e('Description:'); ?></label>
        <textarea class="widefat" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>"><?php echo esc_textarea($description); ?></textarea>
    </p>

	

	<p>
		<label for="facebook_icon"><?php esc_html_e('Social Profile Icon 1:','advkt-toolkit'); ?></label>
		<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('facebook_icon')); ?>"  name="<?php echo esc_attr($this->get_field_name('facebook_icon')); ?>" value="<?php echo esc_attr($facebook_icon); ?>">
	</p>
	<p>
		<label for="facebook_url"><?php esc_html_e('Social Profile Link 1:','advkt-toolkit'); ?></label>
		<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('facebook_url')); ?>"  name="<?php echo esc_attr($this->get_field_name('facebook_url')); ?>" value="<?php echo esc_attr($facebook_url); ?>">
	</p>

	<p>
		<label for="title"><?php esc_html_e('Social Profile Icon 2:','advkt-toolkit'); ?></label>
		<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('twitter_icon')); ?>"  name="<?php echo esc_attr($this->get_field_name('twitter_icon')); ?>" value="<?php echo esc_attr($twitter_icon); ?>">
	</p>
	<p>
		<label for="title"><?php esc_html_e('Social Profile Link 2:','advkt-toolkit'); ?></label>
		<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('twitter_url')); ?>"  name="<?php echo esc_attr($this->get_field_name('twitter_url')); ?>" value="<?php echo esc_attr($twitter_url); ?>">
	</p>

	<p>
		<label for="instagram"><?php esc_html_e('Social Profile Icon 3:','advkt-toolkit'); ?></label>
		<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('instagram_icon')); ?>"  name="<?php echo esc_attr($this->get_field_name('instagram_icon')); ?>" value="<?php echo esc_attr($instagram_icon); ?>">
	</p>	
	<p>
		<label for="instagram"><?php esc_html_e('Social Profile Link 3:','advkt-toolkit'); ?></label>
		<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('instagram_url')); ?>"  name="<?php echo esc_attr($this->get_field_name('instagram_url')); ?>" value="<?php echo esc_attr($instagram_url); ?>">
	</p>	

	<p>
		<label for="pinterest"><?php esc_html_e('Social Profile Icon 4:','advkt-toolkit'); ?></label>
		<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('pinterest_icon')); ?>"  name="<?php echo esc_attr($this->get_field_name('pinterest_icon')); ?>" value="<?php echo esc_attr($pinterest_icon); ?>">
	</p>

	<p>
		<label for="pinterest"><?php esc_html_e('Social Profile Link 4:','advkt-toolkit'); ?></label>
		<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('pinterest_url')); ?>"  name="<?php echo esc_attr($this->get_field_name('pinterest_url')); ?>" value="<?php echo esc_attr($pinterest_url); ?>">
	</p>
			
    <?php
}


    // Update widget
	public function update($new_instance, $old_instance) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['logo'] = !empty($new_instance['logo']) ? $new_instance['logo'] : '';
		$instance['description'] = !empty($new_instance['description']) ? $new_instance['description'] : '';
		
		// Update social fields
		$social_fields = ['facebook', 'twitter', 'instagram', 'pinterest'];
		foreach ($social_fields as $field) {
			$instance[$field . '_icon'] = !empty($new_instance[$field . '_icon']) ? $new_instance[$field . '_icon'] : '';
			$instance[$field . '_url'] = !empty($new_instance[$field . '_url']) ? $new_instance[$field . '_url'] : '';
		}
		
		return $instance;
	}

    // Display widget
    public function widget($args, $instance) {
		extract($args);
		extract($instance);

        $logo = !empty($instance['logo']) ? $instance['logo'] : '';
        $description = !empty($instance['description']) ? $instance['description'] : '';

		$facebook_icon  = isset($instance['facebook_icon'])? $instance['facebook_icon']:'';
		$facebook_url  = isset($instance['facebook_url'])? $instance['facebook_url']:'';
		$twitter_icon  = isset($instance['twitter_icon'])? $instance['twitter_icon']:'';
		$twitter_url  = isset($instance['twitter_url'])? $instance['twitter_url']:'';
		$instagram_icon  = isset($instance['instagram_icon'])? $instance['instagram_icon']:'';
		$instagram_url  = isset($instance['instagram_url'])? $instance['instagram_url']:'';
		$pinterest_icon  = isset($instance['pinterest_icon'])? $instance['pinterest_icon']:'';
		$pinterest_url  = isset($instance['pinterest_url'])? $instance['pinterest_url']:'';

        echo $args['before_widget'];
        ?>
        <div class="footer-widget-info">
			<?php
			if ( ! empty( $title ) ) {
				echo $before_title . apply_filters( 'widget_title', $title ) . $after_title;
			} ?>

			<?php
			if( $logo !== ""): ?>
				<div class="footer-logo">
					<a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($logo); ?>" alt="<?php _e('Footer Logo', 'text_domain'); ?>" /></a>
				</div>
			<?php
			endif; ?>

            <p><?php echo esc_html($description); ?></p>
			
			<div class="social-profile">
				<?php
				if($facebook_url !== ""): ?>
					<a href="<?php echo esc_url($facebook_url); ?>"><i class="fa-brands fa-facebook-f"></i></a>
				<?php 
				endif; ?>

				<?php 
				if($twitter_url !== ""): ?>
					<a href="<?php echo esc_url($twitter_url); ?>"><i class="fa-brands fa-twitter"></i></a>
				<?php 
				endif; ?>

				<?php
				if($instagram_url !== ""): ?>
					<a href="<?php echo esc_url($instagram_url); ?>"><i class="fa-brands fa-instagram"></i></a>
				<?php 
				endif; ?>

				<?php 
				if($pinterest_url !== "" ): ?>
					<a href="<?php echo esc_url($pinterest_url); ?>"><i class="fa-brands fa-pinterest-p"></i></a>
				<?php
				endif; ?>
			</div>
        </div>
        <?php
        echo $args['after_widget'];
    }
}

// Register widget
function register_zylo_about_info_widget() {
    register_widget('Zylo_About_Info_Widget');
}
add_action('widgets_init', 'register_zylo_about_info_widget');
