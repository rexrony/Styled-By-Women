<?php
/**
 * Template Name: FrontPage
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

 <div class="clear"></div>
 
<div class="contentarea-index col-md-12 noPadd">
<main id="main" class="container" role="main">
<?php while ( have_posts() ) : the_post();
    
    the_content();
    
    endwhile;
    ?>
     </main>
<div class="clear"></div>
    <div class="col-md-12 noPadd featured-pro-con">
        <div class="container">
            <div class="col-md-3 catlist-sidebar">
               <h3>Product Catogories</h3>
                <div class="menu-categs-box">	
			<?php $wcatTerms = get_terms('product_cat', array('hide_empty' => 0, 'orderby' => 'ASC',  'parent' =>0)); 
				foreach($wcatTerms as $wcatTerm) : 
					/*$wthumbnail_id = get_woocommerce_term_meta( $wcatTerm->term_id, 'thumbnail_id', true );
					$wimage = wp_get_attachment_url( $wthumbnail_id );*/
				?>
				<ul>
					<!---<li class="libreak"><?php //if($wimage!=""):?><img src="<?php //echo $wimage?>"><?php //endif;?></li>--->
					<li>
						<a href="<?php echo get_term_link( $wcatTerm->slug, $wcatTerm->taxonomy ); ?>"><?php echo $wcatTerm->name; ?></a>
						<ul class="wsubcategs">
						<?php
						$wsubargs = array(
						   'hierarchical' => 1,
						   'show_option_none' => '',
						   'hide_empty' => 0,
						   'parent' => $wcatTerm->term_id,
						   'taxonomy' => 'product_cat'
						);
						$wsubcats = get_categories($wsubargs);
						foreach ($wsubcats as $wsc):
						?>
							<li><a href="<?php echo get_term_link( $wsc->slug, $wsc->taxonomy );?>"><i class="fa fa-chevron-right" aria-hidden="true"></i> &nbsp; <?php echo $wsc->name;?></a></li>
						<?php
						endforeach;
						?>  
						</ul>
					</li>
				</ul>
			<?php 
				endforeach; 
			?>
		</div>
            </div><!--.catlist-lft--->
            <div class="featured-products col-md-9 noPadd">
 <div class="featured-product-heading"><h4>Featrured products</h4></div>
  
<?php

$args = array(
	'post_type' => 'product',
	'meta_key' => '_featured',
	'meta_value' => 'yes',
	'posts_per_page' => 4
);

$featured_query = new WP_Query( $args );
	
if ($featured_query->have_posts()) : 
$count=1;
	while ($featured_query->have_posts()) : 
	
		$featured_query->the_post();
		
		$product = get_product( $featured_query->post->ID );
        
        ?>
		<div class="col-sm-4 col-md-4 feat-container" <?php if($count == '4'){echo 'noPadd-lft';} elseif($count == '1'){echo 'noPadd-lft';} ?>>
           <div class="feat-cont-home">
           <figure>
            <?php 
                if ( has_post_thumbnail( $loop->post->ID ) ) 
                    echo get_the_post_thumbnail( $loop->post->ID, array( 250, 382) ); 
                else 
                    echo '<img src="' . woocommerce_placeholder_img_src() . '" alt=""  />'; 
            ?>
            </figure>
            <div class="clear"></div>
            <div class="featured-details">
                <div class="featured-name"><?php the_title(); ?></div>
                <div class="featured-price">&#36; <?php echo $product->get_price(); ?></div>
                <div class="feat-addtocart">
                <a href="<?php the_permalink(); ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                <?php //woocommerce_template_loop_add_to_cart(); ?></div>
            </div>
        </div><!--.feat-cont-home-->
        </div>
	  <?php
		$count++;
	endwhile;
	
endif;

wp_reset_query(); // Remember to reset
?>
</div>
        </div>
    </div>
   
</div><!-- .content-area -->
<?php get_footer(); ?>	


