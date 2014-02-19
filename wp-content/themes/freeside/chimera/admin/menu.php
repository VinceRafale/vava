<?php

return array(
	array(
		'page_title' 	=> 'Chimera Themes',
		'menu_title' 	=> 'Chimera Themes',
		'capabilaty' 	=> 8,
		'menu_slug' 	=> 'chimerathemes',
		'type' 			=> 'menu',
		'function' 		=> 'chimera_include_template_for_selected_menu',
		'template' 		=> $chimera_admin_path .'templates/default.php',
		'icon_url'		=> null,
		'position'		=> null,
	),
    array(
		'page_title' 	=> 'Theme Options &#8212; Chimera Themes',
		'menu_title' 	=> 'Theme Options',
		'capabilaty' 	=> 8,
		'parent_slug'	=> 'chimerathemes',
		'menu_slug' 	=> 'chimerathemes',
		'type' 			=> 'submenu',
		'function' 		=> 'chimera_include_template_for_selected_menu',
		'template' 		=> $chimera_admin_path .'templates/default.php',
	),

);
