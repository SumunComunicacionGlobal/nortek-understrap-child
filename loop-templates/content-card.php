<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<article <?php post_class( 'hfeed-post' ); ?>>

    <div class="card position-relative">

        <?php the_post_thumbnail( 'medium', array( 'class' => 'card-img-top' ) ); ?>

        <div class="card-body">

            <?php
                the_title(
                    sprintf( '<p class="h5 card-title"><a class="stretched-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
                    '</a></p>'
                );
            ?>

            <?php the_excerpt(); ?>

        </div>

    </div>

</article>
