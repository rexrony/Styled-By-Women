<?php
/**
 * The template for displaying pages
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
<?php //if ( has_post_thumbnail() ) { ?> 
<!---<div class="featuredimg-container col-md-12 noPadd">
    <?php the_post_thumbnail();  ?>
    <div class="clear"></div>
    <div class="heading-title">
        <div class="container"><h2><?php the_title(); ?></h2></div>
    </div>
</div>--->
<?php //} ?>
<div class="clear"></div>

<div id="primary" class="contentarea">

	<main id="main" class="container" role="main">
	<header class="entryheader">
		<?php the_title( '<h1 class="entrytitle"><span>', '</span></h1>' ); ?>
	</header><!---.entry-header -->
	<div class="clear"></div>
	<div class="inner-con">
	    <?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			// End of the loop.
		endwhile;
		?>
	</div>
	</main><!-- .site-main -->

</div><!-- .content-area -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
