<?php
	
	// blog sidebaar
	if ( function_exists('register_sidebar') )
    register_sidebar(array(
	    'name' => 'Blog Sidebar',
		'id' => 'blog',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<span class="widget-title">',
        'after_title' => '</span><div class="hr-stripe full" style="margin-bottom: 20px;"></div>',
    ));
	
	// footer sidebaar
	if ( function_exists('register_sidebar') )
    register_sidebar(array(
	    'name' => 'Pages Sidebar',
		'id' => 'pages',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<span class="widget-title">',
        'after_title' => '</span><div class="hr-stripe full" style="margin-bottom: 20px;"></div>',
    ));
	
	// footer sidebaar
	if ( function_exists('register_sidebar') )
    register_sidebar(array(
	    'name' => 'Footer Sidebar',
		'id' => 'footer_only',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<span class="widget-title">',
        'after_title' => '</span><div class="hr-stripe full" style="margin-bottom: 20px;"></div>',
    ));
	
?>