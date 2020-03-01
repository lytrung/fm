<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>


<style>
  
      .contact-bg {padding: 40px;}
      .contact-bg h4 { margin-bottom: 15px;}
      form label { margin-top: 15px; margin-bottom: 0px; font:300 18px/26px 'Open Sans Condensed', sans-serif;} 
      .form-control { border-radius: 0px;}
      .btn-primary { border-radius: 0px; font-weight: 500;}
      .quick-contact-widget p { display: flex; align-items: center; font:300 18px/26px 'Open Sans Condensed', sans-serif;}
      .quick-contact-widget p i { font-size: 14px; padding-right: 10px; color: #222; border: 1px solid #ddd;   display: inline-block; text-align: center; padding: 12px; height: 40px; width: 40px; margin-right: 10px; border-radius: 100%; float: left;}
      .contact-details{align-items: stretch;}

</style>

  <!--==========================
  Brand Partner Section
  ============================-->    
  <section class="brand-partner-section">
      <div class="container">
      <div class="row">
        <div class="col-lg-12">
            <div class="brand-listing p-0">
              <div class="row">
            <!-- <div class="col-lg-4 col-md-4 col-12">
              &nbsp;
            </div> -->
            <div class="col-12 ingredients-listing-section text-center pt-0">
            <h2>Contact</h2>
            <p class="p-0 m-0">If you have any queries regarding the Forever Mum products, please feel free to contact us directly or submit an online form.</p>
            </div>
            </div>
            <div class="clearfix"></div>
            </div>
        </div>        
      </div>
      <div class="row contact-details">
           <div class="col-sm-6 col-md-6 contact-bg">
               
             <h3>Drop us a Line</h3>

             <?php echo do_shortcode('[contact-form-7 id="55" title="Contact form 1"]');?>
               
              
           </div>
           <div class="col-sm-6 col-md-6 contact-bg">
          
              <div class="quick-contact-widget"> 
                  <p><i class="fa fa-phone" aria-hidden="true"></i><span>+64 9 415-8624</span></p>
                  <p><i class="fas fa-fax" aria-hidden="true"></i><span>+64 9 415-8593</span></p>
                  <p><i class="fa fa-envelope" aria-hidden="true"></i><span>info@pharmacarenz.co.nz</span></p>
                  <p><i class="fa fa-map-marker"></i><span>228 Bush Road, Albany Auckland 0632, New Zealand</span></p>
                  <p><i class="fas fa-mail-bulk" aria-hidden="true"></i><span>PO Box 302 347, North Harbour, Auckland 0751, New Zealand</span></p>
                
              </div>
          

              <div><?php echo do_shortcode('[wpgmza id="1"]')?></div>
           </div>
      </div>
  </section><!-- #Brand Partner end -->


<?php
get_footer();
