<?php

/**
 * Understrap enqueue scripts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!function_exists('understrap_scripts')) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function understrap_scripts()
	{
		// Get the theme data.
		$the_theme         = wp_get_theme();
		$theme_version     = $the_theme->get('Version');
		$bootstrap_version = get_theme_mod('understrap_bootstrap_version', 'bootstrap5');
		$suffix            = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';

		// Grab asset urls.
		$theme_styles  = "/css/theme{$suffix}.css";
		$theme_scripts = "/js/theme{$suffix}.js";
		// following has been disable to porevent use of bootstrap 4
		// if ( 'bootstrap4' === $bootstrap_version ) {
		// 	$theme_styles  = "/css/theme-bootstrap4{$suffix}.css";
		// 	$theme_scripts = "/js/theme-bootstrap4{$suffix}.js";
		// }

		$css_version = $theme_version . '.' . filemtime(get_template_directory() . $theme_styles);
		wp_enqueue_style('understrap-styles', get_template_directory_uri() . $theme_styles, array(), $css_version);

		wp_enqueue_script('jquery');

		$js_version = $theme_version . '.' . filemtime(get_template_directory() . $theme_scripts);
		wp_enqueue_script('understrap-scripts', get_template_directory_uri() . $theme_scripts, array(), $js_version, true);
		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}

		// Visible JS
		wp_enqueue_script( 'visible-script', '//cdnjs.cloudflare.com/ajax/libs/jquery-visible/1.2.0/jquery.visible.min.js', array('jquery'), true, true); 


		// Slick CSS
		wp_enqueue_style( 'slick-style', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css' );
		wp_enqueue_style( 'slick-style-theme', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css' );
		
		
		// Slick JS
		wp_enqueue_script( 'slick-script', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), true, true);

		
		wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/js/custom-js.js', array('jquery'), true, true);  

		wp_enqueue_script( 'googlemapapi', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyApyclQTE-uyeCjNphglXkawNegc2QPiiw', array('jquery'), true, true);  

		wp_enqueue_script( 'map-helper', get_stylesheet_directory_uri() . '/js/map-helper.js', array('jquery'), true, true);  


		

		wp_enqueue_style( 'main-style', get_stylesheet_directory_uri() . '/style.css');  
	}
} // End of if function_exists( 'understrap_scripts' ).

add_action('wp_enqueue_scripts', 'understrap_scripts');
