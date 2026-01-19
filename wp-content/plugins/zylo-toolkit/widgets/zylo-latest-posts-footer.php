<?php 
class Latest_Posts_Footer_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'zylo-latest-posts-footer', 
            __('zylo Latest Posts', 'your-text-domain'), 
            array('description' => __('Latest Post Widget by zylo', 'your-text-domain'))
        );
    }

    public function widget($args, $instance) {
        extract($args);
        echo $before_widget;

        if (!empty($instance['title'])) {
            echo $before_title . apply_filters('widget_title', $instance['title']) . $after_title;
        }

        ?>
        <div class="widget_latest_post">
            <ul>    
                <?php 
                $q = new WP_Query(array(
                    'post_type'     => 'post',
                    'posts_per_page'=> !empty($instance['count']) ? absint($instance['count']) : 3,
                    'order'         => !empty($instance['posts_order']) ? sanitize_text_field($instance['posts_order']) : 'DESC',
                    'orderby'       => !empty($instance['posts_orderby']) ? sanitize_text_field($instance['posts_orderby']) : 'title',
                    'post__not_in'  => get_option('sticky_posts')
                ));

                if ($q->have_posts()) :
                    while ($q->have_posts()) : $q->the_post();
                ?>
                    <li>                    
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="latest-post-thumb">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="latest-post-desc">
                            <span class="latest-post-meta">
                                <i class="fa-solid fa-calendar-days"></i> 
                                <a href="<?php echo esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('d'))); ?>"><?php echo esc_html(get_the_date()); ?></a>
                            </span>
                            <h3 class="latest-post-title">
                                <a href="<?php the_permalink(); ?>"><?php echo esc_html(wp_trim_words(get_the_title(), 7, '')); ?></a>
                            </h3>
                        </div>
                    </li>
                <?php 
                    endwhile; 
                endif; 
                wp_reset_postdata();
                ?> 
            </ul>
        </div>    
        <?php
        echo $after_widget;
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? sanitize_text_field($instance['title']) : '';
        $count = !empty($instance['count']) ? absint($instance['count']) : 3;
        $posts_order = !empty($instance['posts_order']) ? sanitize_text_field($instance['posts_order']) : 'DESC';
        $posts_orderby = !empty($instance['posts_orderby']) ? sanitize_text_field($instance['posts_orderby']) : 'title';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', 'your-text-domain'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('title')); ?>" id="<?php echo esc_attr($this->get_field_id('title')); ?>" value="<?php echo esc_attr($title); ?>" class="widefat">
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('count')); ?>"><?php _e('Number of posts to show:', 'your-text-domain'); ?></label>
            <input type="number" name="<?php echo esc_attr($this->get_field_name('count')); ?>" id="<?php echo esc_attr($this->get_field_id('count')); ?>" value="<?php echo esc_attr($count); ?>" class="widefat">
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('posts_order')); ?>"><?php _e('Posts Order:', 'your-text-domain'); ?></label>
            <select name="<?php echo esc_attr($this->get_field_name('posts_order')); ?>" id="<?php echo esc_attr($this->get_field_id('posts_order')); ?>" class="widefat">
                <option value="ASC" <?php selected($posts_order, 'ASC'); ?>>ASC</option>
                <option value="DESC" <?php selected($posts_order, 'DESC'); ?>>DESC</option>
            </select>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('posts_orderby')); ?>"><?php _e('Order by:', 'your-text-domain'); ?></label>
            <select name="<?php echo esc_attr($this->get_field_name('posts_orderby')); ?>" id="<?php echo esc_attr($this->get_field_id('posts_orderby')); ?>" class="widefat">
                <option value="ID" <?php selected($posts_orderby, 'ID'); ?>><?php _e('ID', 'your-text-domain'); ?></option>
                <option value="title" <?php selected($posts_orderby, 'title'); ?>><?php _e('Title', 'your-text-domain'); ?></option>
                <option value="date" <?php selected($posts_orderby, 'date'); ?>><?php _e('Date', 'your-text-domain'); ?></option>
                <option value="modified" <?php selected($posts_orderby, 'modified'); ?>><?php _e('Modified', 'your-text-domain'); ?></option>
                <option value="rand" <?php selected($posts_orderby, 'rand'); ?>><?php _e('Random', 'your-text-domain'); ?></option>
                <option value="comment_count" <?php selected($posts_orderby, 'comment_count'); ?>><?php _e('Comment Count', 'your-text-domain'); ?></option>
            </select>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['count'] = absint($new_instance['count']);
        $instance['posts_order'] = sanitize_text_field($new_instance['posts_order']);
        $instance['posts_orderby'] = sanitize_text_field($new_instance['posts_orderby']);
        return $instance;
    }
}

// Register the widget
add_action('widgets_init', function(){
    register_widget('Latest_Posts_Footer_Widget');
});
