<?php
$context = Timber::get_context();

$context['post'] = new TimberPost();

Timber::render('pages/home.twig', $context);
