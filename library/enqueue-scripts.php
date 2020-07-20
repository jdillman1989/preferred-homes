<?php
if ( ! function_exists( 'bsa_scaffold_scripts' ) ) :
	function bsa_scaffold_scripts() {

		// Deregister the jquery version bundled with WordPress.
		wp_deregister_script( 'jquery' );

		// Deregister the jquery-migrate version bundled with WordPress.
		wp_deregister_script( 'jquery-migrate' );
	}

	add_action( 'wp_enqueue_scripts', 'bsa_scaffold_scripts' );
endif;
