<?php if ( is_active_sidebar(4) ) { ?>
<div id="outerfootersidebar">
    <div class="container">
        <div id="footersidebar" class="row"> 
                                
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(4) ) :  endif; ?>                      
        <div class="clear"></div>
                         
        </div>
    </div>
</div>
<?php } ?>