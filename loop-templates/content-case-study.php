<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class( 'mb-3 position-relative stretch-linked-block' ); ?> id="post-<?php the_ID(); ?>">

	<div class="row align-items-end">

		<div class="col-md-6">

			<?php the_post_thumbnail( 'full', array( 'class' => 'wp-block-cover__image-background' ) ); ?>

		</div>

		<div class="col-md-6 position-static content-column">

			<?php
			the_title(
				sprintf( '<p class="h5 font-weight-bold entry-title"><a class="stretched-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
				'</a></p>'
			);
			?>

			<?php the_excerpt(); ?>

			<footer class="entry-footer">

				<?php understrap_edit_post_link(); ?>

			</footer><!-- .entry-footer -->

		</div>

	</div>


</article><!-- #post-## -->