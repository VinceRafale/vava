<?php get_header(); ?>

<div class="main_cont_wrap">
<div class="main_wrapper">
		<?php if(have_posts()) : while(have_posts()) : the_post(); $entry_img = get_post_meta($post->ID,'post_image', true); $entry_vid = get_post_meta($post->ID,'post_video', true);
		
			include('includes/blog_post.php');
		
		?>
		

			<div class="clear"></div>
		<?php endwhile; else:
		
				echo single_cat_title('<h3 style="color: #AEB3B7; padding: 20px 0; text-align: center;"><b style="color: #666;">') . " </b>doesn't contain any posts !</h3>";
		
		endif; ?>
		<div class="clear"></div>
		<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
</div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>