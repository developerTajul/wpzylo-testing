<?php
/**
 * Custom template tags for Zylo theme
 *
 * @package zylo
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/* ====================== HEADER SECTION ====================== */

if ( ! function_exists( 'zylo_check_header' ) ) :
    add_action( 'zylo_header_style', 'zylo_check_header', 10 );

    function zylo_check_header() {
        $default_header = '1';
        if ( class_exists( 'Redux' ) ) {
            $opt_name       = 'zylo_options';
            $default_header = Redux::get_option( $opt_name, 'choose_default_header', '1' );
        }

        $header_style = get_post_meta( get_the_ID(), 'zylo_choice_header_style', true );

        if ( 'header-style-1' === $header_style ) {
            zylo_header_style_1();
        } elseif ( 'header-style-2' === $header_style ) {
            zylo_header_style_2();
        } else {
            if ( '2' === $default_header ) {
                zylo_header_style_2();
            } else {
                zylo_header_style_1();
            }
        }
    }
endif;

/* Common header elements to avoid duplication */
if ( ! function_exists( 'zylo_common_header_elements' ) ) :
    function zylo_common_header_elements() {
        ob_start();
        ?>
        <?php zylo_preloader(); ?>
        <div class="mouse-cursor cursor-outer"></div>
        <div class="mouse-cursor cursor-inner"></div>

        <!-- Offcanvas Area -->
        <div class="fix-area">
            <div class="offcanvas__info">
                <div class="offcanvas__wrapper">
                    <div class="offcanvas__content">
                        <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                            <div class="offcanvas__logo"><?php zylo_header_logo(); ?></div>
                            <div class="offcanvas__close"><button><i class="fas fa-times"></i></button></div>
                        </div>
                        <div class="mobile-menu fix mb-3"></div>
                        <?php
                            
                                echo wp_kses_post( zylo_header_extra() );
                            ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas__overlay"></div>

        <!-- Back To Top -->
        <button id="back-top" class="back-to-top"><i class="fa-regular fa-arrow-up"></i></button>

        <!-- Search Area -->
        <div class="search-wrap">
            <div class="search-inner">
                <span class="search-close"><i class="fas fa-times" id="search-close"></i></span>
                <div class="search-cell">
                    <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <div class="search-field-holder">
                            <input type="search" class="main-search-input" name="s" 
                                   placeholder="<?php esc_attr_e( 'What are you looking for?', 'zylo' ); ?>" 
                                   value="<?php echo get_search_query(); ?>">
                            <button type="submit" class="search-submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
endif;

if ( ! function_exists( 'zylo_header_style_1' ) ) :
    function zylo_header_style_1() {
        echo zylo_common_header_elements();
        ?>
        <header class="style-1">
            <div class="header-1" id="header-sticky">
                <div class="header-wrap">
                    <div class="logo"><?php zylo_header_logo(); ?></div>
                    <div class="main-menu-wrap"><div class="main-menu"><?php zylo_header_menu(); ?></div></div>
                    <?php
                    $show_search = false;
                    if (class_exists('Redux')) {
                        $opt_name = 'zylo_options';
                        $show_search = Redux::get_option($opt_name, 'header_search_switch');
                    }

                    if ($show_search) : ?>
                        <div class="header-right">
                            <button class="search search-trigger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                    <path d="M18.869 19.662L12.926 13.178C14.265 11.777 15.001 9.945 15.001 8C15.001 5.997 14.221 4.113 12.804 2.697C11.387 1.281 9.50398 0.5 7.50098 0.5C5.49798 0.5 3.61398 1.28 2.19798 2.697C0.781977 4.114 0.000976562 5.997 0.000976562 8C0.000976562 10.003 0.780977 11.887 2.19798 13.303C3.61498 14.719 5.49798 15.5 7.50098 15.5C9.22698 15.5 10.863 14.921 12.189 13.855L18.132 20.338C18.231 20.446 18.365 20.5 18.501 20.5C18.622 20.5 18.743 20.457 18.839 20.369C19.043 20.182 19.056 19.866 18.87 19.663L18.869 19.662ZM0.999977 8C0.999977 4.416 3.91598 1.5 7.49998 1.5C11.084 1.5 14 4.416 14 8C14 11.584 11.084 14.5 7.49998 14.5C3.91598 14.5 0.999977 11.584 0.999977 8Z" fill="white"/>
                                </svg>
                            </button>

                            <button class="offcanvas-bar text-white sidebar__toggle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                    <path d="M21.875 6.25H3.125C2.78 6.25 2.5 5.97 2.5 5.625C2.5 5.28 2.78 5 3.125 5H21.875C22.22 5 22.5 5.28 22.5 5.625C22.5 5.97 22.22 6.25 21.875 6.25Z" fill="white"/>
                                    <path d="M16.875 15H3.125C2.78 15 2.5 14.72 2.5 14.375C2.5 14.03 2.78 13.75 3.125 13.75H16.875C17.22 13.75 17.5 14.03 17.5 14.375C17.5 14.72 17.22 15 16.875 15Z" fill="white"/>
                                    <path d="M21.875 23.75H3.125C2.78 23.75 2.5 23.47 2.5 23.125C2.5 22.78 2.78 22.5 3.125 22.5H21.875C22.22 22.5 22.5 22.78 22.5 23.125C22.5 23.47 22.22 23.75 21.875 23.75Z" fill="white"/>
                                </svg>
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </header>
        <?php
    }
endif;

if ( ! function_exists( 'zylo_header_style_2' ) ) :
    function zylo_header_style_2() {
        echo zylo_common_header_elements();
        ?>
        <header>
            <div class="header-1 header-style-2" id="header-sticky">
                <div class="header-wrap">
                    <div class="logo"><?php zylo_header_logo(); ?></div>
                    <div class="main-menu-wrap"><div class="main-menu"><?php zylo_header_menu(); ?></div></div>
                    <?php
                    $show_search = false;
                    if (class_exists('Redux')) {
                        $opt_name = 'zylo_options';
                        $show_search = Redux::get_option($opt_name, 'header_search_switch');
                    }

                    if ($show_search) : ?>
                        <div class="header-right">
                            <button class="search search-trigger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                    <path d="M18.869 19.662L12.926 13.178C14.265 11.777 15.001 9.945 15.001 8C15.001 5.997 14.221 4.113 12.804 2.697C11.387 1.281 9.50398 0.5 7.50098 0.5C5.49798 0.5 3.61398 1.28 2.19798 2.697C0.781977 4.114 0.000976562 5.997 0.000976562 8C0.000976562 10.003 0.780977 11.887 2.19798 13.303C3.61498 14.719 5.49798 15.5 7.50098 15.5C9.22698 15.5 10.863 14.921 12.189 13.855L18.132 20.338C18.231 20.446 18.365 20.5 18.501 20.5C18.622 20.5 18.743 20.457 18.839 20.369C19.043 20.182 19.056 19.866 18.87 19.663L18.869 19.662ZM0.999977 8C0.999977 4.416 3.91598 1.5 7.49998 1.5C11.084 1.5 14 4.416 14 8C14 11.584 11.084 14.5 7.49998 14.5C3.91598 14.5 0.999977 11.584 0.999977 8Z" fill="white"/>
                                </svg>
                            </button>

                            <button class="offcanvas-bar text-white sidebar__toggle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                    <path d="M21.875 6.25H3.125C2.78 6.25 2.5 5.97 2.5 5.625C2.5 5.28 2.78 5 3.125 5H21.875C22.22 5 22.5 5.28 22.5 5.625C22.5 5.97 22.22 6.25 21.875 6.25Z" fill="white"/>
                                    <path d="M16.875 15H3.125C2.78 15 2.5 14.72 2.5 14.375C2.5 14.03 2.78 13.75 3.125 13.75H16.875C17.22 13.75 17.5 14.03 17.5 14.375C17.5 14.72 17.22 15 16.875 15Z" fill="white"/>
                                    <path d="M21.875 23.75H3.125C2.78 23.75 2.5 23.47 2.5 23.125C2.5 22.78 2.78 22.5 3.125 22.5H21.875C22.22 22.5 22.5 22.78 22.5 23.125C22.5 23.47 22.22 23.75 21.875 23.75Z" fill="white"/>
                                </svg>
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </header>
        <div class="lines">
            <span class="line line-1"></span>
            <span class="line line-2"></span>
            <span class="line line-3"></span>
            <span class="line line-4"></span>
        </div>
        <?php
    }
endif;

/* ====================== LOGO FUNCTIONS ====================== */

if ( ! function_exists( 'zylo_header_logo' ) ) :
    function zylo_header_logo() {
        $logo_from_page        = get_post_meta( get_the_ID(), 'logo_from_page', true );
        $sticky_logo_from_page = get_post_meta( get_the_ID(), 'sticky_logo_from_page', true );

        $default_logo   = get_template_directory_uri() . '/img/logo/logo.png';
        $default_sticky = get_template_directory_uri() . '/img/logo/sticky-logo.png';

        if ( class_exists( 'Redux' ) ) {
            $opt_name       = 'zylo_options';
            $primary        = Redux::get_option( $opt_name, 'primary_logo', array( 'url' => $default_logo ) );
            $sticky         = Redux::get_option( $opt_name, 'sticky_logo', array( 'url' => $default_sticky ) );
            $site_logo      = ! empty( $primary['url'] ) ? $primary['url'] : $default_logo;
            $sticky_logo    = ! empty( $sticky['url'] ) ? $sticky['url'] : $default_sticky;
        } else {
            $site_logo   = $default_logo;
            $sticky_logo = $default_sticky;
        }

        if ( has_custom_logo() ) {
            the_custom_logo();
        } else {
            ?>
            <a class="standard-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img src="<?php echo esc_url( $logo_from_page ? $logo_from_page : $site_logo ); ?>" alt="<?php esc_attr_e( 'Logo', 'zylo' ); ?>">
            </a>
            <a class="sticky-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img src="<?php echo esc_url( $sticky_logo_from_page ? $sticky_logo_from_page : $sticky_logo ); ?>" alt="<?php esc_attr_e( 'Sticky Logo', 'zylo' ); ?>">
            </a>
            <?php
        }
    }
endif;

if ( ! function_exists( 'zylo_footer_logo' ) ) :
    function zylo_footer_logo() {
        $logo_from_page = get_post_meta( get_the_ID(), 'logo_from_page', true );
        $default_logo   = get_template_directory_uri() . '/img/logo/logo.png';

        if ( class_exists( 'Redux' ) ) {
            $opt_name    = 'zylo_options';
            $footer_logo = Redux::get_option( $opt_name, 'footer_logo', array( 'url' => $default_logo ) );
            $footer_url  = ! empty( $footer_logo['url'] ) ? $footer_logo['url'] : $default_logo;
        } else {
            $footer_url = $default_logo;
        }

        if ( has_custom_logo() ) {
            the_custom_logo();
        } else {
            ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img src="<?php echo esc_url( $logo_from_page ? $logo_from_page : $footer_url ); ?>" alt="<?php esc_attr_e( 'Logo', 'zylo' ); ?>">
            </a>
            <?php
        }
    }
endif;

/* ====================== MENU FUNCTIONS ====================== */

if ( ! function_exists( 'zylo_copyright_menu' ) ) :
    function zylo_copyright_menu() {
        wp_nav_menu( array(
            'theme_location' => 'copyright-menu',
            'menu_class'     => 'footer-bottom-menu',
            'container'      => '',
            'fallback_cb'    => 'Zylo_Navwalker::fallback',
            'walker'         => new Zylo_Navwalker(),
        ) );
    }
endif;

if ( ! function_exists( 'zylo_header_menu' ) ) :
    function zylo_header_menu() {
        ?>
        <nav id="mobile-menu" class="main-menu">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'main-menu',
                'menu_class'     => '',
                'container'      => '',
                'fallback_cb'    => 'Zylo_Navwalker::fallback',
                'walker'         => new Zylo_Navwalker(),
            ) );
            ?>
        </nav>
        <?php
    }
endif;

if ( ! function_exists( 'zylo_footer_menu' ) ) :
    function zylo_footer_menu() {
        if ( has_nav_menu( 'footer-menu' ) ) {
            wp_nav_menu( array(
                'theme_location' => 'footer-menu',
                'menu_class'     => 'footer-bottom-menu',
                'container'      => '',
                'fallback_cb'    => 'Zylo_Navwalker::fallback',
                'walker'         => new Zylo_Navwalker(),
            ) );
        }
    }
endif;

/* ====================== FOOTER SECTION ====================== */

if ( ! function_exists( 'zylo_check_footer' ) ) :
    add_action( 'zylo_footer_style', 'zylo_check_footer', 10 );

    function zylo_check_footer() {
        $default_footer = '1';
        if ( class_exists( 'Redux' ) ) {
            $opt_name       = 'zylo_options';
            $default_footer = Redux::get_option( $opt_name, 'choose_default_footer', '1' );
        }

        $footer_style = get_post_meta( get_the_ID(), 'zylo_choice_footer_style', true );

        if ( 'footer-style-2' === $footer_style ) {
            zylo_footer_style_2();
        } elseif ( 'footer-style-1' === $footer_style || '1' === $default_footer ) {
            zylo_footer_style_1();
        } else {
            zylo_footer_style_1();
        }
    }
endif;

if ( ! function_exists( 'zylo_footer_style_1' ) ) :
    function zylo_footer_style_1() {
        ?>
        <footer class="footer-area fix">
            <?php if ( is_active_sidebar( 'fws-1-er-1st-widget' ) || is_active_sidebar( 'fws-1-er-second-widget' ) || is_active_sidebar( 'fws-1-er-third-widget' ) || is_active_sidebar( 'fws-1-er-fourth-widget' ) ) : ?>
                <div class="footer-style-1">
                    <div class="container-fluid p-0">
                        <div class="row g-5 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.3s">
                            <div class="iteminfo__logo">
                                <?php zylo_footer_logo(); ?>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-sm-6">
                                <div class="iteminfo">
                                    <div class="iteminfo__content">
                                        <?php dynamic_sidebar( 'fws-1-er-1st-widget' ); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-sm-6 offset-lg-1">
                                <div class="quicklink ql-space">
                                    <?php dynamic_sidebar( 'fws-1-er-2nd-widget' ); ?>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-sm-6">
                                <div class="quicklink ql-space2">
                                    <?php dynamic_sidebar( 'fws-1-er-3rd-widget' ); ?>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-sm-6">
                                <div class="quicklink ql-space3">
                                    <div class="sss">
                                        <?php dynamic_sidebar( 'fws-1-er-4th-widget' ); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="footer-bottom wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.5s">
                            <?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="copy-right-text text-xl-start">
                                            <p><?php echo zylo_copyright_text(); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="socical-link text-xl-end">
                                            <?php zylo_copyright_menu(); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-xl-12">
                                        <div class="copy-right-text text-start">
                                            <p><?php echo zylo_copyright_text(); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="copy-footer bg__color">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-xl-12">
                                <div class="copy-right-text text-center">
                                    <p><?php echo zylo_copyright_text(); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </footer>
        <?php
    }
endif;

if ( ! function_exists( 'zylo_footer_style_2' ) ) :
    function zylo_footer_style_2() {
        ?>
        <footer class="footer-area fix">
            <?php if ( is_active_sidebar( 'fws-1-er-1st-widget' ) || is_active_sidebar( 'fws-1-er-second-widget' ) || is_active_sidebar( 'fws-1-er-third-widget' ) || is_active_sidebar( 'fws-1-er-fourth-widget' ) ) : ?>
                <div class="footer-style-1">
                    <div class="container-fluid p-0">
                        <div class="row g-5 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.3s">
                            <div class="iteminfo__logo">
                                <?php zylo_footer_logo(); ?>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="iteminfo">
                                    <div class="iteminfo__content">
                                        <?php dynamic_sidebar( 'fws-1-er-1st-widget' ); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-6 offset-lg-1">
                                <div class="quicklink ql-space">
                                    <?php dynamic_sidebar( 'fws-1-er-2nd-widget' ); ?>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-6">
                                <div class="quicklink ql-space2">
                                    <?php dynamic_sidebar( 'fws-1-er-3rd-widget' ); ?>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6">
                                <div class="quicklink ql-space3">
                                    <div class="sss">
                                        <?php dynamic_sidebar( 'fws-1-er-4th-widget' ); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer-bottom wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.5s">
                            <div class="row align-items-center justify-content-xl-between">
                                <div class="col-xl-5">
                                    <div class="socical-link">
                                        <?php zylo_copyright_menu(); ?>
                                    </div>
                                </div>
                                <div class="col-xl-6 offset-xl-1">
                                    <div class="copy-right-text text-xl-end">
                                        <p><?php echo zylo_copyright_text(); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </footer>
        <?php
    }
endif;

if ( ! function_exists( 'zylo_copyright_text' ) ) :
    function zylo_copyright_text() {
        $default = esc_html__( 'Copyright &copy;2025 Zylo. All Rights Reserved', 'zylo' );
        if ( class_exists( 'Redux' ) ) {
            $opt_name = 'zylo_options';
            $text     = Redux::get_option( $opt_name, 'zylo_copyright' );
            if ( $text ) {
                $default = $text;
            }
        }
        return wp_kses_post( $default );
    }
endif;

/* ====================== BREADCRUMB ====================== */

add_action('zylo_before_main_content', 'zylo_check_breadcrumb');
function zylo_check_breadcrumb() {
    $zylo_default_breadcrumb_style = '1';
    if ( class_exists( 'Redux' ) ) {
        $opt_name                           = 'zylo_options';
        $zylo_default_breadcrumb_style    = Redux::get_option($opt_name, 'choose_default_breadcrumb',);
    }
    $zylo_breadcrumb_style = get_post_meta( get_the_ID(), 'zylo_choice_breadcrumb_style', true );

    if( $zylo_breadcrumb_style == 'breadcrumb-style-1' ) {
        zylo_breadcrumb_style_1();
    }
    else {
        /** default breadcrumb style **/
        if($zylo_default_breadcrumb_style == '1'){
            zylo_breadcrumb_style_1();
        }
    }
}

/** 
 * [zylo_breadcrumb_style_1 description]
 * @return [type] [description]
 */
function zylo_breadcrumb_style_1() { 
    $zylo_invisible_breadcrumb = get_post_meta( get_the_ID(), 'zylo_invisible_breadcrumb', true );

    if( !$zylo_invisible_breadcrumb ) {

        $breadcrumb_img_from_page = get_post_meta(get_the_ID(), 'breadcrumb_bg_img_from_page', true);
        $hide_breadcrumb_bg_img = get_post_meta(get_the_ID(), 'hide_breadcrumb_bg_img', true); 
     
        // breadcrumb bg image
        if( empty($hide_breadcrumb_bg_img ) ){

            if( $breadcrumb_img_from_page ){
                    $bg_img = get_post_meta(get_the_ID(), 'breadcrumb_bg_img_from_page', true);
                    $bg_img = 'background-image :url('.$bg_img.')';
            }else{

                $service_breadcrumb_bg = get_theme_mod('breadcrumb_service_bg_img');
                $case_studies_breadcrumb_bg = get_theme_mod('case_studies_bg_img');
                $blog_details_breadcrumb_bg = get_theme_mod('bdcrumb_blog_details_bg_img');
                $breadcrumb_bg_img = '';

                if (class_exists('Redux')) {
                    $opt_name = 'zylo_options';
                    $breadcrumb_bg_img = Redux::get_option($opt_name, 'breadcrumb_bg_img');
                
                    if (isset($breadcrumb_bg_img['url']) && !empty($breadcrumb_bg_img['url'])) {
                        $bg_img = 'background-image: url(' . esc_url($breadcrumb_bg_img['url']) . ');';
                    }
                }                
            }    
        }else{
            $bg_img = "";
        }

        $breadcrumb_blog_title = esc_html__('Blog', 'zylo');
        $breadcrumb_blog_title_details = esc_html__('Blog Details', 'zylo');        
        if ( class_exists( 'Redux' ) ) {
            $opt_name                   = 'zylo_options';
            $breadcrumb_blog_title      = Redux::get_option($opt_name, 'breadcrumb_blog_title',);
            $breadcrumb_blog_title_details      = Redux::get_option($opt_name, 'breadcrumb_blog_title_details',);
        }

        $zylo_blog_breadcrumb = get_theme_mod('zylo_blog_breadcrumb', '');

        if ( is_front_page() && is_home() ) { ?>

            <div class="page-breadcrumb-area page-bg pt-215 pb-125 pt-xs-165 pb-xs-100 pt-sm-165 pb-sm-100">
                <div class="page-overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb-wrapper">
                                <div class="page-heading">
                                    <h3 class="page-title"><?php echo $breadcrumb_blog_title; ?></h3>
                                </div>
                                <div class="breadcrumb-list">
                                    <ul>
                                        <li><a href="<?php echo  esc_url( home_url() ); ?>"><?php echo esc_html__( 'Home', 'zylo' ); ?></a></li>
                                        <li class="active"><?php echo esc_html__( 'Blog', 'zylo' ); ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php   
        } elseif ( is_front_page()){?>
        <div class="breadcrumb-area breadcrumb-bg only-front-page breadcrumb-spacing">
        </div>
        <?php
        } elseif ( is_home()){ ?>

            <div class="page-breadcrumb-area page-bg pt-215 pb-125 pt-xs-165 pb-xs-100 pt-sm-165 pb-sm-100">
                <div class="page-overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb-wrapper">
                                <div class="page-heading">
                                    <?php 
                                    if ( is_single() && 'post' == get_post_type() ) { 
                                        if ( $zylo_blog_breadcrumb == '' ) { ?>
                                            <h3 class="page-title"><?php echo esc_html($breadcrumb_blog_title_details); ?></h3>
                                        <?php 
                                        }
                                        else { ?>
                                            <h3 class="page-title"> <?php echo esc_html($zylo_blog_breadcrumb);?></h3>
                                        <?php 
                                        } ?>
                                        
                                        <?php 
                                    }
                                    else { ?>
                                        <h3 class="page-title"><?php echo esc_html__( 'Blog', 'zylo' ); ?></h3>
                                    <?php 
                                    } ?>

                                </div>
                                <div class="breadcrumb-list">
                                    <ul>
                                        <li><a href="<?php echo  esc_url( home_url() ); ?>"><?php echo esc_html__( 'Home', 'zylo' ); ?></a></li>
                                        <li class="active"><?php echo esc_html__( 'Blog', 'zylo' ); ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        <?php
        }
        elseif ( is_single() && 'zylo-service' == get_post_type() ) { 
            
            if( $service_breadcrumb_bg !== "" ){
                $bg_img = get_theme_mod('breadcrumb_service_bg_img');
                $bg_img = 'background-image :url('.$bg_img.')';
            }else{
                $bg_img = '';
                if ( class_exists( 'Redux' ) ) {
                    $opt_name             = 'zylo_options';
                    $breadcrumb_bg_img    = Redux::get_option($opt_name, 'breadcrumb_bg_img',);
                    $bg_img               = $breadcrumb_bg_img['url'];
                }
                $bg_img               = 'background-image :url('.$bg_img.')';
            }
            ?>

            <div class="page-breadcrumb-area page-bg pt-215 pb-125 pt-xs-165 pb-xs-100 pt-sm-165 pb-sm-100">
                <div class="page-overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb-wrapper">
                                <div class="page-heading">
                                    <?php 
                                    if ( is_single() && 'post' == get_post_type() ) { 
                                        if ( $zylo_blog_breadcrumb == '' ) { ?>
                                            <h3 class="page-title"><?php echo esc_html($breadcrumb_blog_title_details); ?></h3>
                                        <?php 
                                        }
                                        else { ?>
                                            <h3 class="page-title"> <?php echo esc_html($zylo_blog_breadcrumb);?></h3>
                                        <?php 
                                        } ?>
                                        
                                        <?php 
                                    }
                                    else { ?>
                                        <h3 class="page-title"><?php echo esc_html( get_the_title() ); ?></h3>
                                    <?php 
                                    } ?>
                                </div>
                                <div class="breadcrumb-list">
                                    <ul>
                                        <?php zylo_breadcrumbs(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
        }
        elseif ( is_single() && 'zylo-portfolio' == get_post_type() ) { 
            
            if( $case_studies_breadcrumb_bg !== "" ){
                $bg_img = get_theme_mod('case_studies_bg_img');
                $bg_img = 'background-image :url('.$bg_img.')';
            }else{
                $bg_img = '';
                if ( class_exists( 'Redux' ) ) {
                    $opt_name             = 'zylo_options';
                    $breadcrumb_bg_img    = Redux::get_option($opt_name, 'breadcrumb_bg_img',);
                    $bg_img               = $breadcrumb_bg_img['url'];
                }
                $bg_img               = 'background-image :url('.$bg_img.')';
            }
            ?>    

            <div class="page-breadcrumb-area page-bg pt-215 pb-125 pt-xs-165 pb-xs-100 pt-sm-165 pb-sm-100">
                <div class="page-overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb-wrapper">
                                <div class="page-heading">
                                    <?php 
                                    if ( is_single() && 'post' == get_post_type() ) { 
                                        if ( $zylo_blog_breadcrumb == '' ) { ?>
                                            <h3 class="page-title"><?php echo esc_html($breadcrumb_blog_title_details); ?></h3>
                                        <?php 
                                        }
                                        else { ?>
                                            <h3 class="page-title"> <?php echo esc_html($zylo_blog_breadcrumb);?></h3>
                                        <?php 
                                        } ?>
                                        
                                        <?php 
                                    }
                                    else { ?>
                                        <h3 class="page-title"><?php echo esc_html( get_the_title() ); ?></h3>
                                    <?php 
                                    } ?>
                                </div>
                                <div class="breadcrumb-list">
                                    <ul>
                                        <?php zylo_breadcrumbs(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>






        <?php
        }
        elseif ( is_single() ) { 
            if( $blog_details_breadcrumb_bg !== "" ){
                $bg_img = get_theme_mod('bdcrumb_blog_details_bg_img');
                $bg_img = 'background-image :url('.$bg_img.')';
            }else{
                $bg_img = '';
                if ( class_exists( 'Redux' ) ) {
                    $opt_name             = 'zylo_options';
                    $breadcrumb_bg_img    = Redux::get_option($opt_name, 'breadcrumb_bg_img',);
                    $bg_img               = $breadcrumb_bg_img['url'];
                }
                $bg_img               = 'background-image :url('.$bg_img.')';
            }
            
            ?>

            <div class="page-breadcrumb-area page-bg pt-215 pb-125 pt-xs-165 pb-xs-100 pt-sm-165 pb-sm-100">
                <div class="page-overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb-wrapper">
                                <div class="page-heading">
                                    <?php 
                                    if ( is_single() && 'post' == get_post_type() ) { 
                                        if ( $zylo_blog_breadcrumb == '' ) { ?>
                                            <h2 class="page-title"><?php echo esc_html($breadcrumb_blog_title_details); ?></h2>
                                        <?php 
                                        }
                                        else { ?>
                                            <h2 class="page-title"> <?php echo esc_html($zylo_blog_breadcrumb);?></h2>
                                        <?php 
                                        } ?>
                                        
                                        <?php 
                                    }
                                    else { ?>
                                        <h2 class="page-title"><?php echo esc_html( get_the_title() ); ?></h2>
                                    <?php 
                                    } ?>
                                </div>
                                <div class="breadcrumb-list">
                                    <ul>
                                        <?php zylo_breadcrumbs(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        }
        else { ?>

            <div class="page-breadcrumb-area page-bg pt-215 pb-125 pt-xs-165 pb-xs-100 pt-sm-165 pb-sm-100">
                <div class="page-overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb-wrapper">
                                <div class="page-heading">
                                        <?php 
                                        if ( is_single() && 'post' == get_post_type() ) { 
                                            if ( $zylo_blog_breadcrumb == '' ) { ?>
                                                <h3 class="page-title"><?php echo esc_html($breadcrumb_blog_title_details); ?></h3>
                                            <?php 
                                            }
                                            else { ?>
                                                <h3 class="page-title"> <?php echo esc_html($zylo_blog_breadcrumb);?></h3>
                                            <?php 
                                            } ?>
                                            
                                            <?php 
                                        }
                                        else { ?>
                                            <h3 class="page-title"><?php echo zylo_page_title(); ?></h3>
                                        <?php 
                                        } ?>
                                </div>
                                <div class="breadcrumb-list">
                                    <ul>
                                        <?php zylo_breadcrumbs(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        <?php
        }       
    }
}

if(!function_exists('zylo_breadcrumbs')) {

    function _zylo_home_callback($home) {
        return $home;
    }

    function _zylo_breadcrumbs_callback($breadcrumbs) {
        return $breadcrumbs;
    }

    function zylo_breadcrumbs() {
        global $post;

        $breadcrumb_archive = esc_html__('Archive for category', 'zylo');
        $breadcrumb_search = esc_html__('Search results for', 'zylo');
        $breadcrumb_post_tags = esc_html__('Posts tagged', 'zylo');
        $breadcrumb_artitle_post_by = esc_html__('Articles posted by', 'zylo');
        $breadcrumb_404 = esc_html__('Page Not Found', 'zylo');
        $breadcrumb_page = esc_html__('Page', 'zylo');
        $breadcrumb_home = esc_html__('Home', 'zylo');        

        if ( class_exists( 'Redux' ) ) {
            $opt_name                       = 'zylo_options';
            $breadcrumb_archive    	        = Redux::get_option($opt_name, 'breadcrumb_archive',);
            $breadcrumb_search    	        = Redux::get_option($opt_name, 'breadcrumb_search',);
            $breadcrumb_post_tags    	    = Redux::get_option($opt_name, 'breadcrumb_post_tags',);
            $breadcrumb_artitle_post_by    	= Redux::get_option($opt_name, 'breadcrumb_artitle_post_by',);
            $breadcrumb_404    	            = Redux::get_option($opt_name, 'breadcrumb_404',);
            $breadcrumb_page    	        = Redux::get_option($opt_name, 'breadcrumb_page',);
            $breadcrumb_home    	        = Redux::get_option($opt_name, 'breadcrumb_home',);
        }

        $home = '<li class="breadcrumb-list"><a href="'.esc_url( home_url('/')).'" title="'.esc_attr($breadcrumb_home).'">'.esc_html($breadcrumb_home).'</a></li>';
        $showCurrent = 1;               
        $homeLink = esc_url( home_url('/'));
        if ( is_front_page() ) { return; }  // don't display breadcrumbs on the homepage (yet)

        echo _zylo_home_callback($home);

        if ( is_category() ) {
            // category section
            $thisCat = get_category(get_query_var('cat'), false);
            if (!empty($thisCat->parent)) echo get_category_parents($thisCat->parent, TRUE, ' ' . '/' . ' ');
            echo '<li class="active">'.  esc_html($breadcrumb_archive).' "' . single_cat_title('', false) . '"' . '</li>';
        } 
        elseif ( is_search() ) {
            // search section
            echo '<li class="active">' .  esc_html($breadcrumb_search).' "' . get_search_query() . '"' .'</li>';
        } 
        elseif ( is_day() ) {
            echo '<li class="breadcrumb-list"><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>';
            echo '<li class="breadcrumb-list"><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> </li>';
            echo '<li class="active">' . get_the_time('d') .'</li>';
        } 
        elseif ( is_month() ) {
            // monthly archive
            echo '<li class="breadcrumb-list"><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> </li>';
            echo '<li class=" active">' . get_the_time('F') .'</li>';
        } 
        elseif ( is_year() ) {
            // yearly archive
            echo '<li class="active">'. get_the_time('Y') .'</li>';
        } 
        elseif ( is_single() && !is_attachment() ) {
            // single post or page
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<li class="breadcrumb-list"><a href="' . $homeLink . '/?post_type=' . $slug['slug'] . '">' . $post_type->labels->singular_name . '</a></li>';
                if ($showCurrent) echo '<li class="active">'. get_the_title() .'</li>';
            } 
            else {
                $cat = get_the_category(); if (isset($cat[0])) {$cat = $cat[0];} else {$cat = false;}
                if ($cat) {$cats = get_category_parents($cat, TRUE, ' ' .' ' . ' ');} else {$cats=false;}
                if (!$showCurrent && $cats) $cats = preg_replace("#^(.+)\s\s$#", "$1", $cats);
                echo '<li class="breadcrumb-list">'.$cats.'</li>';
                if ($showCurrent) echo '<li class="active">'. get_the_title() .'</li>';
            }
        } 
        elseif ( is_attachment() ) {
            // attachment section
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); if (isset($cat[0])) {$cat = $cat[0];} else {$cat=false;}
            if ($cat) echo get_category_parents($cat, TRUE, ' ' . ' ' . ' ');
            echo '<li class="breadcrumb-list"><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li>';
            if ($showCurrent) echo  '<li class="active">'. get_the_title() .'</li>';
        } 
        elseif ( is_page() && !$post->post_parent ) {

            // parent page
            if ($showCurrent) 
                echo '<li class="breadcrumb-list"><a href="' . get_permalink() . '">'. get_the_title() .'</a></li>';
        } 
        elseif ( is_page() && $post->post_parent ) {
            // child page
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();

            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<li class="breadcrumb-list"><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo _zylo_breadcrumbs_callback($breadcrumbs[$i]);
                if ($i != count($breadcrumbs)-1);
            }
            if ($showCurrent) echo '<li class="active">'. get_the_title() .'</li>';
        } 
        elseif ( is_tag() ) {
            // tags archive
            echo '<li class="breadcrumb-list">' .  esc_html($breadcrumb_post_tags).' "' . single_tag_title('', false) . '"' . '</li>';
        } 
        elseif ( is_author() ) {
            // author archive 
            global $author;
            $userdata = get_userdata($author);
            echo '<li class="breadcrumb-list">' .  esc_html($breadcrumb_artitle_post_by). ' ' . $userdata->display_name . '</li>';
        } 
        elseif ( is_404() ) {
            // 404
            echo '<li class="active salim">'. esc_html($breadcrumb_404) .'</li>';
        }
      
        if ( get_query_var('paged') ) {
            
            if (  function_exists('is_shop')  ) {
                echo '<span class="active">'. esc_html($breadcrumb_page) . ' ' . get_query_var('paged') .'</span>';
            }
            else {
                if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '<li class="breadcrumb-list"> (';
                echo  '<li class="active">'.esc_html($breadcrumb_page) . ' ' . get_query_var('paged').'</li>';
                if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')</li>';
            }
            

        }
    }
}



/* ====================== PAGINATION ====================== */

if ( ! function_exists( 'zylo_pagination' ) ) :
    function zylo_pagination( $prev = '&laquo;', $next = '&raquo;', $pages = '' ) {
        global $wp_query, $wp_rewrite;

        $current = $wp_query->query_vars['paged'] > 1 ? $wp_query->query_vars['paged'] : 1;

        if ( empty( $pages ) ) {
            $pages = $wp_query->max_num_pages ?: 1;
        }

        $pagination = array(
            'base'      => add_query_arg( 'paged', '%#%' ),
            'format'    => '',
            'total'     => $pages,
            'current'   => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type'      => 'array',
        );

        if ( $wp_rewrite->using_permalinks() ) {
            $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%', 'paged' );
        }

        if ( ! empty( $wp_query->query_vars['s'] ) ) {
            $pagination['add_args'] = array( 's' => get_query_var( 's' ) );
        }

        $links = paginate_links( $pagination );

        if ( $links ) {
            echo '<ul class="pagination">';
            foreach ( $links as $link ) {
                echo '<li>' . $link . '</li>';
            }
            echo '</ul>';
        }
    }
endif;

/* ====================== EXTRA FUNCTIONS ====================== */

if ( ! function_exists( 'zylo_header_extra' ) ) :
    function zylo_header_extra() {
        return '';
    }
endif;

/* ====================== DYNAMIC CSS (Breadcrumb & Footer BG) ====================== */

if ( ! function_exists( 'zylo_breadcrumb_bg_color' ) ) :
    function zylo_breadcrumb_bg_color() {
        $bg_color = get_post_meta( get_the_ID(), 'breadcrumb_bg_color_img_from_page', true );
        if ( ! $bg_color && class_exists( 'Redux' ) ) {
            $opt_name = 'zylo_options';
            $bg_color = Redux::get_option( $opt_name, 'zylo_breadcrumb_bg_color', '' );
        }
        if ( $bg_color ) {
            wp_enqueue_style( 'zylo-breadcrumb-color', get_template_directory_uri() . '/css/color/zylo_inline.css', array(), '1.0' );
            $css = ".page-breadcrumb-area .page-overlay { background: " . esc_attr( $bg_color ) . "; }";
            wp_add_inline_style( 'zylo-breadcrumb-color', $css );
        }
    }
    add_action( 'wp_enqueue_scripts', 'zylo_breadcrumb_bg_color' );
endif;

if ( ! function_exists( 'zylo_breadcrumb_bg_img' ) ) :
    function zylo_breadcrumb_bg_img() {
        $bg_img = get_post_meta( get_the_ID(), 'breadcrumb_bg_img_from_page', true );
        if ( ! $bg_img && class_exists( 'Redux' ) ) {
            $opt_name = 'zylo_options';
            $img      = Redux::get_option( $opt_name, 'breadcrumb_bg_img', array( 'url' => '' ) );
            $bg_img   = $img['url'] ?? '';
        }
        if ( $bg_img ) {
            wp_enqueue_style( 'zylo-breadcrumb-img', get_template_directory_uri() . '/css/color/zylo_inline.css', array(), '1.0' );
            $css = ".page-breadcrumb-area.page-bg { background-image: url(" . esc_url( $bg_img ) . "); }";
            wp_add_inline_style( 'zylo-breadcrumb-img', $css );
        }
    }
    add_action( 'wp_enqueue_scripts', 'zylo_breadcrumb_bg_img' );
endif;

if ( ! function_exists( 'zylo_footer_bg' ) ) :
    function zylo_footer_bg() {
        $bg_img = get_post_meta( get_the_ID(), 'zylo_footer_bg', true );
        if ( ! $bg_img && class_exists( 'Redux' ) ) {
            $opt_name = 'zylo_options';
            $img      = Redux::get_option( $opt_name, 'zylo_footer_bg', array( 'url' => '' ) );
            $bg_img   = $img['url'] ?? '';
        }
        if ( $bg_img ) {
            wp_enqueue_style( 'zylo-footer-bg', get_template_directory_uri() . '/css/color/zylo_inline.css', array(), '1.0' );
            $css = ".footer-area { background-image: url(" . esc_url( $bg_img ) . "); }";
            wp_add_inline_style( 'zylo-footer-bg', $css );
        }
    }
    add_action( 'wp_enqueue_scripts', 'zylo_footer_bg' );
endif;

if ( ! function_exists( 'zylo_preloader' ) ) :
    function zylo_preloader() {
        
    }
endif;