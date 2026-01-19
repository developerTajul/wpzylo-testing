<?php 
Class Latest_posts_sidebar_Widget extends WP_Widget{

	public function __construct(){
		parent::__construct('hivency-latest-posts', 'Zylo Latest Posts', array(
			'description'	=> 'Latest Post Widget by Zylo'
		));
	}


	public function widget($args, $instance){

		extract($args);
	 	echo $before_widget; 
	 		if($instance['title']):
     		echo $before_title; ?> 
     			<?php echo apply_filters( 'widget_title', $instance['title'] ); ?>
     		<?php echo $after_title; ?>
     	<?php endif; ?>


		<div class="widget_latest_post">
            <ul>	
				<?php 
				$q = new WP_Query( array(
					'post_type'     => 'post',
					'posts_per_page'=> ($instance['count']) ? $instance['count'] : '3',
					'order'			=> ($instance['posts_order']) ? $instance['posts_order'] : 'DESC',
					'orderby'			=> ($instance['posts_orderby']) ? $instance['posts_orderby'] : 'title',
					'post__not_in' => get_option( 'sticky_posts' )
				));

				if( $q->have_posts() ):
				while( $q->have_posts() ):$q->the_post();
				?>
					<li>                    
						<?php
						if( has_post_thumbnail() ): ?>
							<div class="latest-post-thumb">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
							</div>
						<?php
						endif; ?>
						<div class="latest-post-desc">
							<h3 class="latest-post-title"><a href="<?php the_permalink(); ?>"><?php print wp_trim_words(get_the_title(), 7, ''); ?></a></h3>
						</div>
					</li>


					<!-- <li>
						<div class="latest-post-thumb">
							<img src="images/blog/r1.jpg" alt="">
						</div>
						<div class="latest-post-desc">
							<span class="latest-post-meta"><i class="fa-solid fa-calendar-days"></i> January 13, 2023</span>
							<h3 class="latest-post-title"><a href="blog-details.html">The
									standard chunk of Lorem Ipsum</a></h3>
						</div>
					</li> -->

					<?php endwhile;            
				endif; ?> 
			</ul>
		</div>	
		<?php echo $after_widget; ?>

		<?php
	}



	public function form($instance){
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$count = ! empty( $instance['count'] ) ? $instance['count'] : esc_html__( '3', 'hivency-toolkits' );
		$posts_order = ! empty( $instance['posts_order'] ) ? $instance['posts_order'] : esc_html__( 'DESC', 'hivency-toolkits' );
		$posts_orderby = ! empty( $instance['posts_orderby'] ) ? $instance['posts_orderby'] : esc_html__( 'Title', 'hivency-toolkits' );
	?>	
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
			<input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('count'); ?>">How many posts you want to show ?</label>
			<input type="number" name="<?php echo $this->get_field_name('count'); ?>" id="<?php echo $this->get_field_id('count'); ?>" value="<?php echo esc_attr( $count ); ?>" class="widefat">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('posts_order'); ?>">Posts Order</label>
			<select name="<?php echo $this->get_field_name('posts_order'); ?>" id="<?php echo $this->get_field_id('posts_order'); ?>" class="widefat">
				<option value="" disabled="disabled">Select Post Order</option>
				<option value="ASC" <?php if($posts_order === 'ASC'){ echo 'selected="selected"'; } ?>>ASC</option>
				<option value="DESC" <?php if($posts_order === 'DESC'){ echo 'selected="selected"'; } ?>>DESC</option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('posts_orderby'); ?>">Posts Orderby</label>
			<select name="<?php echo $this->get_field_name('posts_orderby'); ?>" id="<?php echo $this->get_field_id('posts_orderby'); ?>" class="widefat">
				<option value="" disabled="disabled">Select Post Orderby</option>
				<option value="ID" <?php if($posts_orderby === 'ID'){ echo 'selected="selected"'; } ?>>ID</option>
				<option value="title" <?php if($posts_orderby === 'title'){ echo 'selected="selected"'; } ?>>Title</option>
				<option value="date" <?php if($posts_orderby === 'date'){ echo 'selected="selected"'; } ?>>Date</option>
				<option value="Modified" <?php if($posts_orderby === 'Modified'){ echo 'selected="selected"'; } ?>>Modified</option>
				<option value="rand" <?php if($posts_orderby === 'rand'){ echo 'selected="selected"'; } ?>>Random Order</option>
				<option value="comment_count" <?php if($posts_orderby === 'comment_count'){ echo 'selected="selected"'; } ?>>Popular Post</option>
			</select>
		</p>

	<?php }


}




add_action('widgets_init', function(){
	register_widget('Latest_posts_sidebar_Widget');
});