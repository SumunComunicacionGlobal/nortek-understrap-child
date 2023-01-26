<?php
/**
 * Search results partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div class="card">

		<div class="card-body">

			<?php
			the_title(
				sprintf( '<p class="h5 card-title"><a class="stretched-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
				'</a></p>'
			);
			?>

			<div class="card-text">

				<?php if ( 'post' === get_post_type() ) : ?>

					<div class="entry-meta">

						<?php understrap_posted_on(); ?>

					</div><!-- .entry-meta -->

				<?php endif; ?>

				<div class="entry-summary">

					<?php the_excerpt(); ?>

				</div><!-- .entry-summary -->

				<footer class="entry-footer">

					<?php understrap_entry_footer(); ?>

				</footer><!-- .entry-footer -->

			</div>

		</div>

	</div>

</article><!-- #post-## -->
