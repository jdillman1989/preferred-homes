<?php
$context = Timber::get_context();

$context['post'] = new TimberPost();

$context = get_case_studies($context);
$context = get_pricing_plans($context);

$selected_posts = get_field('post_slider_items');
$slider_posts = [];
foreach ($selected_posts as $selected_post) {
	$this_post = $selected_post['select_post'];

	$category = get_the_category($this_post->ID);
	$category_info = false;
	if (count($category)) {
		$category_info = [
			'label' => $category[0]->name,
			'url' => get_category_link($category[0]->term_id)
		];
	}

	$slider_posts[] = [
		'title' => $this_post->post_title,
		'image' => get_the_post_thumbnail_url($this_post),
		'url' => get_permalink($this_post),
		'category' => $category_info
	];
}

$context['slider'] = $slider_posts;

Timber::render('pages/home.twig', $context);
