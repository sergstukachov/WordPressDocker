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
<?php  echo  '<select name="categoryfilter"><option>Сhoose a Сategory</option>';
    foreach ( $terms as $term ) {
         echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';
    }
    echo '</select>'; ?>
<?php endif; ?>
<?php
echo '<button>Filter</button><input type="hidden" name="action" value="myfilter">
</form>';
?>
<div id="filter-result"> </div>


<?php get_footer(); ?>
