<?php

get_header();

if ( is_active_sidebar( 'sidebar' ) ) {
	dynamic_sidebar( 'sidebar' );
}
get_footer();