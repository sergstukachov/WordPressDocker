<?php
/**
 * Add CPT
 */
class CarsCPT
{
    public function __construct() {
        add_action('init', [ $this,'test_register_cpt']);
    }
    function test_register_cpt()
    {

        $args = array(
            'labels' => array(
                'name' => __('Test Cars'),
                'singular_name' => __('Test Cars')
            ),
            'menu_icon' => 'dashicons-car',
            'description' => '',
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post', // or page
            'map_meta_cap' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'hierarchical' => false,
            'query_var' => true,
            'show_in_rest' => true,
            'supports' => [
                'title',
                'editor',
                'author',
                'thumbnail',
                'excerpt',
                'trackbacks',
                'custom-fields',
                'comments',
                'revisions',
                'page-attributes',
                'post-formats'
            ],
            'menu_position' => 5,
            'has_archive' => true,
            'show_in_nav_menus' => true,
        );
        register_post_type('test_cars', $args);
    }
}
new CarsCPT;