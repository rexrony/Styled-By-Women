<?php
/**
 * Template Name: Contact Us Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-con" typeof="BreadcrumbList" vocab="https://schema.org/">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>
    </div>
</div>
<div class="clear"></div>
<div id="primary" class="contentarea">
     <div class="container"> 
        	<header class="entryheader">
		<?php the_title( '<h1 class="entrytitle"><span>', '</span></h1>' ); ?>
	</header><!---.entry-header -->
        <div class="clear"></div>
	<div class="inner-con">
         <?php
    while ( have_posts() ) : the_post();
    the_content();
    endwhile;
    wp_reset_query();
    ?></div>
    
    </div>  
<div class="clear"></div>
<div class="map-container">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d748547.7983360287!2d5.036034551629586!3d13.274112449224333!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2s!4v1485863091863" width="100%" height="460" style="width:100%;" frameborder="0" style="border:0" allowfullscreen></iframe>
</div><!--.map-container-->
</div><!-- .content-area -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
