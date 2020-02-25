<?php
/*
Template Name: Carry
*/
?>

<?php get_header(); ?>

<!--==========================
    banner Section
  ============================-->
<section class="banner-section prod-detail-section cleanse-section">
    <div class="banner-box carry-banner-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-4 col-12"><img src="<?php the_field('image'); ?>" alt=""></div>
                <div class="col-lg-5 col-md-8 col-12 stage-detail-content">
                    <div class="display-table">
                        <div class="table-cell">
                            <h2><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/carry-number1.png"
                                        alt=""></span><?php the_field('heading'); ?></h2>
                            <p> <?php the_field('content'); ?></p>
                            <p><a href="<?php the_field('url'); ?>">View range</a></p>
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
  Sickness Section
  ============================-->
  <?php
$page_blog = get_field('page_blog');

if(isset($page_blog) && !empty($page_blog))
{
	foreach($page_blog as $key=>$value)
	{
		if($key % 2 == 1)
		{
		?>
			<section class="sickness-section cleanse-section">
				<div class="container">
					<div class="cleanse-box">
						<div class="row flex-row-reverse">
							<div class="col-lg-6 sickness-imgbox">
							<a href="<?php  the_permalink($value->ID); ?>">
								<?php
								if (has_post_thumbnail($value->ID)) 
								{
									echo get_the_post_thumbnail($value->ID,'large');
								} 
								?>
							</a>
							<span></span>
							</div>
							<div class="col-lg-6 sickness-contbox">
								<div class="display-table">
									<div class="table-cell">
										<h3><?php echo  $value->post_title;  ?></h3>
										<p>
											<?php echo mb_substr($value->post_content, 0, 120, "UTF-8"). "..."; ?><br>
											<a href="<?php the_permalink($value->ID); ?>">Read more</a>
										</p>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</section>
		<?php
		}
		else
		{?>
			<section class="boosting-section cleanse-section">
				<div class="cleanse-box">
					<div class="container">
						<div class="row">
							<div class="col-lg-6 boosting-imgbox">
							<a href="<?php  the_permalink($value->ID); ?>">
								<?php
								if (has_post_thumbnail($value->ID)) 
								{
									echo get_the_post_thumbnail($value->ID,'large');
								} 
								?>
							</a>
							<span></span>
							</div>
							<div class="col-lg-6 boosting-contbox">
								<div class="display-table">
									<div class="table-cell">
										<h3><?php echo  $value->post_title;  ?></h3>
										<p>
											<?php echo mb_substr($value->post_content, 0, 120, "UTF-8"). "..."; ?><br>
											<a href="<?php the_permalink($value->ID); ?>">Read more</a>
										</p>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</section>
			<?php
		}
	}
}
?>
<?php
get_footer();