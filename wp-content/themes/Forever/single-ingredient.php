<?php get_header(); ?>
<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
?>
<!--==========================
    banner Section
  ============================-->
  <section class="banner-section ingredients-detail-section">
    <div class="banner-box">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-5 col-12 text-center"><?php the_post_thumbnail( 'full' ); ?></div>
          <div class="col-lg-6 col-md-7 col-12 ingredients-detail-content">
            <div class="display-table">
                <div class="table-cell">
                  <h2><?php the_title(); ?><span><?php the_field('product_ingredient'); ?></span></h2>
                  <p><?php the_field('product_description'); ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </section><!-- #banner end -->

  <!--==========================
    Ingredients Section
  ============================-->
  <section class="ingredients-section">
    <div class="container">
    <ul>
    <?php 
    // echo '<pre>here';print_r(get_field('supplments_products'));exit();
    if( get_field('description_1') ): ?>
      <li>
        <div class="row">
          <div class="col-lg-2 text-right">
            <strong>daily intake</strong>
          </div>
          <div class="col-lg-1"></div>
          <div class="col-lg-9">
            <p>
              <span><?php the_field('description_1'); ?></span>
			  <?php if( get_field('description_2') ): ?>
				<span><?php the_field('description_2'); ?></span>
			  <?php endif; ?>
            </p>
          </div>
        </div>
      </li>
	  <?php endif; ?>
	  <?php if( get_field('description_1_food') ): ?>
      <li>
        <div class="row">
          <div class="col-lg-2 text-right">
            <strong>Food Sources</strong>
          </div>
          <div class="col-lg-1"></div>          
          <div class="col-lg-9">
            <p><?php the_field('description_1_food'); ?></p>
			<?php if( get_field('description_2_food') ): ?>
				<p><?php the_field('description_2_food'); ?></p>
				<?php endif; ?>
          </div>
        </div>
      </li>
	  <?php endif; ?>
	  <?php if( get_field('description_overview') ): ?>
      <li>
        <div class="row">
          <div class="col-lg-2 text-right">
            <strong>Overview</strong>
          </div>
          <div class="col-lg-1"></div>
          <div class="col-lg-9">
            <p><?php the_field('description_overview'); ?></p>
          </div>
        </div>
      </li>
	  <?php endif; ?>
	  <?php if( get_field('description_1_benefits') ): ?>
      <li>
        <div class="row">
          <div class="col-lg-2 text-right">
            <strong>Benefits</strong>
          </div>
          <div class="col-lg-1"></div>
          <div class="col-lg-9">
              <?php the_field('description_1_benefits'); ?>
          </div>
        </div>
      </li>
	  <?php endif; ?>
    <?php 
    
    if( get_field('supplments_products') ): ?>
        <li>
          <div class="row">
            <div class="col-lg-2 text-right">
              <strong>Supplements</strong>
            </div>
            <?php  $supplments_products=get_field('supplments_products');?>
            <div class="col-lg-1"></div>
            <div class="col-lg-9">

              <div class="row">
              <?php foreach($supplments_products as $key=>$value )
              { 
              ?>
                <div class="col-lg-3 col-md-4 col-4">
                  <div class="product-box product-detail-box">
                    <a href="<?php  the_permalink($value->ID); ?>">
                      <div class="product-imgbox ">
                        <?php echo get_the_post_thumbnail( $value->ID, 'medium',array( 'class' => 'supplments_image' ));  ?>
                      </div>
                      <div class="product-contbox">
                        <h3><?php echo $value->post_title ?></h3>
                      </div>
                    </a>
                    <div class="clearfix"></div>
                  </div>
                </div>
              <?php 
              } 
              ?>

                <!-- <div class="col-lg-3 col-md-4 col-4">
                  <div class="product-box product-detail-box">
                    <a href="javascript:void(0)">
                      <div class="product-imgbox">
                        <img src="<?php //the_field('supplements_image_1'); ?>" alt="">
                      </div>
                      <div class="product-contbox">
                        <h3><?php //the_field('supplements_image_description'); ?></h3>
                      </div>
                    </a>
                    <div class="clearfix"></div>
                  </div>
                </div> -->
				
               <!--  <div class="col-lg-3 col-md-4 col-4">
                  <div class="product-box product-detail-box">
                    <a href="javascript:void(0)">
                      <div class="product-imgbox">
                        <img src="<?php //the_field('supplements_image_3'); ?>" alt="">
                      </div>
                      <div class="product-contbox">
                        <h3><?php //the_field('supplements_image_description_3'); ?></h3>
                      </div>
                    </a>
                    <div class="clearfix"></div>
                  </div>
                </div> -->
				<?php endif; ?>
              </div>
            </div>
          </div>
        </li>
		<?php if( get_field('references_1') ): ?>
        <li>
            <div class="row">
              <div class="col-lg-2 text-right">
                <strong>References</strong>
              </div>
              <div class="col-lg-1"></div>
              <div class="col-lg-9">
                <p><?php the_field('references_1'); ?>
                  <em><?php the_field('refrence_month_year_1'); ?>  |  <a href="<?php the_field('references_url_1'); ?>" target="_blank"><?php the_field('references_url_1'); ?></a></em>
                </p>
				
				<?php if( get_field('references_2') ): ?>
					<p><?php the_field('references_2'); ?>
					  <em><?php the_field('refrence_month_year_2'); ?>  |  <a href="<?php the_field('references_url_2'); ?>" target="_blank"><?php the_field('references_url_2'); ?></a></em>
					</p>
				<?php endif; ?>	
				
				<?php if( get_field('references_3') ): ?>
                <p><?php the_field('references_3'); ?>
                  <em><?php the_field('refrence_month_year_3'); ?>  |  <a href="<?php the_field('references_url_3'); ?>" target="_blank"><?php the_field('references_url_3'); ?></a></em>
                </p>
				<?php endif; ?>	
				
				<?php if( get_field('references_4') ): ?>
                <p><?php the_field('references_4'); ?>
                  <em><?php the_field('refrence_month_year_4'); ?>  |  <a href="<?php the_field('references_url_4'); ?>" target="_blank"><?php the_field('references_url_4'); ?></a></em>
                </p>
				<?php endif; ?>	
				
				<?php if( get_field('references_5') ): ?>
                <p><?php the_field('references_5'); ?>
                  <em><?php the_field('refrence_month_year_5'); ?>  |  <a href="<?php the_field('references_url_5'); ?>" target="_blank"><?php the_field('references_url_5'); ?></a></em>
                </p>
				<?php endif; ?>	
				
				<?php if( get_field('references_6') ): ?>
				<p><?php the_field('references_6'); ?>
                  <em><?php the_field('refrence_month_year_6'); ?>  |  <a href="<?php the_field('references_url_6'); ?>" target="_blank"><?php the_field('references_url_6'); ?></a></em>
                </p>
				<?php endif; ?>	
              </div>
            </div>
          </li>
		  <?php endif; ?>
    </ul>
  </div>
  </section>
	

			

		
<?php
			endwhile; // End of the loop.
			?>
<?php get_footer(); ?>