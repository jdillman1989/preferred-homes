<?php
/**
 * Render a style.
 */
function render_style($name, $path) {
    if (preg_match('/^(\/\/|http)/', $path)) {
        wp_enqueue_style($name, $path);
    } else if (file_exists(FL_CHILD_THEME_DIR. $path)) {
		$path = '/wp-content/themes/preferred-homes'.$path;

        wp_enqueue_style($name, $path, array(), null);
    } else {
        echo "<!-- Style {$name} not loaded -->";
    }
}

/**
 * Render a script.
 */
function render_script($name, $path) {
    if (preg_match('/^(\/\/|http)/', $path)) {
        wp_enqueue_script($name, $path);
    } else if (file_exists(FL_CHILD_THEME_DIR. $path)) {
        $path = '/wp-content/themes/preferred-homes'.$path;

        wp_enqueue_script($name, $path, array(), null);
    } else {
        echo "<!-- Script {$name} not loaded -->";
    }
}
