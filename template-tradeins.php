<?php
/* Template Name: Trade Ins */

$context = Timber::get_context();

$context['post'] = new TimberPost();

Timber::render('pages/tradeins.twig', $context);
