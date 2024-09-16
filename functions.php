<?php

/**
 * Theme functions and definitions.
 *
 * For additional information on potential customization options,
 * read the developers' documentation:
 *
 * https://developers.elementor.com/docs/hello-elementor-theme/
 *
 * @package HelloElementorChild
 */

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

define('HELLO_ELEMENTOR_CHILD_VERSION', '2.0.0');

/**
 * Load child theme scripts & styles.
 *
 * @return void
 */
function hello_elementor_child_scripts_styles()
{

	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		HELLO_ELEMENTOR_CHILD_VERSION
	);

	wp_enqueue_style(
		'mdw-style',
		get_stylesheet_directory_uri() . '/inc/assets/css/style.css',
		[
			'hello-elementor-theme-style',
		],
		HELLO_ELEMENTOR_CHILD_VERSION
	);

	wp_enqueue_script(
		'mdw-script',
		get_stylesheet_directory_uri() . '/inc/assets/js/scripts.js',
		array('jquery'),
		null,
		true
	);
}
add_action('wp_enqueue_scripts', 'hello_elementor_child_scripts_styles', 20);

// Custom CPTS
require('inc/cpt/cpt-projects.php');

// Custom Taxonomies
require('inc/tax/tax-country.php');

// ACF
require('inc/acf/acf-project-settings.php');
require('inc/acf/acf-sustainable.php');

// Shortcodes
require 'shortcodes/projects/sc-show-project-info.php';
require 'shortcodes/grid/grid-posts.php';
require 'shortcodes/menu/mdw_menu.php';
require 'shortcodes/sustainable/mdw_sustainable.php';
require 'shortcodes/grid/grid-projects.php';


function custom_excerpt_length( $length ) {
	return 200;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
