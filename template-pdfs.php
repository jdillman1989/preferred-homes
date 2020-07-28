<?php
/* Template Name: PDFs */

$context = Timber::get_context();

$context['post'] = new TimberPost();

Timber::render('pages/pdfs.twig', $context);
