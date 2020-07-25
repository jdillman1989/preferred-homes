<?php

$page_builder = [
	['tab', 'Page Builder', ['placement' => 'left']],
	['flexible_content', 'Content Blocks',
		[
			'button_label' => 'Add Block',
			'layouts' => [

				[	// Two Column Content
					'Two Column Content',
					[
						'layout' => 'block',
						'sub_fields' => [
							['true_false', 'Checkmark Lists'],
							['select', 'Background Color', 
								[
									'choices' => [
										'bg-white' => 'White',
										'bg-gray' => 'Light Gray',
									],
								]
							],
							['text', 'Centered Title'],
							['wysiwyg', 'Left Content'],
							['wysiwyg', 'Right Content'],
						]
					] 
				],

				[	// Single Column Content
					'Single Column Content',
					[
						'layout' => 'block',
						'sub_fields' => [
							['true_false', 'Checkmark Lists'],
							['select', 'Background Color', 
								[
									'choices' => [
										'bg-white' => 'White',
										'bg-gray' => 'Light Gray',
									],
								]
							],
							['text', 'Centered Title'],
							['wysiwyg', 'Content'],
						]
					] 
				],

				[	// Two Column Content & Image
					'Two Column Content and Image',
					[
						'layout' => 'block',
						'sub_fields' => [
							['true_false', 'Checkmark Lists'],
							['select', 'Background Color', 
								[
									'choices' => [
										'bg-white' => 'White',
										'bg-gray' => 'Light Gray',
									],
								]
							],
							['text', 'Centered Title'],
							['wysiwyg', 'Left Content'],
							['image', 'Right Image', ['return_format' => 'array']],
						]
					] 
				],

				[	// Three Column Content
					'Three Column Content',
					[
						'layout' => 'block',
						'sub_fields' => [
							['true_false', 'Checkmark Lists'],
							['select', 'Background Color', 
								[
									'choices' => [
										'bg-white' => 'White',
										'bg-gray' => 'Light Gray',
									],
								]
							],
							['text', 'Centered Title'],
							['wysiwyg', 'Left Content'],
							['wysiwyg', 'Middle Content'],
							['wysiwyg', 'Right Content'],
						]
					] 
				],

				[	// Grid Accordion
					'Grid Accordion',
					[
						'layout' => 'block',
						'sub_fields' => [
							['select', 'Background Color', 
								[
									'choices' => [
										'bg-white' => 'White',
										'bg-gray' => 'Light Gray',
									],
								]
							],
							['text', 'Centered Title'],
							['repeater', 'Left Content', [
								'sub_fields' => [
									['text', 'Toggle Text'],
									['wysiwyg', 'Content'],
								],
								'min' => 1,
								'max' => 24,
								'layout' => 'block',
								'button_label' => 'Add Accordion'
							]],
							['repeater', 'Right Content', [
								'sub_fields' => [
									['text', 'Toggle Text'],
									['wysiwyg', 'Content'],
								],
								'min' => 1,
								'max' => 24,
								'layout' => 'block',
								'button_label' => 'Add Accordion'
							]],
						]
					] 
				],

				[	// Two Column Images
					'Two Column Images',
					[
						'layout' => 'block',
						'sub_fields' => [
							['select', 'Background Color', 
								[
									'choices' => [
										'bg-white' => 'White',
										'bg-gray' => 'Light Gray',
									],
								]
							],
							['text', 'Centered Title'],
							['image', 'Left Image', ['return_format' => 'array']],
							['image', 'Right Image', ['return_format' => 'array']],
						]
					] 
				],

			]
		]
	]
];