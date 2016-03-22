<?php
/**
 * Template Name: Misc Cupcakes Template
 *
 * @package cupcakess
 **/


get_header(); ?>

<div class="main-page-wrap">
<?php
	$args = array('posts_per_page' => 15, 'order' => 'ASC' );
	$my_query = new WP_Query($args);
	$my_query = new WP_Query( 'cat=6' );
?>

<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
	<div class="main-page-posts">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h2 class="post-title"><?php the_title(); ?></h2>
	<div class="entry-content">
	
<?php if ( has_post_thumbnail() ) : ?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	<img src="<?php the_post_thumbnail_url(); ?>" width="300" height="200"/>
	</a>
<?php endif; ?>
	</div>
	</div>
	</article><!-- #post-## -->
<?php endwhile; endif; ?>
</div>


</div>

<?php get_footer(); ?>