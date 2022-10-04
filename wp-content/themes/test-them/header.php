<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8" />
        <title>Cars</title>
        <link rel="stylesheet" href="<?= get_stylesheet_uri(); ?>" type="text/css" />
<div><?php // var_dump( get_field('header_image', 'option')); ?></div>
      <?php
      $image = get_field('header_image', 'option');
      if( $image ) {
	     $headImag =  $image['url'];
      }
      ?>
        <img src="<?= $headImag; ?>"></img>
<p><?= 'You can change it in the admin panel.' . get_field('header_title', 'option'); ?><p/>
        <style>
            body {
                background: <?= get_field('color_theme', 'option'); ?>;
            }
        </style>
    </head>
    <body>