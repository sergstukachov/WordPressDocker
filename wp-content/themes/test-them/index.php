<!DOCTYPE html>
<html>

<head>
    <meta charset="<?php bloginfo( 'test_cars' ); ?>">
    <title>
        <?php echo wp_get_document_title(); ?>
    </title>

    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" />

    <?php wp_head(); ?>
</head>

<body>
<header class="header">
    <h1><?php bloginfo( 'name' ); ?></h1>
    <h2><?php echo __('Cars Home Page'); ?></h2>
</header>

<div class="middle">
///////////////////////////
    <?php     echo '<h3><a href="'. site_url( $path = '', $scheme = null ).'/?post_type=test_cars ">'.'All Cars'.'</a></h3>'; ?>
</div>

<?php get_footer(); ?>
</body>

</html>
