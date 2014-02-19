<?php

return array(
	'id'          => 'service_option',
	'types'       => array('services'),
	'title'       => __('Service Options', 'premium_textdomain'),
	'priority'    => 'high',
	'template'    => array(
				
				// Text Description
					array(
						'type' => 'textarea',
						'name' => 'service_text',
						'label' => __('Description', 'premium_textdomain'),
						'description' => __('', 'premium_textdomain'),
						'default' => '',
					),
				// Text Description
				
				
				// Service Icons
				array(
					'type' => 'select',
					'name' => 'service_icon',
					'label' => __('Select Service Icon', 'premium_textdomain'),
					'items' => array(
						array(
							'value' => 'icon-plus-1',
							'label' => __('icon-plus-1', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-info',
							'label' => __('icon-info', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-left-1',
							'label' => __('icon-left-1', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-up-1',
							'label' => __('icon-up-1', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-right-1',
							'label' => __('icon-right-1', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-down-1',
							'label' => __('icon-down-1', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-infinity',
							'label' => __('icon-infinity', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-home',
							'label' => __('icon-home', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-home-1',
							'label' => __('icon-home-1', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-keyboard',
							'label' => __('icon-keyboard', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-hourglass',
							'label' => __('icon-hourglass', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-adjust',
							'label' => __('icon-adjust', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-cloud',
							'label' => __('icon-cloud', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-cloud-1',
							'label' => __('icon-cloud-1', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-umbrella',
							'label' => __('icon-umbrella', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-star',
							'label' => __('icon-star', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-check-1',
							'label' => __('icon-check-1', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-cup',
							'label' => __('icon-cup', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-th-list',
							'label' => __('icon-th-list', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-note',
							'label' => __('icon-note', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-flag',
							'label' => __('icon-flag', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-tools',
							'label' => __('icon-tools', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-cog',
							'label' => __('icon-cog', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-flash',
							'label' => __('icon-flash', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-scissors',
							'label' => __('icon-scissors', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-flight-1',
							'label' => __('icon-flight-1', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-mail-1',
							'label' => __('icon-mail-1', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-feather',
							'label' => __('icon-feather', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-print',
							'label' => __('icon-print', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-chat-1',
							'label' => __('icon-chat-1', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-chat',
							'label' => __('icon-chat', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-vcard',
							'label' => __('icon-vcard', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-location-1',
							'label' => __('icon-location-1', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-compass',
							'label' => __('icon-compass', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-trash',
							'label' => __('icon-trash', 'premium_textdomain'),
						),
						array(
							'value' => 'icon-docs',
							'label' => __('icon-docs', 'premium_textdomain'),
						),
					),
					'default' => array(
						'icon-info',
					),
					'validation' => 'required',
				),
				// Service Icons
				
				
	));

/**
 * EOF
 */