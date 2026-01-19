<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package zylo
 */
get_header();
$blog_column = is_active_sidebar('right-sidebar') ? 7 : 12;
?>
<div class="blog-area pt-140 pb-105">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-<?php echo esc_attr($blog_column); ?> blog-post-items">
                <?php
                if (have_posts()) :
                    ?>
                    <div class="result-bar page-header">
                        <h1 class="page-title"><?php esc_html_e('Search Results For:', 'zylo'); ?> <?php echo get_search_query(); ?></h1>
                    </div>
                    <?php
                    while (have_posts()) : the_post();
                        $post_type = get_post_type();
                        if ($post_type === 'post') {
                            get_template_part('template-parts/content', 'search');
                        } elseif ($post_type === 'page') {
                            get_template_part('template-parts/content', 'page'); 
                        } else {
                            get_template_part('template-parts/content', $post_type); 
                        }
                    endwhile;
                else :
                    get_template_part('template-parts/content', 'none');
                endif;
                ?>
            </div>
            <?php if (is_active_sidebar('right-sidebar')) : ?>
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