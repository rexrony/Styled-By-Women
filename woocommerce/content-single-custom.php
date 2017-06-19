<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
global $post, $product;
?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	// do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="inner-con">
<div class="images-pro col-md-6 noPadd">
	<?php
		if ( has_post_thumbnail() ) {
			$attachment_count = count( $product->get_gallery_attachment_ids() );
			$gallery          = $attachment_count > 0 ? '[product-gallery]' : '';
			$props            = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
			$image            = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
				'title'	 => $props['title'],
				'alt'    => $props['alt'],
			) );
			echo apply_filters(
				'woocommerce_single_product_image_html',
				sprintf(
					'<div class="main-img rht col-md-9 noPadd"><a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto%s">%s</a></div>',
					esc_url( $props['url'] ),
					esc_attr( $props['caption'] ),
					$gallery,
					$image
				),
				$post->ID
			);
		} else {
			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'woocommerce' ) ), $post->ID );
		}
		//do_action( 'woocommerce_product_thumbnails' );
	?>
	<div class="thumbnails-img lft col-md-3 noPadd">
   <?php do_action( 'woocommerce_product_thumbnails' ); ?>
    </div><!--.thumbnails-img--->
</div>
<div class="entrysummary col-md-6 noPadd-rht">
		<?php
			/**
			 * woocommerce_single_product_summary hook.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			//do_action( 'woocommerce_single_product_summary' );
			
			the_title( '<div class="product-title"><h1 itemprop="name" class="product_title entry-title">', '</h1></div>' );
			?>
           <div class="pro-share">
<?php woocommerce_template_single_meta();
//woocommerce_template_single_sharing();
//echo do_shortcode(' [yith_wcwl_wishlist]');
?>
</div>
           <div class="clear"></div>
            <div class="product-price ">
            <?php
			//woocommerce_template_single_price();
$currency = get_woocommerce_currency_symbol();
$price = get_post_meta( get_the_ID(), '_regular_price', true);
$sale = get_post_meta( get_the_ID(), '_sale_price', true);
?>
 
<?php if($sale) : ?>
<p class="product-price-tickr"><del><?php echo $currency; echo $price; ?></del> <?php echo $currency; echo $sale; ?></p>    
<?php elseif($price) : ?>
<p class="product-price-tickr"><label>Price :</label> <?php echo $currency; echo $price; ?></p>    
<?php endif; ?>
            </div>
            <?php woocommerce_template_single_excerpt(); ?>
            
            <div class="clear"></div>
			
            <div class="prod-addtocart">
           
            <?php  woocommerce_template_single_add_to_cart();
			//woocommerce_simple_add_to_cart();?></div>

	</div><!-- .summary -->
</div>
<div class="clear"></div>
<div class="inner-con">
	<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />
</div>
	
</div><!-- #product-<?php the_ID(); ?> -->

<?php //do_action( 'woocommerce_after_single_product' ); ?>
