<?php get_header(); ?>
<div class="content-main">
    <div class="content">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="post-content">
                <div class="post-img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a></div>
                <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div><?php the_content();?></div>
                <div class="post-text"><?php the_excerpt(); ?></div>
            </div>
		<?php endwhile; ?>
		<?php else: ?>
		<?php endif; ?>
    </div>
    <div class="sidebar-description"><?php get_sidebar(); ?></div>
</div>
<?php echo '<form action="" method="POST" id="filter">'; ?>
<?php if( $terms = get_terms( array( 'taxonomy' => 'cars_category', 'orderby' => 'name' ) )) : ?>
	<?php  echo  '<select name="categoryfilter"><option value="">Сhoose a Сategory</option>';
	foreach ( $terms as $term ) {
		echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';
	}
	echo '</select>'; ?>
<?php endif; ?>
<?php
$my_brand = new WP_Query;
$brand = $my_brand->query( array(
	'post_type' => 'test_cars',
	'meta_query' => [
		'relation' => 'AND',
		[
			'key' => 'brand2',
			'compare' => 'EXISTS'
		],
	]));
//Get fild value
$options = [];
foreach($brand as $option) {
	$options[] = get_field('brand2', $option->ID);
}
//Removing duplicates
$select_options = array_unique($options);
?>
    <select name="brand"><option value="">Сhoose a Brand</option>
		<?php foreach($select_options as $option): ?>
            <option value="<?php echo $option;?>"><?php echo $option;?></option>
		<?php endforeach; ?>
    </select>
<?php
echo '<button>Filter</button><input type="hidden" name="action" value="myfilter">
</form>';
?>
    <div id="filter-result"> </div>
<?php get_footer(); ?>