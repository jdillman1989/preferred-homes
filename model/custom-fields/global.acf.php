<?php

$group_args = [
	'title' => 'Global Site Sections',
	'location_is' => [ 'options_page', 'global-sections' ],
	'hide_on_screen' => ['the_content']
];

$fields = [

];

$field_group = core_register_field_group('global-sections', $group_args, $fields);
