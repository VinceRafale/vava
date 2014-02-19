<?php if ( is_active_sidebar(3) ) { ?>
<div class="sidebar">
    <ul>
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(3) ) :  endif; ?>
                    
    </ul>
</div>
<?php } ?>