<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
					the_content();
				//get_template_part( 'template-parts/content/content', 'single' );

				 if ( is_singular( 'post' ) ) {
					// Previous/next post navigation.
					the_post_navigation(
						
					);
				}

		

			endwhile; // End of the loop.
			?>
<div class="col-6"><?php echo get_previous_post_link( '&laquo; %link', '%title', true ); ?></div>
	<div class="col-6 text-right"><?php echo get_next_post_link( '%link &raquo;', '%title', true ); ?></div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
