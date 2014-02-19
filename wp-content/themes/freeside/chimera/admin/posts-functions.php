<?php

/**
 * All posts
 */
$chimera_posts_obj = get_posts('numberposts=-1');
$chimera_posts = array();
$chimera_posts_permalinks = array();
foreach ($chimera_posts_obj as $chimera_post)
{
    $chimera_posts[$chimera_post->ID] = $chimera_post->post_title;
    $chimera_posts_permalinks[get_permalink($chimera_post->ID)] = $chimera_post->post_title;
}

