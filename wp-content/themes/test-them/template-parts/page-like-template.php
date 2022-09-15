<?php
/* Template Name: Likes Dislikes */
get_header(); ?>
	<!--    5 last posts-->
	<div class="middle">
		<?php // Default params
		$my_posts = get_posts( array(
			'include'     => array(),
			'exclude'     => array(),
			'meta_key'    => 'like',
			'meta_value'  =>'',
			'post_type'   => 'test_cars',
			'suppress_filters' => true, //  for filtration SQL
		) );

		global $post;
		echo '<div class="five-posts"><ul>';
		foreach( $my_posts as $post ){
				setup_postdata( $post );
			$likes = get_post_meta($post->ID, "like", true) ? __('Likes') . ':' . get_post_meta($post->ID, "like", true) : '';
            $dislikes = get_post_meta($post->ID, "dislike", true) ? __('  Dislikes') . ':' . get_post_meta($post->ID, "dislike", true) : '';
			if(!empty($likes) || !empty($dislikes)) {

				echo '<li><h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>
<br>' . $likes . $dislikes .'</li>';
			}
		}
		echo'<ul><div/>';
		wp_reset_postdata(); // reset
		?>
		<?php //global $wp_query; var_dump($wp_query); ?>
		<?php     echo '<h3><a href="'. site_url( $path = '', $scheme = null ).'/?post_type=test_cars ">'.'Archive'.'</a></h3>'; ?>
		<?php     echo '<h3><a href="'. site_url( $path = '', $scheme = null ) .'/ ">'.'Home'.'</a></h3>'; ?>
	</div>
<?php
get_footer();
