<div id="featured"><img src="<?php bloginfo('template_directory'); ?>/images/featured.png" alt="Featured Content" /></div>  
  <div class="slider-wrap">  
    <div id="main-photo-slider" class="csw">  
      <div class="panelContainer">  
<?php  
    $postcount = 0;  
    $featured_query = new WP_Query('showposts=5&cat=7');  
    while ($featured_query->have_posts()) : $featured_query->the_post();  
        $do_not_duplicate[] = get_the_ID();  
        $postcount++;  
?>  
    <div class="panel" title="Panel <?php echo $postcount; ?>">  
     <div class="wrapper">  
  
<?php  
// get the image filename  
$value_feat_img = get_post_custom_values("main");  
if (isset($value_feat_img[0])) { ?>  
<a rel="bookmark" href="<?php the_permalink(); ?>" title="Read <?php the_title(); ?>"><img class="frame" src="<?php $values = get_post_custom_values("main"); echo $values[0]; ?>" alt="<?php the_title(); ?>" />  
</a>  
  
<?php } ?>  
<div class="the_title"><a rel="bookmark" href="<?php the_permalink(); ?>" title="Read <?php the_title(); ?>"><?php the_title(); ?></a></div>  
</div><!-- end wrapper -->  
</div><!-- end panel -->  
<?php endwhile; ?>  
</div><!-- end panelContainer -->  
    </div><!-- end main photo slider -->  
	
  <div class="slide-thumb">  
<?php  
    $postcount = 0;  
    $featured_query = new WP_Query('showposts=5&cat=7');  
    while ($featured_query->have_posts()) : $featured_query->the_post();  
      $do_not_duplicate[] = get_the_ID();  
      $postcount++;  
?>  
  <?php   // get the image filename  
  $value_img = get_post_custom_values("main");  
    if (isset($value_img[0])) { ?>  
  <div class="cross-link active-thumb"><a href="#<?php echo $postcount; ?>" class="nav-thumb" title="<?php the_title(); ?>"><?php echo $postcount; ?></a>  
  </div>  
<?php } ?>  
<?php endwhile; ?>  
</div><!-- end slide-thumb -->  
</div><!-- end slider wrap -->  