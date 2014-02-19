<?php

		$disabled = isset($__option['disabled']) ? 
			$__option['disabled'] : null;
if (is_admin())
{
    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('jquery-ui-tabs');
    wp_enqueue_script('jquery-ui-sortable');
}

function chimera_get_image_path($src) {
    global $blog_id;
    if(isset($blog_id) && $blog_id > 0) {
        $imageParts = explode('/files/' , $src);
        if(isset($imageParts[1])) {
            $src = dirname($imageParts[0]) 
                . '/wp-content/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
        }
    }
    return $src;
}

function chimera_get_files($path)
{
	global $chimera_path;
	$theme_path = dirname($chimera_path);
	$path = ltrim($path, '/');
	$path = rtrim($path, '/');
	$path = $theme_path . '/' . $path . '/';
	$tmp = glob($path . '*.*');
	$files = array();
	if (is_array($files)) 
	{
		foreach($tmp as $filename)
		{
			$filename = basename($filename);
			$files[$filename] = $filename;
		}
	}
	return $files;
}

function chimera_theme_version_checker()
{
	global $chimera_admin_path;
	$settings = include($chimera_admin_path . 'settings.php');
	$latest_version = get_option('chimera_theme_version');
	$latest_version_via_rss = 0 ;
	$rss = fetch_feed($settings['update_feed_prefix'] 
		. get_option('chimera_theme_name') 
		. $settings['update_feed_sufix']);
	if (is_wp_error($rss))
	{
		$error_code = $rss->get_error_code();
		$error_message = $rss->get_error_message();
		include($chimera_admin_path . '/templates/update_notifier_failed.php');
		return;
	}
	$maxitems = $rss->get_item_quantity(1);
	if ($maxitems != 0) 
	{
		$rss_items = $rss->get_items(0, $maxitems);
		$latest_version_via_rss = $rss_items[0]->get_title();
	}
	if (version_compare($latest_version, $latest_version_via_rss) == -1)
		include($chimera_admin_path . '/templates/upgrade_available.php');
	else
		include($chimera_admin_path . '/templates/update_is_latest.php');
}

function chimera_generate_options($__options)
{
	$__output = null;
	foreach ($GLOBALS as $var => $value) $$var = $value;
	foreach ($__options as $__option) 
	{
		$__container = isset($__option['container']) ? 
			(bool)$__option['container'] : true;
		$__container_name = isset($__option['container_name']) ?
			$__option['container_name'] : 'option';
		$type = $__option['type'];
		$id = isset($__option['id']) ? 
			$__option['id'] : null;
		$disabled = isset($__option['disabled']) ? 
			$__option['disabled'] : null;
		$std = isset($__option['std']) ? 
			$__option['std'] : null;
		$desc = isset($__option['desc']) ? 
			$__option['desc'] : null;
		$name = isset($__option['name']) ? 
			$__option['name'] : null;
		$options = isset($__option['options']) ? 
			$__option['options'] : null;
		$class = isset($__option['class']) ? 
			$__option['class'] : null;
		$selected_std = get_option($id);
		if (empty($selected_std)) $selected_std = $std;
		$__option_file_path = $chimera_admin_path . 'templates/options/' 
			. $type . '.php';
		if (file_exists($__option_file_path))
		{
			ob_start();
			$__container and 
				require($chimera_admin_path . 
				'templates/options/' . $__container_name . '_begin.php');
			require($__option_file_path);
			$__container and 
				require($chimera_admin_path . 
				'templates/options/' . $__container_name . '_end.php');
			$__output .= ob_get_clean();
		}
	}
	return $__output;
}

function chimera_generate_menu()
{
	global $chimera_admin_path, $chimera_theme_path, $chimera_path;
	$menu = include($chimera_admin_path . 'menu.php');
	if (is_array($menu)) {
		foreach ($menu as $item)
		{
			switch($item['type'])
			{
				case 'menu':
					add_theme_page(
						$item['page_title'],
						$item['menu_title'],
						$item['capabilaty'],
						$item['menu_slug'],
						$item['function'],
						$item['icon_url'],
						$item['position']
					);
					break;
				case 'submenu':
					add_theme_page(
						$item['parent_slug'],
						$item['page_title'],
						$item['menu_title'],
						$item['capabilaty'],
						$item['menu_slug'],
						$item['function']
					);
					break;
			}
		}
	}
}

function chimera_include_template_for_selected_menu()
{
	global $chimera_admin_path, $chimera_theme_path, $chimera_path;
	$template = $chimera_admin_path .'templates/default.php';
	$menu = include($chimera_admin_path . 'menu.php');
	if (is_array($menu)) {
		foreach ($menu as $item)
		{
			if (isset($_REQUEST['page']) 
				&& $_REQUEST['page'] == $item['menu_slug'])
			{
				$template = $item['template'];
				break;
			}
		}
	}
	chimera_include_template($template);
}

function chimera_include_template($_path, $extra = array())
{
	extract ( $GLOBALS );
	extract ( $extra );
	include ( $_path );
}

function chimera_get_stylesheets()
{
	global $alt_stylesheet_path;
	$alt_stylesheet_path = empty($alt_stylesheet_path) ? 
		TEMPLATEPATH . '/styles/' : $alt_stylesheet_path;
	$alt_stylesheets = array();
	if (is_dir($alt_stylesheet_path))
	{
		$tmp = glob($alt_stylesheet_path.'*.css');
		if (is_array($tmp) && !empty($tmp))
		{
			foreach ($tmp as $stylesheet_path)
			{
				$alt_stylesheets[] = 
					array_pop(explode('/', $stylesheet_path));
			}
		}
	}
	return $alt_stylesheets;
}

add_action('wp_ajax_chimera_ajax_post_action', 'chimera_ajax_callback');

function chimera_ajax_callback()
{
	global $wpdb;
    global $chimera_admin_path;
    $settings = include($chimera_admin_path . 'settings.php');
	$options_name = 'chimera_theme_options';
	$has_type = false;
	
	if (!is_admin())
	{
		die;
	}
	
	if(isset($_POST['type']))
	{
		$has_type = true;
		if($_POST['type'] == 'upload')
		{
			$clickedID = $_POST['data'];
			$filename = $_FILES[$clickedID];
			$override['test_form'] = false;
			$override['action'] = 'wp_handle_upload';    
			$uploaded_file = wp_handle_upload($filename,$override);
			$upload_tracking[] = $clickedID;
			update_option( $clickedID , $uploaded_file['url'] );
			if(!empty($uploaded_file['error'])) {echo 'Upload Error: ' . $uploaded_file['error']; }
			else { echo $uploaded_file['url']; }
		}
		elseif($_POST['type'] == 'version_check')
		{
			echo chimera_theme_version_checker();
		}
        elseif($_POST['type'] == 'news_feed')
        {
			$data = $_POST['data'];
			parse_str($data, $output);
			if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], get_bloginfo('url')) == 0)
			{
				$rss = fetch_feed($output['feed']);
				if (is_wp_error($rss))
				{
					$error_code = $rss->get_error_code();
					$error_message = $rss->get_error_message();
					include($chimera_admin_path . '/templates/news_feed_failed.php');
					return;
				}
				$maxitems = $rss->get_item_quantity($output['items']);
				if ($maxitems != 0) 
				{
					$rss_items = $rss->get_items(0, $maxitems);
					chimera_include_template($chimera_admin_path . 'templates/news_feed.php', 
						array('news_feed_items' => $rss_items));
				}
				else
				{
					chimera_include_template($chimera_admin_path . 'templates/news_feed_empty.php');
				}
			}
        }
		elseif($_POST['type'] == 'delete_sidebar')
		{
			$sidebars = get_option('chimera_sidebar_generator');
			$sidebar_id = sidebar_generator_chimera::name_to_class($_POST['data']);
			if (array_key_exists($sidebar_id, $sidebars))
			{
				unset($sidebars[$sidebar_id]);
				if (update_option('chimera_sidebar_generator', $sidebars))
					echo 'true';
				else
					echo 'false';
			}
			else
			{
				echo 'false';
			}
		}
		elseif($_POST['type'] == 'image_reset')
		{
			$id = $_POST['data']; // Acts as the name
			global $wpdb;
			$query = "DELETE FROM $wpdb->options WHERE option_name LIKE '$id'";
			$wpdb->query($query);
		}
		elseif($_POST['type'] == 'framework')
		{
			$options_name = 'chimera_framework_options';
			$has_type = false;
		}
	}
	
	if ($has_type == false)
	{
		$data = $_POST['data'];
		parse_str($data, $output);
		$options =  get_option($options_name);
		foreach ($options as $option_array)
		{
			if (isset($option_array['id'])) 
			{
				$id = $option_array['id'];
				$old_value = get_option($id);
				$new_value = '';
				if (isset($output[$id]))
				{
					$new_value = $output[$option_array['id']];
				}
				$type = $option_array['type'];
				if (is_array($type))
				{
					foreach($type as $array)
					{
						if($array['type'] == 'text')
						{
							$id = $array['id'];
							$new_value = $output[$id];
							update_option( $id, stripslashes($new_value));
						}
					}
				}
				elseif (empty($new_value) && $type == 'checkbox')
				{ 
					update_option($id, 'false');
				}
				elseif ($new_value == 'true' && $type == 'checkbox')
				{
					update_option($id, 'true');
				}
				elseif($type == 'multicheck')
				{
					$options = $option_array['options'];
					foreach ($options as $options_id => $options_value)
					{
						$multicheck_id = $id . "_" . $options_id;
						if(!isset($output[$multicheck_id]))
						{
						  update_option($multicheck_id, 'false');
						}
						else{
						   update_option($multicheck_id, 'true');
						}
					}
				} 
				elseif($type == 'typography')
				{
					$typography_array = array();
					/* Size */
					$typography_array['size'] = $output[$option_array['id'] . '_size'];
					/* Face  */
					$typography_array['face'] = stripslashes($output[$option_array['id'] . '_face']);
					/* Style  */
					$typography_array['style'] = $output[$option_array['id'] . '_style'];
					/* Color  */
					$typography_array['color'] = $output[$option_array['id'] . '_color'];
					update_option($id, $typography_array);
				}
				elseif($type == 'border')
				{
					$border_array = array();	
					/* Width */
					$border_array['width'] = $output[$option_array['id'] . '_width'];
					/* Style  */
					$border_array['style'] = $output[$option_array['id'] . '_style'];
					/* Color  */
					$border_array['color'] = $output[$option_array['id'] . '_color'];
					update_option($id, $border_array);
				}
				elseif($id == 'chimera_sidebar_generator_new')
				{
					if (!empty($new_value))
					{
						$get_sidebar_options = get_option('chimera_sidebar_generator');
						if (!is_array($get_sidebar_options)) 
						{
							add_option('chimera_sidebar_generator', array());
							$get_sidebar_options = array();
						}
						$sidebar_name = str_replace(array("\n","\r","\t"), '', $new_value);
						$sidebar_id = sidebar_generator_chimera::name_to_class($sidebar_name);
						if ($sidebar_id == '')
						{
							$options_sidebar = $get_sidebar_options;
						}
						else
						{
							if (!array_key_exists($sidebar_id, $get_sidebar_options)) 
							{
								$new_sidebar_gen[$sidebar_id] = $sidebar_name;
								$options_sidebar = array_merge($get_sidebar_options, (array) $new_sidebar_gen);
								if (update_option('chimera_sidebar_generator', $options_sidebar))
									echo 'sidebar_updated';
								else 
									echo 'sidebar_not_update';
							} else {
								echo 'sidebar_exists';
							}
						}
						update_option( 'chimera_sidebar_generator_new', '');
					}
				}
				elseif($type == 'sidebars')
				{
				}				
				elseif($type == 'grouped_options')
				{
					$found = 0;
					$temp = array();
					foreach ($output as $__output_key => $__output_value)
					{
						if (strpos($__output_key, $id) === 0)
						{
							$__output_key_array = explode('_', $__output_key);
							$_id = (int)array_pop($__output_key_array);
							if ($_id > 0) {
								if ( get_option($__output_key) != $__output_value ) {
									update_option($__output_key, $__output_value);
								} else {
									add_option($__output_key, $__output_value, null, 'yes');
								}
								$found++;
								$temp[$__output_key] = get_option($__output_key);
							}
						}
					}
                    update_option($id, $found);
				}
				else
				{
					update_option($id, $new_value);
				}
			}
		}
	}	
	
	die;
}

function chimera_reset_options()
{
    global $chimera_admin_path;
	$settings = include($chimera_admin_path . 'settings.php');
	if (isset($_REQUEST['page']) && $_REQUEST['page'] == $settings['reset_slug'])
	{
		if (isset($_REQUEST['chimera_save']) 
			&& $_REQUEST['chimera_save'] == 'reset')
		{
			global $wpdb;
			$query = "DELETE FROM $wpdb->options WHERE option_name LIKE 'chimera_%'";
			$wpdb->query($query);
			header('Location: admin.php?page=' 
				. $settings['reset_slug'] . '&reset=true');
			die;
		}
	}
}
