<?php /* Template Name: Portfolio Four Column */ ?>
<?php get_header(); ?>
  
  
  
  
  <!-- Begin Wrapper -->
  <div class="wrapper">
    <div class="inner dark">
      <div class="page-intro clearfix">
        <h1 class="page-title"><?php the_title(); ?></h1>
      </div>
      
      <div id="portfolio">
      
        <ul class="filter">
          <li><a class="active" href="#" data-filter="*">All</a></li>
          <?php
			$terms = get_terms("portfolio");
			$count = count($terms);
				if ( $count > 0 ){
					foreach ( $terms as $term ) {
						echo '<li><a href="#" data-filter=".'.$term->name.'">'.$term->name.'</a></li>';					
					}
				}
			?>
        </ul>
        <ul class="items col4">
        
        <?php $args = array( 'numberposts' => -1, 'order'=> 'DESC', 'post_type' => 'portfolio');
			  $postslist = get_posts( $args );
			  foreach ($postslist as $post) :  setup_postdata($post);
							
			  $terms = get_the_terms( $post->ID, 'portfolio' );					
			      if ( $terms && ! is_wp_error( $terms ) ) : 
			  $term_links = array();
				  foreach ( $terms as $term ) {
			  $term_links[] = $term->name;
				  }					
			  $the_term = join( " ", $term_links );
		?>
        
          <li class="item <?php echo $the_term; ?>">
          
            <div class="overlay">
            <a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" class="fancybox-media">
            <?php the_post_thumbnail('portfolio-fourcol'); ?>
            </a>
            </div>
            
            <div class="info">
              <h4 class="long-lined"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
              <p><?php content( '10' ); ?></p>
              <a href="<?php echo get_permalink(); ?>" class="more">View Details →</a>
            </div>
              
          	</li>
          
          <?php endif; ?>
          <?php wp_reset_query(); endforeach; ?>
          
        </ul>
      </div>
    </div>
  </div>
  <!-- End Wrapper --> 
  
<?php get_footer(); ?>