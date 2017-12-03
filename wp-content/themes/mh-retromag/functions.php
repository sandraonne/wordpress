<?php

/***** Fetch Theme Data *****/

$mh_magazine_lite_data = wp_get_theme('mh-magazine-lite');
$mh_magazine_lite_version = $mh_magazine_lite_data['Version'];
$mh_retromag_data = wp_get_theme('mh-retromag');
$mh_retromag_version = $mh_retromag_data['Version'];

/***** Load Google Fonts *****/

function mh_retromag_fonts() {
	wp_dequeue_style('mh-google-fonts');
	wp_enqueue_style('mh-retromag-fonts', 'https://fonts.googleapis.com/css?family=Lora:400,400i,700|Raleway:400,700', array(), null);
}
add_action('wp_enqueue_scripts', 'mh_retromag_fonts', 11);

/***** Load Stylesheets *****/

function mh_retromag_styles() {
	global $mh_magazine_lite_version, $mh_retromag_version;
    wp_enqueue_style('mh-magazine-lite', get_template_directory_uri() . '/style.css', array(), $mh_magazine_lite_version);
    wp_enqueue_style('mh-retromag', get_stylesheet_uri(), array('mh-magazine-lite'), $mh_retromag_version);
    if (is_rtl()) {
		wp_enqueue_style('mh-magazine-lite-rtl', get_template_directory_uri() . '/rtl.css', array(), $mh_magazine_lite_version);
	}
}
add_action('wp_enqueue_scripts', 'mh_retromag_styles');

/***** Load Translations *****/

function mh_retromag_theme_setup(){
	load_child_theme_textdomain('mh-retromag', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'mh_retromag_theme_setup');

/***** Change Defaults for Custom Colors *****/

function mh_retromag_custom_colors() {
	remove_theme_support('custom-header');
	add_theme_support('custom-header', array('default-image' => '', 'default-text-color' => '3a3a3a', 'width' => 300, 'height' => 100, 'flex-width' => true, 'flex-height' => true));
}
add_action('after_setup_theme', 'mh_retromag_custom_colors');

/***** Display Large Post on Archives - Override Pluggable Function from Parent Theme *****/

if (!function_exists('mh_magazine_lite_loop_layout')) {
	function mh_magazine_lite_loop_layout() {
		$counter = 1;
		while (have_posts()) : the_post();
			if ($counter === 1) {
				get_template_part('content', 'large');
			} else {
				get_template_part('content', 'loop');
			}
			$counter++;
		endwhile;
	}
}

?>