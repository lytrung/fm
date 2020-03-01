<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

<!--==========================
    Footer
  ============================-->
  <footer class="footer">
    <div class="container">
      <div class="row">
<!--         <div class="col-md-2 col-lg-2">
          <div class="footer-logo">
            <a href="https://www.health365.com.au/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer-logo-new.png" alt="health 365"></a>
          </div>
        </div> -->
        <div class="col-sm-6 col-md-3 col-lg-3 foot-box2">
          <div class="list-menu">

            <h4>PHARMACARE</h4>

            <?php dynamic_sidebar('pharmamenu'); ?> 

          </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-3 foot-box3">
          <div class="list-menu">

            <h4>STAGES</h4>

            <?php dynamic_sidebar('stagesmenu'); ?>

          </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-3 foot-box4">
          <div class="list-menu community-menu">

            <h4>COMMUNITY</h4>

            <?php dynamic_sidebar('community'); ?>

          </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-3 foot-box5">
          <div class="list-menu">
            <h4>CONNECT</h4>
            <div class="connect-box">
      			<?php
      				$form_widget = new \MailPoet\Form\Widget();
      				echo $form_widget->widget(array('form' => 2, 'form_type' => 'php'));
      			?>

            </div>
      			<style>
          			.connect-box #mailpoet_form_2 p.mailpoet_paragraph input[type="email"]
          			{
          				display: block;
          				width: 100%;
          				padding: 0.375rem 0.75rem;
          				font-size: 1rem;
          				line-height: 1.5;
          				color: #495057;
          				background-color: #fff;
          				background-clip: padding-box;
          				border: 1px solid #ced4da;
          				border-radius: 0.25rem;
          				transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
          			}
          			.connect-box #mailpoet_form_2 p.mailpoet_paragraph select 
          			{
          				display: block;
          				width: 100%;
          				padding: 0.375rem 0.75rem;
          				font-size: 1rem;
          				line-height: 1.5;
          				color: #495057;
          				background-color: #fff;
          				background-clip: padding-box;
          				border: 1px solid #ced4da;
          				border-radius: 0.25rem;
          				transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
          			}
          			.connect-box #mailpoet_form_2 p.mailpoet_paragraph input[type="submit"] 
          			{
          				display: inline-block;
          				font-weight: 400;
          				text-align: center;
          				white-space: nowrap;
          				vertical-align: middle;
          				-webkit-user-select: none;
          				-moz-user-select: none;
          				-ms-user-select: none;
          				user-select: none;
          				border: 1px solid transparent;
          				padding: 0.375rem 0.75rem;
          				font-size: 1rem;
          				line-height: 1.5;
          				border-radius: 0.25rem;
          				transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
          				color: #fff;
          				background-color: #343a40;
          				border-color: #343a40;
          				cursor:pointer;
          			}
          			.connect-box #mailpoet_form_2 p.mailpoet_paragraph input[type="submit"]:hover 
          			{
          				color: #fff;
          				background-color: #23272b;
          				border-color: #1d2124;
          			}
          			.parsley-errors-list.filled
          			{
          				padding: 0px;
          				margin: 0px;
          			}
          			.parsley-errors-list.filled .parsley-custom-error-message
          			{
          				line-height: initial;
          				font-size: 11px;
          				font-weight: 700;
          				    text-transform: inherit;
          			}
          			#mailpoet_form_2 .mailpoet_paragraph 
          			{
          				line-height: initial;
          				margin-bottom: 6px !important;
          				color:#e20f44;
          			}
          			.parsley-required, .parsley-custom-error-message {
                    color:#e20f44;
                    margin-top: 4px;
                }
          			.mailpoet_message
          			{
          				
          				color: #468847 !important ;
          			}
          			.mailpoet_message .mailpoet_validate_success
          			{
          				color: #FFF;
          				
          				line-height: inherit;
          			}
      			</style>
          </div>
        </div>

      </div>
    </div>
<!--     <div class="container mobile-view">
        <div class="row">
          <div class="col-12 col-md-3 col-lg-3 foot-box1">
              <div class="list-menu">
                <h4>CONNECT</h4>
                <div class="connect-box">
                    <form>
                      <div class="form-group">
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="email">
                      </div>
                      <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1">
                          <option>stage</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-dark">subscribe</button>
                    </form>
                </div>
              </div>
          </div>

          <div class="col-6 col-md-2 col-lg-2 foot-box2">
            <div class="footer-logo">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer-logo-new.png" alt="">
            </div>
          </div>

          <div class="col-6 col-md-2 col-lg-3 foot-box3">
            <div class="list-menu community-menu">
  
              <h4>COMMUNITY</h4>
  
              <ul class="list-unstyled">
                <li><a href="https://www.facebook.com/Forever-Mum-1087649671407132"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://www.instagram.com/forever__mum/"><i class="fab fa-instagram"></i></a></li>
              </ul>
  
            </div>
          </div>

          <div class="col-6 col-md-3 col-lg-2 foot-box4">
            <div class="list-menu">
  
              <h4>PHARMACARE</h4>
  
              <?php dynamic_sidebar('pharmamenu'); ?>
  
            </div>
          </div>
  
          <div class="col-6 col-md-2 col-lg-2 foot-box5">
            <div class="list-menu">
  
              <h4>STAGES</h4>
  
              <?php dynamic_sidebar('stagesmenu'); ?>
  
            </div>
          </div>
  
        </div>
    </div> -->
    <div class="copyrights">
      <div class="container">
        <div class="row flex-row-reverse">
          <div class="col-lg-3 text-right"><a href="https://www.pharmacare.com.au/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/pharmacare-logo.jpg" alt="Pharmacare"></a></div>
          <div class="col-lg-9"><p>©2020 Forever Mum. All rights reserved. Always read the label. Use only as directed. If symptoms persist, see your health care professional.</p></div>
      </div>
      </div>
    </div>
 
  </footer>

  <!-- <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a> -->
	<?php wp_footer(); ?>
  <!-- JavaScript Libraries -->
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/lib/superfish/hoverIntent.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/lib/superfish/superfish.min.js"></script>
  <script src="https://kit.fontawesome.com/a73a7b2a1c.js"></script>
  <!-- <script src="lib/easing/easing.min.js"></script> -->
  <!-- <script src="lib/modal-video/js/modal-video.js"></script> -->
  <!-- <script src="lib/wow/wow.min.js"></script> -->
    <!-- jQueryTab.js -->
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jqTab.js"></script>
  <!-- Template Main Javascript File -->
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/main.js"></script>
  <!-- <script src="<//?php echo get_stylesheet_directory_uri(); ?>/js/pace.js"></script> -->
  <!--Plug-in Initialisation-->
	<script type="text/javascript">
    $(document).ready(function() {
        //Horizontal Tab
        $('#parentHorizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
    });
</script>
</body>
</html>
