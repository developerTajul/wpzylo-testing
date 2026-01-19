<?php

/**
* Template Name: Page Sidebar
 * @package zylo
 */
get_header();
$blog_column = is_active_sidebar( 'right-sidebar' ) ? 7 : 12 ;
?>
<div class="page-area">
    <div class="container">
		<div class="row">
			<div class="col-xl-8 col-lg-<?php print esc_attr($blog_column); ?>">
				<div class="zylo-page-content">
					<?php 
					if( have_posts() ):
						while(  have_posts() ): the_post();
							get_template_part('template-parts/content','page');
						endwhile;
					else:
						get_template_part('template-parts/content', 'none');
					endif; ?>
				</div>
			</div>
			<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
		        <div class="col-xl-4 col-lg-5 order-1 order-lg-2">
					<aside class="sidebar">
						<?php get_sidebar(); ?>
					</aside>
				</div>
			<?php endif; ?>
		</div>
    </div>
</div>
<?php
get_footer();