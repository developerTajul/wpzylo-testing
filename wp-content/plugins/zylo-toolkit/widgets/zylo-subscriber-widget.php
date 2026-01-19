<?php
	/**
	 * Medodove Social Widget
	 *
	 *
	 * @author 		basictheme
	 * @category 	Widgets
	 * @package 	Medodove/Widgets
	 * @version 	1.0.1
	 * @extends 	WP_Widget
	 */
	add_action('widgets_init', 'Augmit_subscriber_widget');
	function Augmit_subscriber_widget() {
		register_widget('Augmit_subscriber_widget');
	}
	
	
	class Augmit_Subscriber_Widget  extends WP_Widget{
		
		public function __construct(){
			parent::__construct('Augmit_subscriber_widget',esc_html__('zylo Subscriber','zylo-toolkit'),array(
				'description' => esc_html__('Subscriber Widget by zylo','zylo-toolkit'),
			));
		}
		
		public function widget($args,$instance){
			extract($args);
			extract($instance);
		 	print $before_widget; 
			?>

				<?php
				if($instance['title']):
					echo $before_title; ?> 
						<?php echo apply_filters( 'widget_title', $instance['title'] ); ?>
					<?php echo $after_title; ?>
				<?php 
				endif; ?>

				<div class="subscribe-form-wrapper">
					<p>
						Be the first to know about new arrivals, exclusive discounts & insider tips."
					</p>
					<!-- <div class="subscribe-form-widget"> -->
						<?php
						if($mailchimp_shortcode!=''){
							echo do_shortcode($mailchimp_shortcode);
						}
						?>
					<!-- </div> -->
				</div>

	    	<?php print $after_widget; ?>  
		<?php
		}
		

		/**
		 * widget function.
		 *
		 * @see WP_Widget
		 * @access public
		 * @param array $instance
		 * @return void
		 */
		public function form($instance){
			$title  = isset($instance['title'])? $instance['title']:'';
			$description  = isset($instance['description'])? $instance['description']:'';
			$mailchimp_shortcode  = isset($instance['mailchimp_shortcode'])? $instance['mailchimp_shortcode']:'';
			?>
			<p>
				<label for="title"><?php esc_html_e('Title:','zylo-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('title')); ?>"  class="widefat" name="<?php print esc_attr($this->get_field_name('title')); ?>" value="<?php print esc_attr($title); ?>">

			<p>
				<label for="mailchimp_shortcode"><?php esc_html_e('Mailchimp Shortcode:','zylo-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('mailchimp_shortcode')); ?>" class="widefat" name="<?php print esc_attr($this->get_field_name('mailchimp_shortcode')); ?>" value="<?php print esc_attr($mailchimp_shortcode); ?>">


			
			<?php
		}
				
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['mailchimp_shortcode'] = ( ! empty( $new_instance['mailchimp_shortcode'] ) ) ? strip_tags( $new_instance['mailchimp_shortcode'] ) : '';

			return $instance;
		}
	}