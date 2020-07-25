<?php

$context = Timber::get_context();

$context['post'] = new TimberPost();

Timber::render('pages/listing.twig', $context);
