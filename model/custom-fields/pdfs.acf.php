<?php

$group_args = [
	'title' => 'PDFs Template',
	'location' => [
	    [
	        [
	            'param' => 'page_template',
	            'operator' => '==',
	            'value' => 'template-pdfs.php'
	        ],
	    ]
	],
	'hide_on_screen' => ['the_content']
];

$fields = [
	// Intro
	['tab', 'Intro', ['placement' => 'left']],
	['wysiwyg', 'Intro Text'],

	// PDF Listings
	['tab', 'PDF Listings', ['placement' => 'left']],
	['repeater', 'PDF Lists', [
		'sub_fields' => [
			['wysiwyg', 'List Intro'],
			['repeater', 'PDFs', [
				'sub_fields' => [
					['image', 'PDF Preview Image', ['return_format' => 'array']],
					['text', 'PDF URL'],
					['wysiwyg', 'PDF Description']
				],
				'min' => 1,
				'max' => 40,
				'layout' => 'block',
				'button_label' => 'Add PDF'
			]],
		],
		'min' => 1,
		'max' => 5,
		'layout' => 'block',
		'button_label' => 'Add PDF'
	]]
];

$field_group = core_register_field_group('pdfs', $group_args, $fields);
