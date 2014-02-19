<?php if ( is_active_sidebar(1) ) { ?>
<div class="sidebar">
    <ul>
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) :  endif; ?>
                    
    </ul>
</div>
<?php } ?>