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
require get_template_directory() . '/likes_dislikes/LikesDislikes.php';