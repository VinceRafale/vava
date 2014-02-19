<?php get_header(); ?>

  <!-- Begin Wrapper -->
  <div class="wrapper">
    <div class="inner light">
      <div class="page-intro clearfix">
        <h1 class="page-title alignleft">Blog</h1>
      </div>
      
      <!-- Begin Blog -->
      <section class="content full">
      <?php while (have_posts()) : the_post(); ?>
      	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
          <?php if( has_post_thumbnail() ){ ?>
          <div class="overlay"><?php the_post_thumbnail('blog-post'); ?></div>
          <?php } ?>
          
          <div class="post-content">
            <h2><?php the_title(); ?></h2>
            
            <div class="meta">
            <span class="date"><?php the_time('d M Y') ?></span>
            <span class="tags"><?php the_category(', '); ?></span>
            <span class="comments"><?php comments_number() ?></span>
            </div>
            
            <!-- Start Content -->
            <?php the_content(); ?>
            <?php wp_link_pages(); ?>
            <!-- End Content -->
            
          </div>
          <div class="clear"></div>
        </div>
        
      
        
        <!-- Begin Comments -->
        <?php comments_template(); ?>
        <!-- End Comments -->
         
      <?php endwhile; ?>
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