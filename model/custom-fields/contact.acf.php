<?php

$group_args = [
	'title' => 'Contact Template',
	'location' => [
	    [
	        [
	            'param' => 'page_template',
	            'operator' => '==',
	            'value' => 'template-contact.php'
	        ],
	    ]
	],
	'hide_on_screen' => ['the_content']
];

$fields = [
	// Form
	['tab', 'Form Content', ['placement' => 'left']],
	['wysiwyg', 'Hours'],
	['wysiwyg', 'Form Intro'],
	['wysiwyg', 'Form Code'],

	// Contact
	['tab', 'Contact Content', ['placement' => 'left']],
	['repeater', 'Contacts', [
		'sub_fields' => [
			['select', 'Icon', [
				'choices' => [
					'phone' => 'Phone',
					'location' => 'Location',
					'web' => 'Web',
					'mail' => 'Mail',
				],
				'default_value' => 'mail',
				'return_format' => 'value'
			]],
			['text', 'Contact Type'],
			['wysiwyg', 'Contacts'],
		],
		'min' => 1,
		'max' => 12,
		'layout' => 'block',
		'button_label' => 'Add Contact'
	]],

	// Columns
	['tab', 'Columns', ['placement' => 'left']],
	['text', 'Columns Title'],
	['wysiwyg', 'Left Column'],
	['wysiwyg', 'Right Column'],
];

$field_group = core_register_field_group('contact', $group_args, $fields);
