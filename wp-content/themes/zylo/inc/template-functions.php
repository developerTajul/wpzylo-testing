<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package zylo
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function zylo_body_classes( $classes ) {
    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }
    // Adds a class of no-sidebar when there is no sidebar present.
    if ( ! is_active_sidebar( 'right-sidebar' ) ) {
        $classes[] = 'no-sidebar';
    }
    return $classes;
}
add_filter( 'body_class', 'zylo_body_classes' );

/**
 * Post title info
 */
if ( ! function_exists( 'zylo_post_title' ) ) :
function zylo_post_title(){
    global $post;
    ob_start(); 
    
    if( is_single() ): 
        if( ! empty( $post->post_title ) ) : ?>
            <h3 class="post-title single singleblog__title">
                <?php the_title(); ?>
            </h3>
        <?php 
        endif;
    else: 
        if( ! empty( $post->post_title ) ) : ?>
            <h3 class="post-title here blog">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
        <?php 
        endif;
    endif; 
    return ob_get_clean();
}
endif;

/**
 * Post meta info
 */
if ( ! function_exists( 'zylo_post_meta' ) ) :
function zylo_post_meta(){
    $show_user                  = '1';
    $show_category              = '1';
    $show_date                  = '1';
    $show_comment               = '0';
    $show_postmeta_user         = '1';
    $show_postmeta_category     = '0';
    $show_postmeta_date         = '1';
    $show_postmeta_comment      = '1';

    if ( class_exists( 'Redux' ) ) {
        $opt_name                   = 'zylo_options';
        $show_user                  = Redux::get_option($opt_name, 'zylo_blog_show_user');
        $show_category              = Redux::get_option($opt_name, 'zylo_blog_show_category');
        $show_date                  = Redux::get_option($opt_name, 'zylo_blog_show_date');
        $show_comment               = Redux::get_option($opt_name, 'zylo_blog_show_comment');
        $show_postmeta_user         = Redux::get_option($opt_name, 'zylo_bdetails_post_meta_show_user');
        $show_postmeta_category     = Redux::get_option($opt_name, 'zylo_bdetails_post_meta_show_cat');
        $show_postmeta_date         = Redux::get_option($opt_name, 'zylo_bdetails_post_meta_show_date');
        $show_postmeta_comment      = Redux::get_option($opt_name, 'zylo_bdetails_post_meta_show_comment');
    }

    ob_start(); ?>
    <?php 
    if( is_single() ): ?>
        <div class="post-meta">
            <?php
            if( $show_postmeta_user ): ?>
                <span>
                    <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                        <span class="author-img"><?php print get_avatar( get_the_author_meta( 'user_email' ), 37,'','',array('class'=>'media-object img-circle') ); ?></span>
                        <?php print get_the_author(); ?>
                    </a>
                </span>
            <?php
            endif; ?>
            <?php  
            if( $show_postmeta_category ):
                echo zylo_get_category();
            endif; ?>
            <?php
            if( $show_postmeta_date ): ?>
                <span><i class="fa-solid fa-clock"></i><?php the_time(get_option('date_format')); ?></span>
            <?php
            endif; ?>
            <?php
            if( $show_postmeta_comment ): ?>
                <span><a href="<?php comments_link(); ?>"><i class="fa-solid fa-comments"></i> <?php comments_number(); ?></a></span>
            <?php
            endif; ?>
        </div>
    <?php
    else: ?>
        <div class="post-meta">
            <?php
            if( $show_user ): ?>
                <span>
                    <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                        <span class="author-img"><?php print get_avatar( get_the_author_meta( 'user_email' ), 37,'','',array('class'=>'media-object img-circle') ); ?></span>
                        <?php print get_the_author(); ?>
                    </a>
                </span>
            <?php
            endif; ?>
            <?php  
            if( $show_category ):
                echo zylo_get_category();
            endif; ?>
            <?php
            if( $show_date ): ?>
                <span><i class="fa-solid fa-clock"></i><?php the_time(get_option('date_format')); ?></span>
            <?php
            endif; ?>
        </div>
    <?php
    endif; ?>            
    <?php 
    return ob_get_clean();
}
endif;

/**
 * Post read more
 */
if ( ! function_exists( 'zylo_post_readmore' ) ) :
function zylo_post_readmore(){
    ob_start(); 
        $zylo_blog_btn_switch       = '0';
        $zylo_blog_btn_icon_switch  = '0';
        $show_blog_social_share     = '0';
        $zylo_blog_btn = esc_html__('Read More', 'zylo');
        $zylo_blog_btn_icon = esc_html__('fa-solid fa-arrow-right-long', 'zylo');

        if ( class_exists( 'Redux' ) ) {
            $opt_name               = 'zylo_options';
            $zylo_blog_btn_switch   = Redux::get_option($opt_name, 'zylo_blog_btn_switch');
            $zylo_blog_btn          = Redux::get_option($opt_name, 'zylo_blog_btn');
            $zylo_blog_btn_icon_switch = Redux::get_option($opt_name, 'zylo_blog_btn_icon_switch');
            $zylo_blog_btn_icon     = Redux::get_option($opt_name, 'zylo_blog_btn_icon');
            $show_blog_social_share = Redux::get_option($opt_name, 'show_blog_social_share');
        }
        
        if( $zylo_blog_btn_switch ): ?>
            <div class="read-more wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.5s">
                <div class="comment-meta-wrapper">
                    <span class="icon"><i class="fa-light fa-comments"></i></span>
                    <span class="comment-meta"><?php comments_number(); ?></span>
                </div>
                <a href="<?php the_permalink(); ?>" class="theme-btn"><?php print esc_html($zylo_blog_btn); ?>
                    <?php 
                    if( $zylo_blog_btn_icon_switch ): ?>
                        <i class="<?php echo esc_attr( $zylo_blog_btn_icon ); ?>"></i>
                    <?php 
                    endif; ?>
                </a>
            </div>
        <?php 
        endif; 
    return ob_get_clean();
}
endif;

/**
 * Get tags.
 */
if ( ! function_exists( 'zylo_get_tag' ) ) :
function zylo_get_tag() {
    $html = '';
    if(has_tag()) {
        $html .= '<div class="blog-post-tag left-items"><span class="title">'. esc_html__('Tags :','zylo') .'</span><div class="post-tag-list">';
            $html .= get_the_tag_list('',' ','');
        $html .= '</div></div>';
    }
    return $html;
}
endif;

/**
 * Get categories.
 */
if ( ! function_exists( 'zylo_get_all_category' ) ) :
function zylo_get_all_category() {
    ob_start(); 
    $categories = get_the_category( get_the_ID() ); ?>
    <div class="blog-post-cat">
        <span><?php echo esc_html('Cats :', 'zylo'); ?></span>
        <div class="post-cat-list">
            <?php
            foreach ($categories as $category): ?>
                <span><a class="news-cat" href="<?php echo esc_url( get_category_link($category->term_id) ); ?>"> <?php echo esc_html( $category->cat_name ); ?></a></span>
            <?php
            endforeach; ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
endif;

/**
 * Get categories.
 */
if ( ! function_exists( 'zylo_get_category' ) ) :
function zylo_get_category() {
    ob_start(); 
    $categories = get_the_category( get_the_ID() );
    $x = 0;
    foreach ($categories as $category){
        if($x==1){
            break;
        }   
        $x++;
        ?>
        <span><a class="news-tag" href="<?php echo esc_url( get_category_link($category->term_id) ); ?>"> <i class="fa-solid fa-folder-open"></i> <?php echo esc_html( $category->cat_name ); ?></a></span>
    <?php
    }
    return ob_get_clean();
}
endif;

/**
 * Get categories without icon
 */
if ( ! function_exists( 'zylo_get_category_without_icon' ) ) :
function zylo_get_category_without_icon() {
    ob_start();
    $categories = get_the_category( get_the_ID() );
    $x = 0;
    foreach ($categories as $category){
        if($x==1){
            break;
        }   
        $x++;
        ?>
        <div class="post-tag">
            <div class="post-tag-list">
                <a href="<?php echo esc_url( get_category_link($category->term_id) ); ?>"><?php echo esc_html( $category->cat_name ); ?></a>
            </div>
        </div>
    <?php
    }
    return ob_get_clean();
}
endif;

/**
 * Image alt-text
 */
if ( ! function_exists( 'zylo_img_alt_text' ) ) :
function zylo_img_alt_text( $img_er_id = null ){
    $image_id = $img_er_id;
    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', false);
    $image_title = get_the_title($image_id);
    if( !empty($image_id) ){
        if($image_alt){
            $alt_text = get_post_meta($image_id, '_wp_attachment_image_alt', false);
        }else{
            $alt_text = get_the_title($image_id);
        }   
    }else{
        $alt_text = esc_html__('Image Alt Text', 'zylo');
    }
    return $alt_text;
}
endif;

/**
 * Social Share
 */
if ( ! function_exists( 'zylo_blog_share' ) ) :
function zylo_blog_share(){
    $title = get_theme_mod( 'zylo_blog_social_share_text', esc_html__( 'Share :', 'zylo' ) );
    ob_start(); ?>
        <div class="social-share">
            <span class="social-share-title"><?php echo esc_html($title); ?></span>
            <a target="_blank" class="facebook" href="https://www.facebook.com/sharer.php?u=<?php echo esc_url(get_the_permalink()); ?>&t=TEst'.'" title="Share on Facebook"><i class="fa-brands fa-facebook-f"></i></a>
            <a target="_blank" class="twitter" href="https://www.twitter.com/intent/tweet?url=<?php echo esc_url(get_the_permalink()); ?>&text=<?php echo get_the_excerpt(); ?>" title="Tweet this"><i class="fa-brands fa-twitter"></i></a>
            <a target="_blank" class="linkedin" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo esc_url(get_the_permalink()); ?>"><i class="fa-brands fa-linkedin"></i></a>
        </div>
    <?php
    return ob_get_clean();
}
endif;

/**
 * Post read more
 */
if ( ! function_exists( 'zylo_single_post_meta' ) ) :
function zylo_single_post_meta(){
    ob_start(); 
    $show_bdetails_category       = '1';
    $show_bdetails_tag            = '1';
    $show_bdetails_social_share   = '0';
    if ( class_exists( 'Redux' ) ) {
        $opt_name                    = 'zylo_options';
        $show_bdetails_category      = Redux::get_option($opt_name, 'zylo_bdetails_show_category');
        $show_bdetails_tag           = Redux::get_option($opt_name, 'zylo_bdetails_show_tag');
        $show_bdetails_social_share  = Redux::get_option($opt_name, 'zylo_bdetails_social_share');
    }
    if( $show_bdetails_social_share ): ?>
        <div class="single-post-meta default social d-flex justify-content-between">
            <?php 
            if( $show_bdetails_tag ):
                echo zylo_get_tag(); 
            endif;
            if( $show_bdetails_social_share ):
                echo zylo_blog_share(); 
            endif; ?>
        </div>
    <?php
    else: ?>
        <div class="single-post-meta">
            <?php 
            if( $show_bdetails_category ):
                echo zylo_get_all_category(); 
            endif; 
            if( $show_bdetails_tag ):
                echo zylo_get_tag(); 
            endif;
            ?>
        </div>
    <?php
    endif; 
    return ob_get_clean();
}
endif;

/**
 * Post content & excerpt
 */
if ( ! function_exists( 'zylo_post_content' ) ) :
function zylo_post_content(){
    ob_start(); 
    $the_content = apply_filters('the_content', get_the_content());
    if( is_single() ): 
        if ( !empty($the_content) ): ?>
            <div class="post-content">
                <?php the_content(); ?> 
                <?php
                wp_link_pages( array(
                    'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'zylo' ),
                    'after'       => '</div>',
                    'link_before' => '<span class="page-number">',
                    'link_after'  => '</span>',
                ) );
                ?>
            </div>
        <?php
        endif; 
    else: 
        if ( !empty($the_content) ): ?>
            <div class="post-content">
                <?php the_excerpt(); ?>
            </div>
        <?php
        endif; 
    endif; 
    return ob_get_clean();
}
endif;

/**
 * Post thumbnail
 */
if ( ! function_exists( 'zylo_post_thumbnail' ) ) :
function zylo_post_thumbnail(){
    ob_start(); 
    if( is_single() ): 
        if(has_post_thumbnail()): ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail('full', array('class' => 'img-responsive' )); ?>
            </div>
        <?php 
        endif; 
    else: 
        if( has_post_thumbnail() ): ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('full', array('class' => 'img-responsive' )); ?>
                </a>
            </div>
        <?php 
        endif; 
    endif; 
    return ob_get_clean();
}
endif;

/**
 * Post Date
 */
if ( ! function_exists( 'dynamic_date_with_link' ) ) :
function dynamic_date_with_link($icon_name = 'fa-solid fa-clock') {
    ob_start();
    $post_date = get_the_date(get_option('date_format'));
    $default_icon = 'fa-solid fa-clock';
    ?>
    <span>
        <a href="<?php echo get_day_link( get_post_time('Y'), get_post_time('m'), get_post_time('d') ); ?>" class="post-date">
            <?php if ($icon_name) : ?>
                <i class="<?php echo esc_attr($icon_name); ?>"></i>
            <?php else : ?>
                <i class="<?php echo esc_attr($default_icon); ?>"></i>
            <?php endif; ?>
            <?php echo esc_html($post_date); ?>
        </a>
    </span>
    <?php
    return ob_get_clean();
}
endif;

/**
 * Header extra menu (Offcanvas Contact Info)
 */
if (!function_exists('zylo_header_extra')) :
    function zylo_header_extra()
    {
        // Default values (fallback)
        $contact_info   = esc_html__('Contact Info', 'zylo');
        $address        = esc_html__('20, Bordeshi, New York, US', 'zylo');
        $email_address  = esc_html__('hello@advkt.com', 'zylo');
        $mail_to        = 'mailto:example@gmail.com';
        $opening        = esc_html__('Mod-friday, 09am -05pm', 'zylo');
        $phone_number   = esc_html__('+(123)456-7890', 'zylo');
        $call_to        = 'tel:+(123)456-7890';
        $btn_text       = esc_html__('Get A Quote', 'zylo');
        $btn_link       = '#';
        $fb_icon        = 'fab fa-facebook-f';
        $fb_url         = '#';
        $tw_icon        = 'fab fa-twitter';
        $tw_url         = '#';
        $yt_icon        = 'fab fa-youtube';
        $yt_url         = '#';
        $ln_icon        = 'fab fa-linkedin-in';
        $ln_url         = '#';

        $show_sidebar = false;

        if (class_exists('Redux')) {
            $opt_name = 'zylo_options';

            $show_sidebar = Redux::get_option($opt_name, 'header_topbar_switch'); 

            if ($show_sidebar) {
                $contact_info   = esc_html(Redux::get_option($opt_name, 'sidebar_contact_info') ?: $contact_info);
                $address        = esc_html(Redux::get_option($opt_name, 'sidebar_address') ?: $address);
                $email_address  = esc_html(Redux::get_option($opt_name, 'sidebar_email_address') ?: $email_address);
                $mail_to        = esc_url( (Redux::get_option($opt_name, 'sidebar_mail_to') ?: 'example@gmail.com'));
                $opening        = esc_html(Redux::get_option($opt_name, 'sidebar_opening') ?: $opening);
                $phone_number   = esc_html(Redux::get_option($opt_name, 'sidebar_phone_number') ?: $phone_number);
                $call_to        = esc_url((Redux::get_option($opt_name, 'sidebar_call_to') ?: '+(123)456-7890'));
                $btn_text       = esc_html(Redux::get_option($opt_name, 'sidebar_btn_text') ?: $btn_text);
                $btn_link       = esc_url(Redux::get_option($opt_name, 'sidebar_btn_link') ?: $btn_link);

                $fb_icon        = esc_attr(Redux::get_option($opt_name, 'sidebar_facebook_icon') ?: $fb_icon);
                $fb_url         = esc_url(Redux::get_option($opt_name, 'sidebar_facebook_icon_url') ?: $fb_url);
                $tw_icon        = esc_attr(Redux::get_option($opt_name, 'sidebar_twitter_icon') ?: $tw_icon);
                $tw_url         = esc_url(Redux::get_option($opt_name, 'sidebar_twitter_icon_url') ?: $tw_url);
                $yt_icon        = esc_attr(Redux::get_option($opt_name, 'sidebar_youtube_icon') ?: $yt_icon);
                $yt_url         = esc_url(Redux::get_option($opt_name, 'sidebar_youtube_icon_url') ?: $yt_url);
                $ln_icon        = esc_attr(Redux::get_option($opt_name, 'sidebar_linkedin_icon') ?: $ln_icon);
                $ln_url         = esc_url(Redux::get_option($opt_name, 'sidebar_linkedin_icon_url') ?: $ln_url);
            }
        }

        if (!$show_sidebar) {
            return '';
        }

        ob_start(); ?>

        <div class="offcanvas__contact">
            <h4><?php echo esc_html($contact_info); ?></h4>
            <ul>
                <li class="d-flex align-items-center">
                    <div class="offcanvas__contact-icon"><i class="fal fa-map-marker-alt"></i></div>
                    <div class="offcanvas__contact-text"><span> <?php echo esc_html($address); ?> </span></div>
                </li>
                <li class="d-flex align-items-center">
                    <div class="offcanvas__contact-icon mr-15"><i class="fal fa-envelope"></i></div>
                    <div class="offcanvas__contact-text"><a href=" <?php echo $mail_to ?>"><?php echo esc_html($email_address); ?></a></div>
                </li>
                <li class="d-flex align-items-center">
                    <div class="offcanvas__contact-icon mr-15"><i class="fal fa-clock"></i></div>
                    <div class="offcanvas__contact-text"><span><?php echo  esc_html($opening); ?></span></div>
                </li>
                <li class="d-flex align-items-center">
                    <div class="offcanvas__contact-icon mr-15"><i class="far fa-phone"></i></div>
                    <div class="offcanvas__contact-text"><a href="<?php echo esc_html( $call_to ) ?>"><?php echo esc_html($phone_number); ?></a></div>
                </li>
            </ul>

            <div class="header-button">
                <div class="btnbox">
                    <a class="theme-btn" href="<?php echo esc_url( $btn_link ); ?>"><?php echo esc_html( $btn_text ); ?></a>
                </div>
            </div>

            <div class="social-icon d-flex align-items-center">
                <?php
                if ($fb_url !== '#'): ?>
                    <a href="<?php echo esc_url($fb_url); ?>"><i class="<?php echo esc_attr($fb_icon); ?>"></i></a>
                <?php 
                endif; ?>  

                <?php
                if ($tw_url !== '#'): ?>
                    <a href="<?php echo esc_url($tw_url); ?>"><i class="<?php echo esc_attr($tw_icon); ?>"></i></a>
                <?php 
                endif; ?> 

                <?php
                if ($yt_url !== '#'): ?>
                    <a href="<?php echo esc_url($yt_url); ?>"><i class="<?php echo esc_attr($yt_icon); ?>"></i></a>
                <?php 
                endif; ?>    

                <?php
                if ($ln_url !== '#'): ?>
                    <a href="<?php echo esc_url($ln_url); ?>"><i class="<?php echo esc_attr($ln_icon); ?>"></i></a>
                <?php 
                endif; ?>  
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
endif;

/**
 * Block Styles
 */
if ( ! function_exists( 'zylo_register_block_styles' ) ) :
function zylo_register_block_styles() {
    if ( function_exists( 'register_block_style' ) ) {
        register_block_style(
            'core/image',
            array(
                'name'  => 'bottom-right',
                'label' => esc_html__( 'Bottom Right', 'zylo' ),
            )
        );
        register_block_style(
            'core/image',
            array(
                'name'  => 'bottom-left',
                'label' => esc_html__( 'Bottom Left', 'zylo' ),
            )
        );
        register_block_style(
            'core/image',
            array(
                'name'  => 'center',
                'label' => esc_html__( 'Center', 'zylo' ),
            )
        );
    }
}
add_action( 'after_setup_theme', 'zylo_register_block_styles' );
endif;

/**
 * Block Pattern
 */
if ( ! function_exists( 'zylo_register_block_patterns' ) ) :
function zylo_register_block_patterns() {
    if( function_exists('register_block_pattern')){
        register_block_pattern(
            'wpdocs/zylo-single-para',
            array(
                'title'         => __( 'Tiny Para', 'zylo' ),
                'description'   => _x( 'This is my first block pattern', 'Block pattern description', 'zylo' ),
                'content'       => '<!-- wp:paragraph --><p>A single paragraph block style</p><!-- /wp:paragraph -->',
                'categories'    => array( 'text' ),
                'keywords'      => array( 'cta', 'demo', 'example' ),
                'viewportWidth' => 800,
            )
        );
    }   
}
add_action( 'init', 'zylo_register_block_patterns' );
endif;

/**
 * Header Social Profiles
 */
if ( ! function_exists( 'zylo_header_social_profiles' ) ) :
function zylo_header_social_profiles() {
    $zylo_topbar_fb_url = esc_url('#');
    $zylo_topbar_twitter_url = esc_url('#');
    $zylo_topbar_linkedin_url = esc_url('#');
    $zylo_topbar_youtube_url = esc_url('#');

    if ( class_exists( 'Redux' ) ) {
        $opt_name                   = 'zylo_options';
        $zylo_topbar_fb_url         = Redux::get_option($opt_name, 'zylo_topbar_fb_url');
        $zylo_topbar_twitter_url    = Redux::get_option($opt_name, 'zylo_topbar_twitter_url');
        $zylo_topbar_linkedin_url   = Redux::get_option($opt_name, 'zylo_topbar_linkedin_url');
        $zylo_topbar_youtube_url    = Redux::get_option($opt_name, 'zylo_topbar_youtube_url');
    }

    if (!empty($zylo_topbar_fb_url)): ?>
        <a href="<?php echo esc_url($zylo_topbar_fb_url); ?>"><i class="fa-brands fa-facebook-f"></i></a>
    <?php endif;
    if (!empty($zylo_topbar_twitter_url)): ?>
        <a href="<?php echo esc_url($zylo_topbar_twitter_url); ?>"><i class="fa-brands fa-twitter"></i></a>
    <?php endif;
    if (!empty($zylo_topbar_linkedin_url)): ?>
        <a href="<?php echo esc_url($zylo_topbar_linkedin_url); ?>"><i class="fa-brands fa-linkedin-in"></i></a>
    <?php endif;
    if (!empty($zylo_topbar_youtube_url)): ?>
        <a href="<?php echo esc_url($zylo_topbar_youtube_url); ?>"><i class="fa-brands fa-youtube"></i></a>
    <?php endif;
}
endif;

/**
 * Breadcrumb Page Title
 */
if ( ! function_exists( 'zylo_breadcrumb_page_title' ) ) :
function zylo_breadcrumb_page_title() {
    $title = apply_filters( 'pre_get_document_title', '' );
    if ( ! empty( $title ) ) {
        return $title;
    }
    global $page, $paged;
    $title = array(
        'title' => '',
    );
    if ( is_404() ) {
        $title['title'] = __( 'Page not found', 'zylo' );
    } elseif ( is_search() ) {
        $title['title'] = sprintf( __( 'Search Results for &#8220;%s&#8221;', 'zylo' ), get_search_query() );
    } elseif ( is_front_page() ) {
        $title['title'] = get_bloginfo( 'name', 'display' );
    } elseif ( is_post_type_archive() ) {
        $title['title'] = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title['title'] = single_term_title( '', false );
    } elseif ( is_home() || is_singular() ) {
        $title['title'] = single_post_title( '', false );
    } elseif ( is_category() || is_tag() ) {
        $title['title'] = single_term_title( '', false );
    } elseif ( is_author() && get_queried_object() ) {
        $author         = get_queried_object();
        $title['title'] = $author->display_name;
    } elseif ( is_year() ) {
        $title['title'] = get_the_date( _x( 'Y', 'yearly archives date format', 'zylo' ) );
    } elseif ( is_month() ) {
        $title['title'] = get_the_date( _x( 'F Y', 'monthly archives date format', 'zylo' ) );
    } elseif ( is_day() ) {
        $title['title'] = get_the_date();
    }
    if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
        $title['page'] = sprintf( __( 'Page %s', 'zylo' ), max( $paged, $page ) );
    }
    if ( is_front_page() ) {
        $title['tagline'] = get_bloginfo( 'description', 'display' );
    } else {
        $title['site'] = get_bloginfo( 'name', 'display' );
    }
    $sep = apply_filters( 'document_title_separator', ':' );
    $title = apply_filters( 'document_title_parts', $title );
    $title = implode( " $sep ", array_filter( $title ) );
    $title = apply_filters( 'document_title', $title );
    return $title;
}
endif;

/**
 * Page Title
 */
if ( ! function_exists( 'zylo_page_title' ) ) :
function zylo_page_title(){
    $title = zylo_breadcrumb_page_title();
    $titleArray = explode(':', $title);
    return trim( $titleArray[0]);
}
endif;
?>



<?php
if ( ! function_exists( 'zylo_preloader' ) ) :
    function zylo_preloader() {
        if ( ! class_exists( 'Redux' ) ) {
            return;
        }

        $options = get_option( 'zylo_options' );

        // Enable Preloader (default off for performance - Envato recommendation)
        $enable = ! empty( $options['preloader_enable'] ) ? $options['preloader_enable'] : false;
        if ( ! $enable ) {
            return;
        }

        // Options with fallbacks
        $letters       = ! empty( $options['preloader_letters'] ) ? strtoupper( esc_html( $options['preloader_letters'] ) ) : 'ZYLO';
        $text          = ! empty( $options['preloader_text'] ) ? esc_html( $options['preloader_text'] ) : 'Loading';
        $bg_color      = ! empty( $options['preloader_bg_color'] ) ? sanitize_hex_color( $options['preloader_bg_color'] ) : '#ffffff';
        $spinner_color = ! empty( $options['preloader_spinner_color'] ) ? sanitize_hex_color( $options['preloader_spinner_color'] ) : '#000000';

        // Inline style for dynamic colors
        $inline_style = sprintf( 'style="background-color: %s;"', $bg_color );
        $spinner_style = sprintf( 'style="border-color: %1$s transparent %1$s %1$s;"', $spinner_color );
        $text_style    = sprintf( 'style="color: %s;"', $spinner_color );
        ?>

        <div id="preloader" class="preloader" <?php echo esc_attr( $inline_style ); ?>>
            <div class="animation-preloader">
                <div class="spinner" <?php echo esc_attr( $spinner_style ); ?>></div>
                <div class="txt-loading">
                    <?php
                    $letter_array = str_split( $letters );
                    foreach ( $letter_array as $letter ) :
                        $display_letter = ( ' ' === $letter ) ? '&nbsp;' : esc_html( $letter );
                        ?>
                        <span data-text-preloader="<?php echo esc_attr( $letter ); ?>" class="letters-loading" <?php echo esc_attr($text_style); ?>>
                            <?php echo esc_html($display_letter); ?>
                        </span>
                    <?php endforeach; ?>
                </div>

                <?php if ( ! empty( $text ) ) : ?>
                    <p class="text-center"style="<?php echo esc_attr( $text_style ); ?>"><?php echo esc_html( $text ); ?></p>
                <?php endif; ?>
            </div>

            <div class="loader">
                <div class="row">
                    <div class="col-3 loader-section section-left"><div class="bg"></div></div>
                    <div class="col-3 loader-section section-left"><div class="bg"></div></div>
                    <div class="col-3 loader-section section-right"><div class="bg"></div></div>
                    <div class="col-3 loader-section section-right"><div class="bg"></div></div>
                </div>
            </div>
        </div>

        <?php
    }
endif;
function main_column_class($column = '8') {
    echo 'col-xl-' . $column . ' col-lg-' . ($column == '12' ? '12' : '7') . ' col-md-12';
}