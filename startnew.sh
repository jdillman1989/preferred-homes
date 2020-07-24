#!/bin/bash
echo "New template slug:";
read templateslug;

echo "New template name:";
read templatename;

# ACF file
echo "<?php

\$group_args = [
	'title' => '$templatename Template',
	'location' => [
	    [
	        [
	            'param' => 'page_template',
	            'operator' => '==',
	            'value' => 'template-$templateslug.php'
	        ],
	    ]
	],
	'hide_on_screen' => ['the_content']
];

\$fields = [

];

\$field_group = core_register_field_group('$templateslug', \$group_args, \$fields);" > ./model/custom-fields/$templateslug.acf.php;
echo "Added ACF file";

# PHP template file
echo "<?php
/* Template Name: $templatename */

\$context = Timber::get_context();

\$context['post'] = new TimberPost();

Timber::render('pages/$templateslug.twig', \$context);" > ./template-$templateslug.php;
echo "Added PHP Template file";

# Twig folder
mkdir ./views/pages/$templateslug;
echo "Added Twig dir";

# # Twig base file
echo "{% extends 'base.twig' %}

{% set template = '$templateslug' %}

{% block content %}
	<div id=\"$templateslug\" class=\"page page--$templateslug\">
		{% include 'pages/$templateslug/hero.twig' %}
	</div>
{% endblock %}" > ./views/pages/$templateslug.twig;
echo "Added Twig base file";

# # Twig component file
echo "<section id=\"hero\" class=\"hero\">
    <div class=\"hero__wrapper\">

    </div>
</section>" > ./views/pages/$templateslug/hero.twig;
echo "Added Twig example component file";

# JS file
echo "export default class {

	constructor() {

	}

	/**
	 * setup
	 *
	 * Prepares the page.
	 *
	 * @type function
	 * @since 0.0.1
	 *
	 * @param NA
	 * @return NA
	 */
	setup() {
		console.log( '$templatename' );
	}

	create() {
		this.setup();
	}
}" > ./src/js/pages/$templatename.js;
echo "Added JS file";

# # Add JS file to build

# SCSS folder
mkdir ./src/scss/pages/$templateslug;
echo "Added SCSS dir";

# # SCSS base file
echo "/** Sections */
@import './_$templateslug-hero';
" > ./src/scss/pages/$templateslug/_$templateslug.scss;
echo "Added SCSS base file";

# # SCSS component file
echo ".page--$templateslug .hero {

}
" > ./src/scss/pages/$templateslug/_$templateslug-hero.scss;
echo "Added SCSS example component file";

# # Add SCSS base to build
echo "Complete!";
echo "Remember to add the JS and SCSS files to the build imports.";