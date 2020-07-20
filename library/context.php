<?php
function add_to_context( $context ) {
		/**
		 * Include isPhone, isTablet and isDesktop variables to Timber context.
		 */
    $detect = new Mobile_Detect;

    $context['isPhone'] = $detect->isMobile() && !$detect->isTablet();
    $context['isTablet'] = $detect->isTablet();
	$context['isDesktop'] = !$detect->isMobile() && !$detect->isTablet();

    return $context;
}
add_filter('timber_context', 'add_to_context');


