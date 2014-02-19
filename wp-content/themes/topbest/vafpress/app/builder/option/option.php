<?php

// Set Image Path
$imgpath = get_template_directory_uri().'/images/';
$vafpresspath = get_template_directory_uri().'/vafpress/public/img/';

// Start Options
return array(
	'title' => __('SmartPanel Options', 'textdomain_topbest'),
	'page' => __('SmartPanel', 'textdomain_topbest'),
	'logo' => '',
	'menus' => array(
	
	
	
			/* =============== Menu - General Settings ====================== */
			array(
			'title' => __('General Settings', 'textdomain_topbest'),
			'name' => 'menu_1',
			'icon' => 'font-awesome:icon-gears',
			'controls' => array(
				
				// Start Logo Upload
					array(
						'type' => 'upload',
						'name' => 'logo',
						'label' => __('Upload Theme Logo', 'textdomain_topbest'),
						'description' => __('Upload Your Theme Logo', 'textdomain_topbest'),
						'default' => $imgpath.'logo.png',
					),
				// End Logo Upload


				// Start Company Email
					array(
						'type' => 'textbox',
						'name' => 'companyemail',
						'label' => __('Company Email', 'textdomain_topbest'),
						'description' => __('Set your company Email', 'textdomain_topbest'),
						'default' => '',
						'validation' => 'email',
					),
				// Start Company Email
				
				
				// Start Company Number
					array(
						'type' => 'textbox',
						'name' => 'companynumber',
						'label' => __('Company Number', 'textdomain_topbest'),
						'description' => __('Set your company number', 'textdomain_topbest'),
						'default' => '',
					),
				// Start Company Number
				
				
				// Start Company Number
					array(
						'type' => 'textbox',
						'name' => 'contact_email',
						'label' => __('Contact Email', 'textdomain_topbest'),
						'description' => __('Set your company Contact email', 'textdomain_topbest'),
						'default' => '',
						'validation' => 'email'
					),
				// Start Company Number

				
				// Start Footer Copyright
					array(
						'type' => 'textarea',
						'name' => 'copyright',
						'label' => __('Copyright Text', 'textdomain_topbest'),
						'description' => __('Set your copyright notice', 'textdomain_topbest'),
						'default' => 'Copyright TopBest &copy; 2012. All Rights Reserved.',
					),
				// End Footer Copyright
				
				// Enable Pagination
					array(
						'type' => 'toggle',
						'name' => 'pagination',
						'label' => __('Enable pagination', 'textdomain_topbest'),
						'description' => __('Do you want to enable the pagination? or use wordpress default pagination?', 'textdomain_topbest'),
						'default' => '1',
					),
					// Enable Pagination
					
					// Enable Post Author
					array(
						'type' => 'toggle',
						'name' => 'post_author',
						'label' => __('Enable Post Author', 'textdomain_topbest'),
						'description' => __('Do you want to enable who posted the article each post?', 'textdomain_topbest'),
						'default' => '1',
					),
					// Enable Post Author

						)),
			/* =============== Menu - General Settings ====================== */
			
			
			
			
			/* =============== Menu - Layout Manager ====================== */
			array(
			'title' => __('Layout Manager', 'textdomain_topbest'),
			'name' => 'menu_2',
			'icon' => 'font-awesome:icon-columns',
			'controls' => array(
					
			array(
				'type' => 'radioimage',
				'name' => 'homepage_layout',
				'label' => __('Homepage Lyout', 'textdomain_topbest'),
				'description' => __('Choose your Homepage layout, there are currently 3 layouts for the homepage.', 'textdomain_topbest'),
				'item_max_height' => '150',
				'item_max_width' => '100',
				'items' => array(
					array(
						'value' => 'standard',
						'label' => __('Standard Layout', 'textdomain_topbest'),
						'img' => $vafpresspath.'layouts/layout-standard.png',
					),
					array(
						'value' => 'layout_1',
						'label' => __('Layout 1', 'textdomain_topbest'),
						'img' => $vafpresspath.'layouts/layout-1.png',
					),
					array(
						'value' => 'layout_2',
						'label' => __('Layout 2', 'textdomain_topbest'),
						'img' => $vafpresspath.'layouts/layout-2.png',
					),
					array(
						'value' => 'layout_3',
						'label' => __('Layout 3', 'textdomain_topbest'),
						'img' => $vafpresspath.'layouts/layout-3.png',
					),
					array(
						'value' => 'layout_4',
						'label' => __('Layout 4', 'textdomain_topbest'),
						'img' => $vafpresspath.'layouts/layout-4.png',
					),
				),
				'default' => array(
					'standard',
				),
			),
			
					
					)),
			/* =============== Menu - Layout Manager ====================== */
			
			




			/* =============== Menu - Layout Options ====================== */
			array(
			'title' => __('Layout Options', 'textdomain_topbest'),
			'name' => 'menu_4',
			'icon' => 'font-awesome:icon-gear',
			'menus' => array(
				
				
				/* =============== Sub menu - Call to action =============== */
				array(
						'title' => __('Call to action', 'textdomain_topbest'),
						'name' => 'submenu_1',
						'icon' => 'font-awesome:icon-reorder',
						'controls' => array(
						
							// Enable Call to action
							array(
								'type' => 'toggle',
								'name' => 'action_enable',
								'label' => __('Enable Call to action', 'textdomain_topbest'),
								'description' => __('Do you want to enable call to action?', 'textdomain_topbest'),
								'default' => '0',
							),
						
							// Call to action
							array(
							'type' => 'textarea',
							'name' => 'action_text',
							'label' => __('Call to Action', 'textdomain_topbest'),
							'description' => __('Enter your Call to action Text', 'textdomain_topbest'),
							'default' => 'this is the call to action text',
							'validation' => 'required',
							),
							
							// Call to action sub text
							array(
							'type' => 'textbox',
							'name' => 'action_sub',
							'label' => __('Call to Action sub message', 'textdomain_topbest'),
							'description' => __('Enter your Call to action sub-text', 'textdomain_topbest'),
							'default' => 'This is a sub message',
							'validation' => 'required',
							),
							
							// Call to action button text
							array(
							'type' => 'textbox',
							'name' => 'action_button',
							'label' => __('Button Text', 'textdomain_topbest'),
							'description' => __('Enter your call to action button text', 'textdomain_topbest'),
							'default' => 'Take a tour',
							'validation' => 'required',
							),
							
							// Call to action button text
							array(
							'type' => 'textbox',
							'name' => 'action_link',
							'label' => __('Button Link', 'textdomain_topbest'),
							'description' => __('Enter your call to action button link', 'textdomain_topbest'),
							'default' => '',
							'validation' => 'url',
							),
						
				)),
				/* =============== Sub menu - Call to action =============== */
				
				
				/* =============== Sub menu - Banner =============== */
				array(
						'title' => __('Banner', 'textdomain_topbest'),
						'name' => 'submenu_2',
						'icon' => 'font-awesome:icon-flag',
						'controls' => array(
						
							// Enable Call to action
							array(
								'type' => 'toggle',
								'name' => 'banner_enable',
								'label' => __('Enable Call to action', 'textdomain_topbest'),
								'description' => __('Do you want to enable Banner?', 'textdomain_topbest'),
								'default' => '0',
							),
						
							// Call to action
							array(
							'type' => 'textarea',
							'name' => 'banner_text',
							'label' => __('Banner Text', 'textdomain_topbest'),
							'description' => __('Enter your Banner Text', 'textdomain_topbest'),
							'default' => 'This is a banner text',
							'validation' => 'required',
							),
						
				)),
				/* =============== Sub menu - Banner =============== */
			
			
				/* =============== Sub menu - Blog =============== */
				array(
						'title' => __('Blog Layout', 'textdomain_topbest'),
						'name' => 'submenu_3',
						'icon' => 'font-awesome:icon-pencil',
						'controls' => array(
						
							// Enable Blog
							array(
								'type' => 'toggle',
								'name' => 'blog_enable',
								'label' => __('Enable Blog', 'textdomain_topbest'),
								'description' => __('Do you want to enable Banner?', 'textdomain_topbest'),
								'default' => '0',
							),
						
							// Blog Text
							array(
							'type' => 'textbox',
							'name' => 'blog_text',
							'label' => __('Blog Header', 'textdomain_topbest'),
							'description' => __('Enter your Blog Header Text', 'textdomain_topbest'),
							'default' => 'Recent Blog Posts',
							'validation' => 'required',
							),
						
				)),
				/* =============== Sub menu - Blog =============== */
				
				
				/* =============== Sub menu - Portfolio =============== */
				array(
						'title' => __('Portfolio Layout', 'textdomain_topbest'),
						'name' => 'submenu_4',
						'icon' => 'font-awesome:icon-picture',
						'controls' => array(
						
							// Enable Call to action
							array(
								'type' => 'toggle',
								'name' => 'portfolio_enable',
								'label' => __('Enable Portfolio', 'textdomain_topbest'),
								'description' => __('Do you want to enable portfolio?', 'textdomain_topbest'),
								'default' => '0',
							),
						
							// Call to action
							array(
							'type' => 'textbox',
							'name' => 'portfolio_text',
							'label' => __('Portfolio Header', 'textdomain_topbest'),
							'description' => __('Enter your Portfolio Header Text', 'textdomain_topbest'),
							'default' => 'Recent Portfolio Projects',
							'validation' => 'required',
							),
						
				)),
				/* =============== Sub menu - Portfolio =============== */
				
					
				/* =============== Sub menu - Slider =============== */
				array(
						'title' => __('Slider', 'textdomain_topbest'),
						'name' => 'submenu_5',
						'icon' => 'font-awesome:icon-money',
						'controls' => array(
						
							// Enable Call to action
							array(
								'type' => 'toggle',
								'name' => 'slider_enable',
								'label' => __('Enable Slider', 'textdomain_topbest'),
								'description' => __('Do you want to enable slider?', 'textdomain_topbest'),
								'default' => '0',
							),
						
				)),
				/* =============== Sub menu - Portfolio =============== */
				
				
				
				/* =============== Sub menu - Services =============== */
				array(
						'title' => __('Services', 'textdomain_topbest'),
						'name' => 'submenu_6',
						'icon' => 'font-awesome:icon-align-left',
						'controls' => array(
						
							// Enable Call to action
							array(
								'type' => 'toggle',
								'name' => 'services_enable',
								'label' => __('Enable Services', 'textdomain_topbest'),
								'description' => __('Do you want to enable services?', 'textdomain_topbest'),
								'default' => '0',
							),
						
				)),
				/* =============== Sub menu - Services =============== */	
					
					
					)),
			/* =============== Menu - Layout Options ====================== */
			
			
			
			
			/* =============== Menu - Social Media Settings ====================== */
			array(
			'title' => __('Social Media Settings', 'textdomain_topbest'),
			'name' => 'menu_5',
			'icon' => 'font-awesome:icon-group',
			'controls' => array(
					
				// Facebook
					array(
						'type' => 'textbox',
						'name' => 'facebook',
						'label' => __('Facebook page', 'textdomain_topbest'),
						'description' => __('Enter your facebook URL', 'textdomain_topbest'),
						'default' => '',
						'validation' => 'url',
					),
				// Facebook
				
				// Twitter
					array(
						'type' => 'textbox',
						'name' => 'twitter',
						'label' => __('Twitter Profile', 'textdomain_topbest'),
						'description' => __('Enter your Twitter Profile URL', 'textdomain_topbest'),
						'default' => '',
						'validation' => 'url',
					),
				// Twitter
				
				// Google
					array(
						'type' => 'textbox',
						'name' => 'google',
						'label' => __('Google Plus', 'textdomain_topbest'),
						'description' => __('Enter your google plus URL', 'textdomain_topbest'),
						'default' => '',
						'validation' => 'url',
					),
				// Google
				
				// Pinterest
					array(
						'type' => 'textbox',
						'name' => 'pinterest',
						'label' => __('Pinterest', 'textdomain_topbest'),
						'description' => __('Enter your pinterest profile', 'textdomain_topbest'),
						'default' => '',
						'validation' => 'url',
					),
				// Pinterest
				
				// Enable Gmap
					array(
						'type' => 'toggle',
						'name' => 'enablerss',
						'label' => __('Enable RSS Feed', 'textdomain_topbest'),
						'description' => __('Turn on RSS Feed?', 'textdomain_topbest'),
						'default' => '0',
					),
				// Enable Gmap
					)),
			/* =============== Menu - Social Media Settings ====================== */		


	)
);

/**
 *EOF
 */