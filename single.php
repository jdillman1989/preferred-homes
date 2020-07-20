<?php
/**
 * The Template for displaying all single posts
 */

$context = Timber::context();
$timber_post = Timber::query_post();
$context['post'] = $timber_post;


Timber::render( array( 'pages/single-' . $timber_post->ID . '.twig', 'pages/single-' . $timber_post->post_type . '.twig', 'pages/single-' . $timber_post->slug . '.twig', 'pages/single.twig' ), $context );
