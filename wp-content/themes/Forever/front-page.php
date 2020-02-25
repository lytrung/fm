<?php
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>

<!--==========================
    banner Section
  ============================-->
  <section class="banner-section">
    <div class="banner-box">
        <div class="fordesktop"><?php echo do_shortcode( '[rev_slider alias="slider-3"][/rev_slider]' ); ?></div>
        <div class="foripad"><?php echo do_shortcode( '[rev_slider alias="desktop-slider-11"][/rev_slider]' ); ?></div>
        <div class="formobile"><?php echo do_shortcode( '[rev_slider alias="desktop-slider-1"][/rev_slider]' ); ?></div>     
      <div class="clearfix"></div>
    </div>
  </section><!-- #banner end -->

  <!--==========================
    Get Started Section
  ============================-->

  <!--==========================
    Stages Section
  ============================-->  
  <section class="stages-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6"><a href="/cleanse/"><span class="stages-nav1"></span></a></div>
        <div class="col-lg-3 col-md-6"><a href="/conceive/"><span class="stages-nav2"></span></a></div>
        <div class="col-lg-3 col-md-6"><a href="/carry/"><span class="stages-nav3"></span></a></div>
        <div class="col-lg-3 col-md-6"><a href="/care/"><span class="stages-nav4"></span></a></div>
      </div>
    </div>
  </section><!-- #stages end --> 
  
  <!--==========================
    Ingredients Section
  ============================-->  
  <section class="ingredient-section">
    <a href="/ingredient/" class="img-desk"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/video-placeholder.gif" alt="Ingredients"></a>
    <a href="/ingredient/" class="img-mob"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Mobile-Mum.gif" alt="Ingredients"></a>
  </section><!-- #ingredient end --> 

  <!--==========================
  Sickness Section
  ============================-->  
  <section class="sickness-section">
      <div class="container">
        <div class="row">
        <div class="col-lg-12">
          <div class="sickness-imgbox sick-flt-rgt"><img src="<?php the_field('p_image'); ?>" alt="Preggie Pops"><span><!--<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sickness-img1.png" alt="Preggie Pops">--></span></div>
          <div class="sickness-contbox sick-flt-lft">
            <h3><?php the_field('p_heading'); ?></h3>
            <p><?php the_field('p_content'); ?><br><a href="<?php the_field('p_url'); ?>">Learn more</a></p>
          </div>
        </div>
        </div>
      </div>
    </section><!-- #Sickness end -->

  <!--==========================
  Boosting Section
  ============================-->  
  <section class="boosting-section">
    <div class="container">
      <div class="row">
      <div class="col-lg-12">
        <div class="boosting-imgbox sick-flt-lft"><img src="<?php the_field('i_image'); ?>" alt="Fertility Boosting"><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/boosting-img1.png" alt=""></span></div>
        <div class="boosting-contbox sick-flt-rgt">
          <h3><?php the_field('i_heading'); ?></h3>
          <p><?php the_field('i_content'); ?><br><a href="<?php the_field('i_url'); ?>">View recipe</a></p>
        </div>
      </div>
      </div>
    </div>
  </section><!-- #boosting end -->

  <!--==========================
  Follow Us Section
  ============================-->  
  <section class="follow-section">
    <h2>FOLLOW US <span>@forever__mum</span></h2>
    <div class="row m-0">
      <?php echo do_shortcode( '[instagram-feed num=6 cols=6]' ); ?>
    </div>
  </section><!-- #follow end -->

<?php
get_footer();
