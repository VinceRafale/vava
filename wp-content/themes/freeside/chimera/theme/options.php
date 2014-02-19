<?php

$shortname = 'chimera';
$images_url =  get_bloginfo('template_url') . '/chimera/admin/images/';
$theme_images_url = get_bloginfo('template_url') . '/images/';

$chimera_pages[0] = 'None';

$theme_options = array(
	array(
		'type' => 'admin_open',
		'container' => false,
	),
	array(
		'type' => 'ul_open',
		'container' => false,
	),
	array(
		'type' => 'tab_li',
		'id' => '1',
		'name' => __('General settings','chimera'),
		'container' => false,
	),
	array(
		'type' => 'tab_li',
		'id' => '2',
		'name' => __('Styling options','chimera'),
		'container' => false,
	),
	array(
		'type' => 'tab_li',
		'id' => '15',
		'name' => __('Help &amp; Support','chimera'),
		'container' => false,
	),
	array(
		'type' => 'ul_close',
		'container' => false,
	),
	array(
		'type' => 'tab_content_open',
		'id' => '1',
		'container' => false,
	),
	array(
		'type' => 'ul_open',
		'container' => false,
	),
	array(
		'type' => 'tab_li',
		'id' => '3',
		'name' => __('Header','chimera'),
		'container' => false,
	),
	array(
		'type' => 'tab_li',
		'id' => '4',
		'name' => __('Homepage','chimera'),
		'container' => false,
	),
	array(
		'type' => 'tab_li',
		'id' => '5',
		'name' => __('Featured area','chimera'),
		'container' => false,
	),
	
	array(
		'type' => 'tab_li',
		'id' => '7',
		'name' => __('Miscellaneous','chimera'),
		'container' => false,
	),
	array(
		'type' => 'ul_close',
		'container' => false,
	),
	array(
		'type' => 'tab_subcontent_open',
		'id' => '3',
		'container' => false,
	),
	array(	"type" => "column_open",
			"class" => "three-col",
			"container" => false),
	array( 
		"name" => __("Custom logo",'chimera'),
		"desc" => __("Upload a logo for your theme, or specify the image address of your online logo. ( http://example.com/logo.png )",'chimera'),
		"id" => $shortname."_logo",
		"std" => $theme_images_url . 'logo.png',
		"type" => "uploader"
	),
array(
	"name" => __("Tweak logo position",'chimera'),
	"desc" => __("Depending on your logo height, you might need to adjust the top margin so that your logo it perfectly vertically aligned.",'chimera'),
	"id" => $shortname.'_logo_position',
	"std" => "-3px",
	"type" => "text"
),

array(	"type" => "column_close",
		"container" => false),
	array(
		'type' => 'tab_subcontent_close',
		'container' => false,
	),
	array(
		'type' => 'tab_subcontent_open',
		'id' => '4',
		'container' => false,
	),
	array(
		'type' => 'box_open',
		"name" => __("Homepage content pages",'chimera'),
		'container' => false,
	),
	array(	"type" => "column_open",
			"class" => "two-col",
			"container" => false),
	array(
		'type' => 'select_value',
		'name' => __('Top content from:','chimera'),
		'id' => $shortname .'_homepage_content_top',
		'std' => 0,
		'options' => $chimera_pages,
		"desc" => __("Select the page from which you would like to show content on homepage below the features area.",'chimera'),
	),
	array(
		'type' => 'select_value',
		'name' => __('Bottom content from:','chimera'),
		'id' => $shortname .'_homepage_content_bottom',
		'std' => 0,
		'options' => $chimera_pages,
		"desc" => __("Select the page from which you would like to show content on homepage above the footer area.",'chimera'),
	),
	array(	"type" => "column_close",
			"container" => false),
	array(
		'type' => 'box_close',
		'container' => false,
	),
	array(
		'type' => 'box_open',
		"name" => __("Homepage Blog section",'chimera'),
		'container' => false,
	),
	array(	"name" => __("Enable homepage blog section ?",'chimera'),
			"desc" => __("Enable homepage blog section.",'chimera'),
    		"id" => $shortname."_frontpage_blog_section",
    		"std" => "true",
    		"type" => "checkbox"),
	array(	"type" => "column_open",
			"class" => "three-col",
			"container" => false),
	array(	"name" => __("Title",'chimera'),
			"desc" => __("Homepage blog section .",'chimera'),
			"id" => $shortname."_frontpage_blog_title",
			"std" => "From our blog",
			"type" => "text"),

	array(	"name" => __("Blog section category",'chimera'),
			"desc" => __("Select from what category to show posts in the homepage section.",'chimera'),
			"id" => $shortname."_frontpage_category",
			"std" => "",
			"type" => "select_value",
			"options" => $chimera_categories),


	array(	"type" => "column_close",
			"container" => false),
	array(
		'type' => 'box_close',
		'container' => false,
	),
	array(
		'type' => 'tab_subcontent_close',
		'container' => false,
	),
	array(
		'type' => 'tab_subcontent_open',
		'id' => '5',
		'container' => false,
	),

	array(	"name" => __("Featured area style",'chimera'),
			"desc" => __("Select the look of the featured homepage area. Each featured area style has additional options located in the boxes below.",'chimera'),
			"id" => $shortname."_home_slider",
			"std" => "val3",
			"type" => "radio",
			"class" => "selection_box",
			"options" => array(
				'val3' => 'Static featured area',
			)), 
			


	array(
		'type' => 'box_open',
		"name" => __("Static featured area",'chimera'),
		'container' => false,
	),
	array(	"type" => "column_open",
			"class" => "two-col",
			"container" => false),
	array(	"name" => __("Content",'chimera'),
			"type" => "header",
			"container" => false),
	array(	"name" => __("Title",'chimera'),
			"desc" => __("Write here the text you would like to appear as a title for the featured section on homepage.",'chimera'),
    		"id" => $shortname."_featured_title",
    		"std" => "Whether you're a WordPress pro or just a beginner, this theme has you covered.",
    		"type" => "textarea"),

	array(	"name" => __("Text",'chimera'),
			"desc" => __("Write here the text you would like to appear on the featured section on homepage.",'chimera'),
    		"id" => $shortname."_featured_text",
    		"std" => "<a title='Link Example' class='' href='#'>Impress your visitors</a> by modifying all aspects of our theme without losing functionality or beauty.",
    		"type" => "textarea"),
	array(	"type" => "column_close",
			"container" => false),
	array(	"name" => __("Screenshot",'chimera'),
			"type" => "header",
			"container" => false),
	array(	"type" => "column_open",
			"class" => "three-col",
			"container" => false),
	array(	"name" => __("Screenshot title",'chimera'),
			"desc" => __("What text should appear on the screenshot when hovered. Leave empty to hide the link.",'chimera'),
    		"id" => $shortname."_slider_title",
    		"std" => "",
    		"type" => "text"),
	array(	"name" => __("Enable screenshot link ?",'chimera'),
			"desc" => __("Enable link for the Static featured area screenshot.",'chimera'),
    		"id" => $shortname."_enable_screenshot_link",
    		"std" => "false",
    		"type" => "checkbox"),
	array(	"name" => __("Screenshot Link",'chimera'),
			"desc" => __("Where should the screenshot point to when clicked. Is active only if the Enable screenshot link is enabled.",'chimera'),
    		"id" => $shortname."_slider_link",
    		"std" => "",
			"type" => "select_value_grouped",
			"options" => array(
				__("Pages",'chimera') => $chimera_pages_permalinks,
				__("Posts",'chimera') => $chimera_posts_permalinks,
			)
		),
	array(	"name" => __("Screenshot Image",'chimera'),
			"desc" => __("Use an absolute URL for the static featured area image or upload using the upload button.",'chimera'),
    		"id" => $shortname."_slider_img",
			"std" => $theme_images_url . 'ipad.png',
    		"type" => "uploader"),
	array(	"type" => "column_close",
			"container" => false),
		array(	"name" => __("Button left",'chimera'),
				"type" => "header",
				"container" => false),
	array(	"type" => "column_open",
			"class" => "three-col",
			"container" => false),
		array(
			"name" => __("Title",'chimera'),
			"desc" => __("Enter title for the left button. Leave empty to hide it.",'chimera'),
			"id" => $shortname.'_static_but_left_title',
			"std" => "Learn more",
			"type" => "text"
		),
		array(
			"name" => __("Link",'chimera'),
			"desc" => __("Select which page the left button link should point to.",'chimera'),
			"id" => $shortname.'_static_but_left_link',
			"std" => "#",
			"type" => "select_value_grouped",
			"options" => array(
				__("Pages",'chimera') => $chimera_pages_permalinks,
				__("Posts",'chimera') => $chimera_posts_permalinks,
			)
		),
		array(
			"name" => __("Background",'chimera'),
			"desc" => __("Select background for this slide's button.",'chimera'),
			"id" => $shortname."_static_but_left_bg",
			"std" => "blue",
			"type" => "images",
			"container" => false,
			"options" => array(
				'blue' => $images_url . 'options/blue_but.png',
				'green' => $images_url . 'options/green_but.png',
				'orange' => $images_url . 'options/orange_but.png',
				'gray' => $images_url . 'options/gray_but.png')
		),
		array(
			"name" => __("Alignment",'chimera'),
			"desc" => __("Select how to align the left button.",'chimera'),
			"id" => $shortname."_static_but_left_align",
			"std" => "right",
			"type" => "images",
			"container" => false,
			"options" => array(
				'left' => $images_url . 'options/align_left.png',
				'right' => $images_url . 'options/align_right.png'
			)
		),
	array(	"type" => "column_close",
			"container" => false),
		array(	"name" => __("Button right",'chimera'),
				"type" => "header",
				"container" => false),
	array(	"type" => "column_open",
			"class" => "three-col",
			"container" => false),
		array(
			"name" => __("Title",'chimera'),
			"desc" => __("Enter title for the left button.Leave empty to hide it.",'chimera'),
			"id" => $shortname.'_static_but_right_title',
			"std" => "Example button",
			"type" => "text"
		),
		array(
			"name" => __("Link",'chimera'),
			"desc" => __("Select which page the right button link should point to.",'chimera'),
			"id" => $shortname.'_static_but_right_link',
			"std" => "#",
			"type" => "select_value_grouped",
			"options" => array(
				__("Pages",'chimera') => $chimera_pages_permalinks,
				__("Posts",'chimera') => $chimera_posts_permalinks,
			)
		),
		array(
			"name" => __("Background",'chimera'),
			"desc" => __("Select background for this right button.",'chimera'),
			"id" => $shortname."_static_but_right_bg",
			"std" => "green",
			"type" => "images",
			"container" => false,
			"options" => array(
				'blue' => $images_url . 'options/blue_but.png',
				'green' => $images_url . 'options/green_but.png',
				'orange' => $images_url . 'options/orange_but.png',
				'gray' => $images_url . 'options/gray_but.png')
		),
		array(
			"name" => __("Alignment",'chimera'),
			"desc" => __("Select how to align the right button.",'chimera'),
			"id" => $shortname."_static_but_right_align",
			"std" => "right",
			"type" => "images",
			"container" => false,
			"options" => array(
				'left' => $images_url . 'options/align_left.png',
				'right' => $images_url . 'options/align_right.png'
				)
		),
	array(	"type" => "column_close",
			"container" => false),
	array(
		'type' => 'box_close',
		'container' => false,
	),
	array(	"name" => __("Other settings",'chimera'),
			"type" => "header",
			"container" => false),
	
	array(
		'type' => 'box_open',
		"name" => __("Sliders animation settings",'chimera'),
		'container' => false,
	),
	array(	"type" => "column_open",
			"class" => "three-col",
			"container" => false),
	array(	"name" => __("Default animation effect",'chimera'),
			"desc" => __("Select what animation effect to use by default for the homepage slider.",'chimera'),
    		"id" => $shortname."_animation_fx",
    		"std" => "fade",
    		"type" => "select",
    		"options" => array("fade","scrollUp","scrollDown","blindX","blindY","blindZ","cover","toss","scrollLeft","scrollRight")),

	array(	"type" => "column_close",
			"container" => false),
	array(
		'type' => 'box_close',
		'container' => false,
	),
	array(
		'type' => 'tab_subcontent_close',
		'container' => false,
	),

	array(
		'type' => 'tab_subcontent_open',
		'id' => '7',
		'container' => false,
	),

	array(
		'type' => 'box_open',
		"name" => __("Miscellaneous settings",'chimera'),
		'container' => false,
	),
	array(	"type" => "column_open",
			"class" => "two-col",
			"container" => false),

	array(	"name" => __("Enable social share box on posts ?",'chimera'),
			"desc" => __("Enable social share box for all posts.",'chimera'),
    		"id" => $shortname."_social_share",
    		"std" => "false",
    		"type" => "checkbox"),

	array(	"name" => __("Enable footer widgets area ?",'chimera'),
			"desc" => __("Enable the footer wid/*array(
		'type' => 'tab_li',
		'id' => '6',
		'name' => __('Titles','chimera'),
		'container' => false,
	),*/
	/*array(
		'type' => 'tab_li',
		'id' => '8',
		'name' => __('Sidebars','chimera'),
		'container' => false,
	),*/gets area.",'chimera'),
    		"id" => $shortname."_footer_widgets",
    		"std" => "false",
    		"type" => "checkbox"),
	array(	"type" => "column_close",
			"container" => false),
	array(
		'type' => 'box_close',
		'container' => false,
	),
	array(  'type' => 'tab_subcontent_close',
			'container' => false,
	),

	array(
		'type' => 'tab_content_close',
		'container' => false,
	),
	array(
		'type' => 'tab_content_open',
		'id' => '2',
		'container' => false,
	),
	array(
		'type' => 'ul_open',
		'container' => false,
	),
	array(
		'type' => 'tab_li',
		'id' => '9',
		'name' => __('General settings','chimera'),
		'container' => false,
	),
	array(
		'type' => 'tab_li',
		'id' => '10',
		'name' => __('Font options','chimera'),
		'container' => false,
	),
	array(
		'type' => 'ul_close',
		'container' => false,
	),
	array(
		'type' => 'tab_subcontent_open',
		'id' => '9',
		'container' => false,
	),
	array(
		"name" => __("Theme stylesheet",'chimera'),
		"desc" => __("Select the style scheme you would like to use for your theme.",'chimera'),
		"id" => $shortname."_alt_stylesheet",
		"std" => "1-default.css",
		"type" => "radio",
		"options" => chimera_get_files('/styles/'),
		"class" => "selection_box cufon_fonts_list"
	),

	array(
		'type' => 'tab_subcontent_close',
		'container' => false,
	),
	array(
		'type' => 'tab_subcontent_open',
		'id' => '10',
		'container' => false,
	),




	array(	"name" => __("Featured area style",'chimera'),
			"desc" => __("Select the look of the featured homepage area. Each featured area style has additional options located in the boxes below.",'chimera'),
			"id" => $shortname."_google_font_select",
			"std" => "Droid+Sans",
			"type" => "radio",
			"class" => "selection_box",
			"options" => array(
				'IM+Fell+Great+Primer+SC' => 'Fell Great Primer',
				'Droid+Sans' => 'Droid Sans',
				
			)),


	array(
		'type' => 'tab_subcontent_close',
		'container' => false,
	),
	
	array(
		'type' => 'tab_content_close',
		'container' => false,
	),
array(
	'type' => 'tab_content_open',
	'id' => '15',
	'container' => false,
),
array(
	'type' => 'ul_open',
	'container' => false,
),
array(
	'type' => 'tab_li',
	'id' => '16',
	'name' => __('Articles','chimera'),
	'container' => false,
),
array(
	'type' => 'ul_close',
	'container' => false,
),
array(
	'type' => 'tab_subcontent_open',
	'id' => '16',
	'container' => false,
),
array(
	'type' => 'rss_feed',
	'id' => 'chimera_support_documentation',
	'options' => array(
		'feed' => 'http://www.chimerathemes.com/category/support/feed/',
		'items' => 50,
	),
),
array(
	'type' => 'tab_subcontent_close',
	'container' => false,
),
array(
	'type' => 'tab_content_close',
	'container' => false,
),

);

update_option('chimera_theme_options', $theme_options);
update_option('chimera_shortname', $shortname);