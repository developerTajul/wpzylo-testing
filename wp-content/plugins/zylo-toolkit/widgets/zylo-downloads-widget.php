<?php 
class zylo_Downloads_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'zylo_downloads_widget', // Base ID
            'zylo Downloads Widget', // Widget name
            array( 'description' => __( 'Widget to display brochure download links.', 'zylo' ) ) // Args
        );
    }

    public function widget( $args, $instance ) {
        // Extract widget arguments
        extract( $args );

        // Default values
        $pdf_url = !empty( $instance['pdf_url'] ) ? $instance['pdf_url'] : '#';
        $doc_url = !empty( $instance['doc_url'] ) ? $instance['doc_url'] : '#';
        $widget_title = !empty( $instance['widget_title'] ) ? $instance['widget_title'] : 'Download Our Brochure';
        $widget_subtitle = !empty( $instance['widget_subtitle'] ) ? $instance['widget_subtitle'] : 'Brochure';

        // Output widget
        echo $before_widget; 
        ?>
        
        <div class="widget_service_brochura">
            <div class="widget-title-wrapper">
                <p class="widget-subtitle"><?php echo esc_html($widget_subtitle); ?></p>
                <h4 class="title"><?php echo esc_html($widget_title); ?></h4>
            </div>
            <div class="button-wrapper">
                <a href="<?php echo esc_url($pdf_url); ?>" class="pdf btn-text">
                    <i class="fa-regular fa-file-pdf"></i>
                    <?php echo esc_html__('Download PDF', 'zylo-toolkit'); ?>
                </a>
                <a href="<?php echo esc_url($doc_url); ?>" class="doc btn-text">
                    <i class="fa-regular fa-file-word"></i>
                    <?php echo esc_html__('Download DOC', 'zylo-toolkit'); ?>
                </a>
            </div>
        </div>

        <?php
        echo $after_widget;
    }

    public function form( $instance ) {
        // Default widget form values
        $pdf_url = !empty( $instance['pdf_url'] ) ? $instance['pdf_url'] : '';
        $doc_url = !empty( $instance['doc_url'] ) ? $instance['doc_url'] : '';
        $widget_title = !empty( $instance['widget_title'] ) ? $instance['widget_title'] : 'Download Our Brochure';
        $widget_subtitle = !empty( $instance['widget_subtitle'] ) ? $instance['widget_subtitle'] : 'Brochure';
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('widget_title'); ?>">Title:</label>
            <input type="text" id="<?php echo $this->get_field_id('widget_title'); ?>" name="<?php echo $this->get_field_name('widget_title'); ?>" value="<?php echo esc_attr($widget_title); ?>" class="widefat" />
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('widget_subtitle'); ?>">Subtitle:</label>
            <input type="text" id="<?php echo $this->get_field_id('widget_subtitle'); ?>" name="<?php echo $this->get_field_name('widget_subtitle'); ?>" value="<?php echo esc_attr($widget_subtitle); ?>" class="widefat" />
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('pdf_url'); ?>">PDF URL:</label>
            <input type="url" id="<?php echo $this->get_field_id('pdf_url'); ?>" name="<?php echo $this->get_field_name('pdf_url'); ?>" value="<?php echo esc_url($pdf_url); ?>" class="widefat" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('doc_url'); ?>">DOC URL:</label>
            <input type="url" id="<?php echo $this->get_field_id('doc_url'); ?>" name="<?php echo $this->get_field_name('doc_url'); ?>" value="<?php echo esc_url($doc_url); ?>" class="widefat" />
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['pdf_url'] = ( ! empty( $new_instance['pdf_url'] ) ) ? esc_url_raw( $new_instance['pdf_url'] ) : '';
        $instance['doc_url'] = ( ! empty( $new_instance['doc_url'] ) ) ? esc_url_raw( $new_instance['doc_url'] ) : '';
        $instance['widget_title'] = ( ! empty( $new_instance['widget_title'] ) ) ? sanitize_text_field( $new_instance['widget_title'] ) : '';
        $instance['widget_subtitle'] = ( ! empty( $new_instance['widget_subtitle'] ) ) ? sanitize_text_field( $new_instance['widget_subtitle'] ) : '';
        return $instance;
    }

}

add_action('widgets_init', function() {
    register_widget('zylo_Downloads_Widget');
});
