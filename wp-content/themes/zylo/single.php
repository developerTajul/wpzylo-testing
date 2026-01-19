<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package zylo
 */
get_header();

// Determine main content column size (7 if sidebar is active, 12 if not)
$blog_column = is_active_sidebar( 'right-sidebar' ) ? 7 : 12 ;
?>
<section class="blog-area pt-140 pb-105">
    <div class="container">
        <div class="row">
            
            <div class="col-xl-8 col-lg-<?php print esc_attr($blog_column); ?>">
                <div class="blog-details-wrapper">
                    <?php
                    // Start the WordPress Loop
                    while ( have_posts() ) :
                        the_post();
                        
                        // Load the template part for post content
                        get_template_part( 'template-parts/content', get_post_format() );
                        ?>
                    
                        <?php
                        // Previous & Next Post 
                        $prev_post = get_previous_post();
                        $next_post = get_next_post();

                        if ( $prev_post || $next_post ) : ?>
                            <div class="blog-post-nav">

                                <?php if ( $prev_post ) : 
                                    $prev_title = get_the_title( $prev_post );
                                    
                                    $prev_title_short = (mb_strlen( $prev_title ) > 30) ? mb_substr( $prev_title, 0, 30 ) . '...' : $prev_title;
                                ?>
                                    <div class="post-navigation prev-post">
                                        <?php if ( has_post_thumbnail( $prev_post ) ) : ?>
                                            <div class="post-img">
                                                <?php echo get_the_post_thumbnail( $prev_post->ID, array(100, 100) ); ?>
                                            </div>
                                        <?php endif; ?>

                                        <div class="text">
                                            <span><i class="fa fa-arrow-left"></i> <?php esc_html_e('Prev Post', 'zylo'); ?></span>
                                            <h4>
                                                <a href="<?php echo get_permalink( $prev_post ); ?>" title="<?php echo esc_attr( $prev_title ); ?>">
                                                    <?php echo esc_html( $prev_title_short ); ?>
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="divider"></div>

                                <?php if ( $next_post ) : 
                                    $next_title = get_the_title( $next_post );
                                    
                                    $next_title_short = (mb_strlen( $next_title ) > 30) ? mb_substr( $next_title, 0, 30 ) . '...' : $next_title;
                                ?>
                                    <div class="post-navigation next-post">
                                        <?php if ( has_post_thumbnail( $next_post ) ) : ?>
                                            <div class="post-img">
                                                <?php echo get_the_post_thumbnail( $next_post->ID, array(100, 100) ); ?>
                                            </div>
                                        <?php endif; ?>

                                        <div class="text">
                                            <span><?php esc_html_e('Next Post', 'zylo'); ?> <i class="fa fa-arrow-right"></i></span>
                                            <h4>
                                                <a href="<?php echo get_permalink( $next_post ); ?>" title="<?php echo esc_attr( $next_title ); ?>">
                                                    <?php echo esc_html( $next_title_short ); ?>
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                        <?php endif; ?>

                        <?php
                        // Load Author Bio
                        get_template_part( 'template-parts/biography');

                        // Comments Section
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
                    ?>
                </div> </div> <?php 
            if ( is_active_sidebar( 'right-sidebar' ) ) { ?>
                <div class="col-xl-4 col-lg-5 order-1 order-lg-2">
                    <aside class="sidebar">
                        <?php get_sidebar(); ?>
                    </aside>
                </div> <?php
            }
            ?>
        </div> </div> </section> <?php
get_footer();