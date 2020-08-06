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

	// Specs
	['tab', 'Specs', ['placement' => 'left']],
	['radio', 'Build Type', [
		'choices' => [
			'singlewide' => 'Singlewide',
			'doublewide' => 'Doublewide',
			'modular' => 'Modular',
		],
		'return_format' => 'value',
	]],
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

	// Pricing
	['tab', 'Pricing', ['placement' => 'left']],
	['text', 'Base Wallboard Price'],
	['text', 'Base Drywall Price'],
	['text', 'Base Modular Price'],
	['text', 'As Displayed Price'],
	['text', 'Sale Price'],
	['text', 'Lot Model Clearance Price'],
];

$field_group = core_register_field_group('listing', $group_args, $fields);
