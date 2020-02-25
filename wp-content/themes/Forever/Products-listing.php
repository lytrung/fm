<?php
/*
Template Name: Product List
*/
?>
<?php get_header(); ?>


<section class="product-section">
      <div class="container">
        <h2 class="text-center">Products</h2>
        <p class="text-center">We have created supplements that meet the latest health & nutrition guidelines.</p>
        <div class="row">
	<?php
		$my_query = new WP_Query('post_type=product&posts_per_page=-1&order=ASC');
		while ($my_query->have_posts()) : $my_query->the_post();
		?>
		<div class="col-lg-4 col-md-6 col-sm-6 col-6" onclick="location.href='<?php the_permalink(); ?>'">
			<div class="product-box">
				<div class="product-imgbox">
					<?php
						if (has_post_thumbnail()) {
						the_post_thumbnail('large');
						} 
					?>
				</div>
				<div class="product-contbox">
				<h3><?php echo get_the_title(); ?></h3>
				</div>
				<div class="clearfix"></div>
			</div>
		   </div>
		<?php
		endwhile;
		wp_reset_query();
		?>
	</div>
  </div>
</section>
<?php get_footer(); ?>