<?php get_header(); ?>
<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
?>
<style>


</style>
<?php if(get_field('product_base_color') == 'yellowcolr') { ?>
	<style>	
		.prod-detail-section .prod-detail-content strong
		{
			color:#f4e0a4;
		}
		.prod-detail-section .prod-detail-content button[type='button']
		{
			background-color:#f4e0a4;
		}
		.sliderbg-productsingle
		{
			background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/cleanse-banner-bg.jpg) no-repeat 50% 50%/cover;
			padding: 50px 0 40px;
		}
		.ovrview-list
		{
			background:#fdfaf1;
		}
		.ovrview-list ul li
		{
			background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/yellow-heart.png) no-repeat 0 5px;
		}
	</style>
<?php } ?>
<?php if(get_field('product_base_color') == 'greencolr') { ?>
	<style>
		.prod-detail-section .prod-detail-content strong
		{
			color:#a3e5d9;
		}
		.prod-detail-section .prod-detail-content button[type='button']
		{
			background-color:#a3e5d9;
		}
		.sliderbg-productsingle
		{
			background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/conceive-banner-bg.jpg) no-repeat 50% 50%/cover;
			padding: 50px 0 40px;
		}
		.ovrview-list
		{
			background:#f1fbf9;
		}
		.ovrview-list ul li
		{
			background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/hrt-img1.png) no-repeat 0 5px;
		}
	</style>	
<?php } ?>
<?php if(get_field('product_base_color') == 'pinkcolr') { ?>
	<style>
		.prod-detail-section .prod-detail-content strong
		{
			color:#f3bdc6;
		}
		.prod-detail-section .prod-detail-content button[type='button']
		{
			background-color:#f3bdc6;
		}
		.sliderbg-productsingle
		{
			background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/carry-banner-bg.jpg) no-repeat 50% 50%/cover;
			padding: 50px 0 40px;
		}
		.ovrview-list
		{
			background:#fdf5f7;
		}
		.ovrview-list ul li
		{
			background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/pink-heart.png) no-repeat 0 5px;
		}
	</style>	
<?php } ?>
<?php if(get_field('product_base_color') == 'voiletcolr') { ?>
	<style>
		.prod-detail-section .prod-detail-content strong
		{
			color:#c4b3e2;
		}
		.prod-detail-section .prod-detail-content button[type='button']
		{
			background-color:#c4b3e2;
		}
		.sliderbg-productsingle
		{
			background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/care-banner-bg.jpg) no-repeat 50% 50%/cover;
			padding: 50px 0 40px;
		}
		.ovrview-list
		{
			background:#f6f4fb;
		}
		.ovrview-list ul li
		{
			background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/move-heart.png) no-repeat 0 5px;
		}
	</style>	
<?php } ?>
<?php if(get_field('product_base_color') == 'bluecolr') { ?>
	<style>
		.prod-detail-section .prod-detail-content strong
		{
			color:#8ac6e8;
		}
		.prod-detail-section .prod-detail-content button[type='button']
		{
			background-color:#8ac6e8;
		}
		.sliderbg-productsingle 
		{
			background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/blue-background.jpg) no-repeat 50% 50%/cover;
			padding: 50px 0 40px;
		}
		.ovrview-list
		{
			background:#eef7fc;
		}
		.ovrview-list ul li
		{
			background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/blue-heart.png) no-repeat 0 5px;
		}
	</style>	
<?php } ?>
<!--==========================
    banner Section
  ============================-->
  <section class="banner-section prod-detail-section">
    <div class="banner-box prod-her-conceive-bg sliderbg-productsingle">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-4 col-12"><img src="<?php the_field('product_image'); ?>" alt="Product Image"></div>
          <div class="col-lg-6 col-md-8 col-12 prod-detail-content">
            <div class="display-table">
                <div class="table-cell">
                <h2><?php the_title(); ?><span><?php the_field('quantity'); ?></span></h2>
                <p><?php the_field('description'); ?></p>
                <a href="<?php the_field('buy_link'); ?>"><button type="button"></button></a>
                <strong><?php the_field('instructions'); ?></strong>
                <div class="share-box">
                  <span>share</span>
                  <?php wcr_share_buttons(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </section><!-- #banner end -->




  <!--==========================
    Tabs Section
  ============================-->
  <section class="tabs-section">
    <!-- partial:index.partial.html -->
    <div class="container">

    <!--Horizontal Tab-->
    <div id="parentHorizontalTab">
            <ul class="resp-tabs-list hor_1">
                <li>overview</li>
                <li>directions</li>
                <li>Ingredients</li>
            </ul>
            <div class="resp-tabs-container hor_1">
                <div>
                <div class="item-content overview-box">
              <?php the_field('main_content'); ?>
              <div class="ovrview-list">
                <div class="row">
                  <?php the_field('pointers'); ?>
                </div>
              </div>  
            </div>
                </div>
                <div>
                <div class="item-content direction-box">
                  <?php the_field('content'); ?>
                </div>
                </div>
                <div>
                <div class="item-content ingredient-box">
                  <?php the_field('list_content'); ?>
                </div>
                </div>
            </div>
        </div>
      <!-- <article class="tabbed-content">
        <nav class="tabs">
          <ul>
            <li><a href="#tab1" class="active">overview</a></li>
            <li><a href="#tab2">directions</a></li>
            <li><a href="#tab3">Ingredients</a></li>
          </ul>
        </nav>
        <div class="tabber-box">
          <section id="tab1" class="item active" data-title="overview">
            <div class="item-content overview-box">
              <//?php the_field('main_content'); ?>
              <div class="ovrview-list">
                <div class="row">
                  <//?php the_field('pointers'); ?>
                </div>
              </div>  
            </div>
          </section>
          <section id="tab2" class="item" data-title="directions">
            <div class="item-content direction-box">
              <//?php the_field('content'); ?>
            </div>
          </section>
          <section id="tab3" class="item" data-title="Ingredients">
            <div class="item-content ingredient-box">
              <//?php the_field('list_content'); ?>
            </div>
          </section>
          <div class="clearfix"></div>
        </div>
      </article> -->


    </div>
    <!-- partial -->
  </section><!-- #tabs end -->


  <!--==========================
  Articles Section
  ============================-->
  <section class="articles-section">
    <div class="container">
      <h2 class="text-center">Related Articles</h2>
      <div class="row">
        <?php $related_articles = get_field('related_articles'); 
           if(isset($related_articles) && !empty($related_articles))
           {
           foreach($related_articles as $key=>$value){
            ?>
              <!-- <div class="col-lg-4 col-md-6 col-12">
                <div class="product-box product-detail-box"> -->
                  <!-- <a href="<?php //echo  $value->guid ?>"> -->
                 <!--  <a href="<?php //echo  the_permalink($value->ID) ?>">
                    <div class="product-imgbox">
                      <?php //echo get_the_post_thumbnail($value->ID,'medium'); ?>
                    </div>
                    <div class="product-contbox">
                      <h3><?php //echo $value->post_title; ?></h3>
                    </div>
                  </a>
                  <div class="clearfix"></div>
                </div>
              </div> -->
              <div class="col-lg-4 col-md-12 col-12">
                <div class="article-box">
                <div class="row">
                    <div class="col-lg-12 col-md-4 col-12">
                    <div class="article-imgbox">
                      <a href="<?php  the_permalink($value->ID); ?>">
                          <?php
                          if (has_post_thumbnail($value->ID)) 
                          {
                            echo get_the_post_thumbnail($value->ID,'large');
                          } 
                          ?>
                        </a>
                    </div>
                    </div>
                    <div class="col-lg-12 col-md-8 col-12">
                    <div class="article-contbox">
                        <h3><?php echo  $value->post_title; ?></h3>
                        <p><?php echo mb_substr($value->post_content, 0, 120, "UTF-8"). "..."; ?><br><a href="<?php the_permalink($value->ID); ?>">Read more</a></p>
                    </div>                
                    </div>
                </div>
                <div class="clearfix"></div>
                </div>
            </div>
            <?php
          }
        }
        ?>
      </div>
    </div>
  </section><!-- #articles end -->

  <!--==========================
  Product Section
  ============================-->
  <section class="product-section">
    <div class="container">
      <h2 class="text-center">You may also like</h2>
      <p class="text-center"></p>
      <div class="row">
      <?php  $youMayAlsoLike = get_field('you_may_also_like'); 
        // echo '<pre>';print_r($youMayAlsoLike);exit();
        if(isset($youMayAlsoLike) && !empty($youMayAlsoLike))
          {
            foreach($youMayAlsoLike as $key=>$value)
            {
        ?>
              <div class="col-lg-3 col-md-6 col-6">
                <div class="product-box product-detail-box">
                  <a href="<?php  the_permalink($value->ID); ?>">
                    <div class="product-imgbox">
                      <a href="<?php  the_permalink($value->ID); ?>">
                          <?php
                          if (has_post_thumbnail($value->ID)) 
                          {
                            echo get_the_post_thumbnail($value->ID,'large');
                          } 
                          ?>
                        </a>
                      <!-- <img src="<?php //the_field('product_1_image'); ?>" alt="Product Image"> -->
                    </div>
                    <div class="product-contbox">
                      <h3><?php echo  $value->post_title; ?></h3>
                    </div>
                  </a>
                  <div class="clearfix"></div>
                </div>
                </a>
              </div>
            <?php 
                  }
                }
            ?>
        <!-- <div class="col-lg-3 col-md-6 col-12">
          <div class="product-box product-detail-box">
		  <a href="<?php //the_field('product_2_link'); ?>">
            <div class="product-imgbox">
            
              <img src="<?php //the_field('product_2_image'); ?>" alt="Product Image">
            </div>
            <div class="product-contbox">
              <h3><?php //the_field('product_2_name'); ?></h3>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <div class="product-box product-detail-box">
		  <a href="<?php //the_field('product_3_link'); ?>">
            <div class="product-imgbox">
              <img src="<?php //the_field('product_3_image'); ?>" alt="Product Image">
            </div>
            <div class="product-contbox">
              <h3><?php //the_field('product_3_name'); ?></h3>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <div class="product-box product-detail-box">
		  <a href="<?php //the_field('product_4_link'); ?>">
            <div class="product-imgbox">
              <img src="<?php //the_field('product_4_image'); ?>" alt="Product Image">
            </div>
            <div class="product-contbox">
              <h3><?php //the_field('product_4_name'); ?></h3>
            </div>
            <div class="clearfix"></div>
          </div>
        </div> -->
      </div>
    </div>
  </section><!-- #product end -->
	

			

		
<?php
			endwhile; // End of the loop.
			?>
<?php get_footer(); ?>