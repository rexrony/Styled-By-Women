<?php
/**
 * Template Name: Testimonials
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
get_header(); ?>

<div id="primary" class="content-area">
<div class="main-banner">
   <div class="container">
    <h2><?php the_title(); ?></h2>
    </div><!--.container-->
</div>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
<?php $index_query = new WP_Query(array( 'post_type' => 'testimonial', 'posts_per_page' => 9)); ?>
   <?php while ($index_query->have_posts()) : $index_query->the_post(); ?>
   <div class="testimonial-btm-box testi-con col-md-6">
                <div class="test-img floatLeft">
                    <img src="<?php bloginfo( 'template_url' ); ?>/images/testimonail-img.png" alt="">
                </div>
                <div class="test-content floatRight">
                    <?php the_content(); ?>
                    <div class="testimonal-sign"><p><b><?php the_title(); ?></b><br /> 
                   <?php echo the_field('designation'); ?> </p></div>
                </div>
                
            </div><!--.testimonial-btm-box-->
            
    <?php endwhile; ?>
	</div><!-- .page-content -->

</article><!-- #post-## -->

</div><!-- .content-area -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>