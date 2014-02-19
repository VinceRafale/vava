<?php

/**
 * All categories
 */
$chimera_categories_obj = get_categories('hide_empty=0');
$chimera_categories = array();
foreach ($chimera_categories_obj as $chimera_category) {
	$chimera_categories[$chimera_category->cat_ID] = $chimera_category->cat_name;
}