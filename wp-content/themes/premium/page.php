<?php get_header(); ?>

  <!-- Begin Wrapper -->
  <div class="wrapper">
    <div class="inner light">
      <div class="page-intro clearfix">
        <h1 class="page-title"><?php the_title(); ?></h1>
      </div>
      
      <?php // Start Loop
            while (have_posts()) : the_post();
							
				the_content();
								
			endwhile;
			// End Loop
	?>
    <div class="clear"></div>
      
    </div>
  </div>
  <!-- End Wrapper --> 
  
<?php get_footer(); ?>