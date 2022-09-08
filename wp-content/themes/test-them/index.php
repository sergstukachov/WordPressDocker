<?php get_header(); ?>
	<div class="content-main">
		<div class="content">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<div><?php the_content();?></div>

				</div>
			<?php endwhile; ?>
			<?php else: ?>
			<?php endif; ?>
		</div>
	</div>
<?php get_footer(); ?>