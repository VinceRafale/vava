<?php get_header(); ?>

	<?php
    // Start Loop 
    while (have_posts()) : the_post();
    ?>

  <!-- Begin Wrapper -->
  <div class="wrapper">
    <div class="inner light">
      <div class="page-intro clearfix">
        <h1 class="page-title alignleft"><?php the_title(); ?></h1>
      </div>
      <div class="portfoliowide-bannercontainer">
        <div class="portfoliowide-banner">
          <ul>
          
          	<?php
			/* =============================================== */
			/* Get All Image Attachments from a post */
			/* =============================================== */
			$thumb_ID = get_post_thumbnail_id( $post->ID );
			$argsThumb = array(
				'order'          => 'ASC',
				'post_type'      => 'attachment',
				'post_parent'    => $post->ID,
				'post_mime_type' => 'image',
				'numberposts'	 =>	-1,
				'post_status'    => any,
				);
						 
			$attachments = get_posts($argsThumb);
			if ($attachments) {
			foreach ($attachments as $attachment) {
			?>
          
     <li data-transition="random"> <?php echo wp_get_attachment_image( $attachment->ID, 'portfolio-full' ) ?> </li>
            
            <?php } } ?>
            
            
            <?php if( vp_metabox('portfolio_option.portfolio_video') != '' ){ ?>
            <!-- Start Video -->
            <li data-transition="random">
			<div class="caption fade fullscreenvideo" data-autoplay="false" data-x="0" data-y="0" data-speed="300" data-start="200" data-easing="easeOutExpo">
            <?php echo vp_metabox('portfolio_option.portfolio_video'); ?>
              </div>
            </li>
            <!-- End Video -->
            <?php } ?>
            
            
          </ul>
          <div class="tp-bannertimer tp-bottom"></div>
        </div>
      </div>
      <section class="content">
        <?php the_content(); ?>
      </section>
      <div class="item-details">
        <ul class="item-info">
          <li><span class="lite1">Date:</span> <?php the_date('d / M / Y'); ?></li>
          <li><span class="lite1">Categories:</span><?php echo get_the_term_list($post->ID, 'portfolio', '', ', ', ''); ?></li>
          <?php if( vp_metabox('portfolio_option.client') != ''){ ?>
          <li><span class="lite1">Client:</span><?php echo vp_metabox('portfolio_option.client'); ?></li>
          <?php } ?>
        </ul>
        <?php if( vp_metabox('portfolio_option.client_link') != '' && vp_metabox('portfolio_option.client_link') != 'http://'){ ?>
        <a href="<?php echo vp_metabox('portfolio_option.client_link'); ?>" class="button" target="_blank">Launch Project</a> 
        <?php } ?>
        </div>
      <div class="clear"></div>
    </div>
    
    <div class="inner dark">
      <h3>Recent Posts</h3>
      <div class="grid-wrapper">
      <ul class="items">
      
      <?php $args = array( 'numberposts' => 4, 'order'=> 'DESC', 'post_type' => 'portfolio', 'exclude' => get_the_ID() );
			  $postslist = get_posts( $args );
			  foreach ($postslist as $post) :  setup_postdata($post);
		?>
      
        <li class="item">
        
          <div class="overlay">
          <a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" class="fancybox-media">
          <?php the_post_thumbnail('portfolio-fourcol'); ?>
          </a>
          </div>
          
          <div class="info">
            <h4 class="long-lined"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
            <p><?php content( '10' ); ?></p>
            <a href="<?php echo get_permalink(); ?>" class="more">View Details →</a> </div>
        </li>
        
        <?php wp_reset_query(); endforeach; ?>
        
      </ul>
      </div>
    </div>
  </div>
  <!-- End Wrapper --> 
  
  	<?php // End Loop
  	endwhile;
	?>
  
<?php get_footer(); ?>