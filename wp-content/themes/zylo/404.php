<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package zylo
 */
get_header();
?>
<div class="blog-area pt-140 pb-105">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
				<?php
				$opt_name              	= 'zylo_options';
				$zylo_error_404_text  = class_exists('Redux') ? Redux::get_option($opt_name, 'zylo_error_404_text') : esc_html__('404 Not Found', 'zylo');
				$zylo_error_title     = class_exists('Redux') ? Redux::get_option($opt_name, 'zylo_error_title') : esc_html__('Oops!', 'zylo');
				$zylo_error_desc      = class_exists('Redux') ? Redux::get_option($opt_name, 'zylo_error_desc') : esc_html__('The page you are looking for does not exist.', 'zylo');
				$zylo_error_link_text = class_exists('Redux') ? Redux::get_option($opt_name, 'zylo_error_link_text') : esc_html__('Go Home', 'zylo');
				?>
				<div class="error-404 not-found mb-20">
					<div class="page-content">
	                    <div class="error-404-content text-center">
	                        <h1 class="error-404-title"><?php echo wp_kses_post( $zylo_error_404_text ); ?></h1>
	                        <h2 class="error-title"><?php echo wp_kses_post( $zylo_error_title ); ?></h2>
	                        <div class="error-content">
	                            <div class="error-text">
	                                <span><?php echo wp_kses_post( $zylo_error_desc ); ?></span>
	                            </div>
	                            <div class="error-btn-bh">
	                            	<a href="<?php echo esc_url(home_url('/')); ?>" class="x-btn error-btn theme-btn">
	                            		<?php echo wp_kses_post($zylo_error_link_text); ?><i class="fa-solid fa-angle-right"></i>
	                            	</a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();