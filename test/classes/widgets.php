<?php
defined( 'ABSPATH' ) || exit; // Exit if accessed directly
#===============================================================================#

class widgets
{
	#---------------------------------------------------------------------------#
	static function start(){
		add_action( 'widgets_init', ['widgets', 'register_sidebars']);
		add_action( 'after_setup_theme', ['widgets', 'refresh_widgets']);
	}
	#---------------------------------------------------------------------------#
	/* Register dynamic sidebars using register_sidebar() here. */
	static function register_sidebars(){
		/**
		 * Register widget area.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
		 */				
		 
		# Sidebar
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', TEXT_DOMAIN ),
			'id'            => 'sidebar',
			'description'   => esc_html__( 'Add widgets here.', TEXT_DOMAIN ),
			'before_widget' => '<div id="%1$s" class="container sidebar widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="title">',
			'after_title'   => '</h2>',
		) );
	}
	#---------------------------------------------------------------------------#
	static function refresh_widgets(){
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
	#---------------------------------------------------------------------------#
}
widgets::start();