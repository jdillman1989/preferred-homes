<?php

$group_args = [
	'title' => 'Homepage',
	'location' => [
	    [
	        [
	            'param' => 'page_type',
	            'operator' => '==',
	            'value' => 'front_page'
	        ],
	    ]
	],
	'hide_on_screen' => ['the_content']
];

$fields = [
	// Hero
	['tab', 'Hero', ['placement' => 'left']],
	['image', 'Hero Background', ['return_format' => 'array']],
	['link', 'Hero Button', ['return_format' => 'array']],

	// Intro
	['tab', 'Intro', ['placement' => 'left']],
	['wysiwyg', 'Intro Text'],
	['repeater', 'Intro Links', [
		'sub_fields' => [
			['text', 'Link URL'],
			['text', 'Link Title'],
			['image', 'Link Icon', ['return_format' => 'array']]
		],
		'min' => 3,
		'max' => 12,
		'layout' => 'block',
		'button_label' => 'Add Link'
	]],

	// Signup
	['tab', 'Signup', ['placement' => 'left']],
	['text', 'Signup Title'],
	['wysiwyg', 'Signup Text'],
	['text', 'Signup Form Code'],
];

$field_group = core_register_field_group('home', $group_args, $fields);
