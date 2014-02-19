<?php 

/*
Template Name: Page Left Sidebar 
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

			</div>
		
		</div>
		
	</div>
		
</div>
	
<div id="innerPage">
	
	<div id="innerTop">
			
		<div class="page-tagline">
			
			<div class="page-tagline-text">
				<h3><?php echo $page_title; ?></h3>
			</div>
			
		</div>		
		
	</div>

	<div class="innerContent">
	
		<div class="content">
		
			<!-- Content -->		
			
		<div id="blog-right">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<?php the_content(); ?>		
					
		<?php endwhile; endif; ?>
	  
		</div>
		
		<div id="leftsidebar">
			<div id="leftsidebar-top"></div>
				
				<div id="leftsidebar-content">
				<?php get_sidebar('pages'); ?>
				</div>
				
			<div id="leftsidebar-bottom"></div>
		</div>
	  
			<!-- End Content -->
		</div>
	  
	</div>
	
</div>	

<?php get_footer(); ?>