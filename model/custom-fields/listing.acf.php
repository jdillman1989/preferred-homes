<?php

$group_args = [
	'title' => 'Listing',
	'location' => [
	    [
	        [
	            'param' => 'post_type',
	            'operator' => '==',
	            'value' => 'listing'
	        ],
	    ]
	]
];

$fields = [
	// Info
	['tab', 'Info', ['placement' => 'left']],
	['text', 'Manufacturer'],
	['text', 'Model'],
	['text', 'Inventory Number'],
	['radio', 'Displayed on lot', [
		'choices' => [
			'yes' => 'Yes',
			'no' => 'No',
		],
		'return_format' => 'value',
	]],
	['radio', 'New or Used Home', [
		'choices' => [
			'new' => 'New',
			'used' => 'Used',
		],
		'return_format' => 'value',
	]],
	['text', 'Form Title'],
	['text', 'Form Code'],

	// Specs
	['tab', 'Specs', ['placement' => 'left']],
	['text', 'SqFt'],
	['text', 'Beds'],
	['text', 'Bathrooms'],
	['text', 'Size'],

	// Display
	['tab', 'Display', ['placement' => 'left']],
	['text', 'Callout'],
	['image', 'Floorplan', ['return_format' => 'array']],
	['gallery', 'Gallery', [
		'min' => 0,
		'max' => 24,
		'preview_size' => 'thumbnail',
		'library' => 'all',
	]],

	// Descriptions
	['tab', 'Descriptions', ['placement' => 'left']],
	['wysiwyg', 'Description'],
	['repeater', 'Description Tabs', [
		'sub_fields' => [
			['text', 'Tab Text'],
			['wysiwyg', 'Tab Content'],
		],
		'min' => 0,
		'max' => 15,
		'layout' => 'block',
		'button_label' => 'Add Description Tab'
	]],

	// Pricing
	['tab', 'Pricing', ['placement' => 'left']],
	['text', 'Base Wallboard Price'],
	['text', 'Base Drywall Price'],
	['text', 'Base Modular Price'],
	['text', 'Price Range'],
	['repeater', 'Displayed Prices', [
		'sub_fields' => [
			['text', 'Price Label'],
			['text', 'Price'],
		],
		'min' => 0,
		'max' => 10,
		'layout' => 'block',
		'button_label' => 'Add Price'
	]]
];

$field_group = core_register_field_group('listing', $group_args, $fields);
