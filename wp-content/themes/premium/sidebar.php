<?php if ( is_active_sidebar(1) ) { ?>
<aside class="sidebar">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) :  endif; ?>
</aside>
<?php } ?>