<?php get_header();
	/*
	
	Template Name: Full Width Template
	
	*/
?>
<div class="main_cont_wrap2">

		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		
		<div class="post" id="<?php the_ID(); ?>">
		
			<div class="entry">
				<?php the_content(); 
				wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) );
				?>
			</div>
		
		</div> <!-- .post -->

		<?php endwhile; endif; ?>

</div>
<?php get_footer(); ?>