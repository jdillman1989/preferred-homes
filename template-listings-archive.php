<?php
/* Template Name: Listings Archive */

$context = Timber::get_context();

$context['post'] = new TimberPost();

Timber::render('pages/listings-archive.twig', $context);
