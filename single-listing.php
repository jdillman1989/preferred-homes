<?php

$context = Timber::context();

$timber_post = new Timber\Post();
$context['post'] = $timber_post;

$terms = get_the_terms( get_query_var('p'), 'home-type' );

$context['terms'] = [];
foreach ($terms as $term) {
	$term_link = get_term_link($term);
	$context['terms'][] = [
		'url' => $term_link,
		'label' => $term->name
	];
}

Timber::render( 'pages/listing.twig', $context );
