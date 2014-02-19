<?php

function chimera_post_sidebar_position($post_id, $meta = 'sidebar_pos', $default_option = 'chimera_sidebar_position')
{
	$sidebar_pos = get_post_meta($post_id, $meta, true);
	return empty($sidebar_pos) ? get_option($default_option) : $sidebar_pos;
}