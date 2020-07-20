<?php
/* Template Name: Catalog */

$context = Timber::get_context();

$context['post'] = new TimberPost();

$context = archive_page_template($context);

Timber::render('pages/catalog.twig', $context);