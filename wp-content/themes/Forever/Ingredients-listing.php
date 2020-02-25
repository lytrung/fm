<?php
/*
Template Name: Ingredient List
*/
?>
<?php get_header(); ?>


<section class="ingredients-section ingredients-listing-section">
	<h2>Ingredients</h2>
	<p>We Source the finest ingredients to give you and your baby the nutrients you need.</p>
    <div class="container">
	<div class="row">
	<?php
		$my_query = new WP_Query('post_type=ingredient&posts_per_page=-1&order=ASC');
		while ($my_query->have_posts()) : $my_query->the_post();
		?>
		<div class="col-lg-3 col-md-6 col-sm-6 col-6" onclick="location.href='<?php the_permalink(); ?>'">
			<div class="promise-box">
				<div class="promise-imgbox">
					<?php
						if (has_post_thumbnail()) {
						the_post_thumbnail('medium');
						} 
					?>
				</div>
				<div class="promise-contbox">
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