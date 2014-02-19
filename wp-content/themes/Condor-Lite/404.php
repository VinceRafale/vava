<?php 

/*
 Template Name: Error 404
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
				<h4>Page not found</h4>
			</div>
			
		</div>		
		
	</div>

	<div class="innerContent">
	
		<div class="content">
		
			<!-- Content -->
			<div class="full">
				<span class="error404">404</span>
			</div>
				
			<div class="center"><h4>Ooops, you've encountered an error</h4></div>
			<div class="center"><h4>The page you were looking for doesn't exist.</h4></div>
			<div class="divider"></div>
			<div class="read-more" style="margin-left: 448px; margin-top: 20px; margin-bottom: 100px;"><a href="<?php bloginfo('wpurl'); ?>"><span><span>HOME</span></span></a></div>
			<div class="divider"></div>			
			
		</div>
	  
	</div>
	
</div>	

<?php get_footer(); ?>