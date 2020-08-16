<?php

/**
 * assetUrl
 *
 * Return the formated static asset URL
 * from inside the theme directory.
 *
 * @type function
 * @since 0.0.1
 *
 * @param string $path
 * @return string
 */
function assetUrl(string $path) {
	return TPL_URL."/src/assets/{$path}";
}

function log_data($data, $label=false) {
	if ($label) {
		echo '<pre style="'
			.'padding: 15px;'
			.'background: #667;'
			.'color: #FEE;'
			.'border-radius: 3px;'
			.'margin: 5px;'
			.'font-size: 18px;'
		.'">';
		echo $label;
		echo '</pre>';
	}
	echo '<pre style="'
			.'padding: 15px;'
			.'background: #335;'
			.'color: #FEE;'
			.'border-radius: 3px;'
			.'margin: 5px;'
			.'font-size: 12px;'
		.'">';
	print_r($data);
	echo '</pre>';
}

function formidable_disable_styles() {
	wp_dequeue_style('formidable');
}
add_action('wp_enqueue_scripts', 'formidable_disable_styles', 100);

function two_level_nav($nav_array){
	$nav_hierarchy = array();
	$i = -1;
	$separator = ':';
	$parent = 0;
	foreach ($nav_array as $nav) {
		if (intval($nav->menu_item_parent)) {
			$nav_hierarchy[$i.$separator.$nav->menu_item_parent]['sub'][] = array(
				'title' => $nav->title,
				'url' => $nav->url,
			);
		}
		else{
			$i++;
			$nav_hierarchy[$i.$separator.$nav->ID] = array(
				'title' => $nav->title,
				'url' => $nav->url,
				'sub' => array(), 
			);
		}
	}
	return $nav_hierarchy;
}

/**
 * archive_filter_get_data
 *
 * Return posts for archive filter ajax requests
 *
 * @type function
 * @since 0.0.1
 *
 */
add_action( 'wp_ajax_archive_filter', 'archive_filter_get_data' );
add_action( 'wp_ajax_nopriv_archive_filter', 'archive_filter_get_data' );

function archive_filter_get_data() {

	$rest_json = file_get_contents("php://input");
	$_POST = json_decode($rest_json, true);

	$data_args = ['post_type' => $_POST['type']];
	$data_args['paged'] = (isset($_POST['next'])) ? intval($_POST['next']) : 1;
	$data_args['posts_per_page'] = (isset($_POST['s'])) ? -1 : $_POST['ppp'];
	$data_args['orderby'] = 'title title';
    $data_args['order'] = 'DESC';

	if (isset($_POST['tax'])) {
		foreach ($_POST['tax'] as $tax => $term) {
			if ($term != 'all' ) {
				$data_args['tax_query']['relation'] = 'AND';
				$data_args['tax_query'][] = [
          			'taxonomy' => $tax,
          			'field' => 'slug',
          			'terms' => $term
				];
			}
		}
	}

	$post_data = new WP_Query($data_args);

	$post_results = ['max' => $post_data->max_num_pages];
	if ($post_data->have_posts()) {

		while($post_data->have_posts()) {
			$post_data->the_post();

			$this_post = [];
			$this_post['image'] = false;
			if (has_post_thumbnail()){
				$this_post['image'] = get_the_post_thumbnail_url();
			}

			$this_post['title'] = get_the_title();
			$this_post['url'] = ( get_field('external_link') ) ? get_field('external_link') : get_permalink();

			$post_results['data'][] = $this_post;
		}
		wp_reset_postdata();
	}
	else{
		$post_results['data'] = [];
	}

	$response = json_encode($post_results);

    echo $response;
    wp_die();
}

/**
 * archive_page_template
 *
 * Build post archive page templates
 *
 * @type function
 * @since 0.0.1
 *
 * @param array $context
 * @param boolean $is_archive
 * @return array
 */
function archive_page_template($context, $type = 'listing', $is_archive = false) {

	$tax_query = ($is_archive) ? get_query_var('taxonomy') : 'all';
	$term_query = ($is_archive) ? get_query_var('term') : 'all';
	$type = ($is_archive) ? get_post_type() : $type;

	$term_label = ($is_archive) ? get_term_by('slug', $term_query, $tax_query)->name : 'All';
	$context['tax_query'] = $tax_query;
	$context['term_query'] = $term_query;
	$context['term_label'] = $term_label;

	// Taxonomy Data
	$taxonomies = get_object_taxonomies($type, 'objects');
	$context['taxonomies'] = [];
	$tax_page = [];
	foreach ($taxonomies as $tax) {

		$tax_page[$tax->name] = 'all';
		if ($is_archive && $tax->name == $tax_query) {
			$tax_page[$tax->name] = $term_query;
		}

		if ($tax->name == 'category' || $tax->name == 'post_tag' || $tax->name == 'post_format') {
			continue;
		}

		$terms = get_terms(['taxonomy' => $tax->name, 'hide_empty' => true]);
		$context_terms = [];
		foreach ($terms as $term) {
			$term_link = get_term_link($term);
			if (is_wp_error($term_link)) {
				continue;
			}
			$context_terms[] = [
				'label' => $term->name,
				'slug' => $term->slug,
				'link' => $term_link
			];
		}

		$context['taxonomies'][] = [
			'label' => $tax->label,
			'slug' => $tax->name,
			'terms' => $context_terms
		];
	}

	// Post List
	$ppp = 1;
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$posts_args = [
		'post_type' => $type,
		'posts_per_page' => $ppp,
		'paged' => $paged,
		'orderby' => 'title date',
		'order' => 'DESC'
	];
	if ($is_archive) {
		$posts_args['tax_query'] = [
			[
				'taxonomy' => $tax_query,
				'field'    => 'slug',
				'terms'    => $term_query,
			],
		];
	}
	$posts = new WP_Query($posts_args);
	$context['posts'] = Timber::get_posts($posts);

	// Pagination
	$tax_page_data = json_encode($tax_page);
	$next = $paged + 1;
	$next_link_disabled = ($next > $posts->max_num_pages) ? 'disabled' : '';
	$admin_ajax = admin_url('admin-ajax.php');
	$next_button = '<button id="morePosts"'
						.'data-type="'.$type.'" '
						.'data-next="'.$next.'" '
						.'data-ppp="'.$ppp.'" '
						.'data-max="'.$posts->max_num_pages.'" '
						.'data-tax=\''.$tax_page_data.'\' '
						.'data-action="'.$admin_ajax.'?action=archive_filter" '
						.'data-s="" '
						.'class="more-posts ph-button '.$next_link_disabled.'">'
						.'Load More Listings'
					.'</button>';

	$context['next_button'] = $next_button;

	return $context;
}