<?php

$group_args = [
	'title' => 'About Template',
	'location' => [
	    [
	        [
	            'param' => 'page_template',
	            'operator' => '==',
	            'value' => 'template-about.php'
	        ],
	    ]
	],
	'hide_on_screen' => ['the_content']
];

$fields = [
	// Intro
	['tab', 'Intro', ['placement' => 'left']],
	['text', 'Intro Title'],
	['wysiwyg', 'Intro Text'],
	['image', 'Intro Image', ['return_format' => 'array']],

	// Team
	['tab', 'Team', ['placement' => 'left']],
	['text', 'Team Title'],
	['textarea', 'Team Intro'],
	['repeater', 'Team Members', [
		'sub_fields' => [
			['text', 'Name'],
			['wysiwyg', 'Bio'],
		],
		'min' => 1,
		'max' => 30,
		'layout' => 'block',
		'button_label' => 'Add Member'
	]],
];

$field_group = core_register_field_group('about', $group_args, $fields);
