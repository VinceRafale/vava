<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package  Business & Finance Theme
 */
?>

<div id="page-box">
<header class="entry-header">
		<h1 class="entry-title widthfix"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->
	
<div id="page-content" class="widthfix justified">
<article id="post-<?php the_ID(); ?>" <?php post_class('left'); ?>>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<footer class="entry-meta text-left">
		<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
 <?php get_sidebar(); ?>
 <div class="clearfix"></div>
</div><!-- #page-content -->
</div><!-- #page-box -->