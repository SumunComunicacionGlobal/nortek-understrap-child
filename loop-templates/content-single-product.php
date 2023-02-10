<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div class="entry-content">

		<div class="wp-block-group alignfull product-summary shadow-lg">

			<div class="wp-block-group__inner-container">

				<?php smn_breadcrumb(); ?>

				<div class="row align-items-center">

					<div class="col-md-6 mb-2 text-center">

						<?php get_template_part( 'product-templates/product-gallery' ); ?>
						<?php //the_post_thumbnail( 'medium_large' ); ?>
					
					</div>

					<div class="col-md-6">

						<?php nortek_serie(); ?>

						<?php the_title( '<h1 class="h3 product-title">', '</h1>' ); ?>
					
						<?php echo wpautop( $post->post_excerpt ); ?>
					</div>

				</div>

			</div>

		</div>

		<?php get_template_part( 'product-templates/product-tabla-contenidos'); ?>

		<div class="row">

			<?php  get_template_part( 'product-templates/product-archivos');	?>

		</div>

		<?php  get_template_part( 'product-templates/product-funcionamiento');	?>

		<?php  get_template_part( 'product-templates/product-especificaciones');	?>

		<div class="row">

			<?php  get_template_part( 'product-templates/product-croquis');	?>

			<?php  get_template_part( 'product-templates/product-pedido-accesorios');	?>

		</div>

		<?php  get_template_part( 'product-templates/product-relacionados');	?>

		<div class="wp-block-group alignfull bg-light">

			<div class="container">

				<?php smn_reusable_block( 364 ); ?>

			</div>

		</div>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
