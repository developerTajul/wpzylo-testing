<?php 
/** 
 * The main template file
 *
 * @package  WordPress
 * @subpackage  zylo
 */
get_header(); ?>

        <?php 
            if( have_posts() ):
            while( have_posts() ):the_post();
                    $title = get_post_meta(get_the_ID(), 'member_title', true);
                    $member_single_img_url = get_post_meta( get_the_ID(), 'member_single_img', true );

                    $left_skills_repeat_group = get_post_meta(get_the_ID(), 'left_skills_repeat_group', true); 
                    $right_skills_repeat_group = get_post_meta(get_the_ID(), 'right_skills_repeat_group', true); 
                    ?>

                    <!-- My -->
                    <section class="team-details-area fix">
                        <div class="team-details">
                            <div class="container-fluid p-0">
                                <div class="row">
                                    <div class="col-xl-6 order-xl-1 order-2">
                                        <div class="content">
                                            <h2 class="name-title wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.5s"><?php the_title(); ?></h2>
                                            <p class="wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.7s"><?php the_content(); ?></p>
                                        </div>

                                        <?php 
                                        if(is_array($right_skills_repeat_group)): ?> 

                                        <?php   
                                        foreach ($right_skills_repeat_group as $value) { ?>
                                        <div class="site-info-wrap">
                                            <div class="row">
                                                <div class="col-sm-6 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.3s">
                                                    <div class="site-info">
                                                        <h2 class="title"><?php echo $value['right_skill_label_1']; ?></h2>
                                                        <a href="<?php echo $value['right_skill_link_1']; ?>"><?php echo $value['right_skill_content_1']; ?></a>
                                                        <a href="<?php echo $value['right_skill_link_2']; ?>"><?php echo $value['right_skill_content_2']; ?></a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.3s">
                                                    <div class="site-info space-left">
                                                        <h2 class="title"><?php echo $value['right_skill_label_2']; ?></h2>
                                                        <a href="<?php echo $value['right_skill_link_3']; ?>"><?php echo $value['right_skill_content_3']; ?></a>
                                                        <a href="<?php echo $value['right_skill_link_4']; ?>"><?php echo $value['right_skill_content_4']; ?></a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.5s">
                                                    <div class="site-info br-b-none">
                                                        <h2 class="title"><?php echo $value['right_skill_label_3']; ?></h2>
                                                        <a href="<?php echo $value['right_skill_link_5']; ?>"><?php echo $value['right_skill_content_5']; ?></a>
                                                        <a href="<?php echo $value['right_skill_link_6']; ?>"><?php echo $value['right_skill_content_6']; ?></a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.5s">
                                                    <div class="site-info br-b-none space-left">
                                                        <h2 class="title"><?php echo $value['right_skill_label_4']; ?></h2>
                                                        <div class="social-link d-flex">
                                                            <div class="social">
                                                                <a href="<?php echo $value['right_skill_link_7']; ?>"><?php echo $value['right_skill_content_7']; ?></a>
                                                                <a href="<?php echo $value['right_skill_link_8']; ?>"><?php echo $value['right_skill_content_8']; ?></a>
                                                            </div>
                                                            <div class="social">
                                                                <a href="<?php echo $value['right_skill_link_9']; ?>"><?php echo $value['right_skill_content_9']; ?></a>
                                                                <a href="<?php echo $value['right_skill_link_10']; ?>"><?php echo $value['right_skill_content_10']; ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="contact-btn wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.3s">
                                            <a href="<?php echo $value['right_skill_button_url']; ?>">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                                        <g clip-path="url(#clip0_4610_1266)">
                                                        <path d="M6.37519 15.0003C6.34294 15.0003 6.30994 14.9958 6.27769 14.9875C6.11419 14.9433 6.00019 14.7948 6.00019 14.6253V9.00029H0.375188C0.205688 9.00029 0.0571883 8.88629 0.0129383 8.72279C-0.0313117 8.55929 0.0406883 8.38604 0.186938 8.30129L14.4369 0.0512929C14.5839 -0.0334571 14.7699 -0.00945712 14.8899 0.110543C15.0099 0.230543 15.0347 0.416543 14.9492 0.563543L6.69919 14.8135C6.63094 14.9313 6.50569 15.0003 6.37444 15.0003H6.37519ZM1.77169 8.25029H6.37519C6.58219 8.25029 6.75019 8.41829 6.75019 8.62529V13.2288L13.5962 1.40429L1.77169 8.25029Z" fill="white"/>
                                                        </g>
                                                        <defs>
                                                        <clipPath id="clip0_4610_1266">
                                                            <rect width="15" height="15" fill="white"/>
                                                        </clipPath>
                                                        </defs>
                                                    </svg>
                                                </span>
                                                <?php echo $value['right_skill_button_text']; ?>
                                            </a>
                                        </div>
                                        <?php  
                                            } 
                                            ?> 

                                        <?php 
                                        endif; ?>
                                    </div>
                                    <div class="col-xl-6 order-xl-2 order-1">
                                        <div class="thumb">
                                            <img class="wow img-custom-anim-right" data-wow-duration="1.5s" data-wow-delay="0.3s" src="<?php the_post_thumbnail_url(); ?>" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- My -->
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


<?php get_footer();  ?>