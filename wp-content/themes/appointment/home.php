<?php  get_header(); ?>
<?php get_template_part('index','slider'); ?>

<!-- Main_area -->
	<div class="container">
		<div class="row-fluid">
		<div class="span12 main_space">
			<!-- Main_content -->
			<div class="span8 appo_main_content">
			
			    	<?php 
				//run loop 
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array( 'post_type' => 'post','paged'=>$paged);
				query_posts( $args );
			
				
				
				while(have_posts()): the_post();		
			?>
			  <div class="row-fluid appo_blog">
			<?php get_template_part('content',get_post_format());  ?>
			    </div>
			<?php endwhile; ?>	
				<?php 
				global $wp_query;
				// post pagination
				$args = array(
	'base'         => add_query_arg( 'paged', '%#%' ),
	'format'       => '',
	'total'		   => $wp_query->max_num_pages,
	'current'      => 0,
	'show_all'     => true,
	'end_size'     => 1,
	'mid_size'     => 1,
	'prev_next'    => True,
	//'prev_text'    => __('� Previous'),
	//'next_text'    => __('Next �'),
	'type'         => 'list',
	'add_args'     => False,
	'add_fragment' => ''
); ?>
<?php if($wp_query->max_num_pages != 1 ):?>


   <?php    pagination();  endif;?>
				
</div><!--appo_main_content-->
<!-- sidebar section -->


	  <?php get_sidebar();?>	  


	</div>
</div>
</div>
	<!-- /Main_area -->	  


<?php get_footer(); ?>