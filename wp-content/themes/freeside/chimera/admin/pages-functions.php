<?php

/**
 * All pages
 */
$chimera_pages_obj = get_pages('sort_column=post_parent,menu_order');
$chimera_pages = array();
$chimera_pages_permalinks = array();
foreach ($chimera_pages_obj as $chimera_page) {
	$chimera_pages[$chimera_page->ID] = $chimera_page->post_title;
    $chimera_pages_permalinks[get_permalink($chimera_page->ID)] = $chimera_page->post_title;
}

/**
 * Returns the content of a page by ID
 */
function chimera_get_page_content($page_id)
{
	if(!is_numeric($page_id))
	{
		return;
	}
	if($page_id > 0)
	{
		global $wpdb;
		$sql_query = 'SELECT DISTINCT * FROM ' . $wpdb->posts .
		' WHERE ' . $wpdb->posts . '.ID=' . $page_id;
		$posts = $wpdb->get_results($sql_query);
		if(!empty($posts))
		{
			foreach($posts as $post)
			{
				return do_shortcode($post->post_content);
			}
		}
	}
}
