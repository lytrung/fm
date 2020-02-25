<?php
/*
Template Name: Blog Listing
*/
?>

<?php get_header(); ?>

<section class="banner-section blog-detail-section blog-listing-section">
    <h2>blog</h2>
   <?php wp_nav_menu('main_nav'); ?>
		<?php
			$my_query = new WP_Query('post_type=post&posts_per_page=1&category_name=feature&order=ASC');
			$slide2 = 0;
			while ($my_query->have_posts()) : $my_query->the_post();
		?>
      <div class="container">
        <div class="banner-box">
        <div class="row">
            <div class="col-lg-6 col-md-5 col-12">
			<a href="<?php the_permalink(); ?>">
			<?php
			if (has_post_thumbnail()) 
			{
				the_post_thumbnail('large');
			} 
			?></a></div>
            <div class="col-lg-6 col-md-7 col-12 blog-detail-content">
              <div class="display-table">
                  <div class="table-cell">
                    <h2><span><?php the_title(); ?></span></h2>
                   <?php echo strip_shortcodes(mb_substr(get_the_content(), 0, 120, "UTF-8")) . "..."; ?><br>
                    <a href="<?php the_permalink(); ?>">Read more</a>
                </div>
              </div>
            </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
	<?php
		endwhile;
		wp_reset_query();
	?>
  </section>
<section class="articles-section pt-0">
    <div class="container">
      <div class="row">
	  <?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts(array(
    'post_type' => 'post', // You can add a custom post type if you like
    'paged' => $paged,
    'posts_per_page' => 9, // limit of posts
	'category__not_in' => '15'
    
));
 
if ( have_posts() ) :  while ( have_posts() ) : the_post();
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
 endwhile;
 ?>
 <div class="bloglisting-pagination">
 <?php post_pagination(); ?>
    </div>
 <?php
 else :
 
// no posts found message goes here...
 
 endif;
?> 
      </div>
    </div>
  </section>
<?php
get_footer();