<?php

$context = Timber::get_context();

$timber_post = new Timber\Post();
$context['post'] = $timber_post;
Timber::render('pages/content-area.twig', $context);
