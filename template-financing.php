<?php
/* Template Name: Financing */

$context = Timber::get_context();

$context['post'] = new TimberPost();

Timber::render('pages/financing.twig', $context);
