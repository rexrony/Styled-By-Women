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
<div class="col-md-9 center-block floatnone">
<ul class="footerblock">
<li class="col-md-4 noPadd-lft">
        <img src="<?php bloginfo( 'template_url' ); ?>/images/shipping-return.png" alt="">

        <h5>Shipping & Returns</h5>
        <p>Worldwide shipping to Selected Country</p>

</li>
<li class="col-md-4 noPadd-lft">
        <img src="<?php bloginfo( 'template_url' ); ?>/images/shipping-return.png" alt="">

        <h5>Shipping & Returns</h5>
        <p>Worldwide shipping to Selected Country</p>

</li>
<li class="col-md-4 noPadd-lft">
        <img src="<?php bloginfo( 'template_url' ); ?>/images/shipping-return.png" alt="">

        <h5>Shipping & Returns</h5>
        <p>Worldwide shipping to Selected Country</p>

</li>

</ul>
</div>
</div>
</div><!--.footer-top-->
<div class="clear"></div>
<footer id="colophon" class="footer" role="contentinfo">
<div class="container">
<div class="footerboxes col-md-3">
             <h3>About us</h3>
             <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Donec odio. Quisque volutpat mattis eros.</p>
             <div class="footer-social-icons">
               <ul>
                   <li><a href="#_"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                   <li><a href="#_"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                 
               </ul>

               </div><!--.footer-social-icons-->
         </div>
<div class="footerboxes col-md-3">
             <h3>Links</h3>
              <div class="footer-menus">
       <?php $defaults = array( 'menu' => 'main-menu', 'container' => ' ', 'container_class' => '', 'container_id' => '', 'menu_class' => '', 'theme_location' => 'primarys' );
wp_nav_menu( $defaults ); ?>
    </div>
         </div>
 <div class="clear"></div>
<div class="copyrights"><?php echo $options['copyright'] ; ?></div>
</div><!--.container--->
</footer><!-- .site-footer -->
</div><!-- .site -->

<?php wp_footer(); ?>
<script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.min.js" type="text/javascript"></script>	
	<script src="<?php bloginfo( 'template_url' ); ?>/js/bootstrap.js"></script>
  <script src="<?php bloginfo( 'template_url' ); ?>/js/slick.js" type="text/javascript" charset="utf-8"></script>
  <script src="<?php bloginfo( 'template_url' ); ?>/js/script.js"></script>

  <script type="text/javascript">
    $(document).on('ready', function() {
      $(".slide-con").slick({
        dots:true,
          customPaging: function(slider, i) {
      // this example would render "tabs" with titles
      return '<span class="cus_dot"></span>';
    },
        infinite: true,
        slidesToShow: 1
  
      });

          $(".events-slides").slick({
        dots:false,
        infinite: true,
        slidesToShow: 1,
 arrows:false,
  /*  next:   '#next',
    prev:   '#prev',
	pager:  '#nav1'*/
      });  
        
        
      var submitIcon = $('.searchbox-icon');
            var inputBox = $('.searchbox-input');
            var searchBox = $('.searchbox');
            var isOpen = false;
            submitIcon.click(function(){
                if(isOpen == false){
                    searchBox.addClass('searchbox-open');
                    inputBox.focus();
                    isOpen = true;
                } else {
                    searchBox.removeClass('searchbox-open');
                    inputBox.focusout();
                    isOpen = false;
                }
            });  
             submitIcon.mouseup(function(){
                    return false;
                });
            searchBox.mouseup(function(){
                    return false;
                });
            $(document).mouseup(function(){
                    if(isOpen == true){
                        $('.searchbox-icon').css('display','block');
                        submitIcon.click();
                    }
                });      
        
        
    });
      
$(document).ready(function($){
   $('.plus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
    /***Minus*****/
    $(".minus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
 });
      

</script>
</body>
</html>
