<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 */

$context = Timber::get_context();

$context = archive_page_template($context, true);

Timber::render('pages/catalog.twig', $context);
