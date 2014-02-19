<?php get_header(); ?>

<div class="main_cont_wrap">
<div class="main_wrapper">
		
		<div class="post" id="<?php the_ID(); ?>">
		
			<div class="entry">
				<h2><?php _e( 'Uh, oh !', 'chimera' ); ?></h2>

				<p><?php _e( 'Looks like the page you\'re looking for isn\'t here anymore.', 'chimera' ); ?></p>

				<?php get_search_form(); ?>

				<div class="divider"></div>

				<h2><?php _e( 'Pages'); ?></h2>
					<ul class="arrowlist"><?php wp_list_pages('title_li=' ); ?></ul>
					<div class="divider"></div>

				<h2><?php _e( 'Feeds'); ?></h2>
					<ul class="arrowlist">
						<li><a title="<?php _e( 'Main RSS', 'chimera' ); ?>" href="feed:<?php bloginfo('rss2_url'); ?>"><?php _e( 'Main RSS', 'chimera' ); ?></a></li>
						<li><a title="<?php _e( 'Comment Feed', 'chimera' ); ?>" href="feed:<?php bloginfo('comments_rss2_url'); ?>"><?php _e( 'Comment Feed', 'chimera' ); ?></a></li>
					</ul>	
					<div class="divider"></div>

				<h2><?php _e( 'Categories'); ?></h2>
					<ul class="arrowlist"><?php wp_list_categories('sort_column=name&optioncount=1&hierarchical=0&feed=RSS'); ?></ul>
					<div class="divider"></div>

				<h2><?php _e( 'All internal blog posts:'); ?></h2>

						<ul class="arrowlist"><?php $archive_query = new WP_Query('showposts=1000');
							while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
								<li>
									<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to ', 'chimera' ); ?><?php the_title(); ?>"><?php the_title(); ?></a> 
								 (<?php comments_number('0', '1', '%'); ?>)
								</li>
							<?php endwhile; ?>
						</ul>

			</div>

		</div> <!-- .post -->

</div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>