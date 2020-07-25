<?php

$group_args = [
	'title' => 'Financing Template',
	'location' => [
	    [
	        [
	            'param' => 'page_template',
	            'operator' => '==',
	            'value' => 'template-financing.php'
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

	// CTA
	['tab', 'CTA', ['placement' => 'left']],
	['text', 'CTA Title'],
	['link', 'CTA Button', ['return_format' => 'array']],
];

$fields = array_merge($fields, $page_builder);

$field_group = core_register_field_group('financing', $group_args, $fields);
