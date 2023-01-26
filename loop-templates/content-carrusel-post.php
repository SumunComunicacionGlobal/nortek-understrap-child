<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class( 'hfeed-post carrusel-post' ); ?> id="post-<?php the_ID(); ?>">

	<div class="px-2">

		<header class="entry-header">

			<?php if ( 'post' === get_post_type() ) : ?>

				<div class="entry-meta">
					<?php understrap_posted_on(); ?>
				</div><!-- .entry-meta -->

			<?php endif; ?>

			<?php
			the_title(
				sprintf( '<h3 class="h4 mb-2 entry-title"><a class="stretched-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
				'</a></h3>'
			);
			?>

		</header><!-- .entry-header -->

		<div class="entry-content">

			<?php
			the_excerpt();
			understrap_link_pages();
			?>

		</div><!-- .entry-content -->

		<footer class="entry-footer">

			<?php understrap_entry_footer(); ?>

		</footer><!-- .entry-footer -->

	</div>

</article><!-- #post-## -->
