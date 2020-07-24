<?php
/* Template Name: Contact */

$context = Timber::get_context();

$context['post'] = new TimberPost();

Timber::render('pages/contact.twig', $context);
