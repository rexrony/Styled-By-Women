<?php
/**
 * The main template file
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

<div class="prod-cats">
<div class="container">
<?php $catTerms = get_terms('product_cat', array('hide_empty' => 0,'order' => 'DESC', 'parent' => 0,'exclude' => array(20 ))); ?>
<?php foreach($catTerms as $catTerm) : ?>
<div class="prodcats col-md-4 noPadd-lft">
<section class="cat-home-box">
    <?php  $thumbnail_id = get_woocommerce_term_meta($catTerm->term_id, 'thumbnail_id', true);
        // get the image URL for parent category
        $image = wp_get_attachment_url($thumbnail_id);
        // print the IMG HTML for parent category
        echo "<img src='$image' alt='' width='400' height='400' />";
?>
<h3><?php _e($catTerm->name); ?></h3>
<a class="shp-mre" href="<?php echo get_term_link( $catTerm->slug, $catTerm->taxonomy ); ?>">Shop Now <span class="dashicons dashicons-arrow-right"></span></a>
</section>
</div>
<?php endforeach; ?>
    </div><!--.container--->
</div>
<div class="clear"></div>
<div class="lastest-trends-wrap">
    <div class="container">
        <div class="heading-title">
            <h2>LATEST TRENDS</h2>
        </div><!--.heading-title-->
        <div class="clear"></div>
        <div class="lastesttrends">
            s
        </div>

    </div>
</div>

<?php get_footer(); ?>	


