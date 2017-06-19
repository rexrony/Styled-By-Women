<?php
/**
 * The template for the content bottom widget areas on posts and pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */


// If we get this far, we have widgets. Let's do this.
?>
<div class="sidbar-right col-md-12 noPadd">
    <h3>Latest Posts</h3>

<?php
 $argss = array(
	'numberposts' => 4,
	'order' => 'ASC',
	'post_type' => 'blog_posts'
);
	$recent_posts = wp_get_recent_posts($argss);
	foreach( $recent_posts as $recent ){
        ?>
     <div class="blog-post-right col-md-12 noPadd">
     <div class="blog-img-right col-md-4 noPadd">
        <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail(array(130,88)); ?></a>
     </div>
     <div class="blog-content-right col-md-8">
     <div class="post-title-right"><h4>
     <a href="<?php the_permalink(); ?>">
     <?php the_title(); ?></a></h4></div>
     <div class="post-date-right"><?php echo get_the_date( 'd M,Y' ); ?></div>
     </div>
 </div>
        <?php
		/*echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';*/
	}
	wp_reset_query();
?>
</div>
<div class="clear"></div>
<div class="sidbar-right col-md-12 noPadd">
    <h3>Tags</h3>
    <div class="clear"></div>
    <div class="tags-container">
    <ul>
    <?php 
 $terms = get_terms_per_post_type( 'post_tag', array( 'post_type' => 'blog_posts' ) );

foreach ( $terms as $term ) {
    echo "<li><a href='" . get_tag_link( $term->term_id ). "'>".$term->name."</a></li>";
}
    ?>
    </ul>
    </div>
</div>