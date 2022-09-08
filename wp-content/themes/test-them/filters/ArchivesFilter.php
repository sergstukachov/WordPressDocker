<?php


    function truetest_jquery_scripts() {

        wp_enqueue_script( 'jquery' );
        wp_register_script( 'filter', get_stylesheet_directory_uri() . '/assets/js/filter.js', array( 'jquery' ), time(), true );
        wp_enqueue_script( 'filter' );
        wp_localize_script( 'filter', 'true_obj', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
    }
add_action( 'wp_enqueue_scripts', 'truetest_jquery_scripts' );
add_action( 'wp_ajax_myfilter', 'true_filter_function' );
add_action( 'wp_ajax_nopriv_myfilter', 'true_filter_function' );

    function true_filter_function(){
        $args['post_type'] = 'test_cars';
        // for the taxonomy
        if( $_POST[ 'categoryfilter' ]) {
            $args[ 'tax_query' ] = array(
                array(
                    'taxonomy' => 'cars_category',
                    'field' => 'id',
                    'terms' => $_POST[ 'categoryfilter' ]
                )
            );
        }
       if( $_POST[ 'brand' ] ) {
           $args['meta_query'] = [

            'relation' => 'AND', [
                    'key' => 'brand2',
                    'value' => sanitize_text_field($_POST['brand']),
                    'compare' => '='
                ]];}
        query_posts( $args );
//       var_dump($_POST);
//       var_dump($_POST['brand']);
//
//        var_dump( $GLOBALS['wp_query']->request);die();// Print SQL Query
        if ( have_posts() ) {
            echo '<header class="header"><ul>';
            while ( have_posts() ) : the_post();
                // view info
                echo ' <h2><li> <a href="' . get_permalink() . '">' . get_the_title() . '</a></li></h2>';
            endwhile;
            echo '</ul></header>';
        } else {
            echo 'Not found';
        }
        die();
    }
