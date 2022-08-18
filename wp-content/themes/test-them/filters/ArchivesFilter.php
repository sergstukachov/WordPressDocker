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
        $args = array(
            'orderby' => 'date',
            'order'	=> $_POST[ 'date' ]
        );

        // for the taxonomy
        if( isset( $_POST[ 'categoryfilter' ] )) {
            $args[ 'tax_query' ] = array(
                array(
                    'taxonomy' => 'cars_category',
                    'field' => 'id',
                    'terms' => $_POST[ 'categoryfilter' ]
                )
            );
        }

        query_posts( $args );
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
