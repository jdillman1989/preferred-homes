<?php

$context = Timber::context();

$timber_post = new Timber\Post();
$context['post'] = $timber_post;

$id = get_query_var('p');
$terms = get_the_terms( $id, 'home-type' );

$context['term_url'] = get_term_link($terms[0]);
$context['term_label'] = $terms[0]->name;
$context['terms'] = [];
foreach ($terms as $term) {
	$term_link = get_term_link($term);
	$context['terms'][] = [
		'url' => $term_link,
		'label' => $term->name
	];

	if ( get_post_meta($id, '_yoast_wpseo_primary_category', true) == $term->term_id ) {
		$context['term_url'] = $term_link;
		$context['term_label'] = $term->name;
	}
}

Timber::render( 'pages/listing.twig', $context );
