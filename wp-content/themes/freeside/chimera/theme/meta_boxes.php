<?php

function hybrid_post_meta_boxes() {
	$images_url =  get_bloginfo('template_url') . '/chimera/admin/images/';
	$sidebars = sidebar_generator_chimera::get_sidebars();
	$sidebars['default_sidebar'] = 'Default sidebar';
	
	/* Array of the meta box options. */
	$meta_boxes = array(
		'post_image' => array( 'name' => 'post_image', 'title' => __('Post Image', 'hybrid'), 'desc' => 'Write the absolute URL for the post image or upload a new one using the button below.', 'type' => 'uploader' ),
		'post_video' => array( 'name' => 'post_video', 'title' => __('Post Video', 'hybrid'), 'desc' => 'Write the embed code of the video you would like to associate with this post.', 'type' => 'textarea' ),
		'selected_sidebar' => array( 'name' => 'selected_sidebar', 'title' => __('Custom sidebar', 'hybrid'), 'desc' => 'Associate a sidebar for this post. You can create new sidebars in the theme options area. If none is selected, the default sidebar will be used.', 'type' => 'radio', 'default_value' => 'default_sidebar', 'options' => $sidebars),
		'sidebar_pos' => array( 'name' => 'sidebar_pos', 'title' => __('Sidebar position', 'hybrid'), 'type' => 'images', 'desc' => 'Select the sidebar position for this post only. By default the sidebar position is set to whatever you defined in the theme admin area for the sidebar default position.', 'default_value' => get_option('chimera_sidebar_position'), "options" => array(
			'left' => $images_url . '/options/left_sidebar.png',
			'right' => $images_url . '/options/right_sidebar.png') ),
		'title_descr' => array( 'name' => 'title_descr', 'title' => __('Title subheading', 'hybrid'), 'desc' => 'Write the title description that you would like to show below the actual post title. You can disable all title subheadings from the theme admin area.', 'type' => 'text_input' ),
		'teaser_text' => array( 'name' => 'teaser_text', 'title' => __('Title teaser text', 'hybrid'), 'desc' => 'Select what to show in the title teaser for this post only.', 'type' => 'radio', 'options' =>  array(
		"default" => 'Admin default',
		"custom" => 'Custom text',
		"social" => 'Social icons',
		"disable" => 'Disabled'),
		'default_value' => 'default' ),
		'teaser_text_custom' => array( 'name' => 'teaser_text_custom', 'title' => __('Teaser custom text', 'hybrid'), 'desc' => 'Write the custom text that you would like to appear in the title teaser for this post. You can use HTML code to insert buttons or custom code.', 'type' => 'textarea' ),
	);

	return apply_filters( 'hybrid_post_meta_boxes', $meta_boxes );
}

function hybrid_page_meta_boxes() {
	$images_url =  get_bloginfo('template_url') . '/chimera/admin/images/';
	$sidebars = sidebar_generator_chimera::get_sidebars();
	$sidebars['default_sidebar'] = 'Default sidebar';

	/* Array of the meta box options. */
	$meta_boxes = array(
		'selected_sidebar' => array( 'name' => 'selected_sidebar', 'title' => __('Custom sidebar', 'hybrid'), 'desc' => 'Associate a sidebar for this page. You can create new sidebars in the theme options area. If none is selected, the default sidebar will be used.', 'type' => 'radio', 'default_value' => 'default_sidebar', 'options' => $sidebars),
		'sidebar_pos' => array( 'name' => 'sidebar_pos', 'title' => __('Sidebar position', 'hybrid'), 'type' => 'images', 'desc' => 'Select the sidebar position for this page only. By default the sidebar position is set to whatever you defined in the theme admin area for the sidebar default position.', 'default_value' => get_option('chimera_sidebar_position'), "options" => array(
			'left' => $images_url . '/options/left_sidebar.png',
			'right' => $images_url . '/options/right_sidebar.png') ),
		'title_descr' => array( 'name' => 'title_descr', 'title' => __('Title subheading', 'hybrid'), 'desc' => 'Write the title description that you would like to show below the actual page title. You can disable all title subheadings from the theme admin area.', 'type' => 'text_input' ),
		'teaser_text' => array( 'name' => 'teaser_text', 'title' => __('Title teaser text', 'hybrid'), 'desc' => 'Select what to show in the title teaser for this page only.', 'type' => 'radio', 'options' =>  array(
		"default" => 'Admin default',
		"custom" => 'Custom text',
		"social" => 'Social icons',
		"disable" => 'Disabled'),
		'default_value' => 'default' ),
		'teaser_text_custom' => array( 'name' => 'teaser_text_custom', 'title' => __('Teaser custom text', 'hybrid'), 'desc' => 'Write the custom text that you would like to appear in the title teaser for this page. You can use HTML code to insert buttons or custom code.', 'type' => 'textarea' ),
	);

	return apply_filters( 'hybrid_page_meta_boxes', $meta_boxes );
}

