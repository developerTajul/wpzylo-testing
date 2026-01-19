<?php
/**
 * Template part for post format: Quote.
 * @package zylo
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-post-item'); ?>>

    <?php if ( function_exists('zylo_post_thumbnail') ) echo zylo_post_thumbnail(); ?>

    <div class="post-content-wrapper">

        <?php if ( function_exists('zylo_post_meta') ) echo zylo_post_meta(); ?>
        <?php if ( function_exists('zylo_post_title') ) echo zylo_post_title(); ?>

        <div class="post-content">
            <?php
            the_content();

            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'zylo' ),
                'after'  => '</div>',
            ) );
            ?>
        </div>

        <?php if ( function_exists('zylo_single_post_meta') ) echo zylo_single_post_meta(); ?>

    </div>
</article>