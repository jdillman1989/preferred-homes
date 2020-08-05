<?php
function add_to_context( $context ) {
		/**
		 * Include isPhone, isTablet and isDesktop variables to Timber context.
		 */
    $detect = new Mobile_Detect;

    $context['isPhone'] = $detect->isMobile() && !$detect->isTablet();
    $context['isTablet'] = $detect->isTablet();
	$context['isDesktop'] = !$detect->isMobile() && !$detect->isTablet();

	$nav_array = wp_get_nav_menu_items('Primary');
	$context['primary_menu'] = two_level_nav($nav_array);

	$social_nav = wp_get_nav_menu_items('Social');
	$context['social_menu'] = [];
	foreach ($social_nav as $item) {
		$context['social_menu'][] = [
			'title' => $item->title,
			'url' => $item->url
		];
	}

    return $context;
}
add_filter('timber_context', 'add_to_context');


