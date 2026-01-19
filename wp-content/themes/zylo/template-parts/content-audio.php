<?php
/**
 * Template part for displaying audio posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package clario
 */

if (is_single()) : ?>
    <article class="single-post-item format-audio">
           <?php 
        if(get_post_meta(get_the_id(), '_audio-url', '' )) : ?>
            <div class="postbox-audio embed-responsive embed-responsive-16by9">
                <?php echo wp_oembed_get( get_post_meta(get_the_id(), '_audio-url', true) ); ?>
            </div>
        <?php 
        endif; ?>

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
<?php else : ?>
    <article class="single-post-item format-audio">
            <?php
            if(get_post_meta(get_the_id(), '_audio-url', '' )) : ?>
            <div class="post-audio embed-responsive embed-responsive-16by9">
                <?php echo wp_oembed_get( get_post_meta(get_the_id(), '_audio-url', true) ); ?>
            </div>
        <?php 
        endif; ?>

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
<?php endif; ?>