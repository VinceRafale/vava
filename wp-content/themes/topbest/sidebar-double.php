<?php if ( is_active_sidebar(2) ) { ?>
<div class="sidebar">
    <ul>
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(2) ) :  endif; ?>
                    
    </ul>
</div>
<?php } ?>