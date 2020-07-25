<?php

$group_args = [
	'title' => 'Tradeins Template',
	'location' => [
	    [
	        [
	            'param' => 'page_template',
	            'operator' => '==',
	            'value' => 'template-tradeins.php'
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

	// Form
	['tab', 'Form', ['placement' => 'left']],
	['wysiwyg', 'Form Intro'],
	['wysiwyg', 'Form Code'],
];

$fields = array_merge($fields, $page_builder);

$field_group = core_register_field_group('tradeins', $group_args, $fields);
