<?php
/* Template Name: Posts Archive */

$context = Timber::get_context();

$context['post'] = new TimberPost();

global $paged;
if (!isset($paged) || !$paged){
	$paged = 1;
}
$context = Timber::context();
$args = array(
	'post_type' => 'post',
	'posts_per_page' => 3,
	'paged' => $paged
);
$context['posts'] = new Timber\PostQuery($args);

Timber::render('pages/archive.twig', $context);
