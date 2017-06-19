<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
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
	</main>
	<div class="clear"></div>
	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-custom' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		//do_action( 'woocommerce_sidebar' );
	?>
    
</div>
<?php get_footer( 'shop' ); ?>
