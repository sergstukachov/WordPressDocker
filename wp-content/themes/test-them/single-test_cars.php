<?php
/*
Single Post Template: Single test_cars
*/
get_header(); ?>
    <div class="content-main">
 <div class="content">

            <div class="post-content">
                <div class="post-img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a></div>
                <h2 class="post-title"><?php the_title(); ?></h2>
                <div><?php the_content();?></div>
                <div id="do_shortcode"><?php echo do_shortcode( '[gallery]' );?></div>
                <?php //var_dump(get_the_ID()); die(); ?>
	            <?php echo getPostLikeLink(get_the_ID()); ?>
            </div>
    </div>

<div id="custom-filds">
<!--Grt custom filds-->
<?php
$fields = get_field_objects();
if( $fields ): ?>
    <ul>
<!--        view acf filds-->
            <li><?php echo __('Brand'); ?>: <?php echo $fields['brand2']['value']; ?></li>
    </ul>
	<?php endif; ?>
</div>
</div>

<!--    5 last posts-->
<div class="middle">
   <?php // Default params
    $my_posts = get_posts( array(
    'numberposts' => 5,
    'category'    => 0,
    'orderby'     => 'date',
    'order'       => 'DESC',
    'include'     => array(),
    'exclude'     => array(),
    'meta_key'    => '',
    'meta_value'  =>'',
    'post_type'   => 'test_cars',
    'suppress_filters' => true, //  for filtration SQL
    ) );

    global $post;
   echo '<div class="five-posts"><ul>';
    foreach( $my_posts as $post ){
    setup_postdata( $post );

        echo '<li><h3><a href="'. get_permalink() .'">'. get_the_title() .'</a></h3></li>';

    }
    echo'<ul><div/>';
    wp_reset_postdata(); // reset
    ?>
    <?php //global $wp_query; var_dump($wp_query); ?>
    <?php     echo '<h3><a href="'. site_url( $path = '', $scheme = null ).'/?post_type=test_cars ">'.'Archive'.'</a></h3>'; ?>
    <?php     echo '<h3><a href="'. site_url( $path = '', $scheme = null ) .'/ ">'.'Home'.'</a></h3>'; ?>
</div>
<?php
//   Create block Aboutus
get_template_part( 'template-parts/blocks/aboutus/aboutus' );
get_footer();
