<?php
/**
 * Template part for displaying posts
 *
 * @package zylo
 */

if ( is_single() ) : ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('single-post-item'); ?>>
        <?php if ( function_exists('zylo_post_thumbnail') ) echo zylo_post_thumbnail(); ?>
        <div class="post-content-wrapper">
            <?php if ( function_exists('zylo_post_meta') ) echo zylo_post_meta(); ?>
            <?php if ( function_exists('zylo_post_title') ) echo zylo_post_title(); ?>
            <?php if ( function_exists('zylo_post_content') ) echo zylo_post_content(); ?>
            <?php if ( function_exists('zylo_single_post_meta') ) echo zylo_single_post_meta(); ?>
        </div>
    </article>

<?php 
else : ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('single-post-item blog-list'); ?>>
        <?php if ( function_exists('zylo_post_thumbnail') ) echo zylo_post_thumbnail(); ?>
        <div class="post-content-wrapper singleblog__content">
            <?php if ( function_exists('zylo_post_meta') ) echo zylo_post_meta(); ?>
            <?php if ( function_exists('zylo_post_title') ) echo zylo_post_title(); ?>
            <?php if ( function_exists('zylo_post_content') ) echo zylo_post_content(); ?>
            <?php if ( function_exists('zylo_post_readmore') ) echo zylo_post_readmore(); ?>
        </div>
    </article>
<?php 
endif; ?>
