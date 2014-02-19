<?php

/*
 The main template file for display single post page.
*/

$page = get_page($post->ID);
$current_page_id = $page->ID;

$post_layout = get_post_meta($current_page_id, 'post_layout', true);

get_header(); 

?>

<?php

if (have_posts()) : while (have_posts()) : the_post();
?>
			
		</div>

	</div>
		
</div>

<div id="innerPage">
	
	<div id="innerTop">
			
		<div class="page-tagline">
			
			<div class="page-tagline-text">
				<h3>You are reading: <?php the_title(); ?></h3>
			</div>
			
		</div>		
		
	</div>

	<div class="innerContent">
	
		<div class="content">
		
			<!-- Content -->
			
			<div id="blog">

				<!-- Begin each blog post -->
				<div class="blog_post">
										
					<div class="blog_post_meta">
						<span class="date"><?php the_time('j') ?></span>
				        <span class="month"><?php the_time('M') ?></span>
				    </div>				
							
					<div class="blog_post_title">
						<span><?php the_title(); ?></span>	
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
				                   
				    <?php echo the_content(); ?>
					
					<div class="divider"></div>
							
					<div id="share-post">	
					
					    <div class="read-more" style="margin-top: 7px;"><h4>Share This</h4></div>
								
						<div id="share_this_icons"> 
									
							<a href="<?php bloginfo('rss2_url'); ?>" title="Subscribe to our RSS feed." target="_blank">
								<span id="share_this_icons_rss">rss</span>
							</a>
								 
							<a href="http://stumbleupon.com/submit?url=<?php the_permalink() ?>&title=<?php echo urlencode(the_title('','', false)) ?>" target="_blank">
								<span id="share_this_icons_stumbleupon">stumbleupon</span>
							</a>
								 
							<a href="http://www.reddit.com/submit" onclick="window.open('http://www.reddit.com/submit?url=' +encodeURIComponent('<?php the_permalink() ?>')+'&title='+encodeURIComponent('<?php the_title() ?>'),'reddit', 'toolbar=no,width=550,height=550'); return false">
								<span id="share_this_icons_reddit">reddit</span>
							</a>
							
							<a href="http://digg.com/submit?phase=2&amp;url=<?php the_permalink() ?>&amp;title=<?php echo urlencode(the_title('','', false)) ?>" target="_blank">
								<span id="share_this_icons_diig">diigo</span>
							</a>
								 
							<a href="http://delicious.com/save" onclick="window.open('http://delicious.com/save?v=5&noui&jump=close&url='+encodeURIComponent('<?php the_permalink() ?>')+'&title='+encodeURIComponent('<?php the_title() ?>'),'delicious', 'toolbar=no,width=550,height=550'); return false;">
								<span id="share_this_icons_delicious">delicious</span>
							</a>
							
							<a href="http://www.facebook.com/sharer.php" onclick="window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent('<?php the_permalink() ?>')+'&amp;amp;t='+encodeURIComponent('<?php the_title() ?>'),'facebook', 'toolbar=no,width=550,height=350'); return false;">
								<span id="share_this_icons_facebook">facebook</span>
							</a>
							
							<a href="http://twitter.com/home/?status=<?php the_title(); ?> : <?php echo get_tiny_url(get_permalink($post->ID)); ?>" title="Tweet this!" target="_blank">
								<span id="share_this_icons_twitter">twitter</span>
							</a>
								
						</div>
						
					</div>	
					
					<div class="divider"></div>
				                    
				</div>
				
				<!-- End each blog post -->

				<?php comments_template( '' ); ?>
						
				<?php endwhile; endif; ?>
				
				</div>
					
				<div id="sidebar">
					<div id="sidebar-top"></div>
									
						<div id="sidebar-content">
							<?php get_sidebar('blog'); ?>
						</div>
									
					<div id="sidebar-bottom"></div>
				</div>
				
			</div>	
	  
			<!-- End Content -->
		</div>
	  
	</div>
	
</div>		

<?php get_footer(); ?>