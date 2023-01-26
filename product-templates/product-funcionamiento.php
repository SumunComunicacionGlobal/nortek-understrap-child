<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( !$post->post_content ) return false; ?>

<div class="wrapper" id="description">

	<?php // echo '<h2 class="mw-600">' . __( 'Diseño y principio de funcionamiento', 'nortek' ) . '</h2>'; ?>

	<?php the_content(); ?>

</div>
