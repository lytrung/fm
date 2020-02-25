<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
 
}
add_theme_support( 'post-thumbnails' );

register_sidebar(array(
        'name' => 'Pharma Menu',
        'id' => 'pharmamenu',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
));

register_sidebar(array(
        'name' => 'Stages Menu',
        'id' => 'stagesmenu',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
));

register_sidebar(array(
        'name' => 'Community',
        'id' => 'community',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
));

//shortcode related product tempaltes 

	function get_relatedproducts( $atts ) {
		global $post;
		//return $post->ID;
			 $custom_taxterms = wp_get_object_terms( $post->ID, 'category', array('fields' => 'ids') );
			 $args = array(
			 'post_type' => 'post',
			 'post_status' => 'publish',
			 'posts_per_page' => 3, // you may edit this number
			 'orderby' => 'rand',
			 'tax_query' => array(
				 array(
					 'taxonomy' => 'category',
					 'field' => 'id',
					 'terms' => $custom_taxterms
				 )
			 ),
			 'post__not_in' => array ($post->ID),
			 );
			 $related_items = new WP_Query( $args );
			 // loop over query
			 if ($related_items->have_posts()) :
				
			 while ( $related_items->have_posts() ) : $related_items->the_post();
			 
			 //$output .= '<div class="col-lg-4 col-md-12 col-12"><div class="article-box"><div class="row">';
						$output .=  '<div class="col-lg-4 col-md-12 col-12"><div class="article-box"><div class="row"><div class="col-lg-12 col-md-4 col-12"><div class="article-imgbox">';
							$image = get_the_post_thumbnail_url($post->ID);
							$posturl = get_the_permalink($post->ID);
							if ( has_post_thumbnail() ) 
							{
								
								$output .=  '<a href='.$posturl.'><img src='.$image.' /></a>';
								
							} 
						$output .=  '</div></div>';
							
						$output .=  '<div class="col-lg-12 col-md-8 col-12"><div class="article-contbox">';
							$title=get_the_title(); 
							$shortdesc=get_the_content(); 
							$output .=  '<h3>'.substr($title,0,70).'</h3>';
							$output .=  '<p>'.substr($shortdesc,0,130) .'...<br/><a href='.$posturl.'>Read more</a></p>';
						$output .=  '</div></div></div><div class="clearfix"></div></div></div> ';               
              
							
							
		
			 
			 endwhile;
			 //$output .=  '</div></div><div class="clearfix"></div></div>';
			 endif;
			 // Reset Post Data
			 wp_reset_postdata();
			

			 return  $output;
	}
	add_shortcode( 'relatedproducts', 'get_relatedproducts' );

if ( ! function_exists( 'post_pagination' ) ) :
   function post_pagination() {
     global $wp_query;
     $pager = 999999999; // need an unlikely integer
 
        echo paginate_links( array(
             'base' => str_replace( $pager, '%#%', esc_url( get_pagenum_link( $pager ) ) ),
             'format' => '?paged=%#%',
             'current' => max( 1, get_query_var('paged') ),
             'total' => $wp_query->max_num_pages
        ) );
   }
endif;
function wcr_share_buttons() {
    $url = urlencode(get_the_permalink());
    $title = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));
    $media = urlencode(get_the_post_thumbnail_url(get_the_ID(), 'full'));

    include( locate_template('share-template.php', false, false) );
}
