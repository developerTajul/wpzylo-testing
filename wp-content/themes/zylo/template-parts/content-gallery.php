<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zylo
 */

if( is_single() ): ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('single-post-item '); ?> >
        <?php 
        $gallery_images =  get_post_meta(get_the_id(), '_gallery-images', true); 
        if (!empty($gallery_images)) : ?>
            <div class="post-gallery ">
                <?php 
                foreach( $gallery_images as $image ) :  ?>
                    <img src="<?php echo esc_url($image); ?>" alt="<?php print esc_attr__('image','zylo'); ?>" />
                <?php 
                endforeach; ?>
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
            $gallery_images =  get_post_meta(get_the_id(), '_gallery-images', true);  
            if (!empty($gallery_images)) : ?>
                <div class="post-gallery ">
                <?php 
                foreach( $gallery_images as $key => $image ) :                    
                    ?>
                    <img src="<?php echo  esc_url($image); ?>" alt="<?php print esc_attr__('image','zylo'); ?>" />
                <?php 
                endforeach; ?>
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