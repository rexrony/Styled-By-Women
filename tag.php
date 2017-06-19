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
<div class="featuredimg-container col-md-12 noPadd">
    <?php echo get_the_post_thumbnail(9);  ?>
    <div class="clear"></div>
    <div class="heading-title">
        <div class="container"><h2><?php the_title(); ?></h2></div>
    </div>
</div>
<div class="clear"></div>

<div id="primary" class="contentarea">

	<main id="main" class="container" role="main">
	<h1>Tag: <?php //single_tag_title();       
        $title_tag = single_tag_title("",false);
        echo $title_tag;
        ?></h1>
	<div class="left-section col-md-8 noPadd">
		<?php $index_query = new WP_Query(array('post_type' => 'blog_posts','tag' => $title_tag, 'order' => 'ASC')); ?>
 <?php while ($index_query->have_posts()) : $index_query->the_post(); ?>
 <div class="blog-post col-md-12 noPadd">
     <div class="blog-img col-md-6">
         <?php the_post_thumbnail(array(370,242),true); ?>
     </div>
     <div class="blog-content col-md-6 rht noPadd">
     <div class="post-date"><?php echo get_the_date( 'd M,Y' ); ?></div>
     <div class="post-title"><h3><?php the_title(); ?></h3></div>
     <div class="post-text"><?php 
         $text = get_the_content();
        echo showBrief($text,50);
         ?></div>
         <div class="blog-readmore lft"><a href="<?php the_permalink(); ?>">Read More</a></div>
     </div>
 </div>
 <?php endwhile; ?>
</div>
	</main><!-- .site-main -->

</div><!-- .content-area -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
