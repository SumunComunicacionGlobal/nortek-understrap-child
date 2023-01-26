<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<article <?php post_class( 'hfeed-post' ); ?>>

    <div class="card product-card position-relative">

        <div class="card-header">
            <?php nortek_serie(); ?>
        </div>

        <?php the_post_thumbnail( 'medium', array( 'class' => 'card-img-top' ) ); ?>

        <div class="card-body has-arrow">

            <?php
                the_title(
                    sprintf( '<p class="card-title"><a class="stretched-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
                    '</a></p>'
                );
            ?>

        </div>

    </div>

</article>
