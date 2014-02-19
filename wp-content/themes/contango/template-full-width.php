<?php 
/*
Template Name: Full Width Template
*/

/** Header */
get_header();
?>

<?php get_template_part( 'loop-meta' ); ?>
  
<div class="container_16 clearfix">
  
  <div class="grid_16">
    <div id="content">    
    
    <?php contango_breadcrumbs(); ?>

    <?php if ( have_posts() ) : ?>
      
        <?php while ( have_posts() ) : the_post(); ?>
        
          <?php get_template_part( 'content', 'page' ); ?>
        
        <?php endwhile; ?>
      
      <?php else : ?>
                  
        <?php get_template_part( 'loop-error' ); ?>
      
      <?php endif; ?>
      
    </div>
  </div>

</div>