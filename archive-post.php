<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 */
global $wp_query;

$context = Timber::get_context();

$context['posts'] = new Timber\PostQuery();

$pagination_max = $wp_query->max_num_pages;
$pagination_query = get_query_var('paged');
$nextpage = intval( $pagination_query ) + 1;
$context['next'] = false;
if ( $nextpage <= $pagination_max ) {
	$context['next'] = get_next_posts_page_link( $pagination_max );
}

$context['prev'] = false;
if ( $pagination_query > 1 ) {
	$context['prev'] = get_previous_posts_page_link();
}

Timber::render('pages/archive.twig', $context);
