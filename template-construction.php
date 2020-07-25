<?php
/* Template Name: Construction */

$context = Timber::get_context();

$context['post'] = new TimberPost();

Timber::render('pages/construction.twig', $context);
