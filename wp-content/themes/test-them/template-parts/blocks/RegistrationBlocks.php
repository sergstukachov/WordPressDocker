<?php

class RegistrationBlocks
{
    public function __construct()
    {
        add_action('acf/init', [$this, 'my_acf_init_block_types']);
	    add_action('acf/init', [$this, 'my_register_blocks']);
	    add_action('acf/init', [$this, 'my_acf_init_block_about_us']);
    }
	function my_acf_init_block_types() {

		// Check function exists.
		if( function_exists('acf_register_block_type') ) {

			// register a testimonial block.
			acf_register_block_type(array(
				'name'              => 'testimonial',
				'title'             => __('Testimonial'),
				'description'       => __('A custom testimonial block.'),
				'render_template'   => 'template-parts/blocks/testimonial/testimonial.php',
				'category'          => 'formatting',
				'icon'              => 'admin-comments',
				'keywords'          => array( 'testimonial', 'quote' ),
			));
		}
	}
	function my_acf_init_block_about_us() {

		// Check function exists.
		if( function_exists('acf_register_block_type') ) {

			// register a testimonial block.
			acf_register_block_type(array(
				'name'              => 'about_us',
				'title'             => __('About Us'),
				'description'       => __('A custom about us block.'),
				'render_template'   => 'template-parts/blocks/aboutus/aboutus.php',
				'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/aboutus/aboutus.css',
				'enqueue_script'    => get_template_directory_uri() . '/template-parts/blocks/aboutus/aboutus.js',
				'category'          => 'formatting',
				'icon'              => 'admin-comments',
				'keywords'          => array( 'about_us', 'quote' ),
			));
		}
	}
	// Register a slider block.

	function my_register_blocks() {

		// check function exists.
		if( function_exists('acf_register_block_type') ) {

			// register a testimonial block.
			acf_register_block_type(array(
				'name'              => 'slider',
				'title'             => __('Slider'),
				'description'       => __('A custom slider block.'),
				'render_template'   => 'template-parts/blocks/slider/slider.php',
				'category'          => 'formatting',
				'icon' 				=> 'images-alt2',
				'align'				=> 'full',
				'enqueue_assets' 	=> function(){
					wp_enqueue_style( 'slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1' );
					wp_enqueue_style( 'slick-theme', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.8.1' );
					wp_enqueue_script( 'slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true );

					wp_enqueue_style( 'block-slider', get_template_directory_uri() . '/template-parts/blocks/slider/slider.css', array(), '1.0.0' );
					wp_enqueue_script( 'block-slider', get_template_directory_uri() . '/template-parts/blocks/slider/slider.min.js', array(), '1.0.0', true );
				},
			));
		}
	}
}
new RegistrationBlocks;
