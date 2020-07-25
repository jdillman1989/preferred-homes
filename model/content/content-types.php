<?php
core_post_type('Listings', [
		'slug' => 'listing',
		'supports' => ['title', 'thumbnail']
	]
);

core_taxonomy( 'Home Type', 'Home Types', 'listing');