<?php
/**
 * The main template file
 *
 * @package zylo
 */

get_header();

// If sidebar active => main = 8, sidebar = 4
$blog_column = is_active_sidebar('right-sidebar') ? 8 : 12;
$sidebar_column = 12 - $blog_column;

$blog_shape = get_theme_mod('blog_shape_img');
?>

<section class="blog-area pt-140 pb-140">
    <div class="container">
        <div class="row">

            <!-- Main Content -->
            <div class="col-xl-<?php echo esc_attr($blog_column); ?> col-lg-<?php echo esc_attr($blog_column); ?> position-relative blog-posts">
                <div class="blogs-wrapper">

                    <div class="blog-sketch" style="background-image: url(<?php echo esc_url($blog_shape); ?>)"></div>

                    <?php if (have_posts()) : ?>

                        <?php if (is_home() && !is_front_page()) : ?>
                            <header>
                                <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                            </header>
                        <?php endif; ?>

                        <?php while (have_posts()) : the_post(); ?>
                            <?php get_template_part('template-parts/content', get_post_format()); ?>
                        <?php endwhile; ?>

                        <div class="basic-pagination basic-pagination-2">
                            <?php zylo_pagination('<i class="fa-solid fa-angle-left"></i>', '<i class="fa-solid fa-angle-right"></i>'); ?>
                        </div>

                    <?php else : ?>
                        <?php get_template_part('template-parts/content', 'none'); ?>
                    <?php endif; ?>

                </div>
            </div>

            <!-- Sidebar -->
            <?php if (is_active_sidebar('right-sidebar')) : ?>
                <div class="col-xl-<?php echo esc_attr($sidebar_column); ?> col-lg-<?php echo esc_attr($sidebar_column); ?> pl-lg-0 order-1 order-lg-2">
                    <aside class="sidebar">
                        <?php get_sidebar(); ?>
                    </aside>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>

<?php get_footer(); ?>
