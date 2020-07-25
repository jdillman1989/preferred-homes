<?php

$group_args = [
	'title' => 'Listings Archive Template',
	'location' => [
	    [
	        [
	            'param' => 'page_template',
	            'operator' => '==',
	            'value' => 'template-listings-archive.php'
	        ],
	    ]
	],
	'hide_on_screen' => ['the_content']
];

$fields = [
	['wysiwyg', 'Archive Intro'],
	['repeater', 'Listings Items', [
		'sub_fields' => [
			['post_object', 'Select Listing', [
				'return_format' => 'object',
				'post_type' => ['listing']
			]]
		],
		'min' => 1,
		'max' => 40,
		'layout' => 'block',
		'button_label' => 'Add Listing'
	]],
];

$field_group = core_register_field_group('listings-archive', $group_args, $fields);
