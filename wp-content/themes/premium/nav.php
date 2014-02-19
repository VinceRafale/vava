<?php if( has_nav_menu('header_menu') ){ ?>

<nav id="menu" class="menu">
    <?php wp_nav_menu( array(
		  	'theme_location' => 'header_menu',
			'container' => 'false',
			'items_wrap' => '<ul id="tiny">%3$s</ul>',
	)); ?>
</nav>

<?php }else{ ?>

Please Setup your nav menu <a href="wp-admin/nav-menus.php" style="text-transform:uppercase;">Click here</a>

<?php } ?>