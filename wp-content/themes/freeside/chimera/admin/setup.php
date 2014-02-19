<?php

/**
 * Update theme specific variables
 */
$theme_data = get_theme_data(TEMPLATEPATH . '/style.css');
foreach ($theme_data as $theme_data_name => $theme_data_value)
{
	$theme_data_name = 'chimera_theme_'.strtolower($theme_data_name);
	update_option($theme_data_name, $theme_data_value);
	$GLOBALS[$theme_data_name] = $theme_data_value;
}

// Framework settins
$settings = include($chimera_admin_path . 'settings.php');

/**
 * Add default options and show Options Panel after activate
 */
if (is_admin() && isset($_GET['activated']) 
	&& $pagenow == "themes.php") 
{
	add_action('admin_head','chimera_options_setup');
	header('Location: ' 
		. admin_url() . 'admin.php?page=' . $settings['activation_slug']);
}

/**
 * Add default options and show Options Panel after reset
 */
if (is_admin() && isset($_GET['reset']) 
	&& $_GET['reset'] == 'true' 
	&& isset($_REQUEST['page']) 
	&& $_REQUEST['page'] == $settings['reset_slug']) 
{
	add_action('admin_head','chimera_options_setup');
	header('Location: ' 
		. admin_url() . 'admin.php?page=' . $settings['activation_slug']
		. '&reset=completed');
}

function chimera_options_setup ()
{
	$_options = array();
	add_option('chimera_theme_saved_options', $_options);
	$theme_options = get_option('chimera_theme_options');
	$theme_saved_options = get_option('chimera_theme_saved_options');
	
	foreach ($theme_options as $option)
	{
		if ($option['type'] != 'heading')
		{
			$id = $option['id'];
			$std = $option['std'];
			if (empty($theme_saved_options[$id]))
			{
				if(is_array($option['type'])) 
				{
					foreach($option['type'] as $child)
					{
						$id = $child['id'];
						$std = $child['std'];
						update_option($id, $std);
						$_options[$id] = $std; 
					}
				} else {
					update_option($id, $std);
					$_options[$id] = $std;
				}
			}
			else
			{
				$_options[$id] = $theme_saved_options[$id];
			}
		}
	}
	update_option('chimera_theme_saved_options', $_options);
}
