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
	],
	'hide_on_screen' => ['the_content']
];

$fields = [
	// Specs
	['tab', 'Specs', ['placement' => 'left']],
	['text', 'Callout'],
	['text', 'SqFt'],
	['text', 'Size'],
	['text', 'Beds'],
	['text', 'Bathrooms'],
];

$field_group = core_register_field_group('listing', $group_args, $fields);
