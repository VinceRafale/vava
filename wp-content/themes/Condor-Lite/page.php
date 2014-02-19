<?php

/*
 The main template for page.
*/

$page = get_page($post->ID);
$current_page_id = $page->ID;

get_header(); 

?>

			</div>
		
		</div>
		
	</div>
		
</div>
	
<div id="innerPage">
	
	<div id="innerTop">
			
		<div class="page-tagline">
			
			<div class="page-tagline-text">
				<h3><?php the_title(); ?></h3>
			</div>	
			
		</div>		
		
	</div>

	<div class="innerContent">
	
		<div class="content">
		
			<!-- Content -->
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<?php the_content(); ?>
					
				<?php endwhile; endif; ?>
			
			<!-- End Content -->
		</div>
	  
	</div>
	
</div>	
			
	
<?php get_footer(); ?>