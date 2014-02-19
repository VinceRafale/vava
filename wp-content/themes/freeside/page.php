<?php get_header(); ?>

<div class="main_cont_wrap">
<div class="main_wrapper">
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		
		<div class="post" id="post-<?php the_ID(); ?>"<?php post_class(); ?>>
		
			<div class="entry">
				<?php the_content(); 
				      wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) );
				?>
			</div>

		</div> <!-- .post -->

		<?php endwhile; endif; ?>
</div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>