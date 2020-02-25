<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
 <section class="banner-section blog-detail-section">
    <h2>blog</h2>
      <div class="container">
        <div class="banner-box">
        <div class="row">
            <div class="col-lg-6 col-md-5 col-12"><?php the_post_thumbnail( 'large' ); ?></div>
            <div class="col-lg-6 col-md-7 col-12 blog-detail-content">
              <div class="display-table">
                  <div class="table-cell">
                    <h2><span><?php the_title(); ?></span></h2>
                    <p>Posted on <?php the_time( 'l jS, Y' ); ?></p>
                    <div class="share-box">
                      <ul>
                        <li><a href="javascript:void(0)"><i class="fas fa-envelope" aria-hidden="true"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="fab fa-facebook-square" aria-hidden="true"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="fab fa-pinterest-square" aria-hidden="true"></i></a></li>
                      </ul>
                    </div>
                </div>
              </div>
            </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </section><!-- #banner end -->
<?php
while ( have_posts() ) :
the_post();
?>
	<section class="blog-content-section">
		<div class="container">
		  <div class="blog-content-block">
			<?php the_content(); ?>
			<div class="row">
			<?php
			
			if ( is_singular( 'post' ) ) {
					// Previous/next post navigation.
					the_post_navigation(
						array(
							'next_text' => '<div class="col-6 text-right">%title</div>',
							'prev_text' => '<div class="col-6 ">%title</div>',
						)
					);
				}
			?>
			</div>	
		  </div>
		</div>
	</section>
	
	
<?php
endwhile; // End of the loop.
?>

<section class="articles-section">
	<div class="container">
	<h2 class="text-center">Related Articles</h2>
		<div class="row">
		<?php echo do_shortcode('[relatedproducts]'); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
