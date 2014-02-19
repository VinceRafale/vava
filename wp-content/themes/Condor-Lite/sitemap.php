<?php 

/*
Template Name: Sitemap
*/

$page = get_page($post->ID);
$current_page_id = $page->ID;

$page_slider = get_post_meta($current_page_id, 'page_slider', true);
$page_tagline_text = get_post_meta($current_page_id, 'page_tagline_text', true);
$page_title = get_post_meta($current_page_id, 'page_title', true);

$page_tagline_button_text = get_post_meta($current_page_id, 'page_tagline_button_text', true);
$page_tagline_button_link = get_post_meta($current_page_id, 'page_tagline_button_link', true);

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

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			</div>
		
		</div>
		
	</div>
		
</div>
	
<div id="innerPage">
	
	<div id="innerTop">
			
		<div class="page-tagline">
			
			<div class="page-tagline-text">
				<h4><?php the_title(); ?></h4>
			</div>
			
			<?php

			if(!empty($page_tagline_button_text))
				{
					if(empty($page_tagline_button_text))
					{
						$page_tagline_button_text = 'PORTFOLIO';
						$page_tagline_button_link = '#';
					}	
			?>
			
			<div class="page-tagline-button">
				<div class="tagline-button"><a href="<?php echo $page_tagline_button_link; ?>"><span><span><?php echo $page_tagline_button_text; ?></span></span></a></div>
			</div>
			
			<?php
				} //end if hide tagline button
			?>
			
		</div>		
		
	</div>

	<div class="innerContent">
	
		<div class="content">
		
			<!-- Content -->		
			
		<div id="blog">
	  
			<div class="sitemap">
				<ul><?php wp_list_pages("title_li=" ); ?></ul>
			</div>
					
			<?php endwhile; endif; ?>
	  
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