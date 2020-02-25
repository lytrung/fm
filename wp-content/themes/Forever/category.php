<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<style>
.blog-detail-section
{
	padding-bottom:0px !important;
}
</style>
<section class="banner-section blog-detail-section blog-listing-section">
    <h2>blog</h2>
	<?php wp_nav_menu('blogcategory'); ?>
	

		      
	  </section>
<section class="articles-section pt-0">
    <div class="container">
      <div class="row">
<?php
while ( have_posts() ) :
the_post();
?>
        <div class="col-lg-4 col-md-12 col-6">
          <div class="article-box">
            <div class="row">
              <div class="col-lg-12 col-md-4 col-12">
                <div class="article-imgbox">
				<a href="<?php the_permalink(); ?>">
                  <?php
					if (has_post_thumbnail()) 
					{
						the_post_thumbnail('large');
					} 
					?>
					</a>
                </div>
              </div>
              <div class="col-lg-12 col-md-8 col-12">
                <div class="article-contbox">
                  <h3><?php the_title(); ?></h3>
                  <p><?php echo strip_shortcodes(mb_substr(get_the_content(), 0, 120, "UTF-8")) . "..."; ?><br><a href="<?php the_permalink(); ?>">Read more</a></p>
                </div>                
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>   
      
<?php
endwhile; // End of the loop.
?>
</div>
    </div>
  </section>
<?php
get_footer();
