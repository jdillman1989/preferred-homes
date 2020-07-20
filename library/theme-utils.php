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