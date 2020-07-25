<?php

$group_args = [
	'title' => 'Construction Template',
	'location' => [
	    [
	        [
	            'param' => 'page_template',
	            'operator' => '==',
	            'value' => 'template-construction.php'
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
];

$fields = array_merge($fields, $page_builder);

$field_group = core_register_field_group('construction', $group_args, $fields);
