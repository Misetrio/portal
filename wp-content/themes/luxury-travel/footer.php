<?php
/**
 * The template for displaying the footer.
 * @package Luxury Travel
 */
?>
    <div  id="footer" class="copyright-wrapper">
      <div class="container">
        <div class="footerinner row">
          <div class="col-md-3 col-sm-3">
              <?php dynamic_sidebar('footer-1');?>
          </div>
          <div class="col-md-3 col-sm-3">
              <?php dynamic_sidebar('footer-2');?>
          </div>
          <div class="col-md-3 col-sm-3">
              <?php dynamic_sidebar('footer-3');?>
          </div>
          <div class="col-md-3 col-sm-3">
              <?php dynamic_sidebar('footer-4');?>
          </div>
        </div>
      </div>
      <div class="inner">
          <div class="copyright text-center">
            <p class="testparabt"><?php echo esc_html(get_theme_mod('luxury_travel_text',__('Luxury Travel WordPress Theme By','luxury-travel'))); ?> <?php luxury_travel_credit_link(); ?></p>
          </div>
          <div class="clear"></div>
      </div>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>