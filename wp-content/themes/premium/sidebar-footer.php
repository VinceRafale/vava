<?php if ( is_active_sidebar(2) ) { ?>

  <!-- Begin Footer Wrapper -->
  <footer> 
    <!-- Begin Inner -->
    <div class="inner">
        
	      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(2) ) :  endif; ?>  
        
      <div class="clear"></div>
    </div>
    <!-- Begin Inner --> 
  </footer>
  <!-- End Footer Wrapper -->
  
<?php } ?>