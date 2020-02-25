<?php
/*
Template Name: Our Story
*/
?>

<?php get_header(); ?>

<!--==========================
    banner Section
  ============================-->

<section class="banner-section our-story-section">
    <div class="banner-box">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Our-story-Banner.jpg" alt="" class="img-mob">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-8 col-md-6 offset-md-6 col-12 prod-detail-content">
                    <div class="display-table">
                        <div class="table-cell">
                            <h2><?php the_field('heading'); ?></h2>
                            <p><?php the_field('content'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</section><!-- #banner end -->

<!--==========================
    Get Started Section
  ============================-->

<!--==========================
 Promise Section
 ============================-->
<section class="promise-section">
    <div class="container">
        <h2 class="text-center">Our Promise</h2>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <div class="promise-box">
                    <div class="promise-imgbox">
                        <img src="<?php the_field('p1_image'); ?>" alt="">
                    </div>
                    <div class="promise-contbox">
                        <h3><?php the_field('p1_title'); ?></h3>
                        <p><?php the_field('p1_content'); ?></p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="promise-box">
                    <div class="promise-imgbox">
                        <img src="<?php the_field('p2_image'); ?>" alt="">
                    </div>
                    <div class="promise-contbox">
                        <h3><?php the_field('p2_title'); ?></h3>
                        <p><?php the_field('p2_content'); ?></p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="promise-box">
                    <div class="promise-imgbox">
                        <img src="<?php the_field('p3_image'); ?>" alt="">
                    </div>
                    <div class="promise-contbox">
                        <h3><?php the_field('p3_title'); ?></h3>
                        <p><?php the_field('p3_content'); ?></p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="promise-box">
                    <div class="promise-imgbox">
                        <img src="<?php the_field('p4_image'); ?>" alt="">
                    </div>
                    <div class="promise-contbox">
                        <h3><?php the_field('p4_title'); ?></h3>
                        <p><?php the_field('p4_content'); ?></p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</section><!-- #promise end -->

<!--==========================
  Boosting Section
  ============================-->
<section class="boosting-section cleanse-section">
    <div class="cleanse-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 boosting-imgbox"><img src="<?php the_field('s1_image'); ?>"
                        alt="Image"><span></span></div>
                <div class="col-lg-6 col-md-12 boosting-contbox our-story-content">
                    <div class="display-table">
                        <div class="table-cell">
                            <h3><?php the_field('s1_heading'); ?></h3>
                            <p><?php the_field('s1_text'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- #boosting end -->

<!--==========================
  Sickness Section
  ============================-->
<section class="sickness-section cleanse-section">
    <div class="cleanse-box">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-6 col-md-12 sickness-imgbox"><img src="<?php the_field('s2_image'); ?>"
                        alt="Image"><span></span></div>
                <div class="col-lg-6 col-md-12 sickness-contbox our-story-content">
                    <div class="display-table">
                        <div class="table-cell">
                            <h3><?php the_field('s2_heading'); ?></h3>
                            <p><?php the_field('s2_text'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- #Sickness end -->

<!--==========================
  Brand Partner Section
  ============================-->
<!--<section class="brand-partner-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="brand-listing">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            &nbsp;
                        </div>
                        <div class="col-lg-8 col-md-8 col-12 brand-contbox">
                            <h2>Brand Partners</h2>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="brand-listing">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="brand-imgbox"><img src="<?php the_field('p1_logo'); ?>" alt="Images"></div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12 brand-contbox">
                            <h3><?php the_field('p1_heading'); ?></h3>
                            <p><?php the_field('p1_text'); ?>
                                <br class='clearfix'>
                                <a href="<?php the_field('p1_url'); ?>">Visit website</a>
                            </p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="brand-listing">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="brand-imgbox"><img src="<?php the_field('p2_logo'); ?>" alt="Images"></div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12 brand-contbox">
                            <h3><?php the_field('p2_heading'); ?></h3>
                            <p><?php the_field('p2_text'); ?>
                                <br class='clearfix'>
                                <a href="<?php the_field('p2_url'); ?>">Visit website</a>
                            </p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="brand-listing">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="brand-imgbox"><img src="<?php the_field('p3_logo'); ?>" alt="Images"></div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12 brand-contbox">
                            <h3><?php the_field('p3_heading'); ?></h3>
                            <p><?php the_field('p3_text'); ?>
                                <br class='clearfix'>
                                <a href="<?php the_field('p3_url'); ?>">Visit website</a>
                            </p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="brand-listing">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="brand-imgbox"><img src="<?php the_field('p4_logo'); ?>" alt="Images"></div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12 brand-contbox">
                            <h3><?php the_field('p4_heading'); ?></h3>
                            <p><?php the_field('p4_text'); ?>
                                <br class='clearfix'>
                                <a href="<?php the_field('p4_url'); ?>">Visit website</a>
                            </p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="brand-listing">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="brand-imgbox"><img src="<?php the_field('p5_logo'); ?>" alt="Images"></div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12 brand-contbox">
                            <h3><?php the_field('p5_heading'); ?></h3>
                            <p><?php the_field('p5_text'); ?>
                                <br class='clearfix'>
                                <a href="<?php the_field('p5_url'); ?>">Visit website</a>
                            </p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>


    </div>
</section>-->


<?php
get_footer();