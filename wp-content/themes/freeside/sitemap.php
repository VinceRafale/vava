<?php get_header();
	/*
	
	Template Name: Sitemap Template
	
	*/
?>
<div class="main_cont_wrap">
<div class="main_wrapper">

		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		
		<div class="post" id="post-<?php the_ID(); ?>">
		
			<div class="entry">
				<h2><?php _e( 'Pages', 'chimera' ); ?></h2>
					<ul class="arrowlist"><?php wp_list_pages('title_li=' ); ?></ul>
					<div class="divider"></div>

				<h2><?php _e( 'Feeds', 'chimera' ); ?></h2>
					<ul class="arrowlist">
						<li><a title="<?php _e( 'Main RSS', 'chimera' ); ?>" href="feed:<?php bloginfo('rss2_url'); ?>"><?php _e( 'Main RSS', 'chimera' ); ?></a></li>
						<li><a title="<?php _e( 'Comment Feed', 'chimera' ); ?>" href="feed:<?php bloginfo('comments_rss2_url'); ?>"><?php _e( 'Comment Feed', 'chimera' ); ?></a></li>
					</ul>	
					<div class="divider"></div>

				<h2><?php _e( 'Categories', 'chimera' ); ?></h2>
					<ul class="arrowlist"><?php wp_list_categories('sort_column=name&optioncount=1&hierarchical=0&feed=RSS'); ?></ul>
					<div class="divider"></div>

				<h2><?php _e( 'All internal blog posts:', 'chimera' ); ?></h2>

						<ul class="arrowlist"><?php $archive_query = new WP_Query('showposts=1000');
							while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
								<li>
									<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to ', 'chimera' ); ?><?php the_title(); ?>"><?php the_title(); ?></a> 
								 (<?php comments_number('0', '1', '%'); ?>)
								</li>
							<?php endwhile; ?>
						</ul>

					<div class="divider"></div>

				<h2><?php _e( 'Archives', 'chimera' ); ?></h2>
					<ul class="arrowlist">
						<?php wp_get_archives('type=monthly&show_post_count=true'); ?>
					</ul>
			</div>
		
		</div> <!-- .post -->

		<?php endwhile; endif; ?>
	</div>
	<?php get_sidebar(); ?>
	</div>
	<?php get_footer(); ?>