<?php

/** 
 * The main template file
 *
 * @package  WordPress
 * @subpackage  Augmit
 */
get_header(); ?>

<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        $service_icon_img = get_post_meta(get_the_ID(), 'service_icon_image', true);
        $tiny_content = get_post_meta(get_the_ID(), 'service_tiny_text', true);
        $service_single_left_thumb_img = get_post_meta(get_the_ID(), 'service_single_left_thumb_img', true);
        $service_single_right_thumb_img = get_post_meta(get_the_ID(), 'service_single_right_thumb_img', true);
        $service_list_repeat_group = get_post_meta(get_the_ID(), 'service_list_repeat_group', true); 
        ?>
<!-- Service Details Area Start -->
  <section class="service-details-area">
    <div class="service-details section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="service-widget">
                        <div class="thumb-big wow img-custom-anim-top" data-wow-duration="1.5s" data-wow-delay="0.3s">
                            <img src="<?php echo the_post_thumbnail_url(); ?>" alt="img">
                        </div>
                        <h2 class="section-title wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.3s"><?php the_title(); ?></h2>
                        <p class="wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s"><?php the_content(); ?></p>
                        <div class="row">
                            <div class="col-md-6">
                                <?php 
                                if(is_array($service_list_repeat_group)): ?> 
                                    <div class="planning-list wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.6s">
                                        <ul>
                                        <?php   
                                        foreach ($service_list_repeat_group as $item) { ?>
                                            <li>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                                        <path d="M9.23033 18.2247C9.17727 18.2247 9.1248 18.2137 9.07619 18.1924C9.02759 18.1712 8.98391 18.1401 8.9479 18.1011L1.33302 9.86399C1.28226 9.80907 1.2486 9.74055 1.23618 9.6668C1.22376 9.59306 1.2331 9.51729 1.26307 9.44878C1.29304 9.38026 1.34233 9.32197 1.40491 9.28103C1.4675 9.2401 1.54066 9.2183 1.61544 9.21829H5.28083C5.33586 9.2183 5.39025 9.23011 5.44033 9.25293C5.49041 9.27575 5.53502 9.30904 5.57113 9.35056L8.11606 12.2784C8.3911 11.6905 8.92352 10.7116 9.85783 9.51872C11.2391 7.75526 13.8082 5.16176 18.2038 2.82052C18.2887 2.77528 18.3875 2.76354 18.4807 2.78762C18.5739 2.81169 18.6547 2.86984 18.7071 2.95057C18.7595 3.0313 18.7798 3.12875 18.7638 3.22368C18.7479 3.3186 18.697 3.4041 18.6211 3.46329C18.6043 3.47641 16.9095 4.81102 14.9591 7.2556C13.164 9.50522 10.7778 13.1837 9.60356 17.9325C9.58293 18.016 9.53496 18.0901 9.46729 18.1431C9.39962 18.196 9.31615 18.2248 9.23021 18.2248L9.23033 18.2247Z" fill="#C2A74E"/>
                                                    </svg>
                                                </span>
                                                <?php echo esc_html( $item['service_list_item'] ); ?>
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
                                if(is_array($service_list_repeat_group)): ?> 
                                    <!-- my -->
                                    <div class="planning-list wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.6s">
                                        <ul>
                                        <?php   
                                        foreach ($service_list_repeat_group as $item) { ?>
                                            <li>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                                        <path d="M9.23033 18.2247C9.17727 18.2247 9.1248 18.2137 9.07619 18.1924C9.02759 18.1712 8.98391 18.1401 8.9479 18.1011L1.33302 9.86399C1.28226 9.80907 1.2486 9.74055 1.23618 9.6668C1.22376 9.59306 1.2331 9.51729 1.26307 9.44878C1.29304 9.38026 1.34233 9.32197 1.40491 9.28103C1.4675 9.2401 1.54066 9.2183 1.61544 9.21829H5.28083C5.33586 9.2183 5.39025 9.23011 5.44033 9.25293C5.49041 9.27575 5.53502 9.30904 5.57113 9.35056L8.11606 12.2784C8.3911 11.6905 8.92352 10.7116 9.85783 9.51872C11.2391 7.75526 13.8082 5.16176 18.2038 2.82052C18.2887 2.77528 18.3875 2.76354 18.4807 2.78762C18.5739 2.81169 18.6547 2.86984 18.7071 2.95057C18.7595 3.0313 18.7798 3.12875 18.7638 3.22368C18.7479 3.3186 18.697 3.4041 18.6211 3.46329C18.6043 3.47641 16.9095 4.81102 14.9591 7.2556C13.164 9.50522 10.7778 13.1837 9.60356 17.9325C9.58293 18.016 9.53496 18.0901 9.46729 18.1431C9.39962 18.196 9.31615 18.2248 9.23021 18.2248L9.23033 18.2247Z" fill="#C2A74E"/>
                                                    </svg>
                                                </span>
                                                <?php echo esc_html( $item['service_list_item_right'] ); ?>
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
                                    <img src="<?php echo $service_single_left_thumb_img; ?>" alt="img">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="details-thumb wow img-custom-anim-top" data-wow-duration="1.5s" data-wow-delay="0.3s">
                                    <img src="<?php echo $service_single_right_thumb_img; ?>" alt="img">
                                </div>
                            </div>
                        </div>
                        <?php echo $tiny_content; ?>
                        <div class="details-item wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.5s">
                            <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="service active-hover">
                                        <div class="service__itembox">
                                            <div class="service__itembox-content">
                                                <h3 class="section-title-md"> <a href="<?php the_permalink(); ?>"> Training and <br>
                                                Development</a></h3>
                                                <p>We take time and effort to accurately review everything about your business and your <br> industry.</p>
                                            </div>
                                            <span class="service__itembox-shape">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="450" height="320" viewBox="0 0 450 320" fill="none">
                                                    <mask id="path-1-inside-1_4433_8010" fill="white">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M321 30C321 13.4315 307.569 0 291 0H30C13.4315 0 0 13.4315 0 30V290C0 306.569 13.4315 320 30 320H420C436.569 320 450 306.569 450 290V159C450 142.431 436.569 129 420 129H351C334.431 129 321 115.569 321 99V30Z"/>
                                                    </mask>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M321 30C321 13.4315 307.569 0 291 0H30C13.4315 0 0 13.4315 0 30V290C0 306.569 13.4315 320 30 320H420C436.569 320 450 306.569 450 290V159C450 142.431 436.569 129 420 129H351C334.431 129 321 115.569 321 99V30Z" fill="white"/>
                                                    <path d="M30 1H291V-1H30V1ZM1 290V30H-1V290H1ZM420 319H30V321H420V319ZM449 159V290H451V159H449ZM420 128H351V130H420V128ZM322 99V30H320V99H322ZM351 128C334.984 128 322 115.016 322 99H320C320 116.121 333.879 130 351 130V128ZM451 159C451 141.879 437.121 128 420 128V130C436.016 130 449 142.984 449 159H451ZM420 321C437.121 321 451 307.121 451 290H449C449 306.016 436.016 319 420 319V321ZM-1 290C-1 307.121 12.8792 321 30 321V319C13.9837 319 1 306.016 1 290H-1ZM291 1C307.016 1 320 13.9837 320 30H322C322 12.8792 308.121 -1 291 -1V1ZM30 -1C12.8792 -1 -1 12.8792 -1 30H1C1 13.9837 13.9837 1 30 1V-1Z" fill="#C7C9CA" mask="url(#path-1-inside-1_4433_8010)"/>
                                                </svg>
                                            </span>
    
                                            <div class="service__itembox-icon">
                                                <a href="<?php the_permalink(); ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="82" height="75" viewBox="0 0 82 75" fill="none">
                                                        <g clip-path="url(#clip0_4443_259)">
                                                            <g opacity="0.5">
                                                            <path d="M79.6605 52.7927H1.42905C1.03381 52.7927 0.712402 52.4713 0.712402 52.076C0.712402 51.6808 1.03381 51.3594 1.42905 51.3594H79.6605C80.0557 51.3594 80.3771 51.6808 80.3771 52.076C80.3771 52.4713 80.0557 52.7927 79.6605 52.7927Z" fill="#707070"/>
                                                            </g>
                                                            <path d="M40.5447 75C18.1897 75 0 64.7151 0 52.0761V1.42894C0 0.638464 0.638464 0 1.42894 0C2.21942 0 2.85789 0.638464 2.85789 1.42894V52.0761C2.85789 63.1341 19.762 72.1334 40.5403 72.1334C61.3186 72.1334 78.2227 63.1341 78.2227 52.0761V1.42894C78.2227 0.638464 78.8612 0 79.6517 0C80.4422 0 81.0806 0.638464 81.0806 1.42894V52.0761C81.0893 64.7151 62.9039 75 40.5447 75Z" fill="#707070"/>
                                                            <path d="M40.5447 24.3528C18.1897 24.3528 0 14.0679 0 1.42894C0 0.638464 0.638464 0 1.42894 0H79.6604C80.4508 0 81.0893 0.638464 81.0893 1.42894C81.0893 14.0679 62.9039 24.3528 40.5447 24.3528ZM2.95778 2.86223C4.33895 13.2601 20.6697 21.4906 40.549 21.4906C60.4239 21.4906 76.759 13.2601 78.1402 2.86223H2.95778Z" fill="#707070"/>
                                                            <path d="M40.5447 75.0001C39.7542 75.0001 39.1157 74.3616 39.1157 73.5712V22.9197C39.1157 22.1292 39.7542 21.4907 40.5447 21.4907C41.3351 21.4907 41.9736 22.1292 41.9736 22.9197V73.5668C41.978 74.3573 41.3351 75.0001 40.5447 75.0001Z" fill="#707070"/>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_4443_259">
                                                            <rect width="81.0893" height="75" fill="white"/>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="service active-hover">
                                        <div class="service__itembox">
                                            <div class="service__itembox-content">
                                                <h3 class="section-title-md"> <a href="<?php the_permalink(); ?>"> Facilities <br> Management</a></h3>
                                                <p>We take time and effort to accurately review everything about your business and your <br> industry.</p>
                                            </div>
                                            <span class="service__itembox-shape">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="450" height="320" viewBox="0 0 450 320" fill="none">
                                                    <mask id="path-1-inside-1_4433_8010" fill="white">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M321 30C321 13.4315 307.569 0 291 0H30C13.4315 0 0 13.4315 0 30V290C0 306.569 13.4315 320 30 320H420C436.569 320 450 306.569 450 290V159C450 142.431 436.569 129 420 129H351C334.431 129 321 115.569 321 99V30Z"/>
                                                    </mask>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M321 30C321 13.4315 307.569 0 291 0H30C13.4315 0 0 13.4315 0 30V290C0 306.569 13.4315 320 30 320H420C436.569 320 450 306.569 450 290V159C450 142.431 436.569 129 420 129H351C334.431 129 321 115.569 321 99V30Z" fill="white"/>
                                                    <path d="M30 1H291V-1H30V1ZM1 290V30H-1V290H1ZM420 319H30V321H420V319ZM449 159V290H451V159H449ZM420 128H351V130H420V128ZM322 99V30H320V99H322ZM351 128C334.984 128 322 115.016 322 99H320C320 116.121 333.879 130 351 130V128ZM451 159C451 141.879 437.121 128 420 128V130C436.016 130 449 142.984 449 159H451ZM420 321C437.121 321 451 307.121 451 290H449C449 306.016 436.016 319 420 319V321ZM-1 290C-1 307.121 12.8792 321 30 321V319C13.9837 319 1 306.016 1 290H-1ZM291 1C307.016 1 320 13.9837 320 30H322C322 12.8792 308.121 -1 291 -1V1ZM30 -1C12.8792 -1 -1 12.8792 -1 30H1C1 13.9837 13.9837 1 30 1V-1Z" fill="#C7C9CA" mask="url(#path-1-inside-1_4433_8010)"/>
                                                </svg>
                                            </span>
    
                                            <div class="service__itembox-icon">
                                                <a href="<?php the_permalink(); ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="82" height="75" viewBox="0 0 82 75" fill="none">
                                                        <g clip-path="url(#clip0_4443_259)">
                                                            <g opacity="0.5">
                                                            <path d="M79.6605 52.7927H1.42905C1.03381 52.7927 0.712402 52.4713 0.712402 52.076C0.712402 51.6808 1.03381 51.3594 1.42905 51.3594H79.6605C80.0557 51.3594 80.3771 51.6808 80.3771 52.076C80.3771 52.4713 80.0557 52.7927 79.6605 52.7927Z" fill="#707070"/>
                                                            </g>
                                                            <path d="M40.5447 75C18.1897 75 0 64.7151 0 52.0761V1.42894C0 0.638464 0.638464 0 1.42894 0C2.21942 0 2.85789 0.638464 2.85789 1.42894V52.0761C2.85789 63.1341 19.762 72.1334 40.5403 72.1334C61.3186 72.1334 78.2227 63.1341 78.2227 52.0761V1.42894C78.2227 0.638464 78.8612 0 79.6517 0C80.4422 0 81.0806 0.638464 81.0806 1.42894V52.0761C81.0893 64.7151 62.9039 75 40.5447 75Z" fill="#707070"/>
                                                            <path d="M40.5447 24.3528C18.1897 24.3528 0 14.0679 0 1.42894C0 0.638464 0.638464 0 1.42894 0H79.6604C80.4508 0 81.0893 0.638464 81.0893 1.42894C81.0893 14.0679 62.9039 24.3528 40.5447 24.3528ZM2.95778 2.86223C4.33895 13.2601 20.6697 21.4906 40.549 21.4906C60.4239 21.4906 76.759 13.2601 78.1402 2.86223H2.95778Z" fill="#707070"/>
                                                            <path d="M40.5447 75.0001C39.7542 75.0001 39.1157 74.3616 39.1157 73.5712V22.9197C39.1157 22.1292 39.7542 21.4907 40.5447 21.4907C41.3351 21.4907 41.9736 22.1292 41.9736 22.9197V73.5668C41.978 74.3573 41.3351 75.0001 40.5447 75.0001Z" fill="#707070"/>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_4443_259">
                                                            <rect width="81.0893" height="75" fill="white"/>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="sidebar">
                        <div class="sidebar__tag">
                            <?php
                            if(is_active_sidebar('zylo-service-widget')){
                                dynamic_sidebar( 'zylo-service-widget');
                            }
                            ?>
                        </div>
                        <div class="sidebar__wrap">
                            <div class="sidebar__info">
                                <?php
                                if(is_active_sidebar('zylo-service-widget-2')){
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
</section>
<div class="banner-area">
    <div class="banner-inner">
    <?php
        if(is_active_sidebar('footer-top-widget')){
            dynamic_sidebar( 'footer-top-widget');
        }
    ?>
    </div>
</div>
 <!-- My -->


    <?php
    endwhile;
    wp_reset_query();
endif; ?>

<?php 
get_footer();  ?>