<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
global $options;
$options = get_option('cOptn');
$logo = $options['logo'];

$options['logos'] = wp_get_attachment_image($logo, array($size, $size), false);
?>
        <div class="clear"></div>

		</div><!-- .site-content -->
<div class="clear"></div>
<div class="footer-top">
<div class="container">
<div class="col-md-11 center-block floatnone">
<ul class="footerblock">
<li class="col-md-4 noPadd-lft">
        <img src="<?php bloginfo( 'template_url' ); ?>/images/shipping-return.png" alt="">

        <h5>Shipping & Returns</h5>
        <p>Worldwide shipping to Selected Country</p>

</li>
<li class="col-md-4 noPadd-lft">
        <img src="<?php bloginfo( 'template_url' ); ?>/images/Faq.png" alt="">

        <h5>FAQs</h5>
        <p>Answer to Frequently Asked questions</p>

</li>
<li class="col-md-4 noPadd-lft">
        <img src="<?php bloginfo( 'template_url' ); ?>/images/stores.png" alt="">

        <h5>Stores</h5>
        <p>Find our Retail Locations</p>

</li>

</ul>
</div>
</div>
</div><!--.footer-top-->
<div class="clear"></div>
<footer id="colophon" class="footer" role="contentinfo">
<div class="container">
<div class="footerboxes col-md-4">
 <h5>MANUFACTURING UNIT</h5>
 <p><img src="<?php bloginfo( 'template_url' ); ?>/images/footer-img.png" alt=""></p>
</div>
<div class="footerboxes col-md-4">
   <div class="footer-menus">
   <?php $defaults = array( 'menu' => 'main-menu', 'container' => ' ', 'container_class' => '', 'container_id' => '', 'menu_class' => '', 'theme_location' => 'primarys' );
wp_nav_menu( $defaults ); ?>
   </div>
</div>
<div class="footerboxes col-md-4">
    <h5>ACCESSORIES</h5>
    <img src="<?php bloginfo( 'template_url' ); ?>/images/accessories.jpg" alt="">
</div>
 <div class="clear"></div>
<div class="copyrights col-md-12">
<?php echo $options['copyright'] ; ?>
</div>
</div><!--.container--->
</footer><!-- .site-footer -->
</div><!-- .site -->

<?php wp_footer(); ?>
<script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.min.js" type="text/javascript"></script>	
	<script src="<?php bloginfo( 'template_url' ); ?>/js/bootstrap.js"></script>
  <script src="<?php bloginfo( 'template_url' ); ?>/js/slick.js" type="text/javascript" charset="utf-8"></script>

  <script src="http://ajax.aspnetcdn.com/ajax/modernizr/modernizr-2.7.2.js"></script>
<script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.slicknav.js"></script>
  <script src="<?php bloginfo( 'template_url' ); ?>/js/script.js"></script>

</body>
</html>
