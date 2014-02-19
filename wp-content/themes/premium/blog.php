<?php /* Template Name: Blog */ ?>
<?php get_header(); ?>
 
  <!-- Begin Wrapper -->
  <div class="wrapper">
    <div class="inner light">
      <div class="page-intro clearfix">
        <h1 class="page-title alignleft"><?php the_title(); ?></h1>
      </div>
      
      <!-- Begin Blog -->
      <section class="content full">
      
        <?php
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array(
		'orderby'  => 'date',
		'order'    => 'DESC',
		'paged'	   => $paged
		);
								
		query_posts($args);
		while ( have_posts() ) : the_post(); 
		?>
      
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
          <div class="overlay">
          	<a href="<?php echo get_permalink(); ?>">
            <?php the_post_thumbnail('blog-post'); ?>
            </a>
            </div>
            
          <div class="post-content">
            <h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
            
            <div class="meta">
            <span class="date"><?php the_time('d M Y') ?></span>
            <span class="tags"><?php the_category(', '); ?></span>
            <span class="comments"><?php comments_number() ?></span>
            </div>
            
            <p><?php content('50'); ?></p>
            
            <a href="<?php echo get_permalink(); ?>" class="more">Continue reading →</a>
          </div>
          <div class="clear"></div>
        </div>
        
        <?php endwhile; ?>
        
        <!-- Begin Page Navi -->
        <div class="page-navi">
          <?php pagination(); ?>
        </div>
        <!-- End Page Navi --> 
        
      </section>
      <!-- End Blog --> 
      
      <!-- Begin Sidebar -->
      <?php get_sidebar(); ?>
      <!-- End Sidebar -->
      
      <div class="clear"></div>
    </div>
  </div>
  <!-- End Wrapper --> 
  
<?php get_footer(); ?>