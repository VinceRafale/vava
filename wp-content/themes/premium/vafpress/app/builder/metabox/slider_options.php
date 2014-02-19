<?php

return array(
	'id'          => 'slider_option',
	'types'       => array('slider'),
	'title'       => __('Slider Options', 'premium_textdomain'),
	'priority'    => 'high',
	'template'    => array(
				
				// Text Description
					array(
						'type' => 'textarea',
						'name' => 'slider_description',
						'label' => __('Description', 'premium_textdomain'),
						'description' => __('', 'premium_textdomain'),
						'default' => '',
					),
				// Text Description
				
				
				// Service Icons
				array(
					'type' => 'select',
					'name' => 'slider_position',
					'label' => __('Position', 'premium_textdomain'),
					'items' => array(
					
						array(
							'value' => 'left',
							'label' => __('Left', 'premium_textdomain'),
						),
						array(
							'value' => 'right',
							'label' => __('Right', 'premium_textdomain'),
						),
						array(
							'value' => 'none',
							'label' => __('None', 'premium_textdomain'),
						),
						
					),
					'default' => array(
						'left',
					),
				),
				// Service Icons
				
				
	));

/**
 * EOF
 */