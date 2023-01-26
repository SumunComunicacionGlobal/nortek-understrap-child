<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if (is_active_sidebar( 'top-bar' )) { ?>
    
    <div id="wrapper-top-bar" class="top-bar bg-light">

        <div class="container-fluid">

            <div class="row">
                <?php dynamic_sidebar( 'top-bar' ); ?>
            </div>

        </div>

    </div>

<?php } ?>

