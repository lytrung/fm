<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html lang="en">
<head>
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl+ '&gtm_auth=3DLGUAiYiwUI9Bgoa0R--A&gtm_preview=env-1&gtm_cookies_win=x';f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-T5QT2JZ');</script>
<!-- End Google Tag Manager -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/lib/jquery/jquery.min.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/easyResponsiveTabs.js"></script>

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
	<!-- Favicons -->
  <link href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon-16x16.png" rel="icon">
  <link href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i|Open+Sans+Condensed:300,300i,700&display=swap" rel="stylesheet"/>
  <!-- Bootstrap css -->
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <link href="<?php echo get_stylesheet_directory_uri(); ?>/lib/bootstrap/css/bootstrap.css" rel="stylesheet"/>
  <!-- Libraries CSS Files -->
  <link href="<?php echo get_stylesheet_directory_uri(); ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet"/>
  <link href="<?php echo get_stylesheet_directory_uri(); ?>/lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet"/>
  <link href="<?php echo get_stylesheet_directory_uri(); ?>/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
  <!-- Main Stylesheet File -->
  <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css" rel="stylesheet"/>
  <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/jQueryTab.css" rel="stylesheet"/>
  <!-- <link href="<//?php echo get_stylesheet_directory_uri(); ?>/css/pace.css" rel="stylesheet"/> -->
  <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/easy-responsive-tabs.css" rel="stylesheet" />

</head>
<body>
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T5QT2JZ&gtm_auth=3DLGUAiYiwUI9Bgoa0R--A&gtm_preview=env-1&gtm_cookies_win=x"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
  <!-- #header start -->
  <header id="header" class="header header-hide">
    <div class="container">

      <div class="row">
        <div class="col-lg-12">
            <div class="header-container">
                <div id="logo" class="pull-left">
                  <a href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.jpg" alt="ForeverMum" title="ForeverMum" /></a>
                </div>
          
                <nav id="nav-menu-container">
                  <!-- search section -->
            
                  <form method="get" class="search-box" action="<?php echo home_url( '/' ); ?>">
                    <input type="text" class="text search-input" name="s" placeholder="Search products" value="<?php the_search_query(); ?>" />
                    <input type="submit" value="Search">
                    <input type="hidden" name="post_type" value="product">
                    <a href="javascript:void();"></a>
                  </form>
                  <!-- search section end -->
				  
                   <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                  <a href="javascript:void();" class="search-toggle" data-selector="#header"></a>
                </nav><!-- #nav-menu-container -->
               </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </header><!-- #header end -->
