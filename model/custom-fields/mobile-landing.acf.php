<?php

$group_args = [
	'title' => 'Mobile Landing Template',
	'location' => [
	    [
	        [
	            'param' => 'page_template',
	            'operator' => '==',
	            'value' => 'template-mobile-landing.php'
	        ],
	    ]
	],
	'hide_on_screen' => ['the_content']
];

$fields = [
	// Hero
	['tab', 'Hero', ['placement' => 'left']],
	['repeater', 'Hero Buttons', [
		'sub_fields' => [
			['link', 'Hero Button', ['return_format' => 'array']],
		],
		'min' => 0,
		'max' => 6,
		'layout' => 'block',
		'button_label' => 'Add Button'
	]],
	['image', 'Hero Image', ['return_format' => 'array']],

	// Content
	['tab', 'Content', ['placement' => 'left']],
	['wysiwyg', 'Content Area'],
	['text', 'Form Intro'],
	['text', 'Form Code'],
];

$field_group = core_register_field_group('mobile-landing', $group_args, $fields);
