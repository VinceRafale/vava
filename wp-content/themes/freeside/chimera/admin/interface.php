<?php

function chimera_admin_menu()
{
	global $chimera_admin_path, $chimera_theme_path, $chimera_path;
	$shortname = get_option('chimera_shortname');
	$theme_options = get_option('chimera_theme_options');
	$theme_name = get_option('chimera_theme_name');
	chimera_reset_options();
	chimera_generate_menu();
}

function chimera_admin_head()
{
	global $chimera_admin_path;
	chimera_include_template($chimera_admin_path .'templates/head.php');
}
