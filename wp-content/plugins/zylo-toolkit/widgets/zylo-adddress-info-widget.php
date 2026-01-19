<?php
	/**
	 * zylo Footer full Widget
	 *
	 *
	 * @author 		Nilartstudio
	 * @category 	Widgets
	 * @package 	zylo/Widgets
	 * @version 	1.0.0
	 * @extends 	WP_Widget
	 */
	add_action('widgets_init', 'zylo_address_info_widget');
	function zylo_address_info_widget() {
		register_widget('zylo_address_info_widget');
	}
	
	
	class zylo_Address_Info_Widget  extends WP_Widget{
		
		public function __construct(){
			parent::__construct('zylo_address_info_widget',esc_html__('zylo Company Address Info','zylo-toolkit'),array(
				'description' => esc_html__('Company Contact Info Footer Top Widget by zylo','zylo-toolkit'),
			));
		}
		
		public function widget($args, $instance){
			extract($args);
			extract($instance);
			$description = !empty($instance['description']) ? $instance['description'] : '';
			$email = !empty($instance['email']) ? $instance['email'] : '';
			$email_icon = !empty($instance['email_icon']) ? $instance['email_icon'] : '';
			$address = !empty($instance['address']) ? $instance['address'] : '';
			$address_icon = !empty($instance['address_icon']) ? $instance['address_icon'] : '';
			$phone_number = !empty($instance['phone_number']) ? $instance['phone_number'] : '';
			$phone_icon = !empty($instance['phone_icon']) ? $instance['phone_icon'] : '';

			print $before_widget;
			?>

			<?php
			if ( ! empty( $title ) ) {
				echo $before_title . apply_filters( 'widget_title', $title ) . $after_title;
			} ?>

		
				<div class="footer-widget-info">
                    <div class="footer-widget-contact">
                    	<p>
                        	<?php echo $description; ?>
                    	</p>
                    	<div class="footer-contact">
                        	<ul>
							<?php
							if( $email !== ""): ?>
								<li>
									<div class="contact-icon">
										<i class="<?php echo esc_attr( $email_icon ); ?>"></i>
									</div>
									<div class="contact-text">
										<a href="mailto:<?php echo esc_attr( $email ); ?>"><span><?php echo esc_html( $email ); ?></span></a>
									</div>
								</li>
							<?php
							endif; ?>

							<?php
							if( $address !== ""): ?>
								<li>
									<div class="contact-icon">
										<i class="<?php echo esc_attr( $address_icon ); ?>"></i>
									</div>
									<div class="contact-text">
										<span><?php echo esc_html( $address ); ?></span>
									</div>
								</li>
							<?php
							endif; ?>

							<?php
							if( $phone_number !== ""): ?>
								<li>
									<div class="contact-icon">
									<i class="<?php echo esc_attr($phone_icon); ?>"></i>
									</div>
									<div class="contact-text">
										<a href="tel:<?php echo esc_attr($phone_number); ?>"><?php echo esc_html($phone_number); ?></a>
									</div>
								</li>
							<?php
							endif; ?>
                        	</ul>
                    	</div>
                    </div>
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

			$description = !empty($instance['description']) ? $instance['description'] : '';

			$address_icon  = isset($instance['address_icon'])? $instance['address_icon']:'';
			$address  = isset($instance['address'])? $instance['address']:'';

			$email_icon  = isset($instance['email_icon'])? $instance['email_icon']:'';
			$email  = isset($instance['email'])? $instance['email']:'';

			$phone_icon  = isset($instance['phone_icon'])? $instance['phone_icon']:'';
			$phone_number  = isset($instance['phone_number'])? $instance['phone_number']:'';
			?>
			<p>
				<label for="title"><?php esc_html_e('Title:','zylo-toolkit'); ?></label>
			</p>
			<input class="widefat" type="text" id="<?php print esc_attr($this->get_field_id('title')); ?>"  name="<?php print esc_attr($this->get_field_name('title')); ?>" value="<?php print esc_attr($title); ?>">

			<p>
				<label for="<?php echo $this->get_field_id('description'); ?>"><?php _e('Description:'); ?></label>
				<textarea class="widefat" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>"><?php echo esc_textarea($description); ?></textarea>
			</p>
	
			<p>
				<label for="address_icon"><?php esc_html_e('Address Label: ','zylo-toolkit'); ?></label>
				<input class="widefat" type="text" id="<?php print esc_attr($this->get_field_id('address_icon')); ?>"  name="<?php print esc_attr($this->get_field_name('address_icon')); ?>" value="<?php print esc_attr($address_icon); ?>">
			</p>
			<p>
				<label for="address"><?php esc_html_e('Address Info: ','zylo-toolkit'); ?></label>
			</p>

			<textarea class="widefat" rows="2" cols="15" id="<?php print esc_attr($this->get_field_id('address')); ?>" value="<?php print esc_attr($address); ?>" name="<?php print esc_attr($this->get_field_name('address')); ?>"><?php print esc_attr($address); ?></textarea>

	
			<p>
				<label for="email_icon"><?php esc_html_e('Email Label: ','zylo-toolkit'); ?></label>
				<input class="widefat" type="text" id="<?php print esc_attr($this->get_field_id('email_icon')); ?>"  name="<?php print esc_attr($this->get_field_name('email_icon')); ?>" value="<?php print esc_attr($email_icon); ?>">
			</p>
			<p>
				<label for="email"><?php esc_html_e('Email Address: ','zylo-toolkit'); ?></label>
				<input class="widefat" type="text" id="<?php print esc_attr($this->get_field_id('email')); ?>"  name="<?php print esc_attr($this->get_field_name('email')); ?>" value="<?php print esc_attr($email); ?>">
			</p>


	
			<p>
				<label for="phone_icon"><?php esc_html_e('Tel Phone Label: ','zylo-toolkit'); ?></label>
				<input class="widefat" type="text" id="<?php print esc_attr($this->get_field_id('phone_icon')); ?>"  name="<?php print esc_attr($this->get_field_name('phone_icon')); ?>" value="<?php print esc_attr($phone_icon); ?>">
			</p>

			<p>
				<label for="phone_number"><?php esc_html_e('Tel Phone Number: ','zylo-toolkit'); ?></label>
				<input class="widefat" type="text" id="<?php print esc_attr($this->get_field_id('phone_number')); ?>"  name="<?php print esc_attr($this->get_field_name('phone_number')); ?>" value="<?php print esc_attr($phone_number); ?>">
			</p>



		
			<?php
		}
				
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['description'] = !empty($new_instance['description']) ? $new_instance['description'] : '';

			$instance['address_icon'] = ( ! empty( $new_instance['address_icon'] ) ) ? strip_tags( $new_instance['address_icon'] ) : '';
			$instance['address'] = ( ! empty( $new_instance['address'] ) ) ? strip_tags( $new_instance['address'] ) : '';

			$instance['email_icon'] = ( ! empty( $new_instance['email_icon'] ) ) ? strip_tags( $new_instance['email_icon'] ) : '';
			$instance['email'] = ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';

			$instance['phone_icon'] = ( ! empty( $new_instance['phone_icon'] ) ) ? strip_tags( $new_instance['phone_icon'] ) : '';
			$instance['phone_number'] = ( ! empty( $new_instance['phone_number'] ) ) ? strip_tags( $new_instance['phone_number'] ) : '';



			return $instance;
		}
	}