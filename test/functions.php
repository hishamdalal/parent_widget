<?php
defined( 'ABSPATH' ) || exit; // Exit if accessed directly

define('THEME_NAME', 'Test');
define('TEXT_DOMAIN', 'test');
define('DS', '\\');
define('PS', '/');

define( 'STYLESHEET_URI', get_template_directory_uri() ); // 
define( 'STYLESHEET_DIR', str_replace( '/', '\\', get_stylesheet_directory()) ) ; //TEMPLATEPATH
define( 'CLASSES_DIR', STYLESHEET_DIR. DS. 'classes' );
define( 'WIDGETS_DIR', STYLESHEET_DIR. DS. 'widgets' );


include( STYLESHEET_DIR.DS.'debug.php');
include( CLASSES_DIR.DS.'widgets.php');
include( WIDGETS_DIR.DS.'widget_main.php');
