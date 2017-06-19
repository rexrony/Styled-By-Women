<?php
/**
 * Template Name: Services Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header('inner'); ?>

<div id="primary" class="contentarea">
     <div class="container"> 
         <?php
    while ( have_posts() ) : the_post();
    the_content();
    endwhile;
    wp_reset_query();
    ?></div>  
         <br>
		     <div class="services-boxes col-md-12 noPadd">
            <?php
            $count = 1;
    $index_query = new WP_Query(array('post_type' => 'service_diff', 'posts_per_page' => 4, order => 'ASC')); ?>
   <?php while ($index_query->have_posts()) : $index_query->the_post(); ?>
   <div class="col-md-12 noPadd">
   <?php if($count == 2 || $count == 4 ){
    ?>
    <div class="clear"></div>
    <div class="col-md-6 noPadd serv-inner">
     <div class="heading-borders col-xs-6 ">
            <h2><?php the_title(); ?></h2>
        </div><!--.heading-borders-->
        <div class="clear"></div>
    <p><?php
        $cont = get_the_content();
        echo showBrief($cont, 90); ?></p>
    <!--- <p><a href="<?php the_permalink(); ?>">View Details &rarr;</a></p>--->
</div>
   <div id="<?php echo $count; ?>" class="col-md-6 noPadd serv-box-img"><?php the_post_thumbnail('full'); ?></div>


    <?php } else { ?>
<div id="<?php echo $count; ?>" class="col-md-6 noPadd serv-box-img"><?php the_post_thumbnail('full'); ?></div>
<div class="col-md-6 noPadd serv-inner">
     <div class="heading-borders col-xs-6 ">
            <h2><?php the_title(); ?></h2>
        </div><!--.heading-borders-->
        <div class="clear"></div>
    <p><?php
        $cont = get_the_content();
        echo showBrief($cont, 90); ?></p>
       <!--- <p><a href="<?php the_permalink(); ?>">View Details &rarr;</a></p>--->
</div>

<?php } ?>
</div>
<div class="clear"></div>
<?php 
$count++;
endwhile; ?>
        </div>

</div><!-- .content-area -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
