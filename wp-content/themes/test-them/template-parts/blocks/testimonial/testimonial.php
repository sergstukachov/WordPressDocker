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
$id = 'testimonial-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonial';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$text = get_field('testimonial') ?: 'Your testimonial here...';
$author = get_field('author') ?: 'Serg';
$role = get_field('role') ?: 'WP';
$image = get_field('image') ?: 'Bolt';
$background_color = get_field('background_color');
$text_color = get_field('text_color');
$t = get_field('text');

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <blockquote class="testimonial-blockquote">
        <?php echo $t; ?>
        <span class="testimonial-text"><?php echo $text; ?></span>
        <span class="testimonial-author"><?php echo $author; ?></span>
        <span class="testimonial-role"><?php echo $role; ?></span>
    </blockquote>
<!--    <div>-->
<!--		--><?php //echo wp_get_attachment_image( $image['id'], 'full' ); ?>
<!--    </div>-->
    <div class="testimonial-image">
		<?php echo wp_get_attachment_image( $image, 'full' ); ?>
    </div>

</div>

