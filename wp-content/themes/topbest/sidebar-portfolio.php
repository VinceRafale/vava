<?php if ( is_active_sidebar(5) ) { ?>
<div class="sidebar">
    <ul>
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(5) ) :  endif; ?>              
    </ul>
</div>
<?php } ?>