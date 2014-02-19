<?php 

/*
Template Name: Homepage
*/

get_header(); ?>
<!-- this is index.php -->
					<div class="nivo-slider">
						<div id="nivoSlider">
				        
				            <div id="slider" class="nivoSlider">
							
								<?php $my_query = new WP_Query('showposts=20&post_type=nivo_slider_img'); while ($my_query->have_posts()) : $my_query->the_post(); 
					
								// check for page title
								$link = get_post_meta($post->ID, 'link', $single = true);
								
								?>
								
									<?php // if there's a title
									if($link !== '') { ?>
										<a href="<?php echo $link; ?>" title="<?php the_title(); ?>" >	
									<?php } // end if statement

									// if there's not a title
									else { echo ''; } ?>
								
									<?php the_post_thumbnail('nivoimage'); ?>
									</a>
									
								<?php endwhile; ?>	
						
				            </div>
							
							
				        </div>
				    </div>
			
			</div>
		
		</div>
		
	</div>
		
</div>
	
<div id="innerPage">
	
	<div id="innerTop">
			
		<div class="page-tagline">
			
			<div class="page-tagline-text">
				<h3><?php bloginfo('name'); ?> <?php wp_title(); ?></h3>
			</div>
			
		</div>
			
	</div>

	<div class="innerContent">
	
		<div class="content">
		
			<!-- Content -->

			<div id="blog">
		
			<?php //query_posts('paged='.$paged);
				$temp = $wp_query;
				$wp_query= null;
				$wp_query = new WP_Query();
				$wp_query->query('showposts=3'.'&paged='.$paged);
			?>    

			<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
		  
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
					
			<?php pagination(); ?>
					
			<?php $wp_query = null; $wp_query = $temp;?>
		  <?php include "plugins/core.php"; ?>
			</div>
			
			<div id="sidebar">
				<div id="sidebar-top"></div>
					
					<div id="sidebar-content">
					<?php get_sidebar('blog'); ?>
					</div>
					
				<div id="sidebar-bottom"></div>
			</div>
			
			<!-- End Blog -->
		
		</div>
	  
	</div>
	
</div>	
<?php get_footer(); ?>