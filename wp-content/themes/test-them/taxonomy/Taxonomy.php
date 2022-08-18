<?php
/**
 * Add CTP
 */
function test_register_cpt() {

    $args = array(
        'labels' => array(
            'name' => __('Test Cars'),
            'singular_name' => __('Test Cars')
        ),
        'menu_icon' => 'dashicons-car',
        'description'         => '',
        'public'              => true,
        'show_ui'             => true,
        'capability_type'     => 'post', // or page
        'map_meta_cap'        => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'hierarchical'        => false,
        'query_var'           => true,
        'show_in_rest' => true,
        'supports'            => ['title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'],
        'menu_position'       => 5,
        'has_archive'         => true,
        'show_in_nav_menus'   => true,
    );
    register_post_type( 'test_cars', $args );
}
add_action( 'init', 'test_register_cpt' );


function cars_register_taxonomy() {
    register_taxonomy( 'cars_category', 'test_cars',
        array(
            'labels' => array(
                'name'              => 'Cars Categories',
                'singular_name'     => 'Cars Category',
                'search_items'      => 'Search Cars Categories',
                'all_items'         => 'All Cars Categories',
                'edit_item'         => 'Edit Cars Categories',
                'update_item'       => 'Update Cars Category',
                'add_new_item'      => 'Add New Cars Category',
                'new_item_name'     => 'New Cars Category Name',
                'menu_name'         => 'Cars Category',
            ),
            'public'                => true,
            'show_in_rest' => true,
            'hierarchical'          => true,
            'update_count_callback' => '_update_post_term_count',
            //  'rewrite' => ['slug' => 'cars_category'],
            'meta_box_cb' => 'post_categories_meta_box',
            'show_admin_column' => true
        )
    );
}
add_action( 'init', 'cars_register_taxonomy' );
?>