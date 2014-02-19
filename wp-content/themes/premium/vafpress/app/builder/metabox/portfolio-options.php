<?php

return array(
	'id'          => 'portfolio_option',
	'types'       => array('portfolio'),
	'title'       => __('Portfolio Options', 'premium_textdomain'),
	'priority'    => 'high',
	'template'    => array(
				
				// Client
					array(
						'type' => 'textbox',
						'name' => 'client',
						'label' => __('Client', 'premium_textdomain'),
						'description' => __('', 'premium_textdomain'),
						'default' => '',
					),
				// Client
				
				// Client Website
					array(
						'type' => 'textbox',
						'name' => 'client_link',
						'label' => __('Client Link', 'premium_textdomain'),
						'description' => __('', 'premium_textdomain'),
						'default' => 'http://',
					),
				// Client Website
				
				// Client Website
					array(
						'type' => 'textarea',
						'name' => 'portfolio_video',
						'label' => __('Portfolio Video Code', 'premium_textdomain'),
						'description' => __('', 'premium_textdomain'),
						'default' => '',
					),
				// Client Website

	));

/**
 * EOF
 */