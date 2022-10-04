<?php
/**
 * Connect Bootstrap
 *
 * @return void
 */
//function load_bootstrap(){
//    wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.mini.js');
//    wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/assets/css/bootstrap.mini.css');
//}
//add_action('wp_enqueue_scripts', 'load_bootstrap');



require get_template_directory() . '/metabox/Color.php';
require get_template_directory() . '/metabox/Brand.php';
require get_template_directory() . '/filters/ArchivesFilter.php';
require get_template_directory() . '/taxonomy/CarsTaxonomy.php';
require get_template_directory() . '/cpt/CarsCPT.php';
require get_template_directory() . '/template-parts/blocks/RegistrationBlocks.php';
require get_template_directory() . '/api/openweather/Openweather.php';
require get_template_directory() . '/likes_dislikes/LikesDislikes.php';

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'General theme Setting',
		'menu_title'	=> 'Theme Setting',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Setting Header',
		'menu_title'	=> 'Header',
		'menu_slug' 	=> 'header',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Setting footer',
		'menu_title'	=> 'Footer',
		'menu_slug' 	=> 'footer',
		'parent_slug'	=> 'theme-general-settings',
	));

}

