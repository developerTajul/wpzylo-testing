<?php

/** 
 * The main template file
 *
 * @package  WordPress
 * @subpackage  zylo
 */
get_header(); ?>




<section class="service-details-area">
    <?php 
    if( have_posts() ):
        while( have_posts() ): the_post();

            $project_thumb = get_post_meta(get_the_ID(),'portfolio_thumbnail_img',true);
            $portfolio_list_repeat_group = get_post_meta(get_the_ID(), 'portfolio_list_repeat_group', true); 
            $portfolio_left_img = get_post_meta(get_the_ID(), 'portfolio_left_thumb', true); 
            $portfolio_right_img = get_post_meta(get_the_ID(), 'portfolio_right_thumb', true); 
            $tiny_content = get_post_meta(get_the_ID(), 'portfolio_tiny_content', true); 



            ?>

            <!-- Service Details Area Start -->

    <div class="service-details section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="service-widget">
                        <div class="thumb-big wow img-custom-anim-top" data-wow-duration="1.5s" data-wow-delay="0.3s">
                            <img src="<?php echo $project_thumb; ?>" alt="img">
                        </div>
                        <h2 class="section-title wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.3s"><?php the_title(); ?></h2>
                        <p class="wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s"><?php the_content(); ?></p>
                        <div class="row">
                            <div class="col-md-6">
                                <?php 
                                if(is_array($portfolio_list_repeat_group)): ?> 
                                    <div class="planning-list wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.6s">
                                        <ul>
                                        <?php   
                                        foreach ($portfolio_list_repeat_group as $item) { ?>
                                            <li>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                                        <path d="M9.23033 18.2247C9.17727 18.2247 9.1248 18.2137 9.07619 18.1924C9.02759 18.1712 8.98391 18.1401 8.9479 18.1011L1.33302 9.86399C1.28226 9.80907 1.2486 9.74055 1.23618 9.6668C1.22376 9.59306 1.2331 9.51729 1.26307 9.44878C1.29304 9.38026 1.34233 9.32197 1.40491 9.28103C1.4675 9.2401 1.54066 9.2183 1.61544 9.21829H5.28083C5.33586 9.2183 5.39025 9.23011 5.44033 9.25293C5.49041 9.27575 5.53502 9.30904 5.57113 9.35056L8.11606 12.2784C8.3911 11.6905 8.92352 10.7116 9.85783 9.51872C11.2391 7.75526 13.8082 5.16176 18.2038 2.82052C18.2887 2.77528 18.3875 2.76354 18.4807 2.78762C18.5739 2.81169 18.6547 2.86984 18.7071 2.95057C18.7595 3.0313 18.7798 3.12875 18.7638 3.22368C18.7479 3.3186 18.697 3.4041 18.6211 3.46329C18.6043 3.47641 16.9095 4.81102 14.9591 7.2556C13.164 9.50522 10.7778 13.1837 9.60356 17.9325C9.58293 18.016 9.53496 18.0901 9.46729 18.1431C9.39962 18.196 9.31615 18.2248 9.23021 18.2248L9.23033 18.2247Z" fill="#C2A74E"/>
                                                    </svg>
                                                </span>
                                                <?php echo esc_html( $item['portfolio_list_item'] ); ?>
                                            </li>
                                        <?php  
                                        } 
                                        ?> 
                                        </ul>
                                    </div>
                                <?php 
                                endif; ?>

                            </div>
                            <div class="col-md-6">
                                <?php 
                                if(is_array($portfolio_list_repeat_group)): ?> 
                                    <!-- my -->
                                    <div class="planning-list wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.6s">
                                        <ul>
                                        <?php   
                                        foreach ($portfolio_list_repeat_group as $item) { ?>
                                            <li>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                                        <path d="M9.23033 18.2247C9.17727 18.2247 9.1248 18.2137 9.07619 18.1924C9.02759 18.1712 8.98391 18.1401 8.9479 18.1011L1.33302 9.86399C1.28226 9.80907 1.2486 9.74055 1.23618 9.6668C1.22376 9.59306 1.2331 9.51729 1.26307 9.44878C1.29304 9.38026 1.34233 9.32197 1.40491 9.28103C1.4675 9.2401 1.54066 9.2183 1.61544 9.21829H5.28083C5.33586 9.2183 5.39025 9.23011 5.44033 9.25293C5.49041 9.27575 5.53502 9.30904 5.57113 9.35056L8.11606 12.2784C8.3911 11.6905 8.92352 10.7116 9.85783 9.51872C11.2391 7.75526 13.8082 5.16176 18.2038 2.82052C18.2887 2.77528 18.3875 2.76354 18.4807 2.78762C18.5739 2.81169 18.6547 2.86984 18.7071 2.95057C18.7595 3.0313 18.7798 3.12875 18.7638 3.22368C18.7479 3.3186 18.697 3.4041 18.6211 3.46329C18.6043 3.47641 16.9095 4.81102 14.9591 7.2556C13.164 9.50522 10.7778 13.1837 9.60356 17.9325C9.58293 18.016 9.53496 18.0901 9.46729 18.1431C9.39962 18.196 9.31615 18.2248 9.23021 18.2248L9.23033 18.2247Z" fill="#C2A74E"/>
                                                    </svg>
                                                </span>
                                                <?php echo esc_html( $item['portfolio_list_item_right'] ); ?>
                                            </li>
                                        <?php  
                                        } 
                                        ?> 
                                        </ul>
                                    </div>
                                <?php 
                                endif; ?>

                            </div>
                        </div>
                        <div class="row gy-2">
                            <div class="col-sm-6">
                                <div class="details-thumb wow img-custom-anim-top" data-wow-duration="1.5s" data-wow-delay="0.3s">
                                    <img src="<?php echo $portfolio_left_img; ?>" alt="img">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="details-thumb wow img-custom-anim-top" data-wow-duration="1.5s" data-wow-delay="0.3s">
                                    <img src="<?php echo $portfolio_right_img; ?>" alt="img">
                                </div>
                            </div>
                        </div>
                        <?php echo $tiny_content; ?>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="sidebar">
                        <div class="sidebar__tag">
                            <?php
                            if(is_active_sidebar('zylo-project-widget')){
                                dynamic_sidebar( 'zylo-project-widget');
                            }
                            ?>
                        </div>
                        <div class="sidebar__wrap">
                            <div class="sidebar__info">
                                <?php
                                if(is_active_sidebar('zylo-project-widget')){
                                    dynamic_sidebar( 'zylo-service-widget-2');
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="banner-area">
        <div class="banner-inner">
        <?php
            if(is_active_sidebar('footer-top-widget')){
                dynamic_sidebar( 'footer-top-widget');
            }
        ?>
        </div>
    </div>



        <?php 
        endwhile; wp_reset_query();
    endif; 
    ?>
</section>

   

<?php get_footer();  ?>