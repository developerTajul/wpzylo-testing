<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zylo
 */
if( is_single() ): ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('single-post-item single-video-post '); ?> >
        <?php 
        if( has_post_thumbnail() ): ?>
            <div class="post-video">
                <?php the_post_thumbnail('full', array('class' => 'img-responsive' )); ?>
                <div class="popup-video-wrapper">
                    <div class="video-btn">
                        <a href="<?php print esc_url(get_post_meta(get_the_id(), '_video-url', true )); ?>" class="mfp-iframe video-popup">
                            <i class="fa-solid fa-play" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
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
<?php
else: ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('single-post-item '); ?>>
        <?php 
        if( has_post_thumbnail() ): ?>
            <div class="post-video">
                <?php the_post_thumbnail('full', array('class' => 'img-responsive' )); ?>
                <div class="popup-video-wrapper">
                    <div class="video-btn">
                        <a href="<?php print esc_url(get_post_meta(get_the_id(), '_video-url', true )); ?>" class="mfp-iframe video-popup">
                            <i class="fa-solid fa-play" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
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
<?php
endif; ?>