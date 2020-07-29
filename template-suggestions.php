<?php
/* Template Name: Suggestions */

$context = Timber::get_context();

$context['post'] = new TimberPost();

Timber::render('pages/suggestions.twig', $context);
