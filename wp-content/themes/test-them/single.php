<?php

get_header();

/* Start the Loop */

    the_post();
    the_category();
    the_title();
    the_content();
    ?>
<div class="middle">
    <?php     echo '<h3><a href="'. site_url( $path = '', $scheme = null ).'/?post_type=test_cars ">'.'All Cars'.'</a></h3>'; ?>
    <?php     echo '<h3><a href="'. site_url( $path = '', $scheme = null ) .'/ ">'.'Home'.'</a></h3>'; ?>
</div>
<?php
get_footer();
