<?php

/**
* Testimonial Block Template.
*
* @param   array $block The block settings and attributes.
* @param   string $content The block inner HTML (empty).
* @param   bool $is_preview True during AJAX preview.
* @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute allowing for custom "anchor" value.
$id = 'aboutus';
if( !empty($block['id']) ) {
	$id = 'aboutus-' . $block['id'];
}

if( !empty($block['anchor']) ) {
$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'aboutus';
if( !empty($block['className']) ) {
$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
$className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$text = get_field('aboutus') ?: 'ACF Block';
$author = get_field('author') ?: 'Car News/';
$role = get_field('role') ?: 'WP';
$image = get_field('image') ?: 'Bolt';
$background_color = get_field('background_color');
$text_color = get_field('text_color');


?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

    <blockquote class="aboutus" >
        <img class="aboutus-imag" src="<?php echo $image; ?>" style="width:100px;height:100px;">
        <span class="aboutus-text"><?php echo $text; ?></span>
        <span class="aboutus-author"><?php echo $author; ?></span>
        <span class="aboutus-role"><?php echo $role; ?></span>
        </blockquote>
    <div class="aboutus"  >

    </div>
    <style>
        #<?php echo $id; ?> {
            background: <?php echo $background_color; ?>;
            color: <?php echo $text_color; ?>;
        }
    </style>
</div>