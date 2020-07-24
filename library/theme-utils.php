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