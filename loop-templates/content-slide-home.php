<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div <?php post_class( 'slide-home d-flex flex-column justify-content-center' ); ?> id="post-<?php the_ID(); ?>">

	<?php the_title( '<p class="h5 entry-title">', '</p>' ); ?>

	<?php the_content(); ?>

	<footer class="entry-footer">

		<?php understrap_edit_post_link(); ?>

	</footer><!-- .entry-footer -->

</div><!-- #post-## -->