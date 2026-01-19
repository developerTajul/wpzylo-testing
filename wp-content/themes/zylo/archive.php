<?php
/**
 * The template for displaying archive pages - 2025 Standard
 *
 * @package zylo
 */
get_header();

// Sidebar check
$has_sidebar = is_active_sidebar('right-sidebar');

// Column classes
$main_col_xl = $has_sidebar ? '8' : '12';
$main_col_lg = $has_sidebar ? '7' : '12';
?>
<section class="blog-area pt-140 pb-105">
    <div class="container">
        <div class="row">

            <div class="col-xl-<?php echo esc_attr($main_col_xl); ?> col-lg-<?php echo esc_attr($main_col_lg); ?> blog-post-items">

                <?php if (have_posts()) : ?>

                    <div class="row g-4">
                        <?php
                        while (have_posts()) :
                            the_post();
                            $sticky_class = is_sticky() ? 'sticky-post-item' : '';
                        ?>
                            <div class="col-xl-12 wow fadeInUp <?php echo esc_attr($sticky_class); ?>" data-wow-delay="0.4s">
                                <?php get_template_part('template-parts/content', get_post_format()); ?>
                            </div>
                        <?php endwhile; ?>
                    </div>

                    <div class="pagination-wrapper mt-50 text-center wow fadeInUp" data-wow-delay="0.5s">
                        <?php
                        zylo_pagination(
                            '<i class="fa-solid fa-angles-left"></i>',
                            '<i class="fa-solid fa-angles-right"></i>'
                        );
                        ?>
                    </div>

                <?php else : ?>
                    <?php get_template_part('template-parts/content', 'none'); ?>
                <?php endif; ?>

            </div>
            <?php if ($has_sidebar) : ?>
                <div class="col-xl-4 col-lg-5 order-1 order-lg-2">
                    <aside class="sidebar">
                        <?php get_sidebar(); ?>
                    </aside>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>

<?php get_footer(); ?>