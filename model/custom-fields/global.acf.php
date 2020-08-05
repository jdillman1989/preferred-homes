<?php

$group_args = [
	'title' => 'Global Site Sections',
	'location_is' => [ 'options_page', 'global-sections' ],
	'hide_on_screen' => ['the_content']
];

$fields = [
	// Top
	['tab', 'Top', ['placement' => 'left']],
	['text', 'Phone'],
	['text', 'Email'],

	// Testimonials
	['tab', 'Testimonials', ['placement' => 'left']],
	['image', 'Testimonials Background ', ['return_format' => 'array']],
	['repeater', 'Testimonials Slider', [
		'sub_fields' => [
			['text', 'Name'],
			['textarea', 'Quote'],
		],
		'min' => 3,
		'max' => 12,
		'layout' => 'block',
		'button_label' => 'Add Testimonial'
	]],

	// Footer
	['tab', 'Footer', ['placement' => 'left']],
	['link', 'Privacy Policy', ['return_format' => 'array']],
	['text', 'Footer Text'],
	['text', 'BBB Link'],
];

$field_group = core_register_field_group('global-sections', $group_args, $fields);
