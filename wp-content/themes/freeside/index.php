<?php get_header(); ?>

<?php if (get_option('chimera_homepage_content_top') != 'None') { ?>

<?php echo chimera_get_page_content(get_option('chimera_homepage_content_top'));

	echo '<div class="break"></div>';

} ?>
<?php if ( get_option('chimera_frontpage_blog_section') != 'false' ) { ?>
<div class="main_wrapper">
	<h3 class="section_title home_section">
			<?php echo get_option('chimera_frontpage_blog_title'); ?>
			<a class="home-rss" href="<?php bloginfo('url'); ?>?cat=<?php echo $cat_id;?>&amp;feed=rss2" title="<?php echo $frontpage_categories; ?> Feed"></a>
	</h3>
			<?php						
					if(have_posts()) :
						
						$cat_id = get_option('chimera_frontpage_category');
						
						$frontpage_entries = get_option('chimera_frontpage_entries');
	
						$the_query2 = new WP_Query('cat=' . $cat_id . '&showposts=' . $frontpage_entries . '&orderby=post_date&order=desc');

									$counter = 0;
									$counter2 = 0;
									while ($the_query2->have_posts()) : $the_query2->the_post();
										$counter++;
										$counter2++;
										$entry_img = get_post_meta($post->ID,'post_image', true);
										$entry_vid = get_post_meta($post->ID,'post_video', true);	
								
							include('includes/blog_post.php');

			?>

						<?php endwhile;	else:	?>

					<div class="post highlight">
						<?php _e( 'There are no blog posts', 'chimera' ); ?>
						<div class="clear"></div>
					</div>

				<?php	endif;	?>

								</div>
								<div class="main_sidebar">
									<?php if ( !function_exists('register_sidebar') || !dynamic_sidebar("homepage_widgets") ) : ?><?php endif; ?>
								</div>
			<?php } ?>
								<div class="clear"></div>




<?php echo chimera_get_page_content(get_option('chimera_homepage_content_bottom')); ?>

<?php get_footer(); ?>