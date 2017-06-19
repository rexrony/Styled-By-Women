<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="shortcut icon" href="<?php bloginfo( 'template_url' ); ?>/images/favicon.ico" type="image/x-icon">

<link rel="icon" href="<?php bloginfo( 'template_url' ); ?>/images/favicon.ico" type="image/x-icon">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>

<link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet">
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/bootstrap.css">

    <!--.slick slide-->
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/slick-theme.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_url' ); ?>/css/slick.css">

    <!--.animate Css-->
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_url' ); ?>/css/animate.css">


	<?php
   	global $options;global $logo;global $copyrite;
		$options = get_option('cOptn');
		$logo = $options['logo'];
        $size = 334;
		$options['logos'] = wp_get_attachment_image($logo, array($size, $size), false);

		$att_img = wp_get_attachment_image($logo, array($size, $size), false);
		$logoSrc = wp_get_attachment_url($logo);
		$att_src_thumb = wp_get_attachment_image_src($logo, array($size, $size), false);

    wp_head();
    global $woocommerce;
    ?>
</head>

<body <?php body_class(); ?>>
<div id="page">

<header class="mainheader col-md-12 noPadd">
<div class="headertop">
   <div class="container">
       <div class="col-md-3 noPadd">
           <section class="social-top">
           <ul>
            <li><a href="#_"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="#_"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="#_"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
           </ul>
        </section>
</div>
    </div><!--.container--->
</div><!--.headertop-->
<div class="clear"></div>
<div class="headerbottom">
 <div class="container">
  <div class="head-left col-md-3 noPadd lft">
 <div class="sitelogo noPadd revealOnScroll" data-animation="flipInX"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo $options['logos'] ; ?></a>
  </div>
    </div>
   <div class="head-menu col-md-9 pull-right">
        <div class="mainmenu noPadd col-md-12 rht">
   <?php $defaults = array( 'menu' => 'main-menu', 'container' => ' ', 'container_class' => '', 'container_id' => '', 'menu_class' => '', 'theme_location' => 'primary' );
wp_nav_menu( $defaults ); ?>
    </div>
</div><!--.head-menu-->
</div><!--.container-->
</div>

</header><!-- .site-header -->

<div class="clear"></div>
<div id="content" class="sitecontent">
