<?php

$group_args = [
	'title' => 'Suggestions Template',
	'location' => [
	    [
	        [
	            'param' => 'page_template',
	            'operator' => '==',
	            'value' => 'template-suggestions.php'
	        ],
	    ]
	],
	'hide_on_screen' => ['the_content']
];

$fields = [
	['wysiwyg', 'Form Description'],
	['text', 'Suggestions Form']
];

$field_group = core_register_field_group('suggestions', $group_args, $fields);
