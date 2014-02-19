<?php get_header();
	/*
	
	Template Name: Search Results
	
	*/
?>

<div class="main_cont_wrap">
<div class="main_wrapper">		
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="post" id="post-<?php the_ID(); ?>">
		<h2 id="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to ', 'chimera' ); ?><?php the_title(); ?>"><?php the_title(); ?></a></h2>
	</div>
<?php endwhile; endif; ?>
</div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>