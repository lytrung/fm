<?php get_header(); ?>
<section class="product-section">
      <div class="container">
	  <?php if ( have_posts() ) : ?>
        <h2 class="text-center searchhaeding"><?php printf( __( 'Search Results for: %s'), '<span>' . get_search_query() . '</span>' ); ?></h2>
		<?php else : ?>
		<h2 class="text-center"><?php printf( __( 'Nothing Found'), '<span>' . get_search_query() . '</span>' ); ?></h2>
		<?php endif; ?>
		<div class="row">
		<?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ): the_post(); ?>
			<div class="col-lg-4 col-md-6 col-12" onclick="location.href='<?php the_permalink(); ?>'">
			<div class="product-box">
				<div class="product-imgbox">
					<?php the_post_thumbnail( 'large' ); ?>				</div>
				<div class="product-contbox">
				<h3><?php the_title(); ?></h3>
				</div>
				<div class="clearfix"></div>
			</div>
		   </div>
			
			<?php
				

			endwhile; // End of the loop.

			
		else :
			?>

			<p class="text-center searchtextcenter"><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.'); ?></p>
			<?php
				//get_search_form();

		endif;
		?>
       </div>
        
  </div>
</section>
<?php get_footer(); ?>