<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php post_class(); ?> class="product-list col-md-4">
<div class="prod-listing">
           <figure>
            <?php 
                if ( has_post_thumbnail() ) 
                    echo get_the_post_thumbnail(get_the_ID(),'full'  ); 
                else 
                    echo '<a href="'.the_permalink().'"><img src="' . woocommerce_placeholder_img_src() . '" alt="Placeholder"  /></a>'; 
            ?>
            </figure>
           <div class="pro-details">
               <div class="featured-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                <div class="featured-price">&#36; <?php echo $product->get_price(); ?></div>
                <div class="feat-addtocart">
                <a href="<?php the_permalink(); ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                <?php //woocommerce_template_loop_add_to_cart(); ?></div>
            </div>
        </div>
</li>
