<?php
get_header();

$description = get_the_archive_description();
?>

<?php if ( have_posts() ) : ?>

    <header class="page-header alignwide">
        <?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
        <?php if ( $description ) : ?>
            <div class="archive-description"><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
        <?php endif; ?>
    </header><!-- .page-header -->


        <?php while ( have_posts() ) : ?>
            <?php the_post(); ?>
            <?php echo '<h3><a href="'. get_permalink() .'">'. get_the_title() .'</a></h3>'; ?>
            <?php  //the_content(); ?>
            <?php  //echo get_the_excerpt(); ?>
        <br/>
        <?php endwhile; ?>

<?php endif; ?>

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

<div class="sidebar-description"><?php get_sidebar(); ?></div>

<?php get_footer(); ?>
