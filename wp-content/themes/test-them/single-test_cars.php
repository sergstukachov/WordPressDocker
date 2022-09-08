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
<!--    Create block Aboutus-->
<?php
//$className = 'aboutus';
//if( !empty($fields['className']) ) {
//	$className .= ' ' . $fields['className'];
//}
//if( !empty($fields['align']) ) {
//	$className .= ' align' . $fields['align'];
//}
//
//    $text = get_field('aboutus') ?: 'We work for you!';
//    $author = get_field('author') ?: 'made in Ukrain/';
//    $role = get_field('role') ?: "If you can see it, it's ok";
//    $image = get_field('image') ?: 'Bolt';
//    $background_color = get_field('background_color');
//    $text_color = get_field('text_color')
//    ?>
<!--    <div id="aboutus" class="aboutus">-->
<!---->
<!--        <blockquote class="--><?php //echo $className; ?><!--" >-->
<!--            <img src="--><?php //echo $image; ?><!--" style="width:100px;height:100px;">-->
<!--            <span class="aboutus-text">--><?php //echo $text; ?><!--</span>-->
<!--            <span class="aboutus-author">--><?php //echo $author; ?><!--</span>-->
<!--            <span class="aboutus-role">--><?php //echo $role; ?><!--</span>-->
<!--        </blockquote>-->
<!--        <div class="aboutus"  >-->
<!---->
<!--        </div>-->
    <!--        <style type="text/css">
            #<?php //echo $className; ?> {
                background: <?php //echo $background_color; ?>;
                color: <?php //echo $text_color; ?>;
            }
        </style>-->
<!--    </div>-->

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
