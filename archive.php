<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 */

$context = Timber::get_context();

$context = archive_page_template($context, 'listing', true);

$title = get_query_var('term');
$context['title'] = get_term_by('slug', $title, 'home-type', )->name;

Timber::render('pages/catalog.twig', $context);
