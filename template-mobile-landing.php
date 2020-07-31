<?php
/* Template Name: Mobile Landing */

$context = Timber::get_context();

$context['post'] = new TimberPost();

Timber::render('pages/mobile-landing.twig', $context);
