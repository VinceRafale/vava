<?php

// Set Image Path
$imgpath = get_template_directory_uri().'/style/images/';
$vafpresspath = get_template_directory_uri().'/vafpress/public/img/';

// Start Options
return array(
	'title' => __('Techblog Theme Options', 'premium_textdomain'),
	'page' => __('Techblo Menu', 'premium_textdomain'),
	'logo' => '',
	'menus' => array(
	
	
	
			/* =============== Menu - General Settings ====================== */
			array(
			'title' => __('General Settings', 'premium_textdomain'),
			'name' => 'menu_1',
			'icon' => 'font-awesome:icon-gears',
			'controls' => array(
				
				// Start Logo Upload
					array(
						'type' => 'upload',
						'name' => 'header_logo',
						'label' => __('Upload Theme Logo', 'premium_textdomain'),
						'description' => __('Upload Your Theme Logo', 'premium_textdomain'),
						'default' => $imgpath.'logo.png',
					),
				// End Logo Upload
				
				
				// Start Color Scheme
				array(
					'type' => 'select',
					'name' => 'color_scheme',
					'label' => __('Select Color Scheme', 'premium_textdomain'),
					'items' => array(
						array(
							'value' => 'red',
							'label' => __('Red', 'premium_textdomain'),
						),
						array(
							'value' => 'pink',
							'label' => __('Pink', 'premium_textdomain'),
						),
						array(
							'value' => 'green',
							'label' => __('Green', 'premium_textdomain'),
						),
						array(
							'value' => 'orange',
							'label' => __('Orange', 'premium_textdomain'),
						),
						array(
							'value' => 'purple',
							'label' => __('Purple', 'premium_textdomain'),
						),
					),
					'default' => array(
						'red',
					),
					'validation' => 'required',
				),
				// End Color Scheme
				
				// Start Contact Email
					array(
						'type' => 'textbox',
						'name' => 'contact_email',
						'label' => __('Contact Email', 'premium_textdomain'),
						'description' => __('Set your contact email', 'premium_textdomain'),
						'default' => '',
						'validation' => 'email'
					),
				// Start Contact Email

				
				// Start Footer Copyright
					array(
						'type' => 'textarea',
						'name' => 'copyright',
						'label' => __('Copyright Text', 'premium_textdomain'),
						'description' => __('Set your copyright notice', 'premium_textdomain'),
						'default' => '&copy; 2012 Premium. All rights reserved.',
					),
				// End Footer Copyright
				
				// Enable Pagination
					array(
						'type' => 'toggle',
						'name' => 'pagination',
						'label' => __('Enable pagination', 'premium_textdomain'),
						'description' => __('Do you want to enable the pagination? or use wordpress default pagination?', 'premium_textdomain'),
						'default' => '1',
					),
					// Enable Pagination
					
					// Enable Post Author
					array(
						'type' => 'toggle',
						'name' => 'post_author',
						'label' => __('Enable Post Author', 'premium_textdomain'),
						'description' => __('Do you want to enable who posted the article each post?', 'premium_textdomain'),
						'default' => '1',
					),
					// Enable Post Author

						)),
			/* =============== Menu - General Settings ====================== */
		
			




			/* =============== Menu - Layout Options ====================== */
			array(
			'title' => __('Layout Options', 'premium_textdomain'),
			'name' => 'menu_4',
			'icon' => 'font-awesome:icon-gear',
			'menus' => array(
				
				
				/* =============== Sub menu - Call to action =============== */
				array(
						'title' => __('Call to action', 'premium_textdomain'),
						'name' => 'submenu_1',
						'icon' => 'font-awesome:icon-reorder',
						'controls' => array(
						
							// Enable Call to action
							array(
								'type' => 'toggle',
								'name' => 'action_enable',
								'label' => __('Enable Call to action', 'premium_textdomain'),
								'description' => __('Do you want to enable call to action?', 'premium_textdomain'),
								'default' => '0',
							),
							
							// Inner Color
							array(
								'type' => 'radiobutton',
								'name' => 'calltoaction_color',
								'label' => __('Select Color Scheme', 'premium_textdomain'),
								'items' => array(
									array(
										'value' => 'light',
										'label' => __('Light', 'premium_textdomain'),
									),
									array(
										'value' => 'dark',
										'label' => __('Dark', 'premium_textdomain'),
									),
								),
								'default' => array('light'),
							),
							// Inner Color
						
							// Call to action
							array(
							'type' => 'textbox',
							'name' => 'action_text',
							'label' => __('Call to Action', 'premium_textdomain'),
							'description' => __('Enter your Call to action Text', 'premium_textdomain'),
							'default' => 'this is the call to action text',
							'validation' => 'required',
							),
							
							// Call to action sub text
							array(
							'type' => 'textarea',
							'name' => 'action_sub',
							'label' => __('Call to Action sub message', 'premium_textdomain'),
							'description' => __('Enter your Call to action sub-text', 'premium_textdomain'),
							'default' => 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed posuere consectetur est at lobortis. Maecenas sed diam eget risus varius blandit sit amet non magna.',
							'validation' => 'required',
							),
							
							// Call to action button text
							array(
							'type' => 'textbox',
							'name' => 'action_button',
							'label' => __('Button Text', 'premium_textdomain'),
							'description' => __('Enter your call to action button text', 'premium_textdomain'),
							'default' => 'Take a tour',
							'validation' => 'required',
							),
							
							// Call to action button text
							array(
							'type' => 'textbox',
							'name' => 'action_link',
							'label' => __('Button Link', 'premium_textdomain'),
							'description' => __('Enter your call to action button link', 'premium_textdomain'),
							'default' => '',
							'validation' => 'url',
							),
						
				)),
				/* =============== Sub menu - Call to action =============== */

				
				
				/* =============== Sub menu - Portfolio =============== */
				/*
				array(
						'title' => __('Portfolio Layout', 'premium_textdomain'),
						'name' => 'submenu_4',
						'icon' => 'font-awesome:icon-picture',
						'controls' => array(
						
							// Enable Call to action
							array(
								'type' => 'toggle',
								'name' => 'portfolio_enable',
								'label' => __('Enable Portfolio', 'premium_textdomain'),
								'description' => __('Do you want to enable portfolio?', 'premium_textdomain'),
								'default' => '0',
							),
						
							// Call to action
							array(
							'type' => 'textbox',
							'name' => 'portfolio_text',
							'label' => __('Portfolio Header', 'premium_textdomain'),
							'description' => __('Enter your Portfolio Header Text', 'premium_textdomain'),
							'default' => 'Recent Portfolio Projects',
							'validation' => 'required',
							),
						
				)),
				*/
				/* =============== Sub menu - Portfolio =============== */
				
					
				/* =============== Sub menu - Slider =============== */
				array(
						'title' => __('Slider', 'premium_textdomain'),
						'name' => 'submenu_5',
						'icon' => 'font-awesome:icon-money',
						'controls' => array(
						
							// Enable Call to action
							array(
								'type' => 'toggle',
								'name' => 'slider_enable',
								'label' => __('Enable Slider', 'premium_textdomain'),
								'description' => __('Do you want to enable slider?', 'premium_textdomain'),
								'default' => '0',
							),
						
				)),
				/* =============== Sub menu - Slider =============== */
				
				
				
				/* =============== Sub menu - Services =============== */
				array(
						'title' => __('Services', 'premium_textdomain'),
						'name' => 'submenu_6',
						'icon' => 'font-awesome:icon-align-left',
						'controls' => array(
						
							// Enable Call to action
							array(
								'type' => 'toggle',
								'name' => 'services_enable',
								'label' => __('Enable Services', 'premium_textdomain'),
								'description' => __('Do you want to enable services?', 'premium_textdomain'),
								'default' => '0',
							),
							
							// Service Title
							array(
								'type' => 'textbox',
								'name' => 'services_title',
								'label' => __('Service Title', 'premium_textdomain'),
								'description' => __('Title for services', 'premium_textdomain'),
								'default' => 'What we do',
								'validation' => 'required',
							),
							
							// Service Description
							array(
								'type' => 'textarea',
								'name' => 'services_desc',
								'label' => __('Service Description', 'premium_textdomain'),
								'description' => __('Service Description', 'premium_textdomain'),
								'default' => 'Vestibulum id ligula porta felis euismod semper. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.',
								'validation' => 'required',
							),
							
							// Inner Color
							array(
								'type' => 'radiobutton',
								'name' => 'service_color',
								'label' => __('Select Color Scheme', 'premium_textdomain'),
								'items' => array(
									array(
										'value' => 'light',
										'label' => __('Light', 'premium_textdomain'),
									),
									array(
										'value' => 'dark',
										'label' => __('Dark', 'premium_textdomain'),
									),
								),
								'default' => array('light'),
							),
							// Inner Color
						
				)),
				/* =============== Sub menu - Services =============== */	
				
				
				
				/* =============== Sub menu - Editor =============== */
				array(
						'title' => __('Custom Home Editor', 'premium_textdomain'),
						'name' => 'submenu_7',
						'icon' => 'font-awesome:icon-pencil',
						'controls' => array(
						
				// Enable Call to action
				array(
					'type' => 'toggle',
					'name' => 'custom_enable',
					'label' => __('Enable Custom page', 'premium_textdomain'),
					'description' => __('Do you want to enable Custom Page?', 'premium_textdomain'),
					'default' => '0',
				),
							
							
				// Inner Color
				array(
					'type' => 'radiobutton',
					'name' => 'page_color',
					'label' => __('Select Color Scheme', 'premium_textdomain'),
					'items' => array(
							array(
								'value' => 'light',
								'label' => __('Light', 'premium_textdomain'),
							),
							
							array(
								'value' => 'dark',
								'label' => __('Dark', 'premium_textdomain'),
							),
					),
					
					'default' => array('light'),
					
					),
					// Inner Color
						
						// Start Color Scheme
				array(
					'type' => 'select',
					'name' => 'custom_page_id',
					'label' => __('Select Custom Page', 'premium_textdomain'),
					'description' => __('Selecting the custom page will display that page on the homepage.', 'premium_textdomain'),
					'items' => array(
						'data' => array(
											array(
												'source' => 'function',
												'value' => 'vp_get_pages',
											),
										),
					),
					'validation' => 'required',
				),
				// End Color Scheme
						
						
				)),
				/* =============== Sub menu - Editor =============== */
					
					
					)),
			/* =============== Menu - Layout Options ====================== */
			
			
			
			
			/* =============== Menu - Social Media Settings ====================== */
			array(
			'title' => __('Social Media Settings', 'premium_textdomain'),
			'name' => 'menu_5',
			'icon' => 'font-awesome:icon-group',
			'controls' => array(
					
				// Facebook
					array(
						'type' => 'textbox',
						'name' => 'facebook',
						'label' => __('Facebook page', 'premium_textdomain'),
						'description' => __('Enter your facebook URL', 'premium_textdomain'),
						'default' => '',
						'validation' => 'url',
					),
				// Facebook
				
				// Twitter
					array(
						'type' => 'textbox',
						'name' => 'twitter',
						'label' => __('Twitter Profile', 'premium_textdomain'),
						'description' => __('Enter your Twitter Profile URL', 'premium_textdomain'),
						'default' => '',
						'validation' => 'url',
					),
				// Twitter
				
				// dribbble
					array(
						'type' => 'textbox',
						'name' => 'dribbble',
						'label' => __('Dribbble', 'premium_textdomain'),
						'description' => __('Enter your dribbble URL', 'premium_textdomain'),
						'default' => '',
						'validation' => 'url',
					),
				// dribbble
				
				// Pinterest
					array(
						'type' => 'textbox',
						'name' => 'pinterest',
						'label' => __('Pinterest', 'premium_textdomain'),
						'description' => __('Enter your pinterest profile', 'premium_textdomain'),
						'default' => '',
						'validation' => 'url',
					),
				// Pinterest
				
				// vimeo
					array(
						'type' => 'textbox',
						'name' => 'vimeo',
						'label' => __('Vimeo', 'premium_textdomain'),
						'description' => __('Enter your Vimeo URL', 'premium_textdomain'),
						'default' => '',
						'validation' => 'url',
					),
				// vimeo
				
				// flickr
					array(
						'type' => 'textbox',
						'name' => 'flickr',
						'label' => __('Flickr', 'premium_textdomain'),
						'description' => __('Enter your flickr URL', 'premium_textdomain'),
						'default' => '',
						'validation' => 'url',
					),
				// flickr
				
				// Enable RSS
					array(
						'type' => 'toggle',
						'name' => 'enablerss',
						'label' => __('Enable RSS Feed', 'premium_textdomain'),
						'description' => __('Turn on RSS Feed?', 'premium_textdomain'),
						'default' => '0',
					),
				// Enable RSS
					)),
			/* =============== Menu - Social Media Settings ====================== */		


	)
);

/**
 *EOF
 */