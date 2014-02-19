<?php 

/*
The main template file for display categories
*/

get_header(); ?>
<!-- this is index.php -->

			<div id="top_social_media">
					
					<?php
						$wpcrown_sm_facebook = get_option('wpcrown_sm_facebook');
									
						if(!empty($wpcrown_sm_facebook))
						{
						?>
						<div class="social_media"><a href="<?php echo $wpcrown_sm_facebook; ?>"><span class="sm_facebook">facebook</span></a></div>
						<?php
						} 		
					?>
						
					<?php
						$wpcrown_sm_twitter = get_option('wpcrown_sm_twitter');
									
						if(!empty($wpcrown_sm_twitter))
						{
						?>
						<div class="social_media"><a href="<?php echo $wpcrown_sm_twitter; ?>"><span class="sm_twitter">twitter</span></a></div>
						<?php
						} 		
					?>
						
					<?php
						$wpcrown_sm_linkedin = get_option('wpcrown_sm_linkedin');
									
						if(!empty($wpcrown_sm_linkedin))
						{
						?>
						<div class="social_media"><a href="<?php echo $wpcrown_sm_linkedin; ?>"><span class="sm_linkedin">linkedin</span></a></div>
						<?php
						} 		
					?>
					
					<?php
						$wpcrown_sm_email = get_option('wpcrown_sm_email');
									
						if(!empty($wpcrown_sm_email))
						{
						?>
						<div class="social_media"><a href="<?php echo $wpcrown_sm_email; ?>"><span class="sm_email">linkedin</span></a></div>
						<?php
						} 		
					?>
						
					<?php
						$wpcrown_sm_rss = get_option('wpcrown_sm_rss');
									
						if(!empty($wpcrown_sm_rss))
						{
						?>
						<div class="social_media"><a href="<?php echo $wpcrown_sm_rss; ?>"><span class="sm_rss">rss</span></a></div>
						<?php
						} 		
					?>
						
				</div>
				
				<div class="searchForm">
					<form method="get" id="search_block" action="<?php bloginfo('url'); ?>" >
						<div>
							<label for="search_field_block" class="auto_clear">Type and press enter</label>
							<!-- end auto clear label -->
									
							<input type="text" name="s" id="search_field_block" />
							<!-- end search field -->
									
							<input type="submit" id="search_submit_block" value="" />
						</div>	
						<!-- end search submit -->
					</form>
				</div>
			
			</div>

		</div>
		
	</div>
		
</div>
	
<div id="innerPage">
	
	<div id="innerTop">
			
		<div class="page-tagline">
			
			<div class="page-tagline-text">
				<h4>Category | <?php
							printf( __( ' %s', '' ), '' . single_cat_title( '', false ) . '' );
						?>
				</h4>
			</div>
			
		</div>		
		
	</div>

	<div class="innerContent">
	
		<div class="content">
		
			<!-- Content -->		
			
		<div id="blog">
		
		<?php

		global $more; $more = false; # some wordpress wtf logic

			$cat_id = get_cat_ID(single_cat_title('', false));
			if(!empty($cat_id))
			{
				$query_string.= '&cat='.$cat_id;
			}

		query_posts($query_string . '&showposts=5');

		if (have_posts()) : while (have_posts()) : the_post();

		?>
	  
			<div class="blog_post">
										
				<div class="blog_post_meta">
					<span class="date"><?php the_time('j') ?></span>
			        <span class="month"><?php the_time('M') ?></span>
			    </div>				
						
				<div class="blog_post_title">
					<span><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></span>	
				</div>
				
				<div class="blog_post_metadata">
					<div class="main-hr full"></div>
					
					<span class="post_info">by <?php the_author_posts_link(); ?> in <?php the_category(', ') ?> | <?php comments_number('No Comments', 'One Comment', '% Comments'); ?></span>
				</div>
						
				<?php if ( has_post_thumbnail() ) { ?>
					
					<div class="post-thumb">
						<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('blog_post_thumb'); ?></a>
					</div>
							
				<?php } else { 
					// the current post lacks a thumbnail
				} ?>
			                   
			    <p><?php echo wpcrown_substr(strip_tags(strip_shortcodes($post->post_content)), 290); ?></p>
						
			    <div class="read-more" style="margin-top: 8px;"><a href="<?php the_permalink() ?>"><span><span>READ MORE</span></span></a></div>
						
				<div class="share-post" style="margin-right: 0;"> 
							
					<div class="social_media"><a href="http://www.facebook.com/sharer.php" onclick="window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent('<?php the_permalink() ?>')+'&amp;amp;t='+encodeURIComponent('<?php the_title() ?>'),'facebook', 'toolbar=no,width=550,height=350'); return false;"><span class="sm_facebook">facebook</span></a>
							</div>
							
					<div class="social_media"><a href="http://twitter.com/home/?status=<?php the_title(); ?> : <?php echo get_tiny_url(get_permalink($post->ID)); ?>" title="Tweet this!" target="_blank"><span class="sm_twitter">twitter</span></a>
					</div>
							
					<div class="social_media"><a href="<?php bloginfo('rss2_url'); ?>" title="Subscribe to our RSS feed." target="_blank"><span class="sm_rss">rss</span></a>
					</div>
						
				</div>
				
				<div class="post-shadow"></div>
			                    
			</div>
      
		<?php endwhile; ?>
			
		<?php endif; ?>
				
		<?php pagination(); ?>
	  
		</div>
		
		<div id="sidebar">
			<div id="sidebar-top"></div>
				
				<div id="sidebar-content">
				<?php get_sidebar('blog'); ?>
				</div>
				
			<div id="sidebar-bottom"></div>
		</div>
	  
			<!-- End Content -->
		</div>
	  
	</div>
	
</div>	

<?php get_footer(); ?>