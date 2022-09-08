<?php
/**
 * Add Taxonomy
 */
class CarsTaxonomy
{
    public function __construct() {
        add_action('init', [ $this,'cars_register_taxonomy']);
    }

    function cars_register_taxonomy()
    {
        register_taxonomy('cars_category', 'test_cars',
            array(
                'labels' => array(
                    'name' => 'Cars Categories',
                    'singular_name' => 'Cars Category',
                    'search_items' => 'Search Cars Categories',
                    'all_items' => 'All Cars Categories',
                    'edit_item' => 'Edit Cars Categories',
                    'update_item' => 'Update Cars Category',
                    'add_new_item' => 'Add New Cars Category',
                    'new_item_name' => 'New Cars Category Name',
                    'menu_name' => 'Cars Category',
                ),
                'public' => true,
                'show_in_rest' => true,
                'hierarchical' => true,
                'update_count_callback' => '_update_post_term_count',
                //  'rewrite' => ['slug' => 'cars_category'],
                'meta_box_cb' => 'post_categories_meta_box',
                'show_admin_column' => true
            )
        );
    }
}
new CarsTaxonomy;