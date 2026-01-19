<?php
/**
* Template Name: Blog Right Sidebar
 * @package zylo
 */
get_header();
$blog_column = is_active_sidebar( 'right-sidebar' ) ? 8 : 12 ;
?>
<section class="blog-area pt-140 pb-105">
    <div class="container">
        <div class="row">
			<div class="col-lg-<?php print esc_attr($blog_column); ?> blog-post-items blog-padding">	
				<?php
					$page = ( get_query_var( 'page' ) ? get_query_var( 'page' ) : 1 );
					$paged = ( get_query_var( 'paged' ) ? get_query_var( 'paged' ) : $page );
					$wp_query = new WP_Query( array(
						'post_type' => 'post',
						'paged'     => $paged,
						'page'      => $paged,
					) );
					if ( $wp_query->have_posts() ) : ?>

						<?php
						/* Start the Loop */
						while ( $wp_query->have_posts() ) : $wp_query->the_post();
							global $post; ?>
							<?php
							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'left-sidebar' ); 
							?>			
						<?php
						endwhile;
						?>
						<div class="basic-pagination basic-pagination-2">
							<?php zylo_pagination('<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>', '', array('class' => '')); ?>
						</div>
					<?php
					else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>
			</div>

			<?php 
			if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
			<div class="col-lg-4">
				<?php get_sidebar(); ?>
			</div>
			<?php 
			endif; ?>
        </div>
    </div>
</section>

<?php
get_footer();