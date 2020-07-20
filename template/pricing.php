<?php
/* Template Name: Pricing */

$context = Timber::get_context();

$context['post'] = new TimberPost();
$context = get_pricing_plans($context);
$context = get_case_studies($context);

Timber::render('pages/pricing.twig', $context);
