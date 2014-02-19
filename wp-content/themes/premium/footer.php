<?php get_sidebar('footer'); ?>
  
  
  
  
  <!-- Begin Sub Footer Wrapper -->
  <div class="subfooter"> 
    <!-- Begin Inner -->
    <div class="inner">
      <p><?php echo vp_option('copyright'); ?> <a href="http://themesmarts.com/">Premium theme by ThemeSmarts</a></p>
      <ul class="social">
      
      	<?php if( vp_option('enablerss') == '1' ){ ?>
        <li><a href="<?php bloginfo('rss_url'); ?>"><i class="icon-s-rss"></i></a></li>
        <?php } ?>
        
        <?php if( vp_option('twitter') != '' ){ ?>
        <li><a href="<?php echo vp_option('twitter'); ?>"><i class="icon-s-twitter"></i></a></li>
        <?php } ?>
        
        <?php if( vp_option('facebook') != '' ){ ?>
        <li><a href="<?php echo vp_option('facebook'); ?>"><i class="icon-s-facebook"></i></a></li>
        <?php } ?>
        
        <?php if( vp_option('dribbble') != '' ){ ?>
        <li><a href="<?php echo vp_option('dribbble'); ?>"><i class="icon-s-dribbble"></i></a></li>
        <?php } ?>
        
        <?php if( vp_option('pinterest') != '' ){ ?>
        <li><a href="<?php echo vp_option('pinterest'); ?>"><i class="icon-s-pinterest"></i></a></li>
        <?php } ?>
        
        <?php if( vp_option('flickr') != '' ){ ?>
        <li><a href="<?php echo vp_option('flickr'); ?>"><i class="icon-s-flickr"></i></a></li>
        <?php } ?>
        
        <?php if( vp_option('vimeo') != '' ){ ?>
        <li><a href="<?php echo vp_option('vimeo'); ?>"><i class="icon-s-vimeo"></i></a></li>
        <?php } ?>
      </ul>
      <div class="clear"></div>
    </div>
    <!-- Begin Inner --> 
  </div>
  <!-- End Sub Footer Wrapper --> 
  
</div>
<!-- End Body Wrapper --> 
<?php wp_footer(); ?>
</body>
</html>