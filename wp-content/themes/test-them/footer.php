<?php
/**
 * The template for displaying the footer
 */

?>
<footer id="site-footer" class="header-footer-group">

    <div><?= 'You can change it in the admin panel.' . get_field('footer_autor', 'option'); ?></div>
  <?=   openweather_today() ?>
	<?php wp_footer(); ?>
</footer><!-- #site-footer -->


