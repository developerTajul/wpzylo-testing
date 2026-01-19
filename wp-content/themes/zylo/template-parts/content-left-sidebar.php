<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zylo
 */
if( is_single() ): ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('single-post-item '); ?>>
        <?php 
        if( function_exists( 'zylo_post_thumbnail' ) ):
            echo zylo_post_thumbnail(); 
        endif;
        ?>

        <div class="post-content-wrapper">
            <?php 
            if( function_exists( 'zylo_post_meta' ) ):
                echo zylo_post_meta(); 
            endif; ?>

            <?php 
            if( function_exists( 'zylo_post_title' ) ):
                echo zylo_post_title(); 
            endif; ?>

            <?php 
            if( function_exists( 'zylo_post_content' ) ):
                echo zylo_post_content(); 
            endif; ?>

            <?php 
            if( function_exists( 'zylo_single_post_meta' ) ):
                echo zylo_single_post_meta(); 
            endif; ?>
        </div>
    </article>
<?php
else: ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('single-post-item'); ?>>
        <?php echo zylo_post_thumbnail(); ?>

        <div class="post-content-wrapper">
            <?php 
            if( function_exists( 'zylo_post_meta' ) ):
                echo zylo_post_meta(); 
            endif;
            ?>

            <?php 
            if( function_exists( 'zylo_post_title' ) ):
                echo zylo_post_title(); 
            endif; ?>

            <?php 
            if( function_exists( 'zylo_post_content' ) ):
                echo zylo_post_content(); 
            endif; ?>

            <?php 
            if( function_exists( 'zylo_post_readmore' ) ):
                echo zylo_post_readmore(); 
            endif; ?>
        </div>
    </article>
<?php
endif; ?>